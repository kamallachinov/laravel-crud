<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Form with Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-sm p-6 bg-white border border-gray-300 rounded-lg shadow">
        <h2 class="mb-6 text-2xl font-bold text-center">Register</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username"
                    class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter your username" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter your email" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter your password" required>
            </div>
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                Register
            </button>
        </form>
    </div>
</body>

</html>
