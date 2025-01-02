<div class="min-h-screen bg-gradient-to-b from-blue-100 to-white p-4">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-xl p-6">
        <!-- Header Section sama seperti sebelumnya -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-blue-600 mb-2 animate-pulse">
                Selamat Ulang Tahun Kabupaten Ogan Ilir
            </h1>
            <div
                class="text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-pink-500 mb-4">
                {{ date('Y') }}
            </div>
        </div>

        <!-- Form Section sama seperti sebelumnya -->
        <div class="mb-8 bg-gray-50 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Kirim Ucapan</h2>

            @if (session()->has('message'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="addWish" class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Nama</label>
                    <input type="text" wire:model="name" class="w-full rounded-lg border-gray-300">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Ucapan</label>
                    <textarea wire:model="message" rows="3" class="w-full rounded-lg border-gray-300"></textarea>
                    @error('message')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transform hover:scale-105 transition">
                    Kirim Ucapan
                </button>
            </form>
        </div>

        <!-- Wishes Display dengan warna dinamis -->
        <div>
            <h2 class="text-2xl font-semibold mb-4 text-center">✨ Ucapan Terbaru ✨</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($wishes as $index => $wish)
                    @php
                        // Array warna untuk variasi
                        $gradients = [
                            'from-yellow-100 via-red-100 to-pink-100',
                            'from-blue-100 via-purple-100 to-pink-100',
                            'from-green-100 via-teal-100 to-blue-100',
                            'from-orange-100 via-yellow-100 to-red-100',
                            'from-purple-100 via-pink-100 to-red-100',
                            'from-teal-100 via-blue-100 to-indigo-100',
                        ];

                        $decorColors = [
                            ['bg-yellow-200', 'bg-pink-200', 'text-purple-600'],
                            ['bg-blue-200', 'bg-purple-200', 'text-blue-600'],
                            ['bg-green-200', 'bg-teal-200', 'text-green-600'],
                            ['bg-orange-200', 'bg-red-200', 'text-orange-600'],
                            ['bg-purple-200', 'bg-pink-200', 'text-indigo-600'],
                            ['bg-teal-200', 'bg-indigo-200', 'text-teal-600'],
                        ];

                        $currentIndex = $index % count($gradients);
                        $currentGradient = $gradients[$currentIndex];
                        $currentDecor = $decorColors[$currentIndex];

                        // Symbols array dengan warna yang sesuai
                        $symbols = [
                            ['★', 'text-yellow-400'],
                            ['♥', 'text-pink-400'],
                            ['✦', 'text-purple-400'],
                            ['★', 'text-blue-400'],
                            ['♥', 'text-green-400'],
                        ];
                    @endphp

                    <div class="transform hover:scale-105 transition duration-300">
                        <div
                            class="relative bg-gradient-to-r {{ $currentGradient }} p-6 rounded-xl shadow-lg overflow-hidden">
                            <!-- Decorative elements dengan warna dinamis -->
                            <div
                                class="absolute top-0 left-0 w-16 h-16 {{ $currentDecor[0] }} opacity-50 rounded-full -translate-x-1/2 -translate-y-1/2">
                            </div>
                            <div
                                class="absolute bottom-0 right-0 w-20 h-20 {{ $currentDecor[1] }} opacity-50 rounded-full translate-x-1/2 translate-y-1/2">
                            </div>

                            <!-- Card content -->
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-bold text-xl {{ $currentDecor[2] }}">{{ $wish->name }}</h3>
                                    <span class="text-sm text-gray-500">{{ $wish->created_at->diffForHumans() }}</span>
                                </div>

                                <div class="bg-white bg-opacity-70 rounded-lg p-4 shadow-inner">
                                    <p class="text-gray-700 italic">"{{ $wish->message }}"</p>
                                </div>

                                <!-- Decorative bottom dengan simbol berwarna -->
                                <div class="flex justify-center mt-4 space-x-2">
                                    @foreach ($symbols as $symbol)
                                        <span class="{{ $symbol[1] }}">{{ $symbol[0] }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Decorative footer -->
        <div class="mt-8 text-center">
            <div class="flex justify-center space-x-4 text-4xl animate-bounce">
                🎉 🎈 🎊
            </div>
        </div>
    </div>
</div>
