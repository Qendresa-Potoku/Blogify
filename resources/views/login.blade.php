@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="flex justify-center items-center min-h-[80vh] p-6">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row w-full max-w-4xl">
        
        <div class="w-full md:w-1/2">
            <img src="https://img.freepik.com/free-vector/tablet-login-concept-illustration_114360-7873.jpg?t=st=1745742151~exp=1745745751~hmac=d7dc7c385a0ef0646e9c669cad7bdeeebffddb1dc53075f7b7edf518a54950c4&w=826"
                 alt="Login Image" class="h-64 md:h-full w-full object-cover rounded-t-xl md:rounded-l-xl md:rounded-t-none">
        </div>

        <div class="w-full md:w-1/2 p-5 flex flex-col justify-center min-h-[500px]">
            <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">Welcome Back</h2>

            <form action="/login" method="POST" class="space-y-5">
    @csrf

    <div>
        <label for="loginemail" class="block text-gray-700 font-semibold mb-2">Email</label>
        <input name="loginemail" type="email" placeholder="Enter your email" required
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a243c] focus:border-transparent">
    </div>

    <div>
        <label for="loginpassword" class="block text-gray-700 font-semibold mb-2">Password</label>
        <input name="loginpassword" type="password" placeholder="Enter your password" required
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a243c] focus:border-transparent">
    </div>

    <button type="submit"
        class="w-full bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold py-3 rounded-lg transition duration-300">
        Login
    </button>
</form>


            <div class="text-center text-gray-500 text-sm mt-6">
                Don't have an account? 
                <a href="/register" class="text-[#5a243c] font-semibold hover:underline">Register</a>
            </div>
        </div>

    </div>
</div>
@endsection
