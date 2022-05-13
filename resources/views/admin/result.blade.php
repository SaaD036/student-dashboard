<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{Auth::user()->first_name}} | Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .course-form-container{
            height: 90%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
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
        .input{
            border: 1px solid #05a124;
            border-radius: 5px;
            text-align: center;
        }
        .button{
            padding: 8px 15px 8px 15px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            background-color: #05a124;
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

            <div class="course-form-container">
                <table class="table table-striped">
                    <thead>
                        <tr class="table-head">
                            <td class="table-cell" style="width: 25%">Name</td>
                            <td class="table-cell" style="width: 35%">Course</td>
                            
                            <td class="table-cell" style="width: 15%">Grade</td>
                            <td class="table-cell" style="width: 15%">Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <form action="/admin/result/{{$user->id}}/{{$user->course_id}}" method="POST">
                                    {{ csrf_field() }}
                                    <td class="table-cell" style="width: 35%">{{ $user->first_name }} {{$user->last_name}}</td>
                                    <td class="table-cell" style="width: 35%">{{ $user->course_name }}</td>
                                    
                                    <td class="table-cell" style="width: 15%">
                                        <input type="number" 
                                            step="0.25" min="0" max="4" 
                                            value="{{$user->grade}}"
                                            class="input"
                                            name="grade">
                                        <!-- {{ $user->grade }} -->
                                    </td>
                                    <td class="table-cell" style="width: 15%">
                                        <input type="submit" value="Add" class="button">
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            </table>
        </div>
    </div>
</body>
</html>