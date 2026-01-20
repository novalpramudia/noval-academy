<?php 
include 'config.php'; 
include 'components/header.php'; 

// Mengambil semua data kursus dari database
$query = mysqli_query($conn, "SELECT * FROM courses ORDER BY id DESC");
?>

<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Katalog Kursus</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pilih teknologi yang ingin kamu kuasai hari ini. Kurikulum kami disusun agar kamu siap kerja.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while($row = mysqli_fetch_assoc($query)): ?>
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <div class="bg-blue-100 h-48 flex items-center justify-center">
                        <span class="text-5xl font-bold text-blue-500"><?= substr($row['title'], 0, 1) ?></span>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-blue-100 text-blue-600 text-xs font-bold px-3 py-1 rounded-full uppercase">
                                <?= $row['category'] ?>
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?= $row['title'] ?></h3>
                        <p class="text-gray-600 text-sm mb-6 line-clamp-2">
                            <?= $row['description'] ?>
                        </p>
                        
                        <div class="flex items-center justify-between border-t pt-4">
                            <a href="course-detail.php?id=<?= $row['id'] ?>" class="text-blue-600 font-bold hover:text-blue-800 flex items-center">
                                Lihat Materi 
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <span class="text-gray-400 text-xs">Modul Gratis</span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>