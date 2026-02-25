<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pesanan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                {{ __('Data Pesanan') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center">
                        <h3 class="text-sm font-bold text-gray-700 mb-4 uppercase tracking-wider">Persentase Status</h3>
                        <div class="w-48 h-48">
                            <canvas id="statusChart"></canvas>
                        </div>
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="bg-amber-50 p-6 rounded-2xl border border-amber-100 flex flex-col justify-center">
                            <span class="text-amber-600 text-sm font-bold uppercase">Pending</span>
                            <span class="text-3xl font-black text-amber-700">{{ $statusCounts['pending'] }}</span>
                            <span class="text-xs text-amber-600 mt-1 italic">Butuh Tindakan</span>
                        </div>
                        <div class="bg-emerald-50 p-6 rounded-2xl border border-emerald-100 flex flex-col justify-center">
                            <span class="text-emerald-600 text-sm font-bold uppercase">Selesai</span>
                            <span class="text-3xl font-black text-emerald-700">{{ $statusCounts['completed'] }}</span>
                            <span class="text-xs text-emerald-600 mt-1 italic">Transaksi Berhasil</span>
                        </div>
                        <div class="bg-red-50 p-6 rounded-2xl border border-red-100 flex flex-col justify-center">
                            <span class="text-red-600 text-sm font-bold uppercase">Dibatalkan</span>
                            <span class="text-3xl font-black text-red-700">{{ $statusCounts['cancelled'] }}</span>
                            <span class="text-xs text-red-600 mt-1 italic">Pesanan Gagal</span>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl shadow-sm flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-2xl">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-4 font-bold">Invoice & Tanggal</th>
                                    <th class="px-6 py-4 font-bold">Pelanggan</th>
                                    <th class="px-6 py-4 font-bold w-1/3">Detail Barang</th>
                                    <th class="px-6 py-4 font-bold text-right">Total</th>
                                    <th class="px-6 py-4 font-bold text-center">Status Pesanan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($orders as $order)
                                    <tr class="hover:bg-gray-50/30 transition-colors align-top">
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <span class="font-bold text-gray-900 block">{{ $order->invoice_number }}</span>
                                            <span class="text-[11px] text-gray-500 italic flex items-center gap-1 mt-1">
                                                <i class="fa-regular fa-clock"></i> {{ $order->created_at->format('d M Y, H:i') }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-5">
                                            <div class="flex items-center gap-2">
                                                <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-[10px] font-bold text-white uppercase">
                                                    {{ substr($order->user->name, 0, 2) }}
                                                </div>
                                                <div class="flex flex-col">
                                                    <span class="text-gray-900 font-semibold">{{ $order->user->name }}</span>
                                                    <span class="text-[10px] text-gray-500 lowercase">{{ $order->user->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5">
                                            <div class="space-y-3">
                                                @foreach($order->items as $item)
                                                <div class="flex items-start gap-3">
                                                    <img class="h-10 w-10 rounded-lg object-cover border border-gray-100 shadow-sm" 
                                                         src="{{ asset('images/' . $item->product->image) }}">
                                                    <div class="flex flex-col">
                                                        <span class="text-xs font-bold text-gray-800 leading-tight">{{ $item->product->nama_barang }}</span>
                                                        <span class="text-[11px] text-gray-500 mt-1">
                                                            {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 text-right font-bold text-gray-900 whitespace-nowrap">
                                            <div class="flex flex-col">
                                                <span class="text-emerald-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                                <span class="text-[10px] font-normal text-gray-400 mt-1">{{ $order->items->sum('quantity') }} unit barang</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 text-center">
                                            <form action="{{ route('data-pesanan.updateStatus', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="if(this.value === 'cancelled' ? confirm('Yakin ingin membatalkan pesanan ini?') : true) { this.form.submit() } else { location.reload() }"
                                                    class="text-[11px] font-extrabold uppercase tracking-widest rounded-lg border-gray-200 py-2 pl-3 pr-8 cursor-pointer shadow-sm transition-all
                                                    {{ $order->status == 'pending' ? 'bg-amber-50 text-amber-700 border-amber-200' : '' }}
                                                    {{ $order->status == 'completed' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : '' }}
                                                    {{ $order->status == 'cancelled' ? 'bg-red-50 text-red-700 border-red-200' : '' }}">
                                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>✅ Selesai</option>
                                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>❌ Cancel</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-20 text-center text-gray-400 italic text-lg">Belum ada pesanan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-6 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        const ctx = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Selesai', 'Dibatalkan'],
                datasets: [{
                    data: [
                        {{ $statusCounts['pending'] }}, 
                        {{ $statusCounts['completed'] }}, 
                        {{ $statusCounts['cancelled'] }}
                    ],
                    backgroundColor: ['#f59e0b', '#10b981', '#ef4444'], // amber, emerald, red
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: { size: 11, weight: 'bold' }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>