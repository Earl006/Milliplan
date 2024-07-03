<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex flex-col min-h-screen">

        <!-- Top Navigation -->
        <nav class="bg-gray-800 p-4 flex justify-between items-center">
            <div class="text-white">
                <h1 class="text-2xl font-semibold">Admin Panel</h1>
            </div>
            <ul class="flex space-x-4 text-white">
                <li><a href="{{url('dashboard')}}" class="hover:text-gray-300">Dashboard</a></li>
                <li><a href="{{url('show_officers')}}" class="hover:text-gray-300">Officers</a></li>
                <li><a href="{{url('show_eval')}}" class="hover:text-gray-300">Psych Eval Reports</a></li>
                <li><a href="{{url('add_units')}}" class="hover:text-gray-300">Manage Units</a></li>
            </ul>
            <!-- Dropdown Menu -->
            <div class="relative">
                <button
                    class="flex items-center text-white hover:text-gray-300 focus:outline-none">
                    <span>Account</span>
                    <svg class="h-5 w-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg">
                    <ul class="py-1">
                        <li>
                     <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                     </x-responsive-nav-link>
            
                        </li>
                        <li>
                        <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="flex-grow">
            <div class="container mx-auto px-4 mt-20 md:mt-0">

                <!-- Cards Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Card 1 - App Usage -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Registered Users</h2>
                        <p class="text-gray-600">Total users: {{$data->totalUsers}}</p>
                        <p class="text-gray-600">Active users: {{$data->activeUsers}}</p>
                    </div>

                    <!-- Card 2 - Revenue -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Units</h2>
                        <p class="text-gray-600">Total Number of Units: {{$data->totalUnits}}</p>
                        <p class="text-gray-600">Deployed Units: {{$data->deployedUnits}}</p>
                        <p class="text-gray-600">Reserve Units: {{$data->reserveUnits}}</p>

                    </div>

                    <!-- Card 3 - Traffic -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Traffic</h2>
                        <p class="text-gray-600">Total visits: 5000</p>
                        <p class="text-gray-600">Unique visits: 3000</p>
                    </div>

                    <!-- Card 4 - Messages -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Messages</h2>
                        <p class="text-gray-600">Total messages: 200</p>
                        <p class="text-gray-600">Unread messages: 50</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
