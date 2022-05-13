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
            flex-direction: column;
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
        .button{
            padding: 8px 15px 8px 15px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            background-color: #05a124;
        }
        .link{
            text-decoration: none;
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
                <form action="/admin/counseling/{{Auth::user()->id}}", method="post" style="width:70%">
                {{ csrf_field() }}

                    <div class="profile_info_div">
                        <!-- time input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Time</div>
                                    </div>
                                    <input type="time" id="time" name="time" style="border:1px solid #d4fada" class="form-input form-control @error('name') is-invalid @enderror" placeholder="Enter time" required autocomplete="email">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- duration input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Duration</div>
                                    </div>
                                    <input type="number" id="duration" name="duration" style="border:1px solid #d4fada" class="form-input form-control @error('name') is-invalid @enderror" placeholder="Enter duration in minutes" required autocomplete="email">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- date input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Date</div>
                                    </div>
                                    <input type="date" max="12" min="1" id="date" name="date" style="border:1px solid #d4fada" class="form input form-control @error('semestar') is-invalid @enderror" placeholder="Phone" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-top: 10px; float:right; background-color:green">Add</button>
                    </div>
                </form>

                <div class="table-container">
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-head">
                                <td class="table-cell" style="width: 20%">Date</td>
                                <td class="table-cell" style="width: 20%">Time</td>
                                <td class="table-cell" style="width: 20%">Duration</td>
                                <td class="table-cell" style="width: 40%">Student</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($counselings as $counseling)
                                <tr>
                                    <td class="table-cell" style="width: 20%">{{ $counseling->date }}</td>
                                    <td class="table-cell" style="width: 20%">{{ $counseling->time }}</td>
                                    <td class="table-cell" style="width: 20%">{{ $counseling->duartion }}</td>
                                    
                                    @if($counseling->student_id)
                                        <td class="table-cell" style="width: 40%">
                                            <a href="/admin/people/{{$counseling->student_id->id}}" class="link">
                                                {{ $counseling->student_id->first_name }} {{ $counseling->student_id->last_name }}
                                            </a>
                                        </td>
                                    @endif
                                    @if(!$counseling->student_id)
                                        <td class="table-cell" style="width: 40%">Not taken</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>