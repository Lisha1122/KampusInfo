<script setup>
import Footer from '@/Components/Footer.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

// 1. Tangkap ID secara dinamis dari backend Laravel / Router Inertia
const props = defineProps({
    id: String
});

// State untuk melacak apakah ID berhasil ditangkap di console browser
onMounted(() => {
    console.log("Membuka artikel dengan ID:", props.id);
});

const isDropdownOpen = ref(false);

// State untuk input komentar baru oleh user
const newComment = ref('');

// Data Dummy Artikel Utama (Disesuaikan dengan struktur data di Berita.vue)
const article = ref({
    title: 'Tips Lolos Beasiswa Unggulan 2024: Panduan Lengkap dari Persiapan hingga Wawancara',
    category: 'Tips & Trik',
    date: '12 Mar 2026',
    author: 'Dr. Andi Wijaya',
    image: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80&w=1200',
    content: `
        <p class="mb-4">Beasiswa Unggulan merupakan salah satu program bantuan biaya pendidikan yang paling dinanti oleh mahasiswa di Indonesia. Dengan persaingan yang semakin ketat setiap tahunnya, strategi yang matang menjadi kunci utama untuk meraih kesuksesan.</p>
        
        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">1. Persiapan Dokumen Administrasi</h3>
        <p class="mb-4">Langkah pertama yang paling krusial adalah memastikan seluruh dokumen Anda lengkap dan valid. Banyak kandidat gugur hanya karena kesalahan kecil pada administrasi.</p>
        <ul class="list-disc pl-5 mb-4 space-y-1">
            <li>Kartu Tanda Penduduk (KTP) yang aktif.</li>
            <li>Surat Penerimaan (LoA) Unconditional dari perguruan tinggi.</li>
            <li>Ijazah dan transkrip nilai terakhir dengan IPK minimal 3.25.</li>
            <li>Sertifikat kemampuan bahasa Inggris (IELTS/TOEFL) yang masih berlaku.</li>
        </ul>

        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">2. Menulis Essay yang Berdampak</h3>
        <p class="mb-4">Essay adalah jendela bagi pemberi beasiswa untuk melihat visi dan misi Anda. Tulislah essay yang tidak hanya menceritakan prestasi, tetapi juga bagaimana kontribusi Anda bagi Indonesia di masa depan.</p>
        <p class="mb-4">Fokuskan pada narasi "Aku, Peranku, dan Indonesia". Jelaskan secara spesifik masalah apa yang ingin Anda selesaikan melalui bidang studi yang dipilih.</p>

        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">3. Menghadapi Tahap Wawancara</h3>
        <p class="mb-4">Jika Anda lolos tahap administrasi, tantangan berikutnya adalah wawancara. Di sini, integritas dan kepercayaan diri Anda diuji secara langsung oleh para ahli.</p>
        
        <div class="bg-blue-50 border-l-4 border-blue-600 p-4 rounded-r-xl my-6">
            <p class="text-sm font-semibold text-blue-900 italic">"Kunci dari wawancara bukan hanya menjawab dengan benar, tapi menjawab dengan kejujuran yang didasari data dan rencana yang konkret." – Tim Seleksi Beasiswa</p>
        </div>
    `
});

// Data Dummy Komentar Awal
const comments = ref([
    {
        id: 1,
        name: 'Budi Santoso',
        initials: 'BS',
        date: '1 jam yang lalu',
        text: 'Tips menulis essay-nya sangat membantu kak! Kebetulan saya sedang menyusun draf untuk pendaftaran tahun ini.'
    },
    {
        id: 2,
        name: 'Siti Rahma',
        initials: 'SR',
        date: '3 jam yang lalu',
        text: 'Apakah LoA wajib diunggah saat pendaftaran pertama atau bisa menyusul ya?'
    }
]);

// Fungsi interaktif untuk mengirimkan komentar baru ke list atas
const submitComment = () => {
    if (!newComment.value.trim()) return;
    
    comments.value.unshift({
        id: Date.now(),
        name: 'Lisha Khaerunniswah',
        initials: 'LK',
        date: 'Baru saja',
        text: newComment.value
    });
    
    newComment.value = ''; // Kosongkan form kembali
};

// Fungsi pembantu menutup menu dropdown profil jika klik di luar area
const closeDropdowns = (e) => {
    if (!e.target.closest('#account-dropdown-wrapper')) isDropdownOpen.value = false;
};

// Data Dummy Artikel Terkait / Rekomendasi di bagian bawah
const relatedArticles = ref([
    {
        id: 1,
        title: 'Mahasiswa Teknik Raih Juara 1 Robotika Asia Pasifik',
        category: 'Prestasi',
        date: '12 Mar 2026',
        image: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=400'
    },
    {
        id: 4,
        title: 'Tips & Trik Lolos Pendanaan PKM Tahun Ini',
        category: 'Tips & Trik',
        date: '05 Mar 2026',
        image: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80&w=400'
    },
    {
        id: 3,
        title: 'Menyelami Etika AI dalam Riset Akademik',
        category: 'Opini',
        date: '08 Mar 2026',
        image: 'https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?auto=format&fit=crop&q=80&w=400'
    }
]);
</script>

