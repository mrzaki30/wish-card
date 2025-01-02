<div>
    {{-- The Master doesn't talk, he acts. --}}

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
                            'from-rose-200 via-pink-200 to-purple-200',
                            'from-blue-200 via-indigo-200 to-purple-200',
                            'from-emerald-200 via-teal-200 to-cyan-200',
                            'from-amber-200 via-orange-200 to-rose-200',
                            'from-violet-200 via-purple-200 to-fuchsia-200',
                            'from-cyan-200 via-sky-200 to-blue-200',
                        ];

                        $borders = [
                            'border-rose-400',
                            'border-blue-400',
                            'border-emerald-400',
                            'border-amber-400',
                            'border-violet-400',
                            'border-cyan-400',
                        ];

                        $currentIndex = $index % count($gradients);
                    @endphp

                    <!-- Card -->
                    <a href="{{ route('wishes.show', $wish->id) }}"
                        class="relative overflow-hidden rounded-2xl border-4 {{ $borders[$currentIndex] }} flex flex-col h-full transition-transform transform hover:scale-105 hover:border-opacity-100 duration-500 ease-in-out">
                        <!-- Card Background -->
                        <div class="absolute inset-0 bg-gradient-to-br {{ $gradients[$currentIndex] }} opacity-100">
                        </div>

                        <!-- Card Content -->
                        <div class="relative flex flex-col justify-between h-full p-4">
                            <!-- Header -->
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-14 h-14 rounded-full bg-white p-1 shadow-lg transform group-hover:scale-105 transition-all duration-300">
                                        @if ($wish->photo_path)
                                            <img src="{{ asset($wish->photo_path) }}" alt="{{ $wish->name }}"
                                                class="w-full h-full object-cover rounded-full ring-2 ring-white ring-offset-2 ring-offset-purple-500"
                                                onerror="this.src='{{ asset('images/default-avatar.png') }}'">
                                        @else
                                            <div
                                                class="w-full h-full rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                                <span class="text-2xl font-bold text-purple-600">
                                                    {{ strtoupper(substr($wish->name, 0, 1)) }}
                                                </span>
                                            </div>
                                        @endif
                                        <!-- Decorative ring animation -->
                                        <div
                                            class="absolute -inset-0.5  rounded-full opacity-0 group-hover:opacity-100 blur animate-pulse">
                                        </div>
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
    <div class="p-6 bg-gray-50">
        <a href="{{ route('birthday.index') }}"
            class="block w-full text-center bg-gradient-to-r from-purple-600 to-pink-500 text-white px-6 py-3 rounded-xl font-medium shadow-md hover:shadow-lg transform transition-all duration-300 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            Kembali
        </a>
    </div>
</div>
