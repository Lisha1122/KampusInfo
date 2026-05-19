<script setup>
import Footer from '@/Components/Footer.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const isDropdownOpen = ref(false);
const isSortDropdownOpen = ref(false);

// State untuk Filter dan Sorting
const selectedCategory = ref('Terbaru');
const selectedSort = ref('Terbaru');

// Data Kategori
const categories = ['Terbaru', 'Tips & Trik', 'Kegiatan Mahasiswa', 'Prestasi', 'Opini'];

// Data Berita/Artikel Konten
const articles = ref([
    {
        id: 1,
        title: 'Mahasiswa Teknik Raih Juara 1 Robotika Asia Pasifik',
        desc: 'Tim robotika universitas berhasil mengalahkan perwakilan dari 20 negara dalam kompetisi tahunan yang diselenggarakan di Tokyo.',
        category: 'Prestasi',
        date: '12 Mar 2026',
        image: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=600', 
        timestamp: 20260312
    },
    {
        id: 2,
        title: 'Pengabdian Masyarakat: Digitalisasi Desa Wisata',
        desc: 'Mahasiswa KKN Batch IV meluncurkan platform digital untuk membantu UMKM desa mengelola pemasaran produk secara global.',
        category: 'Kegiatan Mahasiswa',
        date: '10 Mar 2026',
        image: 'https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?auto=format&fit=crop&q=80&w=600', 
        timestamp: 20260310
    },
    {
        id: 3,
        title: 'Menyelami Etika AI dalam Riset Akademik',
        desc: 'Sebuah esai mendalam mengenai penggunaan kecerdasan buatan untuk membantu penulisan jurnal tanpa mencederai integritas ilmiah.',
        category: 'Opini',
        date: '08 Mar 2026',
        image: 'https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?auto=format&fit=crop&q=80&w=600', 
        timestamp: 20260308
    },
    {
        id: 4,
        title: 'Tips & Trik Lolos Pendanaan PKM Tahun Ini',
        desc: 'Panduan menyusun proposal Program Kreativitas Mahasiswa dari review internal universitas agar langsung dilirik reviewer nasional.',
        category: 'Tips & Trik',
        date: '05 Mar 2026',
        image: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80&w=600',
        timestamp: 20260305
    }
]);

// Logika Filter & Sorting Real-time (Amankan mutasi dengan spread operator [...])
const filteredArticles = computed(() => {
    let result = articles.value;

    // Filter Kategori
    if (selectedCategory.value !== 'Terbaru') {
        result = result.filter(item => item.category === selectedCategory.value);
    }

    // Sorting Logika tanpa merusak array asli
    if (selectedSort.value === 'Terbaru') {
        return [...result].sort((a, b) => b.timestamp - a.timestamp);
    } else if (selectedSort.value === 'Terlama') {
        return [...result].sort((a, b) => a.timestamp - b.timestamp);
    }

    return result;
});

// State untuk halaman pagination aktif
const currentPage = ref(1);

const closeDropdowns = (e) => {
    if (!e.target.closest('#account-dropdown-wrapper')) isDropdownOpen.value = false;
    if (!e.target.closest('#sort-dropdown-wrapper')) isSortDropdownOpen.value = false;
};
</script>

<template>
    <Head title="Berita Kampus - KampusInfo" />

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
                                <Link href="#" class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 font-semibold transition-colors">Profil Saya</Link>
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

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow w-full space-y-6">
            
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex flex-wrap gap-2 items-center">
                    <button 
                        v-for="cat in categories" 
                        :key="cat"
                        @click="selectedCategory = cat"
                        :class="[
                            selectedCategory === cat 
                            ? 'bg-blue-800 text-white shadow-sm' 
                            : 'bg-blue-50 text-blue-800 hover:bg-blue-100',
                            'px-4 py-1.5 rounded-full text-xs font-bold transition-all duration-200'
                        ]"
                    >
                        {{ cat }}
                    </button>
                </div>

                <div id="sort-dropdown-wrapper" class="relative self-end sm:self-auto">
                    <button 
                        @click="isSortDropdownOpen = !isSortDropdownOpen"
                        class="px-4 py-2 bg-white border border-gray-200 hover:border-gray-300 rounded-xl text-xs font-semibold text-gray-700 flex items-center gap-2 shadow-sm transition-all"
                    >
                        <span>Urutkan: <strong class="text-gray-900 font-bold">{{ selectedSort }}</strong></span>
                        <svg class="w-3.5 h-3.5 text-gray-400 transition-transform" :class="{'rotate-180': isSortDropdownOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <div v-if="isSortDropdownOpen" class="absolute right-0 mt-1.5 w-40 bg-white rounded-xl border border-gray-200 shadow-lg py-1 z-40">
                        <button @click="selectedSort = 'Terbaru'; isSortDropdownOpen = false" class="w-full text-left px-4 py-2 text-xs font-semibold text-gray-600 hover:bg-gray-50 hover:text-blue-700 transition-colors">Terbaru</button>
                        <button @click="selectedSort = 'Terlama'; isSortDropdownOpen = false" class="w-full text-left px-4 py-2 text-xs font-semibold text-gray-600 hover:bg-gray-50 hover:text-blue-700 transition-colors">Terlama</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div 
                    v-for="article in filteredArticles" 
                    :key="article.id" 
                    class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow group"
                >
                    <div class="h-48 w-full bg-gray-100 overflow-hidden relative">
                        <img 
                            :src="article.image" 
                            :alt="article.title"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        >
                    </div>

                    <div class="p-5 flex flex-col flex-grow justify-between space-y-4">
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-[11px] font-bold text-gray-400">
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 uppercase tracking-wider rounded">
                                    {{ article.category }}
                                </span>
                                <span>{{ article.date }}</span>
                            </div>
                            <h3 class="font-black text-gray-900 text-base leading-snug group-hover:text-blue-700 transition-colors line-clamp-2">
                                {{ article.title }}
                            </h3>
                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-3">
                                {{ article.desc }}
                            </p>
                        </div>

                        <div class="pt-2 border-t border-gray-100 flex items-center justify-end text-xs font-bold">
                            <Link :href="'/berita/' + article.id" class="text-blue-700 hover:text-blue-900 flex items-center gap-1 group/btn transition-colors">
                                Baca Selengkapnya
                            </Link>
                        </div>
                    </div>
                </div>

                <div v-if="filteredArticles.length === 0" class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-gray-300">
                    <p class="text-gray-400 font-medium text-sm">Tidak ada berita dengan kategori "{{ selectedCategory }}" saat ini.</p>
                </div>
            </div>

            <div class="flex justify-center pt-8 pb-4">
                <div class="inline-flex items-center bg-white border border-gray-200 rounded-xl p-1.5 shadow-sm space-x-1 select-none text-xs font-bold text-gray-600">
                    <button class="p-2 text-gray-300 cursor-not-allowed" disabled>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    
                    <button class="bg-blue-700 text-white shadow-sm w-8 h-8 flex items-center justify-center rounded-lg transition">1</button>
                    
                    <button class="p-2 text-gray-300 cursor-not-allowed" disabled>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>
        </main>
        <Footer />
    </div>
</template>