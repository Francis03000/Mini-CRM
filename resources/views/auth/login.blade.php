<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Include Tailwind CSS -->
    @vite(['resources/css/app.css'])
</head>
<body class="flex items-center justify-center h-screen bg-gray-900">
    <div class="bg-white text-gray-900 rounded-lg shadow-lg p-10 max-w-lg w-full mx-4 sm:mx-0">
        <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">Welcome Back</h1>

        <form action="{{ route('login') }}" method="post" class="space-y-8">
            @csrf
        
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email"
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm bg-gray-100 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm @error('email') border-red-500 @enderror"
                       value="{{ old('email') }}" placeholder="Enter your email">
        
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm bg-gray-100 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm @error('password') border-red-500 @enderror"
                       placeholder="Enter your password">
        
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <!-- Remember Password Checkbox -->
            <div class="flex items-center justify-between">
                <label for="remember" class="flex items-center">
                    <input id="remember" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                    <span class="ml-2 text-sm text-gray-700">Remember me</span>
                </label>
        
                <!-- Forgot Password Link -->
                <a href="#" class="text-sm font-medium text-green-600 hover:text-green-500">
                    Forgot your password?
                </a>
            </div>

            @error('failed')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-green-600 text-white py-3 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-200">
                Login
            </button>
        </form>
    </div>
</body>
</html>
