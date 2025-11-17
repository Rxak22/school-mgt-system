@foreach ($allClass as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->room_number }}</td>
                                    <td>{{ $item->building }}</td>
                                    <td>{{ $item->course_id ? $item->course->course_name : "N/A" }}</td>
                                    <td>{{ $item->department->department_name ?? 'N/A' }}</td>
                                    <td>{{ $item->students_count }} per</td>
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
                                            <button class="edit-post btn btn-success assign-subject-class" data-id="{{$item->id}}" data-course_id="{{$item->course_id}}" data-start="{{$item->startTime}}" data-end="{{$item->endTime}}" data-bs-toggle="modal" data-bs-target="#update-class">
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