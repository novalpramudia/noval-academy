<?php 
include 'config.php'; 
checkLogin(); // Memastikan user sudah login lewat session

$user_id = $_SESSION['user_id'];
// Ambil ID kursus dari URL (misal: learning.php?id=1)
$course_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : 0;

// 1. QUERY UNTUK MENGAMBIL DATA KURSUS & PROGRESS USER
$query = mysqli_query($conn, "SELECT enrollments.*, courses.title, courses.category 
                               FROM enrollments 
                               JOIN courses ON enrollments.course_id = courses.id 
                               WHERE enrollments.user_id = '$user_id' AND enrollments.course_id = '$course_id'");

// 2. AMBIL HASIL QUERY
$data = mysqli_fetch_assoc($query);

// 3. PROTEKSI: Jika user belum daftar kursus ini, tendang balik ke katalog
if (!$data) {
    echo "<script>alert('Anda belum terdaftar di kelas ini!'); window.location='courses.php';</script>";
    exit;
}

// 4. LOGIKA UPDATE PROGRESS (Saat tombol 'Selesaikan' diklik)
if (isset($_POST['complete_step'])) {
    // Tambah progress 20% setiap klik, maksimal 100%
    $current_progress = $data['progress'];
    $new_progress = ($current_progress >= 100) ? 100 : $current_progress + 20;
    
    // Tentukan status
    $status = ($new_progress >= 100) ? 'completed' : 'learning';
    
    $update = mysqli_query($conn, "UPDATE enrollments SET progress = '$new_progress', status = '$status' 
                                   WHERE user_id = '$user_id' AND course_id = '$course_id'");
    
    if($update) {
        // Refresh halaman agar angka progress di layar berubah
        header("Location: learning.php?id=$course_id");
        exit;
    }
}

include 'components/header.php'; 
?>

<div class="flex flex-col md:flex-row min-h-screen bg-gray-50">
    
    <aside class="w-full md:w-80 bg-white border-r border-gray-200 overflow-y-auto">
        <div class="p-6 border-b">
            <h2 class="font-bold text-gray-800 text-lg"><?= $data['title'] ?></h2>
            <div class="mt-4">
                <div class="flex justify-between mb-1">
                    <span class="text-xs font-semibold text-blue-600">Progress Belajar</span>
                    <span class="text-xs font-semibold text-blue-600"><?= $data['progress'] ?>%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" style="width: <?= $data['progress'] ?>%"></div>
                </div>
            </div>
        </div>
        
        <nav class="p-4 space-y-1">
            <p class="text-xs font-bold text-gray-400 uppercase px-3 mb-2">Materi Dasar</p>
            <a href="#" class="block p-3 rounded-lg bg-blue-50 text-blue-700 font-medium border-l-4 border-blue-600">1. Pengenalan Dasar</a>
            <a href="#" class="block p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition">2. Instalasi & Persiapan</a>
            <a href="#" class="block p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition">3. Menulis Kode Pertama</a>
            
            <div class="pt-4 mt-4 border-t">
                <a href="quiz.php?id=<?= $course_id ?>" class="block p-3 rounded-lg bg-orange-50 text-orange-700 font-bold hover:bg-orange-100 transition flex items-center">
                    <span class="mr-2">📝</span> Ambil Kuis Akhir
                </a>
            </div>
        </nav>
    </aside>

    <main class="flex-1 p-6 md:p-12">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <span class="text-blue-600 font-bold text-sm uppercase tracking-widest">Modul 1</span>
                <h1 class="text-4xl font-extrabold text-gray-900 mt-2 mb-8">Pengenalan Dasar & Fundamental</h1>
                
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                    <p>Selamat datang di kelas <strong><?= $data['title'] ?></strong>. Pada tahap awal ini, kita akan mempelajari konsep dasar dan mengapa teknologi ini sangat populer di kalangan developer profesional.</p>
                    
                    <div class="bg-slate-900 rounded-xl p-6 my-8 shadow-inner font-mono text-sm leading-6">
                        <p class="text-gray-400 mb-2">// Contoh kode sederhana</p>
                        <p class="text-pink-400">function <span class="text-yellow-300">mulaiBelajar</span>() {</p>
                        <p class="text-white ml-4">console.<span class="text-blue-400">log</span>(<span class="text-green-400">"Halo, saya sedang belajar di Noval Academy!"</span>);</p>
                        <p class="text-pink-400">}</p>
                    </div>

                    <p>Materi ini dirancang untuk pemula. Jangan terburu-buru, pastikan Anda memahami setiap baris kode sebelum melanjutkan ke materi berikutnya.</p>
                </div>

                <div class="mt-16 pt-8 border-t flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="text-gray-500 text-sm">
                        Modul selanjutnya: <strong>Instalasi & Persiapan</strong>
                    </div>
                    
                    <form method="POST">
                        <button name="complete_step" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 rounded-2xl font-bold shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1 active:scale-95">
                            Selesaikan Materi Ini &rarr;
                        </button>
                    </form>
                </div>
            </div>

            <?php if($data['progress'] >= 100): ?>
                <div class="mt-8 p-6 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl text-white shadow-xl flex flex-col md:flex-row items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold italic">Selamat! Progress Kamu Mencapai 100%</h3>
                        <p class="opacity-90">Kamu telah menyelesaikan seluruh materi di kelas ini.</p>
                    </div>
                    <a href="certificate.php?id=<?= $course_id ?>" class="mt-4 md:mt-0 bg-white text-green-600 px-8 py-3 rounded-xl font-bold hover:bg-gray-100 transition shadow-md">
                        🎓 Klaim Sertifikat
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </main>

</div>

<?php include 'components/footer.php'; ?>