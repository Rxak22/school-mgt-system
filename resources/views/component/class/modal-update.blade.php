<div class="modal fade" id="update-class" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form class="class_update_form" id="class_update_form" action="{{route('class.store')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update class</h5>
        </div>
        
        <div class="modal-body">
            <ul class="class_err"></ul>
                <div class="mb-3">
                    <label for="name" class="form-label">Class Name</label>
                    <input type="text" class="form-control" name="new_name" id="new_name" placeholder="example:M1">
                </div>
                <div class="mb-3">
                    <label for="room_number" class="form-label">Room Number</label>
                    <input type="number" class="form-control" name="new_room_number" id="new_room_number" placeholder="example:210">
                </div>
                <select class="form-select form-select mb-3" name="new_building" id="new_building" aria-label="Default select example">
                    <option selected disabled>Open select building</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="T">T</option>
                </select>
                <select class="form-select form-select mb-3" name="new_department" id="new_department" aria-label="Default select example">
                    
                  <option selected disabled>Open select Department</option>
                    @foreach ($department as $item)
                        <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                    @endforeach

                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info update-class">Update</button>
              </div>
          </div>
          
      </form>
  </div>
</div>