<div class="modal fade" id="update-department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="department_update_form" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title">Update Department</h5>
        </div>
        <div class="modal-body">
          <ul class="department_update_err"></ul>

          <div class="mb-3">
            <label for="new_department_name" class="form-label">Department Name</label>
            <input type="text" class="form-control" name="department_name" id="new_department_name" placeholder="Enter new department name">
          </div>

          <div class="mb-3">
            <label for="new_department_code" class="form-label">Department Code</label>
            <input type="text" class="form-control" name="department_code" id="new_department_code" placeholder="Enter new department code">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-info update">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
