<!-- resources/views/name-form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Form</title>
    <style>
        body, html {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        form {
            text-align: center;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%; /* Limit the width to prevent overflow on smaller screens */
            max-width: 400px; /* Maximum width for larger screens */
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box; /* Prevent overflow by including padding in the width calculation */
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><img src="{{ $user->getFirstMediaUrl('images') }}" alt="Uploaded Image" width="100" height="100"></td>
                    <td>{{ $user->name }}</td>
                    <td><a href="/update/user/{{ $user->id }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Update</a> | <a href="/delete/user/{{ $user->id }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>