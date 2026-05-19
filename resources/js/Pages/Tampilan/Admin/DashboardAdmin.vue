<script setup>
import AdminLayout from '@/Components/AdminLayout.vue';
import { ref } from 'vue';

// Data Mock Ringkasan Statistik
const stats = ref([
    { name: 'Total Berita', value: '24 Artikel', icon: 'news', color: 'bg-blue-50 text-blue-700 border-blue-100' },
    { name: 'Total Info Beasiswa', value: '12 Program', icon: 'scholarship', color: 'bg-emerald-50 text-emerald-700 border-emerald-100' },
    { name: 'Total Penanda Buku', value: '142 Kali', icon: 'bookmark', color: 'bg-amber-50 text-amber-700 border-amber-100' },
]);

// Data Log Aktivitas Konten Terbaru
const recentActivities = ref([
    { id: 1, title: 'Mahasiswa Teknik Raih Juara 1 Robotika', type: 'Berita', date: 'Hari ini, 10:24 WIB', status: 'Published' },
    { id: 2, title: 'Beasiswa Afirmasi Pendidikan 2026', type: 'Beasiswa', date: 'Kemarin, 14:15 WIB', status: 'Published' },
    { id: 3, title: 'Tips & Trik Lolos Pendanaan PKM', type: 'Berita', date: '15 Mar 2026', status: 'Draft' },
]);
</script>

<template>
    <AdminLayout title="Panel Dashboard Utama">
        <div class="space-y-6">
            <div>
                <h1 class="text-2xl font-black text-gray-900 tracking-tight">Ringkasan Sistem</h1>
                <p class="text-xs font-medium text-gray-500">Pantau statistik konten, berita, dan informasi beasiswa aktif disini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div v-for="stat in stats" :key="stat.name" :class="['p-6 bg-white border rounded-2xl shadow-sm flex items-center justify-between', stat.color]">
                    <div class="space-y-1">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ stat.name }}</p>
                        <p class="text-xl font-black text-gray-900">{{ stat.value }}</p>
                    </div>
                    <div class="p-3 bg-white border border-inherit rounded-xl shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-black text-gray-900 text-sm">Pembaruan Konten Terakhir</h3>
                    <button class="px-3 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg text-xs font-bold transition">Lihat Semua</button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100 text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                                <th class="px-6 py-3">Judul Konten</th>
                                <th class="px-6 py-3">Tipe</th>
                                <th class="px-6 py-3">Tanggal Diubah</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-xs font-semibold text-gray-700">
                            <tr v-for="activity in recentActivities" :key="activity.id" class="hover:bg-gray-50/70 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900 max-w-xs truncate">{{ activity.title }}</td>
                                <td class="px-6 py-4">
                                    <span :class="[activity.type === 'Berita' ? 'bg-blue-50 text-blue-700' : 'bg-emerald-50 text-emerald-700', 'px-2 py-0.5 rounded text-[10px] font-bold uppercase']">
                                        {{ activity.type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-400">{{ activity.date }}</td>
                                <td class="px-6 py-4">
                                    <span :class="[activity.status === 'Published' ? 'text-emerald-600' : 'text-amber-600', 'flex items-center gap-1.5 font-bold']">
                                        <span :class="[activity.status === 'Published' ? 'bg-emerald-500' : 'bg-amber-500', 'h-1.5 w-1.5 rounded-full']"></span>
                                        {{ activity.status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="px-2.5 py-1 text-gray-400 hover:text-blue-700 font-bold transition">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>