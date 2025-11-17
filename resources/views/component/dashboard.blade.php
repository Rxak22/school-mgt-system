<!-- Dashboard Content -->
<div class="container-fluid p-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-primary rounded p-4 text-white">
                <h4 class="mb-1">Welcome back, {{ $user->name }}! 👋</h4>
                <p class="mb-0">Here's what's happening with your school management system today.</p>
            </div>
        </div>
    </div>

    @if ($user->role == 'student')
        <!-- Student Dashboard -->
        <div class="row">
            <div class="col-12">
                <div class="bg-secondary rounded p-4">
                    <h5 class="text-white mb-4">Student Features</h5>
                    <div class="row">
                        <!-- My Courses - Coming Soon -->
                        <div class="col-sm-6 col-xl-4 mb-3">
                            <div class="bg-dark rounded p-4 text-center">
                                <i class="bi bi-journal-text text-info" style="font-size: 2.5rem;"></i>
                                <h6 class="text-white mt-3 mb-1">My Courses</h6>
                                <span class="badge bg-warning text-dark">Coming Soon</span>
                            </div>
                        </div>

                        <!-- Attendance - Coming Soon -->
                        <div class="col-sm-6 col-xl-4 mb-3">
                            <div class="bg-dark rounded p-4 text-center">
                                <i class="bi bi-calendar-check text-success" style="font-size: 2.5rem;"></i>
                                <h6 class="text-white mt-3 mb-1">Attendance</h6>
                                <span class="badge bg-warning text-dark">Coming Soon</span>
                            </div>
                        </div>

                        <!-- Grades - Coming Soon -->
                        <div class="col-sm-6 col-xl-4 mb-3">
                            <div class="bg-dark rounded p-4 text-center">
                                <i class="bi bi-graph-up text-warning" style="font-size: 2.5rem;"></i>
                                <h6 class="text-white mt-3 mb-1">My Grades</h6>
                                <span class="badge bg-warning text-dark">Coming Soon</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Admin & Teacher Dashboard -->
        <!-- Key Metrics Cards -->
        <div class="row mb-4">
            <!-- Total Users Card -->
            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded p-4 transition-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-light mb-1">Total Users</h6>
                            <h3 class="text-white mb-0">{{ $totalUsers }}</h3>
                        </div>
                        <div class="bg-primary p-3 rounded" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-people text-white" style="font-size: 1.8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Departments Card -->
            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded p-4 transition-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-light mb-1">Total Departments</h6>
                            <h3 class="text-white mb-0">{{ $totalDepartments }}</h3>
                        </div>
                        <div class="bg-success p-3 rounded" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-building text-white" style="font-size: 1.8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Courses Card -->
            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded p-4 transition-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-light mb-1">Total Courses</h6>
                            <h3 class="text-white mb-0">{{ $totalCourses }}</h3>
                        </div>
                        <div class="bg-info p-3 rounded" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-book text-white" style="font-size: 1.8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Classes Card -->
            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="bg-secondary rounded p-4 transition-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-light mb-1">Total Classes</h6>
                            <h3 class="text-white mb-0">{{ $totalClasses }}</h3>
                        </div>
                        <div class="bg-warning p-3 rounded" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-door-closed text-white" style="font-size: 1.8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Data Section -->
        <div class="row">
            <!-- Recent Classes -->
            <div class="col-sm-12 col-xl-6 mb-4">
                <div class="bg-secondary rounded p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Recent Classes</h6>
                        <a href="{{ route('class.index') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped bg-secondary mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Class Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Room</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentClasses as $class)
                                    <tr>
                                        <td>
                                            <span class="badge bg-primary">{{ $class->name }}</span>
                                        </td>
                                        <td>{{ $class->department->department_name ?? 'N/A' }}</td>
                                        <td>{{ $class->user->name ?? 'N/A' }}</td>
                                        <td>
                                            <small>Room {{ $class->room_number ?? 'N/A' }}</small>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-light py-3">No classes found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="col-sm-12 col-xl-6 mb-4">
                <div class="bg-secondary rounded p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Recent Users</h6>
                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped bg-secondary mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentUsers as $recentUser)
                                    <tr>
                                        <td>{{ $recentUser->name }}</td>
                                        <td><small>{{ $recentUser->email }}</small></td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($recentUser->role) }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-light py-3">No users found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- Dashboard Content End -->

<style>
    .transition-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .transition-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.02);
    }
    .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.05);
    }
</style>
