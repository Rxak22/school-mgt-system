@foreach ($allDepartment as $item)
    <tr>
                                    <td scope="row">{{$item->department_code}}</td>
                                    <td>{{$item->department_name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        {{-- delete btn --}}
                                        <button class="btn btn-danger delete-department" value="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#delete-department"><i class="bi bi-trash"></i></button>
                                        {{-- updata btn  --}}
                                        <button class="btn btn-info update-department" data-id="{{$item->id}}" data-name="{{$item->department_name}}" data-code="{{$item->department_id}}" data-bs-toggle="modal" data-bs-target="#update-department"><i class="bi bi-pencil-square"></i></button>
                                    </td>
    </tr>
@endforeach