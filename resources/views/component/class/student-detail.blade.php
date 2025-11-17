@if ($class->students->isNotEmpty())
    @forelse ($class->students as $student)
        <tr>
            <td scope="row">0000{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-sm btn-transparant dropdown-toggle" type="button" id="dropdownMenu{{ $student->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $student->id }}">
                        {{-- change class --}}
                        <li>
                            <button class="dropdown-item change-class-btn"
                                data-id="{{ $student->id }}"
                                data-class="{{ $class->id }}"
                                data-bs-toggle="modal"
                                data-bs-target="#change-class"
                                >
                                <i class="bi bi-arrow-left-right me-1"></i> Change Class
                            </button>
                        </li>
                        {{-- remove student from class --}}
                        <li>
                            <button class="dropdown-item text-danger remove-student-btn"
                                data-id="{{ $student->id }}"
                                data-class="{{$class->id}}"
                                data-class-name="{{$class->name}}"
                                data-bs-toggle="modal"
                                data-bs-target="#remove-student">
                                >
                                <i class="bi bi-person-x me-1"></i> Remove from Class
                            </button>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">No students yet.</td>
        </tr>
    @endforelse

@else
    <tr>
        <td colspan="3" class="text-center text-muted">No students yet.</td>
    </tr>
@endif