<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{Auth::user()->first_name}} | Course</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .container{
            height: 100%;
            width: 80%;
        }
        .title{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0px 20px 0px;
        }
        .title h1{
            font-family: cursive;
            color: #05a124;
        }
        .table-container{
            height: 70%;
            overflow-y: auto;
        }
        .table-cell{
            text-align: center;
            padding: 5px 0px 5px 0px;
            margin: 10px;
        }
        .button{
            padding: 8px 15px 8px 15px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div style="height:100vh; width:100vw; display:flex">
        <div style="height:100%; width:20%">
            <!-- sidebar here -->
            @include('Layout.sidebar')
        </div>
        <div class="container">
            <div class="title">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#05a124" class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                </svg>
                <h1>&nbspCourse&nbsp</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#05a124" class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                </svg>
            </div>
            <div class="table-container">
                <div style="width: 100%; display:flex">
                    <div style="width: 50%">Course name</div>
                </div>
                <table class="table table-striped">
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td class="table-cell" style="width: 50%">{{ $course->name }}</td>
                                <td class="table-cell" style="width: 15%">{{ $course->semestar }}</td>
                                
                                @if($course->is_taken==0)
                                <td class="table-cell" style="width: 35%">
                                    <a href="/course/take/{{ $course->id }}" class="button" style="background-color:#05a124">Take</a>
                                </td>
                                @endif
                                @if($course->is_taken>0)
                                <td class="table-cell" style="width: 35%">
                                    <a href="course/delete/{{ $course->id }}" class="button" style="background-color:red">Remove</a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
