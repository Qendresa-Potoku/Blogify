<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

<header class="bg-white p-4 flex justify-between items-center shadow-md relative">
    <div>
        <a href="/" class="text-3xl font-extrabold text-gray-800 tracking-wide">Postify</a>
    </div>

    <button id="burger" class="block md:hidden text-3xl text-gray-700 focus:outline-none">
        &#9776;
    </button>

<nav id="nav-links" class="hidden md:flex flex-col md:flex-row space-y-4 md:space-x-6 md:space-y-0 md:items-center absolute md:static top-16 md:top-auto right-4 md:right-auto bg-white md:bg-transparent p-4 md:p-0 shadow-md md:shadow-none z-50 w-48 md:w-auto">
    @auth
        <a href="/" class="block bg-transparent hover:text-pink-500 text-gray-700 font-semibold text-lg w-full md:w-auto text-center md:text-left">
            Home
        </a>

        <a href="/my-posts" class="block bg-transparent hover:text-pink-500 text-gray-700 font-semibold text-lg w-full md:w-auto text-center md:text-left">
            My Posts
        </a>

        <form action="/logout" method="POST" class="w-full md:w-auto">
            @csrf
            <button class="w-full md:w-auto bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold py-2 px-6 rounded-md transition duration-300 text-center">
                Logout
            </button>
        </form>
    @else
        <a href="/" class="block bg-transparent hover:text-pink-500 text-gray-700 font-semibold text-lg w-full md:w-auto text-center md:text-left">
            Home
        </a>

        <a href="/login" class="block bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold py-2 px-6 rounded-md w-full md:w-auto text-center transition duration-300">
            Login
        </a>

        <a href="/register" class="block bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold py-2 px-6 rounded-md w-full md:w-auto text-center transition duration-300">
            Register
        </a>
    @endauth
</nav>


</header>


@if(session('success'))
    <div class="flex justify-end px-6 mt-4">
        <div class="inline-block bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded shadow" id="success-message">
            {{ session('success') }}
        </div>
    </div>

    <script>
        setTimeout(() => document.getElementById('success-message')?.remove(), 3000);
    </script>
@endif


<main class="flex-grow p-6">
    @yield('content')
</main>
<footer class="bg-[#5a243c] text-white mt-12 p-10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between">
        <div class="mb-8 md:mb-0">
            <h2 class="text-2xl font-bold mb-4">Postify</h2>
            <ul class="space-y-2 text-sm">
                <li><span class="font-semibold">Phone:</span> +383 45 000-000</li>
                <li><span class="font-semibold">Email:</span> support@postify.com</li>
                <li><span class="font-semibold">Address:</span> 1234 XXXXX, XXXX, XXXX</li>
                <li><span class="font-semibold">Open:</span> Mon-Fri 9:00-17:00</li>
            </ul>
        </div>

        
        <div class="flex flex-wrap gap-8">
            <div class="flex flex-col space-y-2 text-sm">
                <h3 class="font-semibold mb-2">Navigation</h3>
                <a href="/" class="hover:underline">Home</a>
                <a href="/my-posts" class="hover:underline">My Posts</a>
                <a href="/login" class="hover:underline">Login</a>
                <a href="/register" class="hover:underline">Register</a>
            </div>

            <div class="flex flex-col space-y-2 text-sm">
                <h3 class="font-semibold mb-2">About</h3>
                <a href="#" class="hover:underline">About Us</a>
                <a href="#" class="hover:underline">Contact</a>
                <a href="#" class="hover:underline">Privacy Policy</a>
            </div>
        </div>
    </div>

    <div class="text-center text-gray-300 text-xs mt-10">
        © 2025 Postify. All rights reserved.
    </div>
</footer>
<script>
    const burger = document.getElementById('burger');
    const navLinks = document.getElementById('nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('hidden');
    });
</script>

</body>
</html>
