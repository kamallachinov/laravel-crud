<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Form with Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-10 px-4">
        @auth
        <!-- User Dashboard -->
        <div class="flex flex-col items-center space-y-6">
            <div class="w-full max-w-sm p-6 bg-white border border-gray-300 rounded-lg shadow">
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Welcome, {{ auth()->user()->name }}</h2>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700 focus:ring-4 focus:ring-red-300 focus:outline-none">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Create Post Form -->
            <div class="w-full max-w-lg p-6 bg-white border border-gray-300 rounded-lg shadow-sm">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Create New Post</h2>
                <form action="/create-post" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter the post title"
                            class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                    </div>
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700">Body Content</label>
                        <textarea id="body" name="body" placeholder="Enter the content"
                            class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                            rows="5"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                            Save Post
                        </button>
                    </div>
                </form>
            </div>

            <!-- Display All Posts -->
            <div class="w-full max-w-lg">
                <h2 class="text-xl font-bold text-gray-800 mb-4">All Posts</h2>
                @foreach ($posts as $post)
                <div class="p-4 mb-4 bg-white border border-gray-300 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                    <p class="text-gray-600 mt-2">{{ $post->body }}</p>
                    <p>
                        <a href="/edit-post/{{$post->id}}">Edit</a>
                    </p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <!-- Authentication Forms -->
        <div class="flex flex-col items-center space-y-10">
            <!-- Register Form -->
            <div class="w-full max-w-sm p-6 bg-white border border-gray-300 rounded-lg shadow">
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Register</h2>
                <form action="/register" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your name" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your email" required>
                    </div>
                    <div>
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

            <!-- Login Form -->
            <div class="w-full max-w-sm p-6 bg-white border border-gray-300 rounded-lg shadow">
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Log in</h2>
                <form action="/login" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="loginname" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="loginname" name="loginname"
                            class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your name" required>
                    </div>
                    <div>
                        <label for="loginpassword" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="loginpassword" name="loginpassword"
                            class="w-full px-4 py-2 text-sm border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your password" required>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                        Login
                    </button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</body>

</html>