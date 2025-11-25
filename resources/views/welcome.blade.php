<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- Tailwind (via CDN for demo) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">MyWebsite</h1>

            <ul class="flex gap-6 text-gray-700">
                <li><a href="/" class="hover:text-blue-600">Home</a></li>
                <li><a href="#" class="hover:text-blue-600">Products</a></li>
                <li><a href="#" class="hover:text-blue-600">About</a></li>
                <li><a href="#" class="hover:text-blue-600">Contact</a></li>
            </ul>

            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500">
                Login
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container mx-auto mt-10 flex items-center">
        <div class="w-1/2">
            <h2 class="text-4xl font-bold leading-snug">
                Welcome To <span class="text-blue-600">Our Store</span>
            </h2>
            <p class="text-gray-600 mt-4">
                Shop the best products with affordable prices. Fast delivery and high quality items.
            </p>

            <button class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-500">
                Shop Now
            </button>
        </div>

        <div class="w-1/2 flex justify-center">
            <img src="https://via.placeholder.com/450" class="rounded-xl shadow-lg">
        </div>
    </section>

    <!-- Feature Cards -->
    <section class="container mx-auto mt-20 grid grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
            <h3 class="text-xl font-semibold">Fast Delivery</h3>
            <p class="text-gray-500 mt-3">We deliver products quickly to your door.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
            <h3 class="text-xl font-semibold">Quality Products</h3>
            <p class="text-gray-500 mt-3">We offer high quality and premium items.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
            <h3 class="text-xl font-semibold">24/7 Support</h3>
            <p class="text-gray-500 mt-3">Need help? We are here anytime.</p>
        </div>
    </section>

</body>
</html>
