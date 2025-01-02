@if ($showWishes == false)
    <div class="min-h-screen bg-gradient-to-b from-blue-100 to-white p-20">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-xl p-6">
            <!-- Header Section (sama seperti sebelumnya) -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-blue-600 mb-2 animate-pulse">
                    Selamat Ulang Tahun Kabupaten Ogan Ilir
                </h1>
                <div
                    class="text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-pink-500 mb-4">
                    {{ date('Y') }}
                </div>
            </div>

            <!-- Enhanced Form Section -->
            <div class="mb-8 relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-pink-200 via-purple-200 to-blue-200 rounded-2xl transform rotate-1">
                </div>
                <div
                    class="absolute inset-0 bg-gradient-to-l from-blue-200 via-purple-200 to-pink-200 rounded-2xl transform -rotate-1 opacity-75">
                </div>
                <div class="relative bg-white p-8 rounded-2xl shadow-lg">
                    <h2
                        class="text-2xl font-bold mb-6 text-center bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-600">
                        ✨ Kirim Ucapan Spesialmu ✨
                    </h2>

                    @if (session()->has('message'))
                        <div
                            class="bg-green-100 text-green-700 p-4 rounded-lg mb-4 transform hover:scale-102 transition-transform">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="addWish" class="space-y-6">
                        <!-- Nama Input -->
                        <div class="relative group">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1 ml-2 transition-transform group-focus-within:text-purple-600">
                                Nama Kamu
                            </label>
                            <div class="relative">
                                <input type="text" wire:model="name"
                                    class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all duration-200 bg-gray-50 focus:bg-white"
                                    placeholder="Masukkan nama kamu disini...">
                                <div class="absolute right-3 top-3 text-gray-400 group-focus-within:text-purple-500">
                                    👤
                                </div>
                            </div>
                            @error('name')
                                <span class="text-red-500 text-sm mt-1 ml-2 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Pesan Input -->
                        <div class="relative group">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1 ml-2 transition-transform group-focus-within:text-purple-600">
                                Ucapan & Harapan
                            </label>
                            <div class="relative">
                                <textarea wire:model="message" rows="4"
                                    class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all duration-200 bg-gray-50 focus:bg-white resize-none"
                                    placeholder="Tuliskan ucapan dan harapanmu...&#10;Tekan Enter untuk baris baru"></textarea>
                                <div class="absolute right-3 top-3 text-gray-400 group-focus-within:text-purple-500">
                                    ✍️
                                </div>
                            </div>
                            @error('message')
                                <span class="text-red-500 text-sm mt-1 ml-2 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Kamera dan Preview -->
                        {{-- <div class="space-y-4">
                            <!-- Ambil Foto -->
                            <div class="relative group">
                                <label class="block text-sm font-medium text-gray-700 mb-1 ml-2">Ambil Foto</label>
                                <div wire:ignore>
                                    <div id="my_camera"
                                        class="hidden w-full h-64 bg-gray-100 rounded-xl overflow-hidden"></div>
                                </div>
                                <div class="relative mt-2 flex space-x-2">
                                    <button type="button" id="open_camera"
                                        class="flex-1 px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 bg-gray-50 focus:bg-white hover:bg-gray-100 transition-colors"
                                        onclick="openCamera()">
                                        <span>Buka Kamera</span>
                                    </button>
                                    <button type="button"
                                        class="px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 bg-gray-50 focus:bg-white hover:bg-gray-100 transition-colors"
                                        onclick="Webcam.reset(); document.getElementById('my_camera').classList.add('hidden');">
                                        Tutup Kamera
                                    </button>
                                </div>
                                <button type="button" id="take_snap"
                                    class="hidden absolute right-3 top-3 p-2 rounded-full bg-white shadow-lg hover:bg-gray-100 transition-colors"
                                    onclick="takeSnapshot()">
                                    📸
                                </button>
                                @error('photo')
                                    <span class="text-red-500 text-sm mt-1 ml-2 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Preview Foto -->
                            <div class="relative group">
                                <label class="block text-sm font-medium text-gray-700 mb-1 ml-2">Preview
                                    Foto</label>
                                <div wire:ignore id="results"
                                    class="w-full min-h-[200px] rounded-xl border-2 border-gray-200 overflow-hidden">
                                    @if ($photo)
                                        <img src="{{ $photo }}" alt="Preview"
                                            class="w-full h-full object-contain">
                                    @endif
                                </div>
                            </div>
                        </div> --}}

                        <!-- Submit Button -->
                        <div class="text-center mt-6">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-medium transform hover:scale-105 hover:shadow-lg transition-all duration-200">
                                <span>Kirim Ucapan</span>
                                <span class="text-xl ml-2">🎉</span>
                            </button>
                        </div>


                    </form>
                </div>
            </div>

            <!-- Rest of the wishes display code remains the same -->
            <!-- ... -->
        </div>
    </div>
