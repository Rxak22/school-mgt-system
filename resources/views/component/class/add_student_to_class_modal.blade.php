<div class="modal fade" id="add-student-class" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="add_student_form" id="add_student_form" action="{{route('class.store')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')
              <div class="modal-content bg-secondary">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select student to add</h5>
              </div>
              <div class="modal-body">
                <ul class="err_msg"></ul>
                
                    <select class="form-select bg-dark form-select mb-3 student select2-results__option all_student select2-dark" name="student[]" multiple="multiple" id="student" aria-label="Default select example" data-placeholder="Select students">
                    
                    </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info add-student-class">Add</button>
              </div>
          </div>
            
        </form>
    </div>
  </div>