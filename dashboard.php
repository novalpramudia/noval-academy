<?php 
include 'config.php'; 
checkLogin(); 
include 'components/header.php';
$u_id = $_SESSION['user_id'];
$courses_query = mysqli_query($conn, "SELECT enrollments.*, courses.title FROM enrollments JOIN courses ON enrollments.course_id = courses.id WHERE user_id = '$u_id'");
?>

<div class="container mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold mb-8">Halo, <?= $_SESSION['name']; ?>! 👋</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
            <h3 class="font-bold text-xl mb-4 text-blue-600">Progress Belajar Anda</h3>
            <?php while($row = mysqli_fetch_assoc($courses_query)): ?>
                <div class="mb-4">
                    <div class="flex justify-between mb-1">
                        <span><?= $row['title'] ?></span>
                        <span><?= $row['progress'] ?>%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: <?= $row['progress'] ?>%"></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>