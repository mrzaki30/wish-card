<div>
    <div class="min-h-screen bg-gradient-to-b from-blue-300 to-white p-6 flex justify-center items-center">
        <div class="max-w-2xl w-full">
            <!-- Card with floating effect -->
            <div class="transform hover:-translate-y-1 transition-all duration-300">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <!-- Gradient Card Header with improved layout -->
                    <div class="relative bg-gradient-to-br from-purple-600 via-pink-500 to-red-400 p-8 rounded-t-2xl">
                        <!-- Decorative patterns -->
                        <div class="absolute top-0 left-0 w-full h-full opacity-10">
                            <div class="w-40 h-40 bg-white rounded-full absolute -top-20 -left-20"></div>
                            <div class="w-32 h-32 bg-white rounded-full absolute -bottom-16 -right-16"></div>
                        </div>

                        <div class="relative flex items-center justify-between">
                            <!-- Enhanced Profile Photo Section -->
                            <div class="flex items-center space-x-6">
                                <div class="relative group">
                                    <!-- Increased size and enhanced profile photo container -->
                                    <div
                                        class="w-40 h-40 rounded-full bg-white p-1.5 shadow-xl transform group-hover:scale-105 transition-all duration-300">
                                        @if ($wishes->photo_path)
                                            <img src="{{ asset($wishes->photo_path) }}" alt="{{ $wishes->name }}"
                                                class="w-40 h-40 object-cover rounded-full ring-4 ring-white ring-offset-4 ring-offset-purple-500 transform transition-all duration-300 group-hover:brightness-110"
                                                onerror="this.src='{{ asset('images/default-avatar.png') }}'">
                                        @else
                                            <div
                                                class="w-full h-full rounded-full bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center transform transition-all duration-300 group-hover:from-purple-200 group-hover:to-pink-200">
                                                <span class="text-4xl font-bold text-purple-600">
                                                    {{ strtoupper(substr($wishes->name, 0, 1)) }}
                                                </span>
                                            </div>
                                        @endif

                                        <!-- Enhanced decorative elements -->
                                        <div
                                            class="absolute -inset-2 bg-gradient-to-r from-purple-600 via-pink-500 to-red-400 rounded-full opacity-0 group-hover:opacity-20 blur-lg transition-all duration-300">
                                        </div>

                                        <!-- Sparkle decorations -->
                                        <div class="absolute -top-2 -right-2 w-6 h-6 text-yellow-400 animate-bounce">✨
                                        </div>
                                        <div
                                            class="absolute -bottom-1 -left-1 w-6 h-6 text-yellow-400 animate-bounce delay-100">
                                            ✨</div>
                                    </div>
                                </div>

                                <!-- User Info with enhanced typography -->
                                <div class="flex-1">
                                    <h1 class="text-3xl font-bold text-white tracking-tight mb-1 text-shadow-lg">
                                        {{ $wishes->name }}</h1>
                                    <p class="text-lg text-gray-200 opacity-90 flex items-center space-x-2">
                                        <span class="inline-flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                            </svg>
                                            {{ $wishes->created_at->format('d M Y, H:i') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <!-- Enhanced decorative icon -->
                            <div
                                class="text-4xl filter drop-shadow-lg transform rotate-12 hover:rotate-0 transition-all duration-300">
                                ✨
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Card Content -->
                    <div class="p-8 space-y-6">
                        <!-- Message with improved styling -->
                        <div class="relative">
                            <div class="absolute -top-6 left-4 transform -translate-y-1/2 text-4xl">💭</div>
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 shadow-inner">
                                <p class="text-gray-800 text-xl leading-relaxed whitespace-pre-line break-words"
                                    style="margin-top: -30px;">
                                    {!! nl2br(e($wishes->message)) !!}
                                </p>
                            </div>
                        </div>

                        <!-- Enhanced Footer Icons -->
                        <div class="flex justify-center space-x-6">
                            <div class="flex items-center space-x-2 transform hover:scale-110 transition-transform">
                                <span class="text-2xl animate-bounce">❤️</span>
                                <span class="text-lg font-medium text-gray-600">Harapan Tulus</span>
                            </div>
                            <div class="flex items-center space-x-2 transform hover:scale-110 transition-transform">
                                <span class="text-2xl animate-pulse">⭐</span>
                                <span class="text-lg font-medium text-gray-600">Inspirasi</span>
                            </div>
                            <div class="flex items-center space-x-2 transform hover:scale-110 transition-transform">
                                <span class="text-2xl animate-spin-slow">💫</span>
                                <span class="text-lg font-medium text-gray-600">Semangat</span>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Back Button -->
                    <div class="p-8 bg-gray-50">
                        <a href="{{ route('wish.index') }}"
                            class="block w-full text-center bg-gradient-to-r from-purple-600 to-pink-500 text-white px-6 py-3 rounded-xl font-medium shadow-md hover:shadow-lg transform transition-all duration-300 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            Kembali ke Daftar Ucapan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
