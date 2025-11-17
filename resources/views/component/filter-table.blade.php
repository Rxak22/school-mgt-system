
    @foreach ($allUser as $item)
    <tr>
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