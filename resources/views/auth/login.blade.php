@extends('layouts.app')
@section('content')
<div class="home-bg min-h-screen flex flex-col justify-between overflow-x-hidden">
    <header class="w-full shadow home-header">
        <nav class="container mx-auto flex items-center gap-8 py-4 px-6">
            <a href="/" class="home-link font-semibold text-lg">Home</a>
        </nav>
    </header>
    <main class="flex-1 flex items-center justify-center w-full">
        <div class="login w-full max-w-md bg-white p-4 sm:p-6 rounded shadow mx-auto">
            <h2 class="text-2xl font-bold mb-6">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Phone</label>
                    <input type="text" name="phone" class="w-full border rounded px-3 py-2" required autofocus value="{{ old('phone') }}">
                    @error('phone')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-1 font-medium">Password</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                    @error('password')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                @if ($errors->any())
                    <div class="mb-4 text-red-600 text-sm">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-semibold">Login</button>
            </form>
        </div>
    </main>
    <footer class="w-full home-footer text-center py-4 mt-auto">
        <span>&copy; {{ date('Y') }} CityCard.</span>
    </footer>
</div>
@endsection
