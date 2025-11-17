<!-- Modal -->
<div class="modal fade" id="remove-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-info-circle"></i> Comfirm</h5>
        </div>
        <div class="modal-body">
          This student well be remove from class `<span class="class-text"></span>`.
        </div>
        {{-- <input type="hidden" id="remove-student"> --}}
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger conf_remove_student">Delete</button>
        </div>
      </div>
    </div>
  </div>