<template>
    <Head :title="article ? `${article.title} - KampusInfo` : 'Detail Informasi'" />

    <div class="min-h-screen bg-gray-50 flex flex-col font-sans text-gray-900" @click="closeDropdowns">
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center gap-8">
                        <span class="text-xl font-black text-blue-900 tracking-tight">KampusInfo</span>
                        <div class="hidden md:flex items-center gap-6 font-bold text-sm text-gray-500">
                            <Link :href="route('dashboard')" class="hover:text-blue-700 transition">Utama</Link>
                            <Link :href="route('berita')" class="text-blue-700 transition">Berita</Link>
                            <Link :href="route('tersimpan')" class="hover:text-blue-700 transition">Tersimpan</Link>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Link :href="route('notification')" class="p-2 text-gray-400 hover:text-blue-700 transition relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </Link>
                        
                        <div id="account-dropdown-wrapper" class="relative">
                            <button @click="isDropdownOpen = !isDropdownOpen" class="h-9 w-9 rounded-full bg-blue-100 border-2 border-blue-200 flex items-center justify-center text-blue-700 font-bold hover:bg-blue-200 transition focus:outline-none select-none">
                                LK
                            </button>
                            <div v-if="isDropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-xl border border-gray-200 shadow-xl py-1 z-50">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Pengguna</p>
                                    <p class="text-sm font-bold text-gray-700 truncate">Lisha Khaerunniswah</p>
                                </div>
                                <Link :href="route('profile.edit')" class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 font-semibold transition-colors">Profil Saya</Link>
                                <div class="border-t border-gray-100 my-1"></div>
                                <Link :href="route('logout')" method="post" as="button" class="w-full text-left block px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-bold transition focus:outline-none">
                                    Keluar Sistem
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow w-full space-y-8">
            
            <Link :href="route('berita')" class="inline-flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-blue-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                Kembali ke Berita
            </Link>

            <div v-if="article" class="space-y-8">
                <article class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden p-6 sm:p-8 space-y-6">
                    <div class="space-y-3">
                        <span class="px-2 py-0.5 bg-blue-50 text-blue-800 text-[10px] font-black uppercase tracking-wider rounded">
                            {{ article.category }}
                        </span>
                        <h1 class="text-xl sm:text-2xl font-black text-gray-900 leading-snug">
                            {{ article.title }}
                        </h1>
                        <div class="flex items-center gap-3 text-xs font-semibold text-gray-400 pt-1">
                            <span class="text-gray-700 font-bold">{{ article.author }}</span>
                            <span>•</span>
                            <span>{{ article.date }}</span>
                        </div>
                    </div>

                    <div class="aspect-video w-full bg-gray-100 rounded-xl overflow-hidden shadow-inner">
                        <img :src="article.image" :alt="article.title" class="w-full h-full object-cover">
                    </div>

                    <div class="text-gray-700 text-xs sm:text-sm leading-relaxed space-y-4" v-html="article.content"></div>
                </article>

                <section class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
                    <h3 class="text-sm font-black text-gray-900 uppercase tracking-wider border-b border-gray-100 pb-3">
                        Komentar ({{ comments.length }})
                    </h3>

                    <div class="flex gap-3 items-start">
                        <div class="h-8 w-8 rounded-full bg-blue-100 border border-blue-200 flex items-center justify-center text-blue-700 font-bold text-xs flex-shrink-0">
                            LK
                        </div>
                        <div class="flex-grow space-y-3">
                            <textarea 
                                v-model="newComment"
                                rows="3" 
                                placeholder="Tulis opini atau pertanyaan Anda mengenai artikel ini..."
                                class="w-full border border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 rounded-xl text-xs p-3 transition resize-none placeholder-gray-400"
                            ></textarea>
                            <div class="flex justify-end">
                                <button 
                                    @click="submitComment"
                                    class="bg-blue-800 hover:bg-blue-900 text-white font-bold text-xs px-4 py-2 rounded-xl transition shadow-sm"
                                >
                                    Kirim Komentar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 pt-2">
                        <div v-for="comment in comments" :key="comment.id" class="flex gap-3 items-start p-3 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="h-8 w-8 rounded-full bg-gray-200 border border-gray-300 flex items-center justify-center text-gray-600 font-bold text-xs flex-shrink-0">
                                {{ comment.initials }}
                            </div>
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-gray-800">{{ comment.name }}</span>
                                    <span class="text-[10px] text-gray-400">{{ comment.date }}</span>
                                </div>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    {{ comment.text }}
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div v-else class="bg-white rounded-2xl border border-gray-200 p-12 text-center text-gray-500 space-y-2">
                <p class="font-bold text-sm">Memuat data artikel informasi...</p>
                <p class="text-xs text-gray-400">Pastikan parameter ID {{ props.id }} dikirim dengan benar dari controller.</p>
            </div>

            <section class="space-y-4">
                <h3 class="text-sm font-black text-gray-900 uppercase tracking-wider">
                    Artikel Terkait & Rekomendasi
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <Link 
                        v-for="item in relatedArticles" 
                        :key="item.id"
                        :href="route('berita.detail', item.id)"
                        class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition group cursor-pointer"
                    >
                        <div class="h-32 bg-gray-100 overflow-hidden relative">
                            <img :src="item.image" :alt="item.title" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="p-4 flex-grow flex flex-col justify-between space-y-2">
                            <div class="space-y-1">
                                <span class="text-[9px] font-bold text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded uppercase">
                                    {{ item.category }}
                                </span>
                                <h4 class="font-bold text-gray-900 text-xs leading-snug line-clamp-2 group-hover:text-blue-700 transition-colors">
                                    {{ item.title }}
                                </h4>
                            </div>
                            <span class="text-[10px] font-medium text-gray-400 block pt-1">{{ item.date }}</span>
                        </div>
                    </Link>
                </div>
            </section>

        </main>
        
        <Footer />
    </div>
</template>

<style scoped>
/* Custom prose style untuk v-html agar rapi */
:deep(.prose) {
    color: #4B5563;
}
:deep(.prose h4) {
    color: #111827;
    margin-top: 1.25rem;
}
</style>