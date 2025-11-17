<div class="modal fade" id="add-department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="department_form" action="{{ route('department.store') }}" enctype="multipart/form-data">
      @csrf
      @method('POST')
      <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
        </div>
        <div class="modal-body">
          <ul class="department_err"></ul>

          <div class="mb-3">
            <label for="department_name" class="form-label">Department Name</label>
            <input 
              type="text" 
              class="form-control" 
              name="department_name" 
              id="department_name" 
              placeholder="Enter department name">
          </div>

          <div class="mb-3">
            <label for="department_code" class="form-label">
              Department Code <small class="text-warning">(Please be careful, can’t change later)</small>
            </label>
            <input 
              type="text" 
              class="form-control" 
              name="department_code" 
              id="department_code" 
              placeholder="Enter department code">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-info submit-department">Add</button>
        </div>
      </div>
    </form>
  </div>
</div>
