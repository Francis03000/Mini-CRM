<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME')}}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Include Tailwind CSS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css'])

    <style>
        @media (min-width: 768px) {
            .sidebar {
                display: block;
            }
        }
        @media (max-width: 767px) {
            .sidebar {
                display: none;
            }
        }
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
        }
        @media (min-width: 768px) {
            .mobile-menu-btn {
                display: none;
            }
        }
    </style>
</head>
<body class="flex h-screen bg-gray-100">

    
    <!-- Sidebar -->
    <div class="sidebar fixed top-0 left-0 w-64 h-full bg-gradient-to-b from-gray-800 to-gray-700 text-white p-6 shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Mini-Crm</h2>
        <ul class="space-y-4">
            
            <li>
                <a href="{{ route('company') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-600 transition duration-300">
                    <!-- Updated Icon for Companies -->
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3h14a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm2 4h10M7 11h10M7 15h10" />
                    </svg>
                    Companies
                </a>
            </li>
            
            <li>
                <a href="{{ route('employee') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-600 transition duration-300">
                    <!-- Updated Icon for Employees -->
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.403-4.19A2.98 2.98 0 0 0 16.5 11H9.5a2.98 2.98 0 0 0-2.097 1.81L6 17h5m0-7h6V4H9v6m0 0H6v6h9V8z" />
                    </svg>
                    Employees
                </a>
            </li>
            
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 ml-64 p-6">
        <header class="flex items-center justify-between bg-white p-4 shadow-md mb-6 rounded-lg">
            <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <!-- Mobile menu button -->
                <button class="mobile-menu-btn lg:hidden text-gray-600 focus:outline-none p-2 rounded-lg hover:bg-gray-200 transition duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                @auth
                    <!-- Display user profile button -->
                    <div class="relative grid place-items-center"
                    x-data="{ open: false }">
                        <!-- Profile Button -->
                        <button @click="open = !open" type="button" class="rounded-full overflow-hidden focus:outline-none">
                            <img src="https://picsum.photos/50" alt="Profile Image" class="object-cover w-10 h-10">
                        </button>
                    
                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.outside="open = false" class="bg-white shadow-lg absolute top-full right-0 mt-2 rounded-lg overflow-hidden font-light">
                            <div class="px-4 py-3">
                                <p class="text-gray-800 ">{{ auth()->user()->name}}</p>
                            </div>
                            <div class="border-t border-gray-200">
                                <a href="#" class="block px-4 py-2  text-gray-700 hover:bg-gray-100">Dashboard</a>
                            </div>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                    
                @endauth
                @guest
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Login</a>
                    
                    <!-- Register Button -->
                    <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition duration-300">Register</a>
                @endguest
            </div>
        </header>

        <main class="bg-white p-6 rounded-lg shadow-lg">
            {{ $slot }}
        </main>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>

</body>
</html>
