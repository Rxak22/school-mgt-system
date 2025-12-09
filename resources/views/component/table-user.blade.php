<div class="col-sm-8 col-xl-8">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between" style="margin-top: 6px">
                <h6 class="mb-4">Users Infomation List</h6>
                <select class="mb-4 form-select" style="width: 120px;" name="roleFilter" id="filter" >
                    <option value="filter" selected>Filter</option>
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="table-responsive">
            <table class="table table-hover table-striped bg-secondary table_data" id="table_data">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                    <tbody id="table-body">
                            @foreach ($allUser as $item)
                                <tr class="table-tr" data-id="{{$item->id}}">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->role}}</td>
                                    <td>
                                        {{-- delete btn --}}
                                        <button class="btn btn-danger btn-del" value="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="bi bi-trash"></i></button>
                                        {{-- updata btn  --}}
                                        <button class="btn btn-info btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update"><i class="bi bi-pencil-square"></i></button>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{$allUser->links()}}
        </div>
</div>