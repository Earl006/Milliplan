<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<title>User Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 20px;
        display: flex; /* Change to flex */
        flex-direction: column; /* Stack cards vertically */
        gap: 20px;
    }
    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .map {
        height: 300px;
        border-radius: 8px;
        overflow: hidden;
    }
</style>
</head>
<body>
<nav class="bg-gray-800 p-4 flex justify-between items-center">
    <div class="text-white">
        <h1 class="text-2xl font-semibold">User Dashboard</h1>
    </div>
    <ul class="flex space-x-4 text-white">
        <li><a href="{{url('dashboard')}}" class="hover:text-gray-300">Dashboard</a></li>
        <li><a href="{{ url('show_deployments/' . Auth::user()->id) }}" class="hover:text-gray-300">Deployment Details</a></li>
        <li><a href="{{url('show_eval')}}" class="hover:text-gray-300">Psych Eval Reports </a></li>
        <li><a href="{{url('add_units')}}" class="hover:text-gray-300"></a></li>
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
<div class="flex flex-col min-h-screen">
    <!-- Top Navigation -->
    <!-- Navigation code remains unchanged -->
    <div class="container">
        @foreach($deployments as $deployment)
            <div class="card">
                <div class="card-header">Mission Details</div>
                <div class="card-content">
                    <p><strong>Mission Name:</strong> {{ $deployment->operation_name }}</p>
                    <p><strong>Mission Details:</strong> {{ $deployment->mission_details }}</p>
                    <!-- <p><strong>Deployment Area:</strong> {{ $deployment->deployment_area }}</p> -->
                    <!-- Add a container for the map -->
                    <div id="map-{{ $deployment->id }}" class="map"></div>
                </div>
            </div>
        @endforeach
    </div>

<!-- Add your Mapbox access token here -->
<script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
<script>
    // Initialize Mapbox map for each deployment
    @foreach($deployments as $deployment)
        mapboxgl.accessToken = 'pk.eyJ1IjoiZWFybDAwNiIsImEiOiJjbHVsNHA4MnYweHJ1MmpwaHVtZWUwb2FyIn0.6m1wg6H3H8Hbzzjp9Lxfrg';
        var coordinates{{ $deployment->id }} = "{{ $deployment->deployment_area }}".split(',').map(function(coord) {
            return parseFloat(coord);
        });
        var map{{ $deployment->id }} = new mapboxgl.Map({
            container: 'map-{{ $deployment->id }}', // Corrected container ID
            style: 'mapbox://styles/mapbox/streets-v11',
            center: coordinates{{ $deployment->id }},
            zoom: 10 // Adjust the initial zoom level as needed
        });
    @endforeach
</script>
</body>
</html>
