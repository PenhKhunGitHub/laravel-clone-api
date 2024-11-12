<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- jQuery (Load this first) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables (Load after jQuery) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <!-- Bootstrap and jQuery Scripts -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
         /* Loading screen styles */
         #loadingScreen {
            position: fixed;
            z-index: 9999;
            height: 2em;
            width: 2em;
            overflow: visible;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        #loadingScreen:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background-color: rgba(0,0,0,0.3); */
            background-color: #f8f9fa;
        }

        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
        .dropdown {
            max-height: 0; /* Initially hidden */
            opacity: 0; /* Initially transparent */
            overflow: hidden; /* Hide overflow */
            transition: max-height 0.5s ease, opacity 0.5s ease; /* Smooth transition */
        }
        .dropdown.show {
            max-height: 100px; /* Adjust based on content height */
            opacity: 1; /* Fully opaque */
        }
        /* Sidebar slide animation */
        .sidebar {

            transition: transform 0.3s ease;
        }
        /* Main content expands to full width */
        .main-content-expanded {
            margin-left: -64px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex">

    <!-- Loading Screen -->
    <div id="loadingScreen">
        <div class="spinner"></div>
    </div>

    <!-- Sidebar -->
    <nav class="bg-blue-700 w-64 min-h-screen px-1 py-6 sidebar" id="sideNav">
        <div class="flex items-center justify-center h-5">
            <img class="h-10 w-auto mr-3 color-white" src="https://tailwindui.com/plus/img/logos/mark.svg?color=white" alt="Your Company">
            <h1 class="text-2xl font-bold text-white">Tailwind</h1>
        </div>
        <div class="mt-8">
            <ul class="space-y-4">
                <li>
                    <div class="mt-auto">
                        <a href="#" class="flex items-center text-gray-300 rounded-md px-4 py-2 hover:bg-blue-900 hover:text-white dropdown-toggle">
                            <i class="fas fa-cog mr-2"></i>Setup General
                            <i class="fas fa-chevron-down ml-auto"></i> <!-- Dropdown arrow -->
                        </a>
                        <ul class="dropdown pl-4">
                            <li>
                                <a href="{{route('product.view')}}" class="block text-gray-300 rounded-md px-3 py-1 hover:text-black">
                                    <i class="fa-solid fa-bars mr-2"></i>Setup Product
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block text-gray-300 rounded-md px-3 py-1 hover:text-black">
                                    <i class="fa-solid fa-bars mr-2"></i>Setup Rooms
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block text-gray-300 rounded-md px-3 py-1 hover:text-black">
                                    <i class="fa-solid fa-bars mr-2"></i>Setup Collector
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <ul class="space-y-4">
                <li>
                    <div>
                        <a href="#" class="flex items-center text-gray-300 rounded-md px-4 py-2 hover:bg-blue-900 hover:text-white dropdown-toggle">
                            <i class="fas fa-cog mr-2"></i>Setup Customer
                            <i class="fas fa-chevron-down ml-auto"></i> <!-- Dropdown arrow -->
                        </a>
                        <ul class="dropdown pl-4">
                            <li>
                                <a href="#" class="block text-gray-300 rounded-md px-3 py-1 hover:text-black">
                                    <i class="fa-solid fa-bars mr-2"></i>Setup Customer
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <ul class="space-y-4">
                <li>
                    <a href="#" class="flex items-center text-gray-300 rounded-md px-4 py-2 hover:bg-blue-900 hover:text-white dropdown-toggle">
                        <i class="fas fa-cog mr-2"></i>Purchase
                        <i class="fas fa-chevron-down ml-auto"></i> <!-- Dropdown arrow -->
                    </a>
                    <ul class="dropdown pl-4">
                        <li>
                            <a href="#" class="block text-gray-300 rounded-md px-3 py-1 hover:text-black">
                                <i class="fa-solid fa-bars mr-2"></i>Purchase Order
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block text-gray-300 rounded-md px-3 py-1 hover:text-black">
                                <i class="fa-solid fa-bars mr-2"></i>Pre-Good Receipts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block text-gray-300 rounded-md px-3 py-1 hover:text-black">
                                <i class="fa-solid fa-bars mr-2"></i>Good Receipts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block text-gray-300 rounded-md px-3 py-1 hover:text-black">
                                <i class="fa-solid fa-bars mr-2"></i>Enter Bill
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <ul class="space-y-4">
                <li>
                    <a href="#" class="block text-gray-300 rounded-md px-4 py-2 hover:bg-blue-900 hover:text-white">
                        <i class="fas fa-cog mr-2"></i> <!-- Settings icon -->
                        Settings
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="mainContent" class="flex-1 transition-all duration-300 ml-0">
        <header class="top-0 w-full h-16 flex items-center justify-between px-4 bg-gray-100 dark:bg-gray-800 shadow-md z-50" >
            <!-- Left side: Icon menu -->
            <div class="flex items-center">
            </div>
            <!-- Right side: Profile Dropdown -->
            <div class="relative flex items-center">
                <h4 class="pr-1 ">Login As : <span>Admin</span> </h4>
                <button
                    id="profileDropdownButton"
                    aria-haspopup="true"
                    aria-expanded="false"
                    class="flex items-center focus:outline-none"
                    data-twe-dropdown-toggle >
                    <img
                        src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
                        alt="User Profile"
                        class="w-10 h-10 rounded-full border border-blue-500 p-0.2"
                        loading="lazy"
                    />
                </button>


                <!-- Profile Dropdown Menu -->
                <div>
                    <ul
                        id="profileDropdownMenu"
                        aria-labelledby="dropdownMenuButton2"
                        class="absolute right-0 hidden z-10 mt-6 w-40 bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden"
                        data-twe-dropdown-menu-ref>
                        <li><a href="" class="block px-4 py-2 text-xl text-neutral-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <div class="flex justify-between">
                                <img
                                src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
                                alt="User Profile"
                                class="w-12 h-12 rounded-full border border-blue-500 p-0.2"
                                loading="lazy"
                            /><h1 class="flex justify-center items-center">Admin</h1>
                            </div>
                        </a></li>
                        <li><a href="#" class="block px-4 py-2 text-neutral-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600"><i class="fa-solid fa-wallet mr-2"></i>Profile</a></li>
                        <li><a href="#" class="block px-4 py-2 text-neutral-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600"><i class="fas fa-cog mr-2"></i>Settings</a></li>
                        <li><a href="#" class="block px-4 py-2 text-neutral-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600"><i class="fa-solid fa-power-off mr-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="content m-2">
            @yield('product.view')
        </div>
    </div>

</body>
</html>
<script>
    // JavaScript for dropdown toggle
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default link behavior
            const dropdown = toggle.nextElementSibling; // Select the next ul (dropdown)

            // Toggle classes
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show'); // Hide dropdown
            } else {
                dropdown.classList.add('show'); // Show dropdown
            }
        });
    });

     // JavaScript to toggle the dropdown visibility
     const profileButton = document.getElementById('profileDropdownButton');
    const profileDropdown = document.getElementById('profileDropdownMenu');

    profileButton.addEventListener('click', (e) => {
        e.preventDefault();
        // Toggle 'hidden' class to show/hide dropdown
        profileDropdown.classList.toggle('hidden');
    });

    // Optional: Close dropdown if clicked outside
    document.addEventListener('click', (e) => {
        if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add('hidden');
        }
    });
    // Loading screen hide on page load
    window.addEventListener('load', () => {
        const loadingScreen = document.getElementById('loadingScreen');
        loadingScreen.style.display = 'none';
    });
</script>
