<?php 
include '../config.php';
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);
    
    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['fullname'];
        header("Location: ../dashboard.php");
    } else {
        $error = "Email atau Password salah!";
    }
}
?>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Login Member</h2>
        <?php if(isset($error)) echo "<p class='text-red-500 text-sm mb-4'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" class="w-full p-3 mb-4 border rounded" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-3 mb-6 border rounded" required>
            <button name="login" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold">Masuk</button>
        </form>
    </div>
</body>