@extends('layouts.main')

@section('title', 'Register')

@section('content')
<div class="flex justify-center items-center min-h-[80vh] p-6">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row w-full max-w-4xl">
        
        <div class="w-full md:w-1/2">
            <img src="https://img.freepik.com/free-vector/completed-steps-concept-illustration_114360-5411.jpg"
                 alt="Register Image" class="h-64 md:h-full w-full object-cover rounded-t-xl md:rounded-l-xl md:rounded-t-none">
        </div>

        <div class="w-full md:w-1/2 p-5 flex flex-col justify-center min-h-[500px]">
            <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">Create Your Account</h2>

            <form action="/register" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input name="name" type="text" placeholder="Enter your name" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a243c] focus:border-transparent">
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input name="email" type="email" placeholder="Enter your email" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a243c] focus:border-transparent">
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input name="password" type="password" placeholder="Create a password" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a243c] focus:border-transparent">
                </div>

                <button type="submit"
                    class="w-full bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold py-3 rounded-lg transition duration-300">
                    Register
                </button>
            </form>

            <div class="text-center text-gray-500 text-sm mt-6">
                Already have an account? 
                <a href="/login" class="text-[#5a243c] font-semibold hover:underline">Login</a>
            </div>
        </div>

    </div>
</div>
@endsection
