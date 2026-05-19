<script setup>
import Footer from '@/Components/Footer.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const isDropdownOpen = ref(false);

const notifications = ref([
    {
        id: 1,
        timeGroup: 'HARI INI',
        title: 'Pendaftaran Beasiswa Prestasi Unggulan 2026 Dibuka',
        desc: 'Kesempatan bagi mahasiswa semester 3 ke atas untuk mendapatkan bantuan biaya pendidikan penuh. Segera lengkapi berkas Anda...',
        category: 'BEASISWA',
        color: 'text-green-600 bg-green-100',
        borderColor: 'border-l-4 border-green-500',
        time: '2 jam yang lalu',
        isUnread: true
    },
    {
        id: 2,
        timeGroup: 'HARI INI',
        title: 'Program Magang Tech Giant Indonesia Telah Diverifikasi',
        desc: 'Proyek inovatif berskala nasional terbuka untuk prodi Sistem Informasi & TI. Cek detail persyaratan sekarang...',
        category: 'MAGANG',
        color: 'text-blue-600 bg-blue-100',
        borderColor: 'border-l-4 border-blue-500',
        time: '5 jam yang lalu',
        isUnread: true
    },
    {
        id: 3,
        timeGroup: 'KEMARIN',
        title: 'Seminar Nasional: AI for Education',
        desc: 'Jangan lewatkan kesempatan berdiskusi dengan para ahli industri teknologi dalam seminar daring mengenai masa depan pendidikan...',
        category: 'EVENT',
        color: 'text-orange-600 bg-orange-100',
        borderColor: 'border-l-4 border-orange-500',
        time: 'Kemarin, 14:20',
        isUnread: false
    },
    {
        id: 4,
        timeGroup: 'MINGGU INI',
        title: 'Perubahan Jadwal UTS Ganjil Susulan',
        desc: 'Mohon perhatian bagi seluruh mahasiswa Teknik Informatika, terdapat pergeseran jadwal untuk mata kuliah Algoritma dan Pemrograman...',
        category: 'AKADEMIK',
        color: 'text-purple-600 bg-purple-100',
        borderColor: 'border-l-4 border-purple-500',
        time: 'Selasa, 09:15',
        isUnread: false
    }
]);

const popularCategories = ref([
    { name: '#Beasiswa2026', link: '#' },
    { name: '#InternshipTech', link: '#' },
    { name: '#EventKampus', link: '#' },
    { name: '#InfoAkademik', link: '#' }
]);

const closeDropdown = (e) => {
    if (!e.target.closest('#account-dropdown-wrapper')) {
        isDropdownOpen.value = false;
    }
};
</script>

