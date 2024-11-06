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
    <form action="/add/user/store" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Add User</h1>
        
        <label for="name">Enter Your Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="name">Enter Your Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="name">Enter Your Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Submit</button>
        <!-- Display Success Message -->
        @if(session('success'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Validation Error -->
        @if($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <a href="/view" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">View All User</a>
    </form>
</body>
</html>