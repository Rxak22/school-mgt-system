<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    {{-- search section  --}}
    <form class="d-none d-md-flex ms-4 mt-3">
        @if (Request::path() == "user")
            <input class="form-control bg-dark border-0 userSearch" type="search" name="search" placeholder="Search"> 
        @elseif (Request::path() == "course")
            <input class="form-control bg-dark border-0 courseSearch" type="search" name="search" placeholder="Search">
        @elseif (Request::path() == "class")
            <input class="form-control bg-dark border-0 classSearch" type="search" name="search" placeholder="Search"> 
        @elseif (Request::path() == "department")
            <input class="form-control bg-dark border-0 departmentSearch" type="search" name="search" placeholder="Search">
        @elseif (Request::path() == "student-list")
            <input class="form-control bg-dark border-0 studentSearch" type="search" name="search" placeholder="Search">
        @endif
    </form>
    {{-- search section  --}}
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                
                <img class="rounded-circle me-lg-2"
                    src="{{ $user->img 
                            ? asset('storage/userProfile/' . $user->img) 
                            : asset('assets/img/default-user.png') }}" 
                    alt="" 
                    style="width: 40px; height: 40px;">

                <span class="d-none d-lg-inline-flex">{{$user->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                {{-- <a href="#" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item">Settings</a> --}}
                <a href="{{route('logout')}}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>