<template>
    <Head title="Notifikasi - KampusInfo" />

    <div class="min-h-screen bg-gray-50 flex flex-col font-sans text-gray-900">
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center gap-8">
                        <div class="flex items-center gap-2">
                            <span class="text-xl font-black text-blue-900 tracking-tight">KampusInfo</span>
                        </div>
                        <div class="hidden md:flex items-center gap-6 font-bold text-sm text-gray-500">
                            <Link :href="route('dashboard')" class="hover:text-blue-700 transition">Utama</Link>
                            <Link href="#" class="hover:text-blue-700 transition">Berita</Link>
                            <Link href="#" class="hover:text-blue-700 transition">Tersimpan</Link>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="p-2 text-blue-600 hover:text-blue-800 transition relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <div id="account-dropdown-wrapper" class="relative">
                            <button 
                                @click="isDropdownOpen = !isDropdownOpen"
                                class="h-9 w-9 rounded-full bg-blue-100 border-2 border-blue-200 flex items-center justify-center text-blue-700 font-bold cursor-pointer hover:bg-blue-200 transition-colors focus:outline-none select-none"
                            >
                                LK
                            </button>

                            <div v-if="isDropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-xl border border-gray-200 shadow-xl py-1 z-50">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Pengguna</p>
                                    <p class="text-sm font-bold text-gray-700 truncate">Lisha Khaerunniswah</p>
                                </div>
                                <Link href="#" class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 font-semibold transition-colors">Profil Saya</Link>
                                <Link href="#" class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 font-semibold transition-colors">Aktivitas Saya</Link>
                                <div class="border-t border-gray-100 my-1"></div>
                                <Link :href="route('logout')" method="post" as="button" class="w-full text-left block px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-bold transition-colors focus:outline-none">
                                    Keluar Sistem
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex flex-col lg:flex-row gap-8 flex-grow w-full">
            <div class="lg:w-3/4 space-y-8">
                <div>
                    <h1 class="text-2xl font-black text-gray-900 mb-1">Pusat Notifikasi</h1>
                    <p class="text-gray-500 text-sm">Tetap terinformasi dengan update terbaru dari kampus Anda.</p>
                </div>

                <div class="space-y-6">
                    <div>
                        <h2 class="text-xs font-black text-gray-400 uppercase tracking-wider mb-3">Hari Ini</h2>
                        <div class="space-y-3">
                            <div 
                                v-for="notif in notifications.filter(n => n.timeGroup === 'HARI INI')" 
                                :key="notif.id"
                                :class="[notif.borderColor, 'bg-white rounded-xl border-y border-r border-gray-200 p-5 shadow-sm hover:shadow-md transition-all relative flex flex-col sm:flex-row sm:items-start justify-between gap-4 group']"
                            >
                                <div class="space-y-2 max-w-2xl">
                                    <div class="flex items-center gap-2">
                                        <span :class="[notif.color, 'px-2 py-0.5 rounded text-[9px] font-black tracking-wider uppercase']">
                                            {{ notif.category }}
                                        </span>
                                    </div>
                                    <h3 class="font-bold text-base text-gray-900 group-hover:text-blue-700 transition-colors leading-snug">
                                        {{ notif.title }}
                                    </h3>
                                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">
                                        {{ notif.desc }}
                                    </p>
                                </div>
                                <div class="flex items-center sm:flex-col sm:items-end justify-between flex-shrink-0 gap-2">
                                    <span class="text-[10px] font-semibold text-gray-400">{{ notif.time }}</span>
                                    <span v-if="notif.isUnread" class="w-2 h-2 bg-blue-600 rounded-full"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <h2 class="text-xs font-black text-gray-400 uppercase tracking-wider mb-3">Kemarin</h2>
                        <div class="space-y-3">
                            <div 
                                v-for="notif in notifications.filter(n => n.timeGroup === 'KEMARIN')" 
                                :key="notif.id"
                                :class="[notif.borderColor, 'bg-white rounded-xl border-y border-r border-gray-200 p-5 shadow-sm hover:shadow-md transition-all relative flex flex-col sm:flex-row sm:items-start justify-between gap-4 group']"
                            >
                                <div class="space-y-2 max-w-2xl">
                                    <div class="flex items-center gap-2">
                                        <span :class="[notif.color, 'px-2 py-0.5 rounded text-[9px] font-black tracking-wider uppercase']">
                                            {{ notif.category }}
                                        </span>
                                    </div>
                                    <h3 class="font-bold text-base text-gray-900 group-hover:text-blue-700 transition-colors leading-snug">
                                        {{ notif.title }}
                                    </h3>
                                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">
                                        {{ notif.desc }}
                                    </p>
                                </div>
                                <div class="flex items-center sm:flex-col sm:items-end justify-between flex-shrink-0 gap-2">
                                    <span class="text-[10px] font-semibold text-gray-400">{{ notif.time }}</span>
                                    <span v-if="notif.isUnread" class="w-2 h-2 bg-blue-600 rounded-full"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <h2 class="text-xs font-black text-gray-400 uppercase tracking-wider mb-3">Minggu Ini</h2>
                        <div class="space-y-3">
                            <div 
                                v-for="notif in notifications.filter(n => n.timeGroup === 'MINGGU INI')" 
                                :key="notif.id"
                                :class="[notif.borderColor, 'bg-white rounded-xl border-y border-r border-gray-200 p-5 shadow-sm hover:shadow-md transition-all relative flex flex-col sm:flex-row sm:items-start justify-between gap-4 group']"
                            >
                                <div class="space-y-2 max-w-2xl">
                                    <div class="flex items-center gap-2">
                                        <span :class="[notif.color, 'px-2 py-0.5 rounded text-[9px] font-black tracking-wider uppercase']">
                                            {{ notif.category }}
                                        </span>
                                    </div>
                                    <h3 class="font-bold text-base text-gray-900 group-hover:text-blue-700 transition-colors leading-snug">
                                        {{ notif.title }}
                                    </h3>
                                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">
                                        {{ notif.desc }}
                                    </p>
                                </div>
                                <div class="flex items-center sm:flex-col sm:items-end justify-between flex-shrink-0 gap-2">
                                    <span class="text-[10px] font-semibold text-gray-400">{{ notif.time }}</span>
                                    <span v-if="notif.isUnread" class="w-2 h-2 bg-blue-600 rounded-full"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/4">
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm sticky top-24">
                    <h3 class="font-bold text-sm mb-4 flex items-center gap-2 text-gray-900">
                        <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 20l4-16m2 16l4-16"></path></svg>
                        Kategori Populer
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <Link 
                            v-for="tag in popularCategories" 
                            :key="tag.name" 
                            :href="tag.link"
                            class="px-3 py-1.5 bg-gray-50 hover:bg-blue-50 text-gray-600 hover:text-blue-700 font-semibold rounded-lg text-xs transition-colors border border-gray-100"
                        >
                            {{ tag.name }}
                        </Link>
                    </div>
                </div>
            </div>
        </main>
        <Footer />
    </div>
</template>