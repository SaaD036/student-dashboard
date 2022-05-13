<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaaD's Daily Shop</title>
    <!-- CSS only -->
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

        .course-container{
            width: 100%;
            height: 80%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            overflow-y: auto;
            padding: 0px 15px 0px 15px;
        }

        .table-container{
            width: 100%;
            height: 60%;
            padding: 20px;
            overflow-y: auto;
        }
        .table-head{
            background-color: #05a124;
            color: #ffffff;
        }
        .table-cell{
            text-align: center;
            padding: 15px 0px 15px 0px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div style="height:100vh; width:100vw; display:flex">
        <div style="height:100%; width:20%">
            <!-- sidebar here -->
            @include('Layout.sidebar')
        </div>
        <div  style="height:100%; width:80%">
            <div class="pane">
                <div class="pane-children" style="width: 30%;">
                    <h2><b>Total Course</b></h2>
                    <h2><b>{{ $totalCourse }}</b></h2>
                </div>
                <div class="pane-children" style="width: 30%;">
                    <h2><b>CGPA</b></h2>
                    <h2><b>{{ $cgpa }}</b></h2>
                </div>
                <div class="pane-children" style="width: 30%;"></div>
            </div>
            <div class="course-container">
                <table class="table table-striped">
                    <thead>
                        <tr class="table-head">
                            <td class="table-cell" style="width: 50%">Name</td>
                            <td class="table-cell" style="width: 30%">Semestar</td>
                            <td class="table-cell" style="width: 20%">Grade</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td class="table-cell">{{ $course->name }}</td>
                                <td class="table-cell">{{ $course->semestar }}</td>
                                <td class="table-cell">{{ $course->grade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
