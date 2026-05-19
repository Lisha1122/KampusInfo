<script setup>
import Footer from '@/Components/Footer.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed, onMounted, onUnmounted } from 'vue';

// 1. IMPORT PROFILMENU DI SINI
import ProfilMenu from '@/Components/ProfilMenu.vue';

const selectedCategory = ref('Semua');
const searchQuery = ref('');

const categories = ['Semua', 'Beasiswa', 'Acara', 'Magang', 'Lomba', 'Akademik'];
const bookmarkedItems = ref([]);

const toggleBookmark = (id) => {
    if (bookmarkedItems.value.includes(id)) {
        bookmarkedItems.value = bookmarkedItems.value.filter(itemId => itemId !== id);
    } else {
        bookmarkedItems.value.push(id);
    }
};

// Data Opportunities dengan ID masing-masing
const opportunities = ref([
    {
        id: 1,
        category: 'Beasiswa',
        title: 'Beasiswa Prestasi Unggulan 2026',
        desc: 'Kesempatan bagi mahasiswa semester 3 ke atas untuk mendapatkan bantuan biaya pendidikan penuh.',
        image: 'https://picsum.photos/id/1060/400/250',
        color: 'text-green-600 bg-green-100',
        deadlineDate: '2 Hari Lagi',
        borderColor: 'border-red-500'
    },
    {
        id: 2,
        category: 'Magang',
        title: 'Program Magang Tech Giant Indonesia',
        desc: 'Bergabunglah dalam proyek inovatif berskala nasional. Terbuka untuk prodi Sistem Informasi & TI.',
        image: 'https://picsum.photos/id/1071/400/250',
        color: 'text-blue-600 bg-blue-100',
        deadlineDate: '5 Hari Lagi',
        borderColor: 'border-orange-500'
    },
    {
        id: 3,
        category: 'Event',
        title: 'Seminar Nasional: AI for Education',
        desc: 'Menghadirkan pakar teknologi internasional untuk membahas masa depan pendidikan berbasis AI.',
        image: 'https://picsum.photos/id/42/400/250',
        color: 'text-orange-600 bg-orange-100',
        deadlineDate: '6 Hari Lagi',
        borderColor: 'border-orange-500'
    },
    {
        id: 4,
        category: 'Lomba',
        title: 'Ganesha Web Development Competition 2026',
        desc: 'Tunjukkan keahlian coding tim-mu dalam membangun solusi web inovatif tingkat nasional.',
        image: 'https://picsum.photos/id/180/400/250',
        color: 'text-purple-600 bg-purple-100',
        deadlineDate: '10 Hari Lagi',
        borderColor: 'border-green-500'
    }
]);

const filteredOpportunities = computed(() => {
    return opportunities.value.filter(item => {
        const matchesCategory = selectedCategory.value === 'Semua' || item.category === selectedCategory.value;
        const matchesSearch = item.title.toLowerCase().includes(searchQuery.value.toLowerCase()) || 
                            item.desc.toLowerCase().includes(searchQuery.value.toLowerCase());
        return matchesCategory && matchesSearch;
    });
});
</script>

