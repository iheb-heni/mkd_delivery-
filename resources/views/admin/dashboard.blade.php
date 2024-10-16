<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #082949            ;
            padding-top: 20px;
            width: 250px;
        }

        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            height: 100vh;


        }

        .sidebar .dropdown-menu {
            background-color: #343a40;
        }

        .sidebar .dropdown-item {
            color: white;
        }

        .sidebar .dropdown-item:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3 class="text-light text-center">Dashboard</h3>
            <a href="#"><i class="bi bi-house-door-fill"></i> Home</a>




            @if (auth()->user()->role == 'admin')
   <!-- Admin Dropdown menu -->
   <div class="dropdown">
    <a href="#" class="dropdown-toggle" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-list"></i> Admin
    </a>
    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
        <li><a class="dropdown-item" href="{{route('admins.index')}}"><i class="bi bi-person-check-fill"></i> Admins</a></li>
        <li><a class="dropdown-item" href="{{route('admins.create')}}"><i class="bi bi-person-plus-fill"></i> Add Admin</a></li>
    </ul>
</div>

<div class="dropdown">
    <a href="#" class="dropdown-toggle" id="FournisseursDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-list"></i> Fournisseurs
    </a>
    <ul class="dropdown-menu" aria-labelledby="FournisseursDropdown">
        <li><a class="dropdown-item" href="{{route('fournisseurs.index')}}"><i class="bi bi-person-check-fill"></i> Fournisseurss</a></li>
        <li><a class="dropdown-item" href="{{route('fournisseurs.create')}}"><i class="bi bi-person-plus-fill"></i> Add Fournisseurs</a></li>
    </ul>
</div>
            @endif

            <!-- Other links -->
            <a href="{{route('colis.index')}}"><i class="bi bi-box"></i> Colis</a>
            <a href="{{route('categories.index')}}"><i class="bi bi-tags-fill"></i> Categories</a>
            <a href="{{route('contacts.index')}}"><i class="bi bi-envelope-open"></i> Contacts</a>

            <!-- Logout -->
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- Main content -->
        <div class="main-content">
            <div class="container-fluid">

                {{-- Success alert --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Error alert --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Conditional Welcome Message --}}
                @hasSection('content')
                    @yield('content')
                @else
                    <h1>Welcome to the Dashboard</h1>
                @endif

            </div>
        </div>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
