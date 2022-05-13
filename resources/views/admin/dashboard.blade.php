<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .pane{
            width: 100%;
            height: 20%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .pane-children{
            height: 90%;
            background-color: #d4fada;
            border-radius: 10px;
            margin: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div style="height:100vh; width:100vw; display:flex">
        <div style="height:100%; width:20%; display:flex">
            <!-- sidebar here -->
            @include('Layout.sidebar')
        </div>
        <div  style="height:100%; width:80%">
            @include('admin.layout.navbar')

            <div class="pane">
                <div class="pane-children" style="width: 30%;">
                    <h2><b>Total Student</b></h2>
                    <h3><b>{{ $countStudent }}</b></h3>
                </div>
                <div class="pane-children" style="width: 30%;">
                    <h2><b>Total Teachers</b></h2>
                    <h3><b>{{ $countTeacher }}</b></h3>
                </div>
                <div class="pane-children" style="width: 30%;">
                    <h2><b>Total Departments</b></h2>
                    <h3><b>{{ $countDepartment }}</b></h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
