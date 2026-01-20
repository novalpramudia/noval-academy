<?php 
include 'config.php'; 
checkLogin(); 
include 'components/header.php'; 

$user_id = $_SESSION['user_id'];
$course_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : 0;

// Ambil data kursus untuk judul
$course_query = mysqli_query($conn, "SELECT title FROM courses WHERE id = '$course_id'");
$course_data = mysqli_fetch_assoc($course_query);

$show_result = false;
$score = 0;

if (isset($_POST['submit_quiz'])) {
    // Kunci Jawaban
    $answers = [
        'q1' => 'b', 
        'q2' => 'a', 
        'q3' => 'c'  
    ];

    $correct_count = 0;
    foreach ($answers as $key => $correct_val) {
        if (isset($_POST[$key]) && $_POST[$key] == $correct_val) {
            $correct_count++;
        }
    }

    $score = ($correct_count / count($answers)) * 100;
    $show_result = true;

    // Simpan ke database jika skor >= 70 (Lulus)
    if ($score >= 70) {
        mysqli_query($conn, "UPDATE enrollments SET progress = 100, status = 'completed' 
                             WHERE user_id = '$user_id' AND course_id = '$course_id'");
    }
}
?>

<div class="bg-slate-50 min-h-screen py-12">
    <div class="container mx-auto px-6 max-w-3xl">
        
        <?php if (!$show_result): ?>
            <div class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-slate-900">Ujian Akhir</h1>
                <p class="text-slate-500 mt-2">Kursus: <span class="font-semibold text-blue-600"><?= $course_data['title'] ?></span></p>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="bg-blue-600 p-1"></div>
                <form method="POST" class="p-8 md:p-12">
                    
                    <div class="mb-10">
                        <div class="flex items-start mb-4">
                            <span class="bg-blue-100 text-blue-600 font-bold px-3 py-1 rounded-lg mr-4">01</span>
                            <p class="text-lg font-bold text-slate-800">Apa fungsi utama dari perintah <code class="bg-slate-100 px-2 py-1 rounded text-pink-600 font-mono text-sm">console.log()</code>?</p>
                        </div>
                        <div class="grid gap-3 ml-12">
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q1" value="a" class="w-5 h-5 text-blue-600 focus:ring-blue-500" required>
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">Menghapus seluruh file project</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q1" value="b" class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">Menampilkan pesan output di konsol browser</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q1" value="c" class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">Mengubah warna latar belakang website</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-10">
                        <div class="flex items-start mb-4">
                            <span class="bg-blue-100 text-blue-600 font-bold px-3 py-1 rounded-lg mr-4">02</span>
                            <p class="text-lg font-bold text-slate-800">Tag HTML manakah yang digunakan untuk membuat judul tingkat pertama (paling besar)?</p>
                        </div>
                        <div class="grid gap-3 ml-12">
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q2" value="a" class="w-5 h-5 text-blue-600" required>
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">&lt;h1&gt;</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q2" value="b" class="w-5 h-5 text-blue-600">
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">&lt;head&gt;</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q2" value="c" class="w-5 h-5 text-blue-600">
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">&lt;header&gt;</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-12">
                        <div class="flex items-start mb-4">
                            <span class="bg-blue-100 text-blue-600 font-bold px-3 py-1 rounded-lg mr-4">03</span>
                            <p class="text-lg font-bold text-slate-800">Teknologi apa yang paling tepat digunakan untuk menyusun tata letak dan desain website?</p>
                        </div>
                        <div class="grid gap-3 ml-12">
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q3" value="a" class="w-5 h-5 text-blue-600" required>
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">MySQL Database</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q3" value="b" class="w-5 h-5 text-blue-600">
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">PHP Native</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group">
                                <input type="radio" name="q3" value="c" class="w-5 h-5 text-blue-600">
                                <span class="ml-4 text-slate-600 group-hover:text-blue-700 font-medium">CSS & Tailwind CSS</span>
                            </label>
                        </div>
                    </div>

                    <button type="submit" name="submit_quiz" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-extrabold py-5 rounded-2xl shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1 active:scale-95 text-lg">
                        Kirim Jawaban & Selesaikan Kursus
                    </button>
                </form>
            </div>

        <?php else: ?>
            <div class="bg-white rounded-3xl shadow-xl p-10 md:p-16 text-center border border-slate-100 animate-in fade-in zoom-in duration-500">
                <div class="mb-8">
                    <?php if ($score >= 70): ?>
                        <div class="w-24 h-24 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <h2 class="text-4xl font-black text-slate-800">Luar Biasa!</h2>
                        <p class="text-slate-500 mt-2">Kamu berhasil lulus ujian akhir dengan hasil yang memuaskan.</p>
                    <?php else: ?>
                        <div class="w-24 h-24 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                        <h2 class="text-4xl font-black text-slate-800">Ayo Coba Lagi!</h2>
                        <p class="text-slate-500 mt-2">Jangan menyerah, tinjau kembali materi dan ulangi ujiannya.</p>
                    <?php endif; ?>
                </div>

                <div class="inline-block bg-slate-50 rounded-3xl px-12 py-8 border border-slate-100 mb-10">
                    <p class="text-6xl font-black text-blue-600"><?= round($score) ?></p>
                    <p class="text-slate-400 font-bold tracking-widest uppercase text-xs mt-2">Skor Anda</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <?php if ($score >= 70): ?>
                        <a href="certificate.php?id=<?= $course_id ?>" class="bg-green-600 hover:bg-green-700 text-white px-10 py-4 rounded-2xl font-bold shadow-lg shadow-green-100 transition-all transform hover:-translate-y-1">
                            🎓 Ambil Sertifikat
                        </a>
                        <a href="dashboard.php" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-10 py-4 rounded-2xl font-bold transition-all">
                            Kembali ke Dashboard
                        </a>
                    <?php else: ?>
                        <a href="quiz.php?id=<?= $course_id ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 rounded-2xl font-bold shadow-lg shadow-blue-100 transition-all transform hover:-translate-y-1">
                            🔄 Ulangi Ujian
                        </a>
                        <a href="learning.php?id=<?= $course_id ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-10 py-4 rounded-2xl font-bold transition-all">
                            Baca Materi Lagi
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php include 'components/footer.php'; ?>