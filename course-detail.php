<?php 
include 'config.php'; 
include 'components/header.php'; 

// Mengambil ID kursus dari URL
$course_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : 0;

// Ambil data kursus dari database
$query = mysqli_query($conn, "SELECT * FROM courses WHERE id = '$course_id'");
$course = mysqli_fetch_assoc($query);

// Jika kursus tidak ditemukan
if (!$course) {
    echo "<script>alert('Kursus tidak ditemukan!'); window.location='courses.php';</script>";
    exit;
}

// Cek apakah user sudah daftar kursus ini
$is_enrolled = false;
if (isset($_SESSION['user_id'])) {
    $u_id = $_SESSION['user_id'];
    $check_enroll = mysqli_query($conn, "SELECT * FROM enrollments WHERE user_id = '$u_id' AND course_id = '$course_id'");
    if (mysqli_num_rows($check_enroll) > 0) {
        $is_enrolled = true;
    }
}

// Logika ketika tombol "Daftar Kursus" diklik
if (isset($_POST['enroll'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: auth/login.php");
        exit;
    }
    
    $u_id = $_SESSION['user_id'];
    mysqli_query($conn, "INSERT INTO enrollments (user_id, course_id, progress, status) VALUES ('$u_id', '$course_id', 0, 'learning')");
    header("Location: course-detail.php?id=$course_id");
}
?>

<div class="bg-white min-h-screen">
    <div class="bg-slate-900 py-16 text-white">
        <div class="container mx-auto px-6">
            <nav class="text-sm mb-4 text-blue-400">
                <a href="courses.php">Kursus</a> &raquo; <span class="text-gray-300"><?= $course['category'] ?></span>
            </nav>
            <h1 class="text-4xl font-bold mb-4"><?= $course['title'] ?></h1>
            <p class="text-gray-400 text-lg max-w-3xl"><?= $course['description'] ?></p>
        </div>
    </div>

    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <div class="lg:w-2/3">
                <h2 class="text-2xl font-bold mb-6">Silabus Pembelajaran</h2>
                <div class="space-y-4">
                    <div class="border rounded-xl p-4 flex items-center justify-between bg-gray-50">
                        <div class="flex items-center">
                            <span class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-4 text-sm font-bold">1</span>
                            <span class="font-medium">Pengenalan Dasar & Persiapan Tools</span>
                        </div>
                        <span class="text-gray-400 text-sm">15 Menit</span>
                    </div>
                    <div class="border rounded-xl p-4 flex items-center justify-between bg-gray-50">
                        <div class="flex items-center">
                            <span class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-4 text-sm font-bold">2</span>
                            <span class="font-medium">Memahami Sintaks dan Struktur</span>
                        </div>
                        <span class="text-gray-400 text-sm">30 Menit</span>
                    </div>
                    <div class="border rounded-xl p-4 flex items-center justify-between bg-gray-50">
                        <div class="flex items-center">
                            <span class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-4 text-sm font-bold">3</span>
                            <span class="font-medium">Latihan Project Sederhana</span>
                        </div>
                        <span class="text-gray-400 text-sm">45 Menit</span>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="border rounded-2xl p-6 shadow-xl sticky top-24 bg-white">
                    <h3 class="font-bold text-xl mb-4">Mulai Belajar</h3>
                    <ul class="text-gray-600 space-y-3 mb-6">
                        <li class="flex items-center text-sm">✅ Akses Selamanya</li>
                        <li class="flex items-center text-sm">✅ Sertifikat Kelulusan</li>
                        <li class="flex items-center text-sm">✅ Forum Diskusi</li>
                    </ul>

                    <?php if ($is_enrolled): ?>
                        <a href="learning.php?id=<?= $course_id ?>" class="block w-full bg-green-600 hover:bg-green-700 text-white text-center font-bold py-4 rounded-xl transition shadow-lg">
                            Lanjutkan Belajar
                        </a>
                        <p class="text-center text-xs text-gray-400 mt-3 italic">Kamu sudah terdaftar di kelas ini.</p>
                    <?php else: ?>
                        <form method="POST">
                            <button name="enroll" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition shadow-lg">
                                Daftar Sekarang (Gratis)
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>