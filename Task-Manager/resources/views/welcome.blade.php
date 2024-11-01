<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* Background and layout styles */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('https://wallpaperaccess.com/full/1261799.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        /* Overlay to add black and white architectural look */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Dark overlay for contrast */
            z-index: 1;
        }

        /* Content wrapper */
        .content {
            z-index: 2;
            text-align: center;
        }

        /* Button styles */
        .btn-tasks {
            padding: 15px 30px;
            font-size: 18px;
            color: #000;
            background-color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        /* Hover effect */
        .btn-tasks:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="overlay"></div> <!-- Overlay for architectural look -->

    <div class="content">
        <h1>Welcome to Task Manager</h1>
        <a href="/tasks" class="btn-tasks">Tasks</a>
    </div>

</body>
</html>
