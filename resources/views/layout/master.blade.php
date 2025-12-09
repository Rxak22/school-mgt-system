<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Favicon -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon" type="image/png" sizes="32x32">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    {{-- toastr lib --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    @yield('content')

</body>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/lib/chart/chart.min.js"></script>
<script src="assets/lib/easing/easing.min.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>
<script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

{{-- select 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


{{-- toastr  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- sweeet alert  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- Template Javascript -->
<script src="assets/js/main.js"></script>

<script>
     $.ajaxSetup({
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        });
</script>
<script>
    $(document).ready(function() {

        toastr.options = {
            "closeButton": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
        };


        $(document).on('hide.bs.modal', '.modal', function () {
            document.activeElement.blur();
        });

        //select 2 multiple select
            $('.student').select2({
                dropdownParent: $('#add-student-class'),
                placeholder: 'Select student',
                width: '100%',
            });

        //delete user
        $('.btn-del').click(function (e) {
    e.preventDefault();

    // get user id from button value
    var id = $(this).val();
    $('#conf-userId').val(id);

    // Remove old click event to prevent multiple binding
    $('.conf_delete').off('click').on('click', function () {
        $.ajax({
            url: "{{ route('user.delete') }}",
            type: "DELETE", // use DELETE method
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content') // include CSRF token
            },
            success: function (data) {
                if (data.status === "success") {
                    $('#exampleModalCenter').modal('hide');
                    $('.table_data').load(location.href + ' .table_data');
                    toastr.success('User removed', 'Success');
                } else {
                    toastr.error(data.message || 'Delete failed', 'Error');
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", error);
                toastr.error('Something went wrong', 'Error');
            }
        });
    });
});


        // add users
        $('#form_data').submit(function(e){
            e.preventDefault();

            // no neet to do this 
            // Append form data to the FormData object
            // formData.append('name', $('#name').val());
            // formData.append('email', $('#email').val());
            // formData.append('password', $('#password').val());
            // formData.append('role', $('#role').val());

            // // Get the file input element
            // var fileInput = $('#profile')[0].files[0];
            // if (fileInput) {
            //     formData.append('profile', fileInput);
            // }

             // Create a FormData object
             var formData = new FormData(this);

            $.ajax({
                url: "{{route('user.store')}}",
                method: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        $('#form_data')[0].reset();
                        $('.table_data').load(location.href + ' .table_data');
                        $('.errMsg').html('');
                        
                        toastr.success('New user add to system', 'success');

                    } 
                    else if (response.status == "error") {
                        $('.errMsg').html('');
                        $('.errMsg').addClass('text-danger');
                        
                        $.each(response.message, function (key, value) {
                            $('.errMsg').append('<li>' + value + '</li>');
                        })
                    }
                }
            });

        });

        //show user image 
        // $('.table-tr').mouseover(function (e){
        //     e.preventDefault();
        //     var id = $(this).data('id');
            
        //     $.ajax({
        //         url: "{{route('user.show')}}",
        //         method: "get",
        //         data: {
        //             id: id
        //         },
        //         success: function (res){
        //             $('.show-img').append(res)
        //         }
        //     })
        // })
        // clear image
        // $('.table-tr').mouseout(function (e){
        //     e.preventDefault();
        //     $('.show-img').empty()
        // })

        // update users
        $(document).on('click', '.btn-edit', function (e) {
            e.preventDefault();

            // get row values
            const $tr = $(this).closest('tr');
            const id    = $.trim($tr.find('td').eq(0).text());
            const name  = $.trim($tr.find('td').eq(1).text());
            const email = $.trim($tr.find('td').eq(2).text());
            const role  = $.trim($tr.find('td').eq(3).text());

            // fill modal inputs
            $('#e-name').val(name);
            $('#e-email').val(email);
            $('#e-role').val(role);

            // store the id on the modal element (doesn't rely on DOM buttons)
            $('#modal-update').data('user-id', id);

            // show modal (if using bootstrap JS this will open it)
            $('#modal-update').modal('show');
        });

        $(document).on('click', '.conf_update', function (e) {
            e.preventDefault();

            // read id from modal data
            const id = $('#modal-update').data('user-id');
            if (!id) {
            console.error('No user id found for update.');
            return;
            }

            // prepare data (include CSRF token)
            const data = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            name: $('#e-name').val(),
            email: $('#e-email').val(),
            role: $('#e-role').val()
            };

            // disable button to prevent double clicks
            const $btn = $(this);
            $btn.prop('disabled', true).text('Updating...');

            $.ajax({
            url: '/user/update/' + id,   // adjust if your route is different
            method: 'PUT',              // keep POST if your route uses POST
            data: data,
            dataType: 'json'
            })
            .done(function (res) {
            if (res.status === 'success') {
                $('#modal-update').modal('hide');
                // reload table fragment — delegated handlers will still work
                $('.table_data').load(location.href + ' .table_data', function() {
                // optional callback after reload
                });
                $('#form_data_edit')[0].reset();
                $('.u-err').empty();
                toastr.success('Update saved', 'Success');
            } else if (res.status === 'error') {
                $('.u-err').empty().addClass('text-danger');
                $.each(res.message, function (key, value) {
                $('.u-err').append('<li>' + value + '</li>');
                });
            }
            })
            .fail(function (xhr) {
            console.error(xhr);
            // show something useful
            $('.u-err').empty().addClass('text-danger').append('<li>Server error. See console.</li>');
            })
            .always(function () {
            $btn.prop('disabled', false).text('Update');
            });
        });

        $('.conf_update').click(function () {
            if (!selectedId) return;

            var data = {
                name: $('#e-name').val(),
                email: $('#e-email').val(),
                role: $('#e-role').val(),
            };

            $.ajax({
                url: "user/update/" + selectedId,
                method: "PUT",
                data: data,
                dataType: 'json',
                success: function (res) {
                    if (res.status == 'success') {
                        $('#modal-update').modal('hide');
                        $('.table_data').load(location.href + ' .table_data');
                        $('#form_data_edit')[0].reset();
                        $('.u-err').html('');
                        toastr.success('Update saved', 'Success');
                    } else if (res.status == 'error') {
                        $('.u-err').html('').addClass('text-danger');
                        $.each(res.message, function (key, value) {
                            $('.u-err').append('<li>' + value + '</li>');
                        });
                    }
                }
            });
        });

        //filter user
        $('#filter').change(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('user.filter')}}",
                method: "post",
                data: {
                    filter: $('#filter').val()
                },
                success: function (res) {
                    $('#table-body').html(res);
                    if (res.status == "filter")
                        $('#table_data').load(location.href + ' #table_data');
                    else if (res.status == "error"){
                        Swal.fire({
                        title: "Opp...",
                        text: "System don't have user role "+$('#filter').val(),
                        icon: "warning"
                        }).then((res) => {
                            $('#table_data').load(location.href + ' #table_data');
                        })
                    }
                }
            })
        })

        // search user
        $('.userSearch').keyup(function (e) {
            e.preventDefault();
            searchVal = $(this).val()
            
            $.ajax({
                url: "{{route('user.search')}}",
                method: "post",
                data: {
                    search: searchVal
                },
                success: function (res) {
                    $('#table-body').html(res);
                    var check = false;
                    if (res.status == "failed"){
                        check = true;
                        $('#table-body').html("<tr><td colspan='5'><h5 class='d-flex justify-content-center text-warning'>System don't have user name \""+ searchVal+ "\"</h5></td></tr>")
                    }
                }
            })
        })

        // add class
        $('.submit-class').click(function (e) {
            e.preventDefault();
            var data = {
                    name: $('#name').val(),
                    room_number: $('#room_number').val(),
                    building: $('#building').val(),
                    department: $('#department').val(),
            };
            $.ajax({
                url: "{{route('class.store')}}",
                data: data,
                method: "POST",
                dataType: 'json',
                success: function (res) {
                    if (res.status == 'success'){
                        $('.class_form')[0].reset();
                        $('#table_class').load(location.href + ' #table_class');
                        $('#add-class').modal('hide');
                        $('.class_err').html('');

                        toastr.success('New class created', 'success');
                    } else if (res.status == 'failed') {
                        $('.class_err').html('');
                        $('.class_err').addClass('text-danger');
                        
                        $.each(res.message, function (key, value) {
                            $('.class_err').append('<li>' + value + '</li>');
                        })
                    }
                },
                error: function ( xhr ){
                    console.error("AJAX Error:", xhr);
                    toastr.error('Something went wrong', 'Error');
                }
            });
        });

        // add course 
        $('.submit-course').click(function (e) {
            e.preventDefault();
            var data = {
                course_name: $('#course_name').val(),
                for_year: $('#for_year').val(),
                department_code: $('#department_id').val(),
            };
            $.ajax({
                url: "{{route('course.store')}}",
                data: data,
                method: "post",
                dataType: 'json',
                success: function (res) {
                    if (res.status == 'success') {
                        $('.course_form')[0].reset();
                        $('#table_course').load(location.href + ' #table_course');
                        $('#add-course').modal('hide');
                        $('.course_err').html('');
                        toastr.success('New course created','success');
                    } else if (res.status == 'failed') {
                        $('.course_err').html('');
                        $('.course_err').addClass('text-danger');
                        $.each(res.message, function (key, value) {
                            $('.course_err').append('<li>' + value + '</li>');
                        });
                    }
                }
            });
        });

        // search course by course name
        $('.courseSearch').keyup(function (e) {
            e.preventDefault();
            searchVal = $(this).val();
            
            $.ajax({
                url: "{{route('course.search')}}",
                method: "post",
                data: {
                    search: searchVal
                },
                success: function (res) {
                    $('#tbl-body').html(res);
                    if (res.status == "failed"){
                        $('#tbl-body').html("<tr><td colspan='7'><h5 class='d-flex justify-content-center text-warning'>System don't have Course name \""+ searchVal+ "\"</h5></td></tr>")
                    }
                }
            })
        })

        // update course
       let currentCourseId = null;
        $(document).on('click', '.update-course', function (e) {
            e.preventDefault();

            currentCourseId = $(this).data('id');
            $('#new_course_name').val($(this).data('name'));
            $('#new_for_year').val($(this).data('for_year'));
            $('#new_department').val($(this).data('department'));
        });

        // Send update request
        $(document).on('click', '.update', function (e) {
            e.preventDefault();
            if (!currentCourseId) return;

            const data = {
                id: currentCourseId,
                course_name: $('#new_course_name').val(),
                for_year: $('#new_for_year').val(),
                department_code: $('#new_department').val()
            };

            $.ajax({
                url: "{{ route('course.update') }}",
                method: "PUT",
                data: data,
                dataType: "json",
                success: function(res) {
                    if (res.status === 'success') {
                        $('.course_update_form')[0].reset();
                        $('#table_course').load(location.href + ' #table_course');
                        $('#update-course').modal('hide');
                        $('.course_update_err').html('');
                        toastr.success('Course updated', 'success');
                    } else if (res.status === 'failed') {
                        $('.course_update_err').html('');
                        $.each(res.message, function (key, value) {
                            $('.course_update_err').append('<li class="text-danger">' + value + '</li>');
                        });
                    }
                },
                error: function () {
                    toastr.error('Something went wrong', 'Error');
                }
            });
        });

        // delete course
        $(document).on('click', '.delete-course', function () {
            $('#conf-course').val($(this).val());
        })

        $(document).on('click', '.conf_delete_course', function () {    
                $.ajax({
                    url: "{{route('course.destroy')}}",
                    method: "delete",
                    data: {
                        id: $('#conf-course').val(),
                    },
                    dataType: 'json',
                    success: function (res) {
                        if (res.status =='success'){
                            $('#table_course').load(location.href +' #table_course');
                            $('#delete-course').modal('hide');
                            toastr.success('Course deleted','success');
                        } else if (res.status == 'failed') {
                            toastr.error('Opps! Something went wrong', 'error');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        toastr.error('Something went wrong', 'Error');
                    }
                            
                })
            })


        
            // search class 
        $('.classSearch').keyup(function () {
            searchQuery = $(this).val();
            $.ajax({
                url: "{{route('class.search')}}",
                method: "post",
                data: {
                    searchQuery: searchQuery
                },
                success: function (res) {
                    $('#body-class').html(res)

                    if (res.status == "failed"){
                        $('#body-class').html("<tr><td colspan='10'><h5 class='d-flex justify-content-center text-warning'>System don't have Class name \""+ searchQuery+ "\"</h5></td></tr>");
                    } 
                }
            })
        })

        // update class
        var id = null;
        $(document).on('click', '.edit-class', function () {
            id = $(this).data('id');
            $('#new_name').val($(this).data('name'));
            $('#new_room_number').val($(this).data('room_number'));
            $('#new_building').val($(this).data('building'));
            $('#new_department').val($(this).data('department'));
        })

        $(document).on('click', '.update-class', function () {
                var data = {
                    id: id,
                    name: $('#new_name').val(),
                    room_number: $('#new_room_number').val(),
                    building: $('#new_building').val(),
                    department: $('#new_department').val(),
                }
                $.ajax({
                    url: "{{route('class.update')}}",
                    method: "put",
                    data: data,
                    dataType: "json",
                    success: function (res) {
                        if (res.status =='success'){
                            $('.class_update_form')[0].reset();
                            $('#table_class').load(location.href +' #table_class');
                            $('#update-class').modal('hide');
                            $('.class_update_err').html('');

                            toastr.success('Class updated','success');
                        } else if (res.status == 'failed') {
                            $('.class_update_err').html('');
                            $('.class_update_err').addClass('text-danger');
                            
                            $.each(res.message, function (key, value) {
                                $('.class_update_err').append('<li>' + value + '</li>');
                            })
                        }
                    }

                })
            })
        
        // add student to class
        $(document).on('click', '.add-student', function() {
            const classId = $(this).data('id');

            $.ajax({
                url: '/class/get-students/' + classId,
                type: 'GET',
                success: function(response) {
                    const allUsers = response.allUser;
                    const enrolledIds = response.enrolledIds;
                    const studentsWithAnyClass = response.studentsWithAnyClass;

                    const select = $('#student');
                    select.empty(); // clear old data

                    allUsers.forEach(user => {
                        const isEnrolledHere = enrolledIds.includes(user.id);
                        const isInAnotherClass = 
                            studentsWithAnyClass.includes(user.id) && !isEnrolledHere;

                        let optionText = user.name;
                        let disabled = '';
                        let style = '';

                        if (isEnrolledHere) {
                            optionText += ' (Already in this class)';
                            style = 'background-color:#ffc107;color:#000;';
                            disabled = 'disabled';
                        } else if (isInAnotherClass) {
                            optionText += ' (Already in another class)';
                            style = 'background-color:#6c757d;color:#fff;';
                            disabled = 'disabled';
                        }

                        select.append(`
                            <option value="${user.id}" ${disabled} style="${style}">
                                ${optionText}
                            </option>
                        `);
                    });

                    // Refresh select2 
                    select.trigger('change');
                },
                error: function() {
                    toastr.error("Failed to load students list");
                }
            });
        });

        // show class detail student
        $(document).on('click', '.student_detail', function (e) {
            e.preventDefault();
            
            var class_id = $(this).data('id');
            $.ajax({
                url: "/class/show-students/" + class_id,
                method: "get",
            }).done(function (res) {
                $('#body-show-student').html(res);
            })
        })
        
        var class_id = null;
        $(document).on('click', '.add-student', function () {
            class_id = $(this).data('id');
        })

        $(document).on('click', '.add-student-class', function () {
                var all_student = $('.all_student').val();
                
                $.ajax({
                    url: "{{route('class.add-student-to-class')}}",
                    method: "post",
                    data: {
                        class_id: class_id,
                        all_student: all_student
                    },
                    dataType: "json",
                    success: function (res) {
                        if (res.status == 'success') {
                            $('.err_msg').html('');
                            $('.add_student_form')[0].reset();
                            $('#table_class').load(location.href + ' #table_class');
                            $('#add-student-class').modal('hide');

                            toastr.success('Student was add to class','success');
                        } else if (res.status == 'failed') {
                            $('.err_msg').html('');
                            $('.err_msg').addClass('text-danger');
                            $.each(res.message, function (key, val) {
                                $('.err_msg').append('<li>' + val + '</li>');
                            })
                        }
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 422){
                            let errors = xhr.responseJSON.message || xhr.responseJSON.errors;

                            $('.err_msg').html('').addClass('text-danger');
                            $.each(errors, function (key, val) {
                                $('.err_msg').append('<li>' + val + '</li>');
                            });
                            toastr.error('Something went wrong', 'Error');
                        } else if (xhr.status === 400) {
                            let error = xhr.responseJSON.message;

                            $('.err_msg').html('').addClass('text-danger');
                            $('.err_msg').append('<li>' + error + '</li>');
                            toastr.error('Something went wrong', 'Error');
                        } else {
                            console.error("AJAX Error:", error);
                            toastr.error('Something went wrong', 'Error');
                        }
                    }
                })
            })

        // remove student from class
        var student_id = null;
        var classId = null;
        var className = null;
        $(document).on('click', '.remove-student-btn', function (e) {
            e.preventDefault();
            student_id = $(this).data('id');
            classId = $(this).data('class');
            className = $(this).data('class-name');

            $('.class-text').text(className);
            
            $('#show-student').modal('hide')
        });

        $(document).on('click', '.conf_remove_student', function (e) {
            e.preventDefault();
            
            $.ajax({
                url: "{{ route('class.remove-student') }}",
                method: "POST",
                data: {
                    student_id: student_id,
                    class_id: classId
                },
                dataType: "json",
                success: function (res) {
                    
                    if (res.status == 'success'){
                            $('#table_class').load(location.href +' #table_class > *');

                            $('#filter-student').val('filter').trigger('change');

                            $('#remove-student').modal('hide');
                            toastr.success('Student removed','success');
                        } else if (res.status == 'failed') {
                            toastr.error('Opps! Something went wrong', 'error');
                        }
                }
            });
        })

        // change class
        var change_class_id = null;
        var change_student_id = null;
        $(document).on('click', '.change-class-btn', function (e) {
            e.preventDefault()
            change_class_id = $(this).data('class')
            change_student_id = $(this).data('id')
            $('#show-student').modal('hide')

            $('#new_class').val(change_class_id)
        })

        $(document).on('click', '.change-student-class', function (e) {
            e.preventDefault();
            
            $.ajax({
                url: "{{ route('class.change-student-class')}}",
                method: "POST",
                data: {
                    student_id: change_student_id,
                    new_class_id: $('#new_class').val(),
                    current_class_id: change_class_id
                },
                dataType: "json",
                success: function (res) {
                    if (res.status == 'success'){
                            $('#table_class').load(location.href +' #table_class');
                            $('.class_change_form')[0].reset()
                            $('#change-class').modal('hide');
                            toastr.success('Class changed','success');
                    } else {
                        toastr.error('Opps! Something went wrong', 'error');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    toastr.error('Something went wrong', 'Error');
                }
            })
        })

        // assign class
        var student_id = []
        $(document).on('click', '.assign-class-btn', function (e) {
            e.preventDefault()

            let id = $(this).data('id')
            student_id = []
            student_id.push(id)
        })

        $(document).on('click', '.assign-class', function (e) {
             e.preventDefault()

            $.ajax({
                    url: "{{route('class.add-student-to-class')}}",
                    method: "post",
                    data: {
                        class_id: $('.class').val(),
                        all_student: student_id
                    },
                    dataType: "json",
                    success: function (res) {
                        if (res.status == 'success') {
                            $('.err_msg').html('');
                            $('.class_assign_form')[0].reset();

                            $('#table_class').load(location.href + ' #table_class > *');

                            $('#assign-class').modal('hide');

                            toastr.success('Student was add to class','success');
                        } else if (res.status == 'failed') {
                            $('.err_msg').html('');
                            $('.err_msg').addClass('text-danger');
                            $.each(res.message, function (key, val) {
                                $('.err_msg').append('<li>' + val + '</li>');
                            })
                        }
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 422){
                            let errors = xhr.responseJSON.message || xhr.responseJSON.errors;

                            $('.err_msg').html('').addClass('text-danger');
                            $.each(errors, function (key, val) {
                                $('.err_msg').append('<li>' + val + '</li>');
                            });
                            toastr.error('Something went wrong', 'Error');
                        } else if (xhr.status === 400) {
                            let error = xhr.responseJSON.message;

                            $('.err_msg').html('').addClass('text-danger');
                            $('.err_msg').append('<li>' + error + '</li>');
                            toastr.error('Something went wrong', 'Error');
                        } else {
                            console.error("AJAX Error:", error);
                            toastr.error('Something went wrong', 'Error');
                        }
                    }
                })
            
        })


        // filter student in class 
        $(document).on('change', '#filter-student', function (e) {
            e.preventDefault()

            $.ajax({
                url: "{{route('student.filter')}}",
                method: "get",
                data: {
                    filter: $('#filter-student').val()
                },
                success: function (res) {
                    $('#table-student-body').html(res);
                    if (res.status == "allClass")
                        $('#table_class').load(location.href + ' #table_class > *');
                    else if (res.status == "error"){
                        Swal.fire({
                        title: "Opp...",
                        text: "The Class didn't have any student yet! ",
                        icon: "warning"
                        }).then((res) => {
                            $('#table_class').load(location.href + ' #table_class > *');

                            $('#filter-student').val('filter').trigger('change');
                        })
                    }
                }
            })
        })

        // search student in class
        $('.studentSearch').keyup(function (e) {
            e.preventDefault();
            searchVal = $(this).val()

            $.ajax({
                url: "{{route('student.search')}}",
                method: "get",
                data: {
                    search: searchVal
                },
                success: function (res) {
                    $('#table-student-body').html(res);
                    if (res.status == "failed"){
                        $('#table-student-body').html("<tr><td colspan='5'><h5 class='d-flex justify-content-center text-warning'>System don't have student name/id \""+ searchVal+ "\"</h5></td></tr>")
                    }
                }
            })
        });

        // add department
        $('.submit-department').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('department.store') }}",
                method: "POST",
                data: {
                    department_name: $('#department_name').val(),
                    department_code: $('#department_code').val(),
                },
                dataType: "json",
                success: function (res) {
                    if (res.status === 'success') {
                        $('.department_err').html('');
                        $('.department_form')[0].reset();
                        $('#table_department').load(location.href + ' #table_department');
                        $('#add-department').modal('hide');
                        toastr.success('Department added successfully', 'Success');
                    } 
                    else if (res.status === 'failed') {
                        $('.department_err').html('').addClass('text-danger');
                        $.each(res.message, function (key, val) {
                            $('.department_err').append('<li>' + val + '</li>');
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    toastr.error('Something went wrong', 'Error');
                }
            });
        });

        // delete department
        $(document).on('click', '.delete-department', function () {
            $('#conf-department').val($(this).val());
        })
        $(document).on('click', '.conf_delete_department', function () {    
                $.ajax({
                    url: "{{route('department.destroy')}}",
                    method: "delete",
                    data: {
                        id: $('#conf-department').val(),
                    },
                    dataType: 'json',
                    success: function (res) {
                        if (res.status =='success'){
                            $('#table_department').load(location.href +' #table_department');
                            $('#delete-department').modal('hide');
                            toastr.success('Department deleted','success');
                        } else if (res.status == 'failed') {
                            toastr.error('Opps! Something went wrong', 'error');
                        }
                    }
                            
                })
            })

        // update department
        $(document).on('click', '.update-department', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const code = $(this).data('code');

            // Store department ID in modal
            $('#update-department').data('dep-id', id);

            // Fill modal inputs
            $('#new_department_name').val(name);
            $('#new_department_code').val(code);
        });

        // Handle update button click
        $(document).on('click', '.update', function (e) {
            e.preventDefault();

            const id = $('#update-department').data('dep-id');
            const name = $('#new_department_name').val();
            const code = $('#new_department_code').val();

            $.ajax({
                url: "{{ route('department.update') }}",
                method: "POST", // Use POST with _method=PUT for Laravel
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "PUT",
                    id: id,
                    department_name: name,
                    department_code: code
                },
                dataType: "json",
                success: function (res) {
                    if (res.status === 'success') {
                        toastr.success('Department updated successfully!', 'Success');
                        $('#update-department').modal('hide');
                        $('#table_department').load(location.href + ' #table_department'); // reload table
                    } else if (res.status === 'failed') {
                        $('.department_update_err').html('');
                        $.each(res.message, function (key, value) {
                            $('.department_update_err').append('<li class="text-danger">' + value + '</li>');
                        });
                    }
                },
                error: function (xhr) {
                    console.error('Error:', xhr.responseText);
                    toastr.error('Update failed', 'Error');
                }
            });
        });

        // search department
        $('.departmentSearch').keyup(function () {
            const query = $(this).val();

            $.ajax({
                url: "{{ route('department.search') }}",
                method: "POST",
                data: {
                    query: query
                },
                success: function (res) {
                    if (typeof res === "string") {
                        $('#tbl-body').html(res);
                    } 
                    else if (res.status === "failed") {
                        $('#tbl-body').html(
                            "<tr><td colspan='5'><h5 class='d-flex justify-content-center text-warning'>System don't have Department name/id \""+ query+ "\"</h5></td></tr>"
                        );
                    }
                },
                error: function(xhr) {
                    console.error('Search error:', xhr.responseText);
                }
            });
        });

         // filter class by department
        $('#classFilter').change(function () {
            $.ajax({
                url: "{{route('class.filter')}}",
                method: "post",
                data: {
                    filter: $('#classFilter').val()
                },
                success: function (res) {
                    $('#body-class').html(res);
                    if (res.status == "filter")
                        $('#table_class').load(location.href + ' #table_class');
                    else if (res.status == "error"){
                        Swal.fire({
                        title: "Opp...",
                        text: "The Department didn't have any class yet! ",
                        icon: "warning"
                        }).then((res) => {
                            $('#table_class').load(location.href + ' #table_class');
                        })
                    }
                }
            })
        })
    });
    
</script>

</html>