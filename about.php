<?php include 'config.php'; include 'components/header.php'; ?>

<div class="bg-slate-50 min-h-screen">
    <div class="bg-blue-600 py-16 text-white text-center">
        <h1 class="text-4xl font-extrabold mb-3">Tentang Noval Academy</h1>
        <p class="text-blue-100 max-w-xl mx-auto px-6">Mencetak generasi developer handal Indonesia dengan materi yang terstruktur dan gratis.</p>
    </div>

    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-white p-8 rounded-3xl shadow-sm">
                <h2 class="text-2xl font-bold mb-4 text-slate-800">Kenapa Noval Academy?</h2>
                <p class="text-slate-600 leading-relaxed mb-6">Website ini dibangun untuk memudahkan pemula belajar coding mulai dari nol. Semua materi di sini disusun secara sistematis, lengkap dengan logo resmi setiap bahasa pemrograman agar belajar jadi lebih menyenangkan.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-full text-sm font-bold">100% Gratis</span>
                    <span class="px-4 py-2 bg-green-50 text-green-600 rounded-full text-sm font-bold">Responsif (HP/PC)</span>
                    <span class="px-4 py-2 bg-purple-50 text-purple-600 rounded-full text-sm font-bold">Terstruktur</span>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border-l-4 border-blue-600">
                <h2 class="text-2xl font-bold mb-6 text-slate-800">Hubungi Saya</h2>
                <div class="space-y-4">
                    <a href="https://wa.me/628123456789" target="_blank" class="flex items-center p-4 hover:bg-slate-50 rounded-2xl transition border">
                        <span class="text-2xl mr-4">💬</span>
                        <div>
                            <p class="font-bold text-slate-800">WhatsApp</p>
                            <p class="text-sm text-slate-500">Tanya seputar materi coding</p>
                        </div>
                    </a>
                    <a href="https://instagram.com/novalpramudia" target="_blank" class="flex items-center p-4 hover:bg-slate-50 rounded-2xl transition border">
                        <span class="text-2xl mr-4">📸</span>
                        <div>
                            <p class="font-bold text-slate-800">Instagram</p>
                            <p class="text-sm text-slate-500">Follow untuk info terupdate</p>
                        </div>
                    </a>
                    <a href="https://github.com/novalpramudia" target="_blank" class="flex items-center p-4 hover:bg-slate-50 rounded-2xl transition border">
                        <span class="text-2xl mr-4">🐙</span>
                        <div>
                            <p class="font-bold text-slate-800">GitHub</p>
                            <p class="text-sm text-slate-500">Lihat project lainnya</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>