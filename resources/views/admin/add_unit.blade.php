<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Unit - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto">
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Add Unit</h2>
            <form action="{{ url('store_units') }}" method="POST" class="space-y-4">
                @csrf
                <div class="flex flex-col">
                    <label for="unit" class="text-lg font-medium">Unit Name</label>
                    <input type="text" id="unit" name="unit" class="mt-1 px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <!-- <div class="flex flex-col">
                    <label for="officers" class="text-lg font-medium">Number of Officers</label>
                    <input type="number" id="officers" name="officers" class="mt-1 px-4 py-2 border border-gray-300 rounded-md">
                </div> -->
                <div>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Unit</button>
                    <a href="{{ url('add_units') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
