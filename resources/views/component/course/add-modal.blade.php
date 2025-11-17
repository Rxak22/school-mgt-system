<div class="modal fade" id="add-course" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
          <div class="modal-content bg-secondary">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new Subejct</h5>
          </div>
          <div class="modal-body">
            <form method="POST" class="course_form" action="{{route('course.store')}}" enctype="multipart/form-data">
              @csrf
              @method('POST')
                <ul class="course_err"></ul>
                <div class="mb-3">
                    <label for="course_name" class="form-label">Subejct Name</label>
                    <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter subejct name">
                </div>

                <select class="form-select form-select mb-3" name="for_year" id="for_year" aria-label="Default select example">
                  <option selected disabled>Open select year</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <select class="form-select form-select mb-3" name="department_id" id="department_id" aria-label="Default select example">
                  <option selected disabled>Open select department</option>
                  @foreach ($department as $item)
                    <option value="{{$item->id}}">{{$item->department_name}}</option>
                  @endforeach
                  
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-info submit-course">Add</button>
              </div>
            </form>
            <script>
              document.querySelector('.course_form').addEventListener('submit', function (e) {
                  e.stopImmediatePropagation(); // stop any global preventDefault() listener
              });
            </script>
          </div>
    </div>
  </div>