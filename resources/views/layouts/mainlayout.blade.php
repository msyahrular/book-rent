<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('title')</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<style>
    .main{
        height: 100vh;
    }
    .sidebar{
        background:  #9ED5C5;
        color: #eaeaea;
    }

    .sidebar a{
        color: #eaeaea;
        font-style: bold;
        text-decoration: none;
        display: block;
        padding: 20px 10px;
    }

    .sidebar a:hover{
        background: #8EC3B0;
    }

    .content{
        background: #DEF5E5;
    }
    
</style>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-expand-lg color navbar-dark" style="background-color: #8EC3B0">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Linkerion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                    
                        @if (Auth::user()->role_id == 1)
                            
                            <a href="dashboard"><strong>Dashboard</strong></a>
                            <a href="books"><strong>Books</strong></a>
                            <a href="#"><strong>Categoreis</strong></a>
                            <a href="#"><strong>Users</strong></a>
                            <a href="#"><strong>Rent Log</strong></a>
                            <a href="logout"><strong>Logout</strong></a>
                        @else
                            <a href="profile"><strong>Profile</strong> </a>
                            <a href="logout"><strong>Logout</strong></a>
                        @endif

                </div>
                <div class="content p-5 col-lg-10">
                    <div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>