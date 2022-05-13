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
            width: 100%;
            height: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0px 20px 0px;
        }
        .title h1{
            font-family: cursive;
            color: #05a124;
        }
        .course-form-container{
            height: 60%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
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

            <div class="course-form-container">
                <form action="{{ route('admin-save-course') }}", method="post" style="width:70%">
                {{ csrf_field() }}

                    <div class="profile_info_div">
                        <!-- course name input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Course name</div>
                                    </div>
                                    <input type="text" id="name" name="name" style="border:1px solid #d4fada" class="form-input form-control @error('name') is-invalid @enderror" placeholder="Course name" required autocomplete="email">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- department input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Department</div>
                                    </div>
                                    <select id="department" class="form-input form-select @error('department') is-invalid @enderror" style="border:1px solid #d4fada" name="district_id" required autocomplete="department">
                                        <option value="">Select a department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- semestar input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Semester</div>
                                    </div>
                                    <input type="number" max="12" min="1" id="semestar" name="semestar" style="border:1px solid #d4fada" class="form input form-control @error('department') is-invalid @enderror" placeholder="Phone" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-top: 10px; float:right; background-color:green">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>