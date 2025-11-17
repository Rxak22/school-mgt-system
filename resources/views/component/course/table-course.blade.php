<?php 
    use App\Models\User;
?>
<div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="d-flex justify-content-between">
                <h6 class="mb-4">Subject List</h6>
                <div class=" d-flex flex-row gap-2">
                    <button type="button" class="btn btn-info btn-sm mb-4 create-course" id="create-course" data-bs-toggle="modal" data-bs-target="#add-course">Add Course</button> 
                </div>
            </div>
            <table class="table table-striped bg-secondary table_course" id="table_course">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">For Year</th>
                        <th scope="col">Department</th>
                        <th scope="col">Added By</th>
                        <th scope="col">Create Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                    <tbody id="tbl-body">
                           @foreach ($allCourse as $item)
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
                 </tbody>
            </table>
            {{$allCourse->links()}}
        </div>
</div>