<?php
// Memulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noval Coding Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="index.php" class="text-2xl font-extrabold text-blue-600 tracking-tight">
                        NOVAL<span class="text-slate-800">ACADEMY</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Beranda</a>
                    <a href="courses.php" class="text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Kursus</a>
                    <a href="about.php" class="text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Tentang</a>
                    <a href="contact.php" class="text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Kontak</a>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="dashboard.php" class="text-sm font-bold text-slate-800 hover:text-blue-600 transition">Dashboard</a>
                        <a href="auth/logout.php" class="bg-red-50 text-red-600 px-5 py-2 rounded-xl text-sm font-bold hover:bg-red-100 transition">Keluar</a>
                    <?php else: ?>
                        <a href="auth/login.php" class="text-sm font-bold text-gray-600 hover:text-blue-600 transition">Masuk</a>
                        <a href="auth/register.php" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 transition">Daftar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>