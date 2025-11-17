<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>RUPP</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ $user->img 
                                                    ? asset('storage/userProfile/'. $user->img)
                                                    : asset('assets/img/default-user.png')
                                                }}" alt="ok" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{$user->name}}</h6>
                <span>{{$user->role}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            @if ($user->role == 'teacher')
                <a href="{{route('dashboard')}}" class="nav-item nav-link {{Request::path() == '/' ? 'active' : ''}}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item">Buttons</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div> --}}
                <a href="{{route('department.index')}}" class="nav-item nav-link {{Request::path() == 'department' ? 'active' : ''}}"><i class="bi bi-building-gear"></i> Department</a>
                <a href="{{route('course.index')}}" class="nav-item nav-link {{Request::path() == 'course' ? 'active' : ''}}"><i class="bi bi-journal-text"></i> Subject</a>
                <a href="{{route('class.index')}}" class="nav-item nav-link {{Request::path() == 'class' ? 'active' : ''}}"><i class="bi bi-hospital"></i> Class Room</a>
                <a href="{{route('student.index')}}" class="nav-item nav-link {{Request::path() == 'student-list' ? 'active' : ''}}"><i class="bi bi-person-lines-fill"></i> List Student</a>
            @elseif ($user->role == 'student')
                <a href="{{route('dashboard')}}" class="nav-item nav-link {{Request::path() == '/' ? 'active' : ''}}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            @elseif ($user->role == 'admin')
                <a href="{{route('dashboard')}}" class="nav-item nav-link {{Request::path() == '/' ? 'active' : ''}}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item">Buttons</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div> --}}
                <a href="{{route('department.index')}}" class="nav-item nav-link {{Request::path() == 'department' ? 'active' : ''}}"><i class="bi bi-building-gear"></i> Department</a>
                <a href="{{route('course.index')}}" class="nav-item nav-link {{Request::path() == 'course' ? 'active' : ''}}"><i class="bi bi-journal-text"></i> Subject</a>
                <a href="{{route('class.index')}}" class="nav-item nav-link {{Request::path() == 'class' ? 'active' : ''}}"><i class="bi bi-hospital"></i> Class Room</a>
                <a href="{{route('student.index')}}" class="nav-item nav-link {{Request::path() == 'student-list' ? 'active' : ''}}"><i class="bi bi-person-lines-fill"></i> List Student</a>
                <a href="{{route('user.index')}}" class="nav-item nav-link {{Request::path() == 'user' ? 'active' : ''}}"><i class="bi bi-person-check-fill"></i> Manage Users</a>
            @else
                {{abort(404, 'Not Found')}}
            @endif
        </div>
    </nav>
</div>