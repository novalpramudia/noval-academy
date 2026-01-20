<?php include 'config.php'; include 'components/header.php'; ?>

<div class="bg-slate-50 min-h-screen py-20">
    <div class="container mx-auto px-6 max-w-4xl text-center">
        <h1 class="text-4xl font-bold text-slate-900 mb-4">Hubungi Kami</h1>
        <p class="text-slate-500 mb-12">Punya pertanyaan atau ingin kolaborasi? Hubungi kami melalui kanal di bawah ini.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a href="https://wa.me/628123456789" target="_blank" class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition duration-300">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-16 h-16 mx-auto mb-6" alt="WA">
                <h3 class="text-xl font-bold mb-2">WhatsApp</h3>
                <p class="text-gray-500 text-sm">Konsultasi cepat via Chat.</p>
            </a>

            <a href="https://instagram.com/noval_username" target="_blank" class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition duration-300">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg" class="w-16 h-16 mx-auto mb-6" alt="IG">
                <h3 class="text-xl font-bold mb-2">Instagram</h3>
                <p class="text-gray-500 text-sm">Update harian & tips coding.</p>
            </a>

            <a href="https://github.com/noval_github" target="_blank" class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition duration-300">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" class="w-16 h-16 mx-auto mb-6" alt="GitHub">
                <h3 class="text-xl font-bold mb-2">GitHub</h3>
                <p class="text-gray-500 text-sm">Lihat source code project.</p>
            </a>
        </div>

        <div class="mt-20 bg-white p-10 rounded-3xl shadow-lg text-left">
            <h2 class="text-2xl font-bold mb-6">Kirim Pesan Langsung</h2>
            <form action="#" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Nama Lengkap" class="w-full p-4 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-blue-500">
                    <input type="email" placeholder="Email" class="w-full p-4 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-blue-500">
                </div>
                <textarea rows="4" placeholder="Apa yang ingin kamu tanyakan?" class="w-full p-4 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-blue-500"></textarea>
                <button class="bg-blue-600 text-white font-bold py-4 px-8 rounded-xl hover:bg-blue-700 transition">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>