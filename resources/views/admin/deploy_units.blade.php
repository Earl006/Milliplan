<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
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

        <!-- Deploy Unit Section -->
        <div class="container mx-auto mt-8">
            <h1 class="text-2xl font-semibold mb-4">Deploy Unit</h1>
            <form action="{{ url('deploy_unit') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                <label for="unit" class="block text-black-700">Select Unit:</label>
                    <select name="unit_id" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select Unit</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->unit }}">{{ $unit->unit }}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <label for="operation_name" class="block text-gray-700">Operation Name:</label>
                    <input type="text" name="operation_name" id="operation_name" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="mission_details" class="block text-gray-700">Mission Details:</label>
                    <textarea name="mission_details" id="mission_details" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>
                <div>
                    <label for="deployment_area" class="block text-gray-700">Deployment Area:</label>
                    <div id='map' style='width: 100%; height: 400px;'></div>
                    <input type="hidden" name="deployment_area" id="deployment_area">
                </div>
                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Deploy</button>
            </form>
            <a href="{{url('dashboard')}}"><button class="bg-red-500 text-white px-4 py-2 p-4 rounded-md hover:bg-red-600" >Cancel</button></a>
        </div>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZWFybDAwNiIsImEiOiJjbHVsNHA4MnYweHJ1MmpwaHVtZWUwb2FyIn0.6m1wg6H3H8Hbzzjp9Lxfrg ';

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-74.5, 40],
            zoom: 9
        });

        var marker = new mapboxgl.Marker({
            draggable: true
        })
            .setLngLat([36.8219, -1.2864])
            .addTo(map);

        marker.on('dragend', function () {
            var lngLat = marker.getLngLat();
            document.getElementById('deployment_area').value = lngLat.lng + ', ' + lngLat.lat;
        });
    </script>
</body>

</html>
