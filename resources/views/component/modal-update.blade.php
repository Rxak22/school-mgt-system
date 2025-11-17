<!-- Modal -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg-secondary container">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Update User Infomation</h5>
          </div>
          <div class="modal-body">
            <ul class="u-err"></ul>
            <form method="PUT" id="form_data_edit" enctype="multipart/form-data">
              @method('PUT')
              @csrf
                  <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="e-name">
                  </div>
                  <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" id="e-email" aria-describedby="emailHelp">
                  </div>
                  <select class="form-select form-select mb-3" name="role" id="e-role" aria-label="Default select example">
                      <option selected disabled>Open select Role</option>
                      <option value="admin">Admin</option>
                      <option value="teacher">Teacher</option>
                      <option value="student">Student</option>
                  </select>
        
                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning conf_update">Update</button>
          </div>
      </div>
    </div>
  </div>