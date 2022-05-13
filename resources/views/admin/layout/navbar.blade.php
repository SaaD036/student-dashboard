<style>
    .container{
        padding: 5px 15px 5px 15px;
        height: 10%;
    }
    .nav-component{
        text-align: center;
        width: 20%;
    }
</style>

<nav class="container navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav" style="width:100%">
            <li class="nav-item nav-component active">
                <a class="nav-link" href="{{ route('admin-create-user') }}">Add people</span></a>
            </li>
            <li class="nav-item nav-component active">
                <a class="nav-link" href="{{ route('admin-people') }}">People</span></a>
            </li>
            <li class="nav-item nav-component active">
                <a class="nav-link" href="{{ route('admin-course') }}">Course</span></a>
            </li>
            <li class="nav-item nav-component active">
                <a class="nav-link" href="{{ route('admin-result') }}">Result</span></a>
            </li>
            <li class="nav-item nav-component active">
                <a class="nav-link" href="{{ route('admin-transport') }}">Transport</span></a>
            </li>
        </ul>
    </div>
</nav>