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
        .title{
            height: 65px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 15px 0px 15px 0px;
        }
        .title h1{
            font-family: cursive;
            color: #05a124;
        }
        .course-form-container{
            height: 70%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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
    </style>
</head>
<body>
    <div style="height:100vh; width:100vw; display:flex">
        <div style="height:100%; width:20%; display:flex">
            <!-- sidebar here -->
            @include('Layout.sidebar')
        </div>
        <div  style="height:100%; width:80%">
            @if(Auth::user()->is_authority)
                @include('admin.layout.navbar')
            @endif

            <div class="title">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#05a124" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                </svg>
                <h1>&nbsp&nbsp Teacher &nbsp&nbsp</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#05a124" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                </svg>
            </div>

            <div class="course-form-container">
                <table class="table table-striped">
                    <thead class="table-head">
                        <tr>
                            <td class="table-cell" style="width: 40%;">Name</td>
                            <td class="table-cell" style="width: 40%;">Faculty</td>
                            <td class="table-cell" style="width: 20%;">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="table-cell">{{$user->first_name}} {{$user->last_name}}</td>
                                <td class="table-cell">{{$user->department}}</td>
                                <td class="table-cell" style="width: 15%">
                                    @if(Auth::user()->is_authority)
                                    <a href="/admin/people/{{$user->id}}" class="button">Details</a>
                                    @endif

                                    @if(!Auth::user()->is_authority)
                                    <a href="/faculty/{{$user->id}}" class="button">Details</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>