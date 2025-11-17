<div class="col-sm-4 col-xl-4">
    <div class="bg-secondary rounded p-4">
        <h6 class="mb-3 text-upper">Add Users Infomation</h6>
            <ul class="errMsg"></ul>
            <form method="post" id="form_data" enctype="multipart/form-data">
                @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="username">
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile</label>
                        <input type="file" class="form-control bg-dark" name="profile" id="profile">
                    </div>
                    <div style="margin-bottom: 12px">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="email address">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>
                    <select class="form-select form-select mb-3" name="role" id="role" aria-label="Default select example">
                        <option selected disabled>Open select Role</option>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                    <button type="submit" id="addUser" class="btn btn-primary">Add <i class="bi bi-box-arrow-in-right"></i></button>
            </form>
    </div>
</div>