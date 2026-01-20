<?php include 'config.php'; include 'components/header.php'; ?>

<div class="bg-white min-h-screen">
    <div class="bg-slate-900 py-20 text-white text-center">
        <h1 class="text-4xl font-extrabold mb-4">Tentang Noval Academy</h1>
        <p class="text-slate-400 max-w-2xl mx-auto px-6">Platform belajar coding gratis untuk membantu anak muda Indonesia menguasai teknologi masa depan.</p>
    </div>

    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="text-3xl font-bold text-slate-800">Kenapa Belajar di Sini?</h2>
                <p class="text-slate-600">Kami menyediakan kurikulum yang mudah dipahami oleh pemula, mulai dari nol hingga bisa membuat website sendiri.</p>
                <div class="flex gap-4">
                    <div class="bg-blue-100 p-4 rounded-2xl text-blue-600 font-bold">10+ Materi</div>
                    <div class="bg-green-100 p-4 rounded-2xl text-green-600 font-bold">Gratis</div>
                    <div class="bg-purple-100 p-4 rounded-2xl text-purple-600 font-bold">Sertifikat</div>
                </div>
            </div>
            
            <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
                <h3 class="text-xl font-bold mb-6 text-center">Hubungi Developer</h3>
                <div class="space-y-4">
                    <a href="https://wa.me/628123456789" class="flex items-center p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                        <span class="text-2xl mr-4">📱</span>
                        <div>
                            <p class="font-bold text-slate-800">WhatsApp</p>
                            <p class="text-sm text-slate-500">Chat untuk tanya-tanya</p>
                        </div>
                    </a>
                    <a href="https://instagram.com/noval_pramudia" class="flex items-center p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                        <span class="text-2xl mr-4">📸</span>
                        <div>
                            <p class="font-bold text-slate-800">Instagram</p>
                            <p class="text-sm text-slate-500">Follow untuk update terbaru</p>
                        </div>
                    </a>
                    <a href="https://github.com/novalpramudia" class="flex items-center p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                        <span class="text-2xl mr-4">💻</span>
                        <div>
                            <p class="font-bold text-slate-800">GitHub</p>
                            <p class="text-sm text-slate-500">Lihat koleksi project saya</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>