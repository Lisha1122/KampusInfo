<script setup>
import { ref } from 'vue';
import { Link, Head } from '@inertiajs/vue3';

defineProps({
    title: String
});

const isProfileDropdownOpen = ref(false);
</script>

<template>
    <Head :title="title ? title + ' - Admin KampusInfo' : 'Admin Dashboard'" />

    <div class="min-h-screen bg-gray-100 flex font-sans text-gray-900">
        <aside class="w-64 bg-slate-900 text-white flex flex-col fixed h-full z-40">
            <div class="h-16 flex items-center px-6 border-b border-slate-800">
                <span class="text-lg font-black tracking-wider text-blue-400">KAMPUSINFO <span class="text-xs bg-blue-500/20 text-blue-300 px-2 py-0.5 rounded ml-1 font-bold">ADMIN</span></span>
            </div>
            
            <nav class="flex-grow p-4 space-y-1.5 overflow-y-auto">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-3 mb-2">Utama</p>
                <Link :href="route('dashboard')" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                    Dashboard Ringkasan
                </Link>

                <div class="pt-4">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-3 mb-2">Manajemen Konten</p>
                    <Link href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        Kelola Berita
                    </Link>
                    <Link href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Kelola Beasiswa
                    </Link>
                </div>
            </nav>

            <div class="p-4 border-t border-slate-800 bg-slate-950/50 flex items-center gap-3">
                <div class="h-9 w-9 bg-blue-600 rounded-xl flex items-center justify-center font-bold text-sm text-white">ADM</div>
                <div class="flex-grow min-w-0">
                    <p class="text-xs font-bold text-slate-200 truncate">Admin Lisha</p>
                    <p class="text-[10px] text-slate-500 truncate">admin@kampusinfo.test</p>
                </div>
            </div>
        </aside>

        <div class="flex-grow pl-64 flex flex-col min-h-screen">
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-30">
                <div class="flex items-center gap-2">
                    <h2 class="text-sm font-bold text-gray-500">Selamat Datang Kembali, Admin 👋</h2>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <button @click="isProfileDropdownOpen = !isProfileDropdownOpen" class="flex items-center gap-2 text-sm font-bold text-gray-700 hover:text-blue-600 transition focus:outline-none select-none">
                            <span>Sistem</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div v-if="isProfileDropdownOpen" class="absolute right-0 mt-2 w-44 bg-white border border-gray-200 rounded-xl shadow-xl py-1 z-50">
                            <Link :href="route('logout')" method="post" as="button" class="w-full text-left block px-4 py-2.5 text-xs font-bold text-red-600 hover:bg-red-50 transition">
                                Keluar Sistem
                            </Link>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-8 flex-grow">
                <slot />
            </main>
        </div>
    </div>
</template>