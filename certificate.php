<?php
include 'config.php';
checkLogin();
$name = strtoupper($_SESSION['name']);
$course = "FULLSTACK WEB DEVELOPMENT";
?>
<div class="flex items-center justify-center min-h-screen bg-gray-200 p-4">
    <div id="printArea" class="bg-white w-[800px] h-[550px] p-12 border-[20px] border-blue-800 text-center relative shadow-2xl">
        <h1 class="text-5xl font-serif text-blue-900 mt-10">SERTIFIKAT</h1>
        <p class="text-xl mt-4">Diberikan Kepada:</p>
        <h2 class="text-4xl font-bold underline my-6"><?= $name ?></h2>
        <p class="text-lg">Telah menyelesaikan kelas:</p>
        <h3 class="text-2xl font-semibold text-indigo-700 italic"><?= $course ?></h3>
        <div class="mt-20 flex justify-between px-10">
            <div class="text-left">Tanggal: <?= date('d M Y') ?></div>
            <div class="text-right">CEO Noval Academy</div>
        </div>
    </div>
    <button onclick="window.print()" class="fixed bottom-10 right-10 bg-green-500 text-white px-6 py-3 rounded-full shadow-lg">Cetak PDF</button>
</div>