<?php 
    use App\Models\User;
    use App\Models\Course;
?>
<div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="d-flex justify-content-between">
                <h6 class="mb-4">Class List</h6>
                <div class=" d-flex flex-row gap-2">
                    <select class="mb-4 form-select" style="width: 120px;" name="classFilter" id="classFilter" >
                        <option value="filter" selected>Filter</option>
                        @foreach ($department as $item)
                            <option value="{{$item->id}}">{{$item->department_name}}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-info btn-sm mb-4 create-class" id="create-class" data-bs-toggle="modal" data-bs-target="#add-class">Add Class</button> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped bg-secondary table_class" id="table_class">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Class Name</th>
                            <th scope="col">Room</th>
                            <th scope="col">Building</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Department</th>
                            <th scope="col">Number of student</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Create Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="body-class">
                        @foreach ($allClass as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->room_number }}</td>
                                    <td>{{ $item->building }}</td>
                                    <td>{{ $item->course_id ? $item->course->course_name : "N/A" }}</td>
                                    <td>{{ $item->department->department_name ?? 'N/A' }}</td>
                                    <td><a href="" class="student_detail text-light show-post" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#show-student">
                                        {{ $item->students_count }} per
                                            <span class="show-tooltip">show detail</span>
                                    </a></td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                                {{-- updata btn  --}}
                                            <button class="edit-post btn btn-info edit-class" data-id="{{$item->id}}" data-name="{{$item->name}}" data-room_number="{{$item->room_number}}" data-building="{{$item->building}}" data-department="{{$item->department_id}}" data-bs-toggle="modal" data-bs-target="#update-class">
                                                <span class="edit-tooltip">edit</span>
                                                <span class="edit-icon"><i class="bi bi-pencil-square"></i></span>
                                            </button>
                                            {{-- assign subject btn  --}}
                                            <button class="edit-post btn btn-success" data-bs-toggle="modal" data-bs-target="#coming-soon">
                                                <span class="edit-tooltip">add subject</span>
                                                <span class="edit-icon"><i class="bi bi-stack"></i></span>                                        
                                            </button>
                                            {{-- add student btn  --}}
                                            <button class="edit-post btn btn-warning add-student" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#add-student-class">
                                                <span class="edit-tooltip">add student</span>
                                                <span class="edit-icon"><i class="bi bi-person-workspace"></i></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$allClass->links()}}
        </div>
</div>