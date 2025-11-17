@foreach ($allStudent as $item)
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
                            @if ($item->classes->count() > 0)
                                {{-- change class & remove student from class --}}
                                <button class="btn btn-primary remove-student-btn" 
                                    data-id="{{ $item->id }}"
                                    data-class="{{$item->classes->first()->id}}"
                                    data-class-name="{{$item->classes->first()->name}}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#remove-student"
                                >
                                    <i class="bi bi-trash"></i>
                                </button>

                                <button class="btn btn-dark change-class-btn" 
                                    data-id="{{ $item->id }}"
                                    data-class="{{$item->classes->first()->id}}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#change-class"
                                >
                                    <i class="bi bi-arrow-left-right"></i>
                                </button>
                            @else
                                {{-- assign class --}}
                                <button class="btn btn-light assign-class-btn"
                                    data-id="{{ $item->id }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#assign-class"
                                >
                                    <i class="bi bi-send-arrow-down-fill"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach