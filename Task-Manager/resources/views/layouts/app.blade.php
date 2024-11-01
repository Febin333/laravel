<!DOCTYPE html>
<html>

<head>
    <title>Task Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUa40w6HMF2tb6xJ0u1kXwtE4AsT1BwKaxDBkzcmM6hoGkM7f4YlsZeWl5sb" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+CKeF5r5gg5R5Y5EG5mszZ5mvd5ue"
        crossorigin="anonymous"></script>

</head>
<style>
      body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('https://wallpaperaccess.com/full/753383.jpg') no-repeat center center fixed; 
        background-size: cover;
        color: #fff;
        font-family: Arial, sans-serif;
    }
</style>
<body>
  
    <div class="container">
        <!-- This is where page content will be inserted -->
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+CKeF5r5gg5R5Y5EG5mszZ5mvd5ue"
        crossorigin="anonymous"></script>
</body>

</html>