<template>
    <Head title="Beranda - KampusInfo" />

    <div class="min-h-screen bg-gray-50 flex flex-col font-sans text-gray-900">
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center gap-8">
                        <div class="flex items-center gap-2">
                            <span class="text-xl font-black text-blue-900 tracking-tight">KampusInfo</span>
                        </div>
                        <div class="hidden md:flex items-center gap-6 font-bold text-sm">
                            <Link :href="route('dashboard')" :class="[route().current('dashboard') ? 'text-blue-700 border-b-2 border-blue-700 pb-5 mt-5' : 'text-gray-500 hover:text-blue-700 transition']">Utama</Link>
                            <Link :href="route('berita')" :class="[route().current('berita') ? 'text-blue-700 border-b-2 border-blue-700 pb-5 mt-5' : 'text-gray-500 hover:text-blue-700 transition']">Berita</Link>
                            <Link :href="route('tersimpan')" :class="[route().current('tersimpan') ? 'text-blue-700 border-b-2 border-blue-700 pb-5 mt-5' : 'text-gray-500 hover:text-blue-700 transition']">Tersimpan</Link>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <Link :href="route('notification')" class="p-2 text-gray-400 hover:text-blue-600 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </Link>
                        
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col items-end mr-1 hidden sm:block select-none">
                                <p class="text-xs font-bold text-gray-900 leading-none mb-0.5">Lisha Khaerunniswah</p>
                                <p class="text-[10px] text-gray-400 font-medium">Teknologi Informasi</p>
                            </div>
                            
                            <ProfilMenu />
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="py-10 bg-white">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h1 class="text-3xl font-black text-gray-900 mb-2">Temukan Peluang Kampusmu Hari Ini</h1>
                <p class="text-gray-500 text-sm mb-8">Pusat informasi terpadu untuk beasiswa, acara, magang, lomba, dan berita akademik terkini.</p>
                
                <div class="relative max-w-xl mx-auto mb-8">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input 
                        v-model="searchQuery"
                        type="text" 
                        placeholder="Cari beasiswa, magang, kompetisi, atau lomba..." 
                        class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all"
                    >
                </div>

                <div class="flex flex-wrap justify-center gap-3">
                    <button 
                        v-for="cat in categories" 
                        :key="cat" 
                        @click="selectedCategory = cat"
                        :class="cat === selectedCategory ? 'bg-blue-800 text-white shadow-md' : 'bg-blue-50 text-blue-700 hover:bg-blue-100'" 
                        class="px-6 py-2 rounded-full text-sm font-bold transition-all"
                    >
                        {{ cat }}
                    </button>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col lg:flex-row gap-8 flex-grow">
            <div class="lg:w-3/4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-blue-700 rounded-full"></span>
                        Informasi Terbaru ({{ filteredOpportunities.length }})
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6" v-if="filteredOpportunities.length > 0">
                    <div v-for="item in filteredOpportunities" :key="item.id" class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col relative group">
                        
                        <button 
                            @click="toggleBookmark(item.id)" 
                            class="absolute top-3 right-3 z-10 p-2 rounded-full bg-white/80 backdrop-blur-sm shadow-sm text-gray-600 hover:text-blue-600 transition-colors focus:outline-none"
                        >
                            <svg 
                                class="w-4 h-4" 
                                :fill="bookmarkedItems.includes(item.id) ? 'currentColor' : 'none'" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                                :class="bookmarkedItems.includes(item.id) ? 'text-blue-600' : 'text-gray-600'"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                        </button>

                        <div class="h-44 overflow-hidden bg-gray-100">
                            <img :src="item.image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        
                        <div class="p-5 flex-grow flex flex-col">
                            <div>
                                <span :class="item.color" class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider mb-3 inline-block">
                                    {{ item.category }}
                                </span>
                                <h3 class="font-bold text-base leading-tight mb-2 text-gray-900">{{ item.title }}</h3>
                                <p class="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-6">{{ item.desc }}</p>
                            </div>
                            
                            <div class="mt-auto">
                                <Link :href="`/detail-informasi/${item.id}`" class="w-full py-2.5 bg-white border border-blue-200 text-blue-700 font-bold rounded-lg text-center block text-sm hover:bg-blue-700 hover:text-white transition-all">
                                    Lihat Detail
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="bg-white rounded-xl border border-gray-200 p-12 text-center shadow-sm">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-gray-500 font-bold text-base">Belum ada info</p>
                    <p class="text-gray-400 text-xs mt-1">Belum ada informasi pada kategori ini.</p>
                </div>

                <div v-if="filteredOpportunities.length > 0" class="mt-12 flex justify-center items-center gap-1 bg-white border border-gray-200 p-3 rounded-xl shadow-sm max-w-max mx-auto select-none">
                    <button disabled class="p-2 text-gray-300 cursor-not-allowed rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button class="px-3 py-1.5 rounded-lg text-sm font-bold bg-blue-700 text-white">1</button>
                    <button disabled class="px-3 py-1.5 rounded-lg text-sm font-bold text-gray-300 cursor-not-allowed">2</button>
                    <button disabled class="px-3 py-1.5 rounded-lg text-sm font-bold text-gray-300 cursor-not-allowed">3</button>
                    <span class="px-2 text-gray-300 font-bold text-sm">...</span>
                    <button disabled class="px-3 py-1.5 rounded-lg text-sm font-bold text-gray-300 cursor-not-allowed">12</button>
                    <button disabled class="p-2 text-gray-300 cursor-not-allowed rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>

            <aside class="lg:w-1/4 space-y-6">
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                    <h3 class="font-bold text-sm mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"></path></svg>
                        Mendekati Deadline
                    </h3>
                    
                    <div class="space-y-4">
                        <Link 
                            v-for="dl in opportunities" 
                            :key="dl.id" 
                            :href="`/detail-informasi/${dl.id}`"
                            class="flex items-center justify-between border-l-4 p-2 pl-3 hover:bg-gray-50 rounded-r-md transition border-solid group"
                            :class="dl.borderColor"
                        >
                            <div class="pr-2">
                                <h4 class="text-xs font-bold text-gray-800 line-clamp-1 group-hover:text-blue-700 transition-colors">{{ dl.title }}</h4>
                                <p class="text-[10px] font-black text-red-600 uppercase mt-0.5">{{ dl.deadlineDate }}</p>
                            </div>
                            <svg class="w-3 h-3 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-0.5 transition flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3"></path></svg>
                        </Link>
                    </div>
                    
                    <div class="w-full mt-5 text-[11px] font-semibold text-gray-400 text-center select-none">
                        All deadlines have been displayed
                    </div>
                </div>

                <div class="bg-blue-600 rounded-xl p-5 text-white shadow-lg shadow-blue-100 relative overflow-hidden">
                    <div class="relative z-10">
                        <h4 class="font-bold text-sm mb-2">Tips Cepat</h4>
                        <p class="text-[11px] leading-relaxed italic opacity-90 font-medium">"Pastikan dokumen scan KTP dan KTM mu selalu siap dalam format PDF untuk pendaftaran cepat."</p>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-blue-500 rounded-full opacity-20"></div>
                </div>
            </aside>
        </main>

        <Footer />
    </div>
</template>