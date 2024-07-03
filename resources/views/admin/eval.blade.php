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
        <div class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Psych Results</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Name</th>
                            <th class="border border-gray-300 px-4 py-2">Email</th>
                            <th class="border border-gray-300 px-4 py-2">Psych Eval</th>
                            <th class="border border-gray-300 px-4 py-2">Approve Psych Eval</th>
                            <th class="border border-gray-300 px-4 py-2">Order Psyc Eval</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evals as $result)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{$result->name}}</td>
                            <td class="border border-gray-300 px-4 py-2">{{$result->email}}</td>
                            <td class="border border-gray-300 px-4 py-2">{{$result->psych_eval}}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form method="POST" action="{{ url('eval_update', $result->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" name="approval" value="passed" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Approve psych_eval
                                    </button>
                                </form>
</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form method="POST" action="{{ url('eval_update', $result->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" name="approval" value="failed" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Order Psych Eval
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
