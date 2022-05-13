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
            height: 10%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px 0px 5px 0px;
        }
        .title h1{
            font-family: cursive;
            color: #05a124;
        }
        .course-form-container{
            height: 40%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .text-area{
            max-height: 100px;
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
                <svg xmlns="http://www.w3.org/2000/svg"  width="45" height="45" fill="#05a124" class="bi bi-truck" viewBox="0 0 16 16">
                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                <h1>&nbsp Transport &nbsp</h1>
                <svg xmlns="http://www.w3.org/2000/svg"  width="45" height="45" fill="#05a124" class="bi bi-truck" viewBox="0 0 16 16">
                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
            </div>

            <div class="course-form-container">
                <form action="{{ route('admin-transport-save') }}", method="post" style="width:70%">
                {{ csrf_field() }}

                    <div class="profile_info_div">
                        <!-- from place input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">From</div>
                                    </div>
                                    <input type="text" id="name" name="from" style="border:1px solid #d4fada" class="form-input form-control @error('name') is-invalid @enderror" placeholder="From place" required autocomplete="email">
                                </div>
                            </div>
                        </div>

                        <!-- to place input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">To</div>
                                    </div>
                                    <input type="text" id="name" name="to" style="border:1px solid #d4fada" class="form-input form-control @error('name') is-invalid @enderror" placeholder="To place" required autocomplete="email">
                                </div>
                            </div>
                        </div>

                        <!-- time input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Start time</div>
                                    </div>
                                    <input type="time" id="name" name="time" style="border:1px solid #d4fada" class="form-input form-control" placeholder="Starting time" required autocomplete="email">
                                </div>
                            </div>
                        </div>

                        <!-- time input -->
                        <div class="profile_info_input">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#d4fada; border:1px solid #d4fada">Start time</div>
                                    </div>
                                    <textarea name="stopage" style="border:1px solid #d4fada" class="text-area form-input form-control" placeholder="Stopages" required></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-top: 10px; float:right; background-color:green">Update</button>
                    </div>
                </form>
            </div>

            <div style="height: 40%;">
                @include('User.transport_table')
            </div>
        </div>
    </div>
</body>
</html>