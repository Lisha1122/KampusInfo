<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    nim: '',
    email: '',
    password: '',
    password_confirmation: '', // Menambahkan field konfirmasi password agar sesuai validasi backend
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <Head title="Buat Akun Baru" />

    <div class="flex min-h-screen bg-white">
        <!-- Panel Kiri (Visual) -->
        <div 
            class="hidden lg:flex lg:w-1/2 relative items-center px-12 bg-cover bg-center"
            style="background-image: url('/build/assets/LoginPage.jpg');"
        >
            <div class="absolute inset-0 bg-blue-950/20 transition-opacity"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/95 via-blue-900/50 to-blue-900/10"></div>
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
            
            <div class="relative z-10 text-white">
                <div class="flex items-center gap-3 mb-10">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bb/Logo_Universitas_Brawijaya.svg" alt="Logo UB" class="h-12 w-12 bg-white p-1 rounded shadow-2xl">
                    <span class="font-bold text-xl tracking-wider drop-shadow-lg uppercase">FILKOM UB</span>
                </div>
                
                <h1 class="text-5xl font-black leading-tight mb-6 drop-shadow-2xl">
                    Bergabung dengan <br> <span class="text-blue-300">KampusInfo</span>
                </h1>
                
                <p class="text-lg text-blue-50 max-w-md leading-relaxed mb-24 drop-shadow-lg font-medium">
                    Gerbang digital untuk seluruh informasi akademis dan kemahasiswaan terpadu di Fakultas Ilmu Komputer.
                </p>

                <div class="flex items-center gap-2 text-sm text-blue-100/90 font-bold italic">
                    <svg class="w-5 h-5 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Sistem Terverifikasi Universitas Brawijaya
                </div>
            </div>
        </div>

        <!-- Panel Kanan (Form) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 py-12 text-gray-900 bg-gray-50/30">
            <div class="w-full max-w-md bg-white p-8 lg:p-0 rounded-2xl lg:rounded-none shadow-xl lg:shadow-none">
                <h2 class="text-3xl font-extrabold mb-2 tracking-tight text-blue-950">Buat Akun Baru</h2>
                <p class="text-gray-500 mb-8 font-medium">Lengkapi data diri mahasiswa Anda untuk memulai perjalanan akademik Anda.</p>

                <form @submit.prevent="submit" class="space-y-5">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Nama Lengkap
                        </label>
                        <input v-model="form.name" type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 outline-none transition-all shadow-sm" placeholder="Contoh: Budi Darmawan">
                        <span v-if="form.errors.name" class="text-xs text-red-500 mt-1 block">{{ form.errors.name }}</span>
                    </div>

                    <!-- NIM -->
                    <div>
                        <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                            NIM (Nomor Induk Mahasiswa)
                        </label>
                        <input v-model="form.nim" type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 outline-none transition-all shadow-sm" placeholder="Contoh: 21515020...">
                        <span v-if="form.errors.nim" class="text-xs text-red-500 mt-1 block">{{ form.errors.nim }}</span>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Email UB
                        </label>
                        <input v-model="form.email" type="email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 outline-none transition-all shadow-sm" placeholder="nama@student.ub.ac.id">
                        <span v-if="form.errors.email" class="text-xs text-red-500 mt-1 block">{{ form.errors.email }}</span>
                    </div>

                    <!-- Kata Sandi -->
                    <div>
                        <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Kata Sandi
                        </label>
                        <div class="relative group">
                            <input v-model="form.password" type="password" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 outline-none transition-all shadow-sm" placeholder="Min. 8 Karakter">
                        </div>
                        <span v-if="form.errors.password" class="text-xs text-red-500 mt-1 block">{{ form.errors.password }}</span>
                    </div>

                    <!-- Konfirmasi Kata Sandi -->
                    <div>
                        <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Konfirmasi Kata Sandi
                        </label>
                        <input v-model="form.password_confirmation" type="password" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 outline-none transition-all shadow-sm" placeholder="Ulangi Kata Sandi">
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" :disabled="form.processing" class="w-full bg-blue-700 text-white font-black py-4 rounded-xl hover:bg-blue-800 transition shadow-lg active:scale-[0.97] flex items-center justify-center gap-2 transform group mt-6 disabled:opacity-50 disabled:pointer-events-none">
                        <span>{{ form.processing ? 'Memproses...' : 'Daftar Akun' }}</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>

                    <p class="text-center text-sm mt-8 text-gray-600 font-medium">
                        Sudah punya akun? <Link :href="route('login')" class="text-blue-700 font-black hover:underline">Masuk di sini</Link>
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>