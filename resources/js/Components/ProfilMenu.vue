<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';

// State untuk mengontrol dropdown dan modal pop-up
const isDropdownOpen = ref(false);
const isModalOpen = ref(false);

// Fungsi untuk menutup dropdown saat klik di luar elemen pembungkus
const closeMenu = (e) => {
    if (!e.target.closest('#profil-menu-wrapper')) {
        isDropdownOpen.value = false;
    }
};

onMounted(() => {
    window.addEventListener('click', closeMenu);
});

onUnmounted(() => {
    window.removeEventListener('click', closeMenu);
});
</script>

<template>
    <div id="profil-menu-wrapper" class="relative inline-block text-left">
        <button 
            @click="isDropdownOpen = !isDropdownOpen"
            class="h-9 w-9 rounded-full bg-blue-100 border-2 border-blue-200 flex items-center justify-center text-blue-700 font-bold cursor-pointer hover:bg-blue-200 transition-colors focus:outline-none select-none"
        >
            LK
        </button>

        <div 
            v-if="isDropdownOpen"
            class="absolute right-0 mt-2 w-48 bg-white rounded-xl border border-gray-200 shadow-xl py-1 z-50 select-none"
        >
            <div class="px-4 py-2 border-b border-gray-100">
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Pengguna</p>
                <p class="text-sm font-bold text-gray-700 truncate">Lisha Khaerunniswah</p>
            </div>

            <button 
                @click="isModalOpen = true; isDropdownOpen = false"
                class="w-full text-left block px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 font-semibold transition-colors focus:outline-none"
            >
                Profil Saya
            </button>

            <div class="border-t border-gray-100 my-1"></div>

            <Link 
                :href="route('logout')" 
                method="post" 
                as="button" 
                class="w-full text-left flex items-center justify-between px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-bold transition-colors focus:outline-none"
            >
                <span>Keluar</span>
                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </Link>
        </div>

        <div v-if="isModalOpen" class="fixed inset-0 z-[100] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-gray-900/40 backdrop-blur-sm" @click="isModalOpen = false"></div>

            <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 w-full max-w-md p-6 relative z-10 transform transition-all animate-fade-in-up">
                <div class="flex justify-between items-center pb-4 border-b border-gray-100 mb-5">
                    <h3 class="text-base font-black text-gray-900 flex items-center gap-2">
                        <span class="w-1 h-5 bg-blue-600 rounded-full"></span>
                        Profil Pengguna
                    </h3>
                    <button @click="isModalOpen = false" class="text-gray-400 hover:text-gray-600 transition p-1 rounded-lg hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 border-4 border-white shadow-md flex items-center justify-center text-white text-xl font-black shadow-blue-100">
                        LK
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-gray-900">Lisha Khaerunniswah</h4>
                        <p class="text-xs font-semibold text-blue-600 mt-0.5 bg-blue-50 px-3 py-1 rounded-full inline-block">
                            Teknologi Informasi
                        </p>
                    </div>
                </div>

                <div class="mt-6 space-y-3 bg-gray-50 p-4 rounded-xl border border-gray-100 text-xs">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 font-medium">Institusi</span>
                        <span class="text-gray-800 font-bold">Universitas Brawijaya</span>
                    </div>
                    <div class="flex justify-between items-center border-t border-gray-200/60 pt-2.5">
                        <span class="text-gray-400 font-medium">Peran Akun</span>
                        <span class="text-gray-800 font-bold">Mahasiswa Aktif</span>
                    </div>
                </div>

                <div class="mt-6">
                    <button 
                        @click="isModalOpen = false" 
                        class="w-full py-2.5 bg-gray-900 text-white font-bold rounded-xl text-center text-sm hover:bg-gray-800 transition shadow-lg shadow-gray-200"
                    >
                        Tutup Jendela
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: scale(0.95) translateY(10px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}
.animate-fade-in-up {
    animation: fadeInUp 0.2s ease-out forwards;
}
</style>