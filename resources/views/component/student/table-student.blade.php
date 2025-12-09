<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded p-4">
        <div class="d-flex justify-content-between" style="margin-top: 6px">
            <h6 class="mb-4">Student Information List</h6>
            <select id="filter-student" class="mb-4 form-select" style="width: 200px;">
                <option value="filter" selected>All Classes</option>
                @foreach($allClass as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <table class="table table-hover table-striped bg-secondary table-student" id="table_class">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Class</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody id="table-student-body">
                @foreach ($allUser as $item)
                    <tr class="table-tr" data-id="{{ $item->id }}">
                        <td scope="row">0000{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>

                        {{-- Show class names if exists --}}
                        <td>
                            @if ($item->classes->count() > 0)
                                @foreach ($item->classes as $class)
                                    <span class="badge bg-info">{{ $class->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>

                        <td>{{ ucfirst($item->role) }}</td>

                        <td>
                            <div class="d-flex gap-1">
                                @if ($item->classes->count() > 0)
                                    {{-- change class & remove student from class --}}
                                    <button class="remove-post btn btn-primary remove-student-btn" 
                                        data-id="{{ $item->id }}"
                                        data-class="{{$item->classes->first()->id}}"
                                        data-class-name="{{$item->classes->first()->name}}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#remove-student"
                                    >
                                        <span class="remove-tooltip">remove</span>
                                        <span class="icon"><i class="bi bi-trash"></i></span>
                                    </button>

                                    <button class="change-post btn btn-dark change-class-btn" 
                                        data-id="{{ $item->id }}"
                                        data-class="{{$item->classes->first()->id}}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#change-class"
                                    >
                                        <span class="change-tooltip">change class</span>
                                        <span class="icon"><i class="bi bi-arrow-left-right"></i></span>
                                    </button>
                                @else
                                    {{-- assign class --}}
                                    <button class="assign-post btn btn-light assign-class-btn"
                                        data-id="{{ $item->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#assign-class"
                                    >
                                        <span class="assign-tooltip">assign class</span>
                                        <span class="icon"><i class="bi bi-send-arrow-down-fill"></i></span>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $allUser->links() }}
    </div>
</div>
