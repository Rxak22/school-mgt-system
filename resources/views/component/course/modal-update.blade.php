<div class="modal fade" id="update-course" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form class="course_update_form" action="{{route('course.store')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Subject</h5>
        </div>
        <div class="modal-body">
          <ul class="course_update_err"></ul>

          <div class="mb-3">
              <label for="new_course_name" class="form-label">Subject Name</label>
              <input type="text" class="form-control" name="course_name" id="new_course_name" placeholder="Enter subject name">
          </div>

          <div class="mb-3">
              <label for="new_for_year" class="form-label">For Year</label>
              <select class="form-select" name="new_for_year" id="new_for_year">
                  <option value="">Open select year</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
              </select>
          </div>

          <div class="mb-3">
              <label for="new_department" class="form-label">Department</label>
              <select class="form-select" name="new_department" id="new_department">
                  <option value="" disabled>Open select department</option>
                  @foreach ($department as $item)
                    <option value="{{ $item->id }}"> {{ $item->department_name }} </option>
                  @endforeach
              </select>
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
