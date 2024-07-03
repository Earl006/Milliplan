<!-- add_officers.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Officers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Add Officers</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($officers as $officer)
    <tr>
        <td>{{ $officer->name }}</td>
        <td>
            <form action="{{ route('admin.assignUnit', $officer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select name="unit_id">
                    <option value="">Select Unit</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->unit }}">{{ $unit->unit }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="officer_id" value="{{ $officer->id }}">
        </td>
        <td>
                <button type="submit">Assign Unit</button>
            </form>
        </td>
    </tr>
@endforeach
    </tbody>
</table>

</body>
</html>
