<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .center{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mySidebar{
            height: 100%;
            width: 100%;
            display: flex;
            background-color: #05a124;
            transition: 0.5;
            flex-direction: column
        }

        .profile-section{
            height: 150px;
            text-align: center;
        }

        .profile-image{
            max-height: 100px;
            border-radius: 30%;
        }

        .profile-name{
            width: 100%;
            height: 40px;
            text-align: center;
            color: #fff;
        }

        .side-element{
            width: 90%;
            height: 40px;
            border-radius: 5px;
            background-color: #029920;
            margin:2px 10px 2px 10px;
            text-align: center;
            transform: 0.5;
        }

        .side-element:hover{
            background-color: #0acf31;
        }

        .side-element a{
            color: #fff;
            text-decoration: none;
        }

        .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn:hover {
            background-color: #444;
        }

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #main {
            transition: margin-left .5s; /* If you want a transition effect */
            padding: 20px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebar {padding-top: 15px;}
            .sidebar a {font-size: 18px;}
        }
    </style>
</head>
<body>
    <div id="mySidebar" class="mySidebar center">
        @if(Auth::check())
            <div class="profile-section">
                <img class="profile-image" src="{{ Auth::user()->image }}">
                <div class="profile-name center">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </div>
            </div>

            @if(!Auth::user()->is_authority)
                <div class="side-element center">
                    <a href="{{ route('home') }}">Dashboard</a><br>
                </div>

                <div class="side-element center">
                    <a href="{{ route('user-faculty') }}">Faculty</a><br>
                </div>

                <div class="side-element center">
                    <a href="/user/{{Auth::user()->id}}">Profile</a><br>
                </div>

                <div class="side-element center">
                    <a href="{{ route('user-course') }}">Courses</a><br>
                </div>
            @endif

            @if(Auth::user()->is_authority)
                <div class="side-element center">
                    <a href="{{ route('admin-home') }}">Dashboard</a><br>
                </div>

                <div class="side-element center">
                    <a href="{{ route('admin-faculty') }}">Faculty</a><br>
                </div>
            
                <div class="side-element center">
                    <a href="/admin/counseling/{{Auth::user()->id}}">Counseling</a><br>
                </div>

                <div class="side-element center">
                    <svg style="margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-person-badge" viewBox="0 0 16 16">
                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                    </svg>
                    <a href="{{ route('admin-create-user') }}">Admin</a><br>
                </div>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Logout">
            </form>
        @endif
    </div>
</body>
</html>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("button").style.display = "none";
        document.getElementById("mySidebar").style.display = "block";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("button").style.display = "block";
    }
</script>
