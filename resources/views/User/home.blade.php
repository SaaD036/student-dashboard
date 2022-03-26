<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->first_name.' '.$user->last_name }}</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .profile_image_div{
            height: 150px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .profile_image{
            height: 80%;
            border: 1px solid green;
            border-radius: 30%;
            padding: 10px
        }

        .profile-container{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile_info_div{
            height: 80%;
            width: 100%;
            justify-content: center;
            padding-left: 10%;
            padding-right: 10%;
        }

        .profile_info_input{
            width: 100%;
        }
    </style>
</head>
<body>
    <div style="height:100vh; width:100vw; display:flex">
        <div style="height:100%; width:20%">
            <!-- sidebar here -->
            @include('Layout.sidebar')
        </div>

        <div style="height:100%; width:80%">
            <!-- error message -->
            @include('Layout.messages')

            <!-- profile image -->
            <div class="profile_image_div">
                <img class="profile_image" src="{{ $user->image }}">
            </div>

            <!-- profile information -->
            <div class="profile-container">
                <form action="/user/{{ Auth::user()->id }}", method="post" style="width:70%">
                {{ csrf_field() }}

                    <div class="profile_info_div">
                        <!-- email input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Email</div>
                                    </div>
                                    <input type="text" value="{{ $user->email }}" name="email" style="border:1px solid #d4fada" class="form-control" placeholder="Username">
                                </div>
                            </div>
                        </div>

                        <!-- name input -->
                        <div class="profile_info_input" style="display:flex">
                            <div class="col-auto" style="width:48%">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">First name</div>
                                    </div>
                                    <input type="text" value="{{ $user->first_name }}" name="f_name" style="border:1px solid #d4fada" class="form-control" placeholder="First name">
                                </div>
                            </div>
                            <div class="col-auto" style="width:48%; margin-left:4%">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Last name</div>
                                    </div>
                                    <input type="text" value="{{ $user->last_name }}" name="l_name" style="border:1px solid #d4fada" class="form-control" placeholder="Last name">
                                </div>
                            </div>
                        </div>

                        <!-- phone input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Phone</div>
                                    </div>
                                    <input type="text" value="{{ $user->phone }}" name="phone" style="border:1px solid #d4fada" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                        </div>


                        <!-- department input -->
                        @if(Auth::check() && !Auth::user()->is_authority)
                            <div class="profile_info_input">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Department</div>
                                        </div>
                                        <div style="border:1px solid #d4fada" class="form-control">
                                            {{ $user_department->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- department input -->
                        @if(Auth::check() && Auth::user()->is_authority)
                            <div class="profile_info_input">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">District</div>
                                        </div>
                                        <select class="form-input form-select" style="border:1px solid #d4fada" name="district_id">
                                            <option value="">Select a department</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary" style="margin-top: 10px; float:right; background-color:green">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
