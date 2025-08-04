@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-medium">Phone</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2" required autofocus value="{{ old('phone') }}">
        </div>
        <div class="mb-6">
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-semibold">Login</button>
    </form>
</div>
@endsection
