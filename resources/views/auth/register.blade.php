@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Реєстрація</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required value="{{ old('name') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Surname</label>
            <input type="text" name="surname" class="w-full border rounded px-3 py-2" value="{{ old('surname') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required value="{{ old('email') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Phone</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2" required value="{{ old('phone') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-6">
            <label class="block mb-1 font-medium">Password confirmation</label>
            <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-semibold">Registration</button>
    </form>
</div>
@endsection
