<div class="modal fade" id="assign-class" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form class="class_assign_form" id="class_assign_form" action="{{route('class.add-student-to-class')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Choose class</h5>
        </div>
        
        <div class="modal-body">
            <ul class="err_msg"></ul>
                <select class="form-select form-select mb-3 class" name="class" id="class" aria-label="Default select example">
                    
                  <option selected disabled>Select class</option>
                    @foreach ($allClass as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info assign-class">Assign</button>
              </div>
          </div>
          
      </form>
  </div>
</div>