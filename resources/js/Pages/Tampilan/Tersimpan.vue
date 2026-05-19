<script setup>
import Footer from '@/Components/Footer.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// State untuk navigasi dropdown akun
const isDropdownOpen = ref(false);

// State untuk filter aktif (disesuaikan dengan kategori dashboard utama/bookmark)
const activeCategory = ref('Semua');

// Daftar Kategori Filter (Sesuai gambar: Semua, Beasiswa, Seminar, ditambah Lomba)
const categories = ['Semua', 'Beasiswa', 'Seminar', 'Lomba'];

// Data Dummy Koleksi Tersimpan (Sesuai dengan gambar mockup yang kamu berikan)
const savedItems = ref([
    {
        id: 1, // Diarahkan ke ID detail-informasi
        title: 'Beasiswa Prestasi Unggulan Bank Indonesia 2024',
        category: 'Beasiswa',
        deadline: '15 Oktober 2024',
        image: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80&w=400',
        isBookmarked: true
    },
    {
        id: 6,
        title: 'International Conference on AI & Machine Learning',
        category: 'Seminar',
        deadline: '20 September 2024',
        image: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=400',
        isBookmarked: true
    },
    {
        id: 7,
        title: 'National Startup Pitching Competition 2024',
        category: 'Lomba',
        deadline: '05 Oktober 2024',
        image: 'https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?auto=format&fit=crop&q=80&w=400',
        isBookmarked: true
    }
]);

// Fungsi helper menutup dropdown akun jika klik di luar area wrapper
const closeDropdowns = (e) => {
    if (!e.target.closest('#account-dropdown-wrapper')) isDropdownOpen.value = false;
};

// Fungsi interaktif menghapus item dari list bookmark secara realtime jika tombol bookmark diklik
const toggleBookmark = (id) => {
    savedItems.value = savedItems.value.filter(item => item.id !== id);
};
</script>

<template>
    <Head title="Koleksi Tersimpan - KampusInfo" />

    <div class="min-h-screen bg-gray-50 flex flex-col font-sans text-gray-900" @click="closeDropdowns">
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center gap-8">
                        <span class="text-xl font-black text-blue-900 tracking-tight">KampusInfo</span>
                        <div class="hidden md:flex items-center gap-6 font-bold text-sm text-gray-500">
                            <Link href="/dashboard" class="hover:text-blue-700 transition">Utama</Link>
                            <Link href="/berita" class="hover:text-blue-700 transition">Berita</Link>
                            <Link href="/profil" class="text-blue-700 transition">Tersimpan</Link>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <Link href="/notifikasi" class="p-2 text-gray-400 hover:text-blue-700 transition relative">
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
                                <Link href="/profil" class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 font-semibold transition-colors">Profil Saya</Link>
                                <div class="border-t border-gray-100 my-1"></div>
                                <Link href="/logout" method="post" as="button" class="w-full text-left block px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-bold transition focus:outline-none">
                                    Keluar Sistem
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow w-full space-y-6">
            
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 pb-4 gap-4">
                <div class="flex items-center gap-2 text-gray-900">
                    <svg class="w-5 h-5 text-blue-800" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                    </svg>
                    <h2 class="text-lg font-black tracking-tight">Koleksi Tersimpan</h2>
                </div>

                <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar">
                    <button 
                        v-for="cat in categories" 
                        :key="cat"
                        @click="activeCategory = cat"
                        :class="[
                            'px-4 py-1.5 text-xs font-bold rounded-full transition whitespace-nowrap focus:outline-none',
                            activeCategory === cat 
                                ? 'bg-blue-100 text-blue-900 shadow-sm' 
                                : 'bg-gray-200/60 text-gray-600 hover:bg-gray-200'
                        ]"
                    >
                        {{ cat }}
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <template v-for="item in savedItems" :key="item.id">
                    <div 
                        v-if="activeCategory === 'Semua' || item.category === activeCategory"
                        class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden p-4 space-y-4 flex flex-col justify-between hover:shadow-md transition relative group"
                    >
                        <div class="space-y-4">
                            <div class="h-44 bg-gray-100 rounded-xl overflow-hidden relative shadow-inner">
                                <img :src="item.image" :alt="item.title" class="w-full h-full object-cover">
                                
                                <span :class="[
                                    'absolute top-3 left-3 px-2 py-0.5 text-[9px] font-black uppercase tracking-wider rounded-md shadow-sm',
                                    item.category === 'Beasiswa' ? 'bg-green-50 text-green-700' :
                                    item.category === 'Seminar' ? 'bg-purple-50 text-purple-700' : 'bg-orange-50 text-orange-700'
                                ]">
                                    {{ item.category }}
                                </span>

                                <button 
                                    @click="toggleBookmark(item.id)" 
                                    class="absolute top-3 right-3 h-8 w-8 bg-white/90 backdrop-blur rounded-full flex items-center justify-center text-blue-800 border border-gray-100 hover:bg-white transition shadow"
                                    title="Hapus dari koleksi"
                                >
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="space-y-2 px-1">
                                <h3 class="font-black text-gray-900 text-sm sm:text-base leading-snug line-clamp-2 group-hover:text-blue-800 transition-colors">
                                    {{ item.title }}
                                </h3>
                                <div class="flex items-center gap-1.5 text-xs text-gray-400 font-semibold">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Deadline: {{ item.deadline }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2 px-1">
                            <Link 
                                :href="'/detail-informasi/' + item.id"
                                class="w-full bg-white hover:bg-blue-50 border-2 border-blue-800 text-blue-800 font-bold text-xs py-2.5 rounded-xl block text-center transition shadow-sm"
                            >
                                Lihat Detail
                            </Link>
                        </div>
                    </div>
                </template>

                <div class="bg-blue-50/50 rounded-2xl border-2 border-dashed border-blue-200 p-6 flex flex-col items-center justify-center text-center space-y-4">
                    <div class="h-10 w-10 bg-white rounded-full flex items-center justify-center text-blue-800 shadow-sm border border-blue-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </div>
                    <div class="space-y-1 max-w-xs">
                        <h4 class="text-xs font-black text-gray-900">Temukan Informasi Menarik Lainnya</h4>
                        <p class="text-[11px] text-gray-400 font-medium leading-relaxed">Jelajahi berbagai program beasiswa baru dan kegiatan kemahasiswaan terkini.</p>
                    </div>
                    <Link 
                        href="/berita" 
                        class="bg-blue-800 hover:bg-blue-900 text-white font-bold text-xs px-6 py-2.5 rounded-xl transition shadow"
                    >
                        Explore Sekarang
                    </Link>
                </div>
            </div>
        </main>
        <Footer />
    </div>
</template>

<style scoped>
/* Menghilangkan bar scroll default browser pada slider kategori mobile */
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>