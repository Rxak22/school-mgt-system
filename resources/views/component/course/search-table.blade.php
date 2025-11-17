<?php 
    use App\Models\User;
?>
    @foreach ($allcourse as $item)
        <tr>
                                    <td scope="row">{{ $item->id }}</td>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ $item->for_year }}</td>
                                    <td>{{ $item->department_name }}</td>
                                    <td>{{ $item->user->name }} ({{ $item->user->role }})</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        {{-- Delete button --}}
                                        <button class="btn btn-danger delete-course" value="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#delete-course">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        {{-- Update button --}}
                                        <button class="btn btn-info update-course"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->course_name }}"
                                            data-for_year="{{ $item->for_year }}"
                                            data-department="{{ $item->department_id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#update-course">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </td>
                                </tr>
    @endforeach