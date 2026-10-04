<x-guest-layout>
    <div class="text-center">
        @if ($profile?->photo)
        <img src="{{ asset($profile->photo) }}" alt="รูปโปรไฟล์"
            class="w-32 h-32 rounded-full object-cover mx-auto mb-3">
        @endif
        <h1 class="text-xl font-bold">{{ $profile?->first_name }} {{ $profile?->last_name }}</h1>
        <p class="text-gray-600">รหัสนักศึกษา: {{ $profile?->student_id }}</p>
    </div>

    <div class="mt-6 space-y-2">
        <a href="/gallery" class="block p-3 border rounded hover:bg-gray-100">EP02 Hero (/gallery)</a>
        <a href="/active/index" class="block p-3 border rounded hover:bg-gray-100">EP03 Active Bootstrap (/active/index)</a>
        <a href="/weights" class="block p-3 border rounded hover:bg-gray-100">EP07 Weight (/weights) - ต้อง Login</a>

        @auth
        <a href="{{ route('dashboard') }}" class="block p-3 rounded bg-indigo-600 text-white text-center">
            EP08 ล็อกอินแล้ว: {{ Auth::user()->name }} (ไป Dashboard)
        </a>
        @else
        <div class="flex gap-2">
            <a href="{{ route('login') }}" class="flex-1 p-3 rounded bg-indigo-600 text-white text-center hover:bg-indigo-700">
                EP08 Login
            </a>
            <a href="{{ route('register') }}" class="flex-1 p-3 rounded border border-indigo-600 text-indigo-600 text-center hover:bg-indigo-50">
                Register
            </a>
        </div>
        @endauth
    </div>
</x-guest-layout>