<div>
    {{-- @if ($showWishes == false) --}}

    <div class="min-h-screen bg-gradient-to-b from-blue-300 to-white p-6">

        <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-xl p-6">
            <!-- Header Section (sama seperti sebelumnya) -->
            <div class="text-center mb-8 flex flex-col items-center">
                <div class="flex space-x-4 mb-4"> <!-- Container untuk gambar bersebelahan -->
                    <img src="/hut.png" width="200">
                    {{-- <img src="/hut.png" width="200"> --}}
                </div>
                <h1 class="text-4xl font-bold text-blue-600 mb-2 animate-pulse">
                    Selamat Ulang Tahun Kabupaten Ogan Ilir
                </h1>
            </div>

            <!-- Enhanced Form Section -->
            <div class="mb-8 relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-pink-300 via-purple-300 to-blue-300 rounded-2xl transform rotate-1">
                </div>
                <div
                    class="absolute inset-0 bg-gradient-to-l from-blue-300 via-purple-300 to-pink-300 rounded-2xl transform -rotate-1 opacity-75">
                </div>
                <div class="relative bg-white p-8 rounded-2xl shadow-2xl">
                    <h2
                        class="text-2xl font-bold mb-6 text-center bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-600">
                        ✨ Ketik Ucapan dan Harapan Spesialmu untuk Kabupaten Ogan Ilir✨
                    </h2>

                    @if (session()->has('message'))
                        <div
                            class="bg-green-100 text-green-700 p-4 rounded-lg mb-4 transform hover:scale-102 transition-transform">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="addWish" class="space-y-4">
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
                        <div class="space-y-4">
                            <!-- Ambil Foto -->
                            <div class="relative group">
                                <label class="block text-sm font-medium text-gray-700 mb-1 ml-2">Ambil Foto</label>
                                <div class="flex flex-col items-center justify-center">
                                    <div wire:ignore class="flex justify-center">
                                        <div id="my_camera"
                                            class="hidden w-full h-64 bg-gray-100 rounded-xl overflow-hidden"></div>
                                    </div>
                                </div>
                                <div class="relative mt-2 flex space-x-2">
                                    <button type="button" id="open_camera"
                                        class="flex-1 px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 bg-gray-50 focus:bg-white hover:bg-gray-100 transition-colors"
                                        onclick="openCamera()">
                                        <span>Photo yukk</span>
                                    </button>
                                    {{-- <button type="button"
                                        class="px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 bg-gray-50 focus:bg-white hover:bg-gray-100 transition-colors"
                                        onclick="Webcam.reset(); document.getElementById('my_camera').classList.add('hidden');">
                                        Tutup Kamera
                                    </button> --}}
                                </div>
                                <button type="button" id="take_snap"
                                    class="hidden absolute right-3 top-3 flex flex-col items-center group cursor-pointer transform hover:scale-110 transition-all duration-300"
                                    onclick="takeSnapshot()">
                                    📸
                                    <p
                                        class="mt-2 text-xs font-medium text-gray-600 group-hover:text-purple-600 transition-colors">
                                        Ambil Foto
                                    </p>
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
                        </div>

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

        </div>

    </div>
    {{-- .apexcharts-menu-icon {
        margin-right: -30px;
    } --}}


    @push('scripts')
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
</div>
