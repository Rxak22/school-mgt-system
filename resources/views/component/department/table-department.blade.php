<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="d-flex justify-content-between">
            <h6 class="mb-4">Department List</h6>
            <div class="d-flex flex-row gap-2">
                <button 
                    type="button" 
                    class="btn btn-info btn-sm mb-4 create-course" 
                    id="create-course" 
                    data-bs-toggle="modal" 
                    data-bs-target="#add-department">
                    Add Department
                </button> 
            </div>
        </div>

        <table class="table table-striped bg-secondary table_course" id="table_department">
            <thead>
                <tr>
                    <th scope="col">Department Code</th>
                    <th scope="col">Department Name</th> 
                    <th scope="col">Added By</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tbl-body">
                @foreach ($allDepartment as $item)
                    <tr>
                        <td>{{ $item->department_code }}</td>
                        <td>{{ $item->department_name }}</td>
                        <td>{{ $item->added_by }}</td>
                        <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            {{-- Delete Button --}}
                            <button 
                                class="btn btn-danger delete-department" 
                                value="{{ $item->id }}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#delete-department">
                                <i class="bi bi-trash"></i>
                            </button>

                            {{-- Update Button --}}
                            <button 
                                class="btn btn-info update-department" 
                                data-id="{{ $item->id }}" 
                                data-name="{{ $item->department_name }}" 
                                data-code="{{ $item->department_code }}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#update-department">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $allDepartment->links() }}
    </div>
</div>