@else
    <div class="min-h-screen bg-gradient-to-b from-blue-100 to-white p-4">
        <div class="max-w-full mx-auto bg-white rounded-lg shadow-xl p-6">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <h2
                    class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-600 inline-block">
                    ✨ Ucapan untuk Ogan Ilir ✨
                </h2>
                <p class="text-gray-600 mt-2">Semua harapan dan doa untuk Kabupaten tercinta</p>
            </div>

            <!-- Grid layout for wishes -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-4">
                @foreach ($wishes as $index => $wish)
                    @php
                        $gradients = [
                            'from-rose-100 via-pink-100 to-purple-100',
                            'from-blue-100 via-indigo-100 to-purple-100',
                            'from-emerald-100 via-teal-100 to-cyan-100',
                            'from-amber-100 via-orange-100 to-rose-100',
                            'from-violet-100 via-purple-100 to-fuchsia-100',
                            'from-cyan-100 via-sky-100 to-blue-100',
                        ];

                        $borders = [
                            'border-rose-200',
                            'border-blue-200',
                            'border-emerald-200',
                            'border-amber-200',
                            'border-violet-200',
                            'border-cyan-200',
                        ];

                        $currentIndex = $index % count($gradients);
                    @endphp

                    <!-- Card -->
                    <a href="{{ route('wishes.show', $wish->id) }}"
                        class="relative overflow-hidden rounded-2xl border-4 {{ $borders[$currentIndex] }} flex flex-col h-full transition-transform transform hover:scale-105 hover:border-opacity-50 duration-500 ease-in-out">
                        <!-- Card Background -->
                        <div class="absolute inset-0 bg-gradient-to-br {{ $gradients[$currentIndex] }} opacity-80">
                        </div>

                        <!-- Card Content -->
                        <div class="relative flex flex-col justify-between h-full p-4">
                            <!-- Header -->
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-white shadow-inner flex items-center justify-center text-lg">
                                        {{-- 👤 --}}
                                        <img src="/logo.png">
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-800">{{ $wish->name }}</h3>
                                        <p class="text-sm text-gray-500">
                                            {{ $wish->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="text-2xl">✨</div>
                            </div>

                            <!-- Message -->
                            <div class="bg-white bg-opacity-90 rounded-xl p-3 shadow-inner">
                                <p class="text-gray-700 whitespace-pre-line break-words" style="margin-top: -30px;">
                                    {!! nl2br(e($wish->message)) !!}
                                </p>
                            </div>

                            <!-- Footer -->
                            <div class="mt-3 flex justify-center space-x-2 text-sm">
                                <span class="text-rose-400">❤️</span>
                                <span class="text-amber-400">⭐</span>
                                <span class="text-blue-400">💫</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($wishes->hasPages())
                <div class="mt-8 flex justify-center">
                    {{ $wishes->links() }}
                </div>
            @endif

            <!-- Decorative footer -->
            <div class="mt-12 text-center">
                <div class="inline-flex items-center space-x-2 text-gray-500">
                    <span>✨</span>
                    <span class="text-sm">Dengan ❤️ untuk Ogan Ilir</span>
                    <span>✨</span>
                </div>
            </div>
        </div>
    </div>
@endif

@push('scripts')
    {{-- <script>
        let camera_button = document.getElementById('open_camera');
        let take_button = document.getElementById('take_snap');
        let cameraElement = document.getElementById('my_camera');

        function openCamera() {
            cameraElement.classList.remove('hidden');
            camera_button.classList.add('hidden');
            take_button.classList.remove('hidden');

            Webcam.set({
                width: 640,
                height: 480,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera');
        }

        function takeSnapshot() {
            Webcam.snap(function(data_uri) {
                // Menampilkan preview
                document.getElementById('results').innerHTML =
                    '<img src="' + data_uri + '" class="w-full h-full object-contain"/>';

                // Mengirim data ke Livewire
                Livewire.emit('photoTaken', data_uri);

                // Mematikan kamera
                Webcam.reset();
                cameraElement.classList.add('hidden');
                camera_button.classList.remove('hidden');
                take_button.classList.add('hidden');
            });
        }
    </script> --}}
    <script>
        let camera_button = document.getElementById('open_camera');
        let take_button = document.getElementById('take_snap');
        let cameraElement = document.getElementById('my_camera');

        function openCamera() {
            cameraElement.classList.remove('hidden');
            camera_button.classList.add('hidden');
            take_button.classList.remove('hidden');

            Webcam.set({
                width: 640,
                height: 480,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera');
        }

        function takeSnapshot() {
            Webcam.snap(function(data_uri) {
                // Display preview
                document.getElementById('results').innerHTML =
                    '<img src="' + data_uri + '" class="w-full h-full object-contain"/>';

                // Send to Livewire
                @this.photoTaken(data_uri);

                // Reset camera
                Webcam.reset();
                cameraElement.classList.add('hidden');
                camera_button.classList.remove('hidden');
                take_button.classList.add('hidden');
            });
        }
    </script>
@endpush
