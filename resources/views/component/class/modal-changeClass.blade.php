<div class="modal fade" id="change-class" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form class="class_change_form" id="class_change_form" action="{{route('class.change-student-class')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change class</h5>
        </div>
        
        <div class="modal-body">
            <ul class="class_err"></ul>
                <select class="form-select form-select mb-3" name="new_class" id="new_class" aria-label="Default select example">
                    
                  <option selected disabled>Select new class</option>
                    @foreach ($allClass as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info change-student-class">Change</button>
              </div>
          </div>
          
      </form>
  </div>
</div>