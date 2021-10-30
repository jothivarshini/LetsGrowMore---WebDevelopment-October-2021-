<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Teacher Details</h5>
            </div>
            <div class="modal-body">Are you sure to want to delete this detail?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-bs-dismiss="modal" data-target='#userModal' data-toggle='modal' data-id="1">Close</button>
                <a class="btn btn-primary" href="{{ route('user.destroy') }}"
                   onclick="event.preventDefault();
                   document.getElementById('user-delete-form').submit();">
                    Ok
                </a>
                <form id="user-delete-form" action="{{ route('user.destroy') }}" method="POST" class="d-none">
                    <input type="hidden" id="user-id" name="id" value="">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script>
    $(".confirmationToDeleteTeacher").click(function() {
        var teacherId = $(this).data('id');
        $('#teacher-id').val(teacherId);
        $('#teacherModal').modal('show');
    });
    $(".confirmationToDeletestudentclaim").click(function() {
        var studentId = $(this).data('id');
        $('#student-id').val(studentId);
        $('#studentModal').modal('show');
    });
    $(".confirmationToDeleteUser").click(function() {
        var userId = $(this).data('id');
        $('#user-id').val(userId);
        $('#userModal').modal('show');
    });
    $('#batch').on('change', function (e) {
        $('#deportment').val('');
    });
    $('#subject_id').on('change', function (e) {
        if($('#subject_id').val().length) {
            $("#mark").attr('disabled', false);
        } else {
            $("#mark").attr('disabled', true);
        }
    });
    $('#deportment').on('change', function (e) {
        e.preventDefault();
        var formName = $(this).closest('form').attr('name');
        if(formName === "result_form") {
            var batchVal = $('#batch').val();
            var depVal = $('#deportment').val();
            var token = $('#_token').val();
            if(batchVal.length && depVal.length) {
                $.ajax({
                    url: '{{ route('student.list') }}',
                    type: 'post',
                    data: {_token: token, deportment: depVal, batch: batchVal},
                    success: function (data) {
                       if(data.message === "success") {
                           $('#student_id').find('option[value]').remove();
                           if(data.result.length) {
                               $("#student_id").attr('disabled', false);
                               $("#student_id").append('<option value="">--SELECT--</option>');
                           } else {
                               $("#student_id").attr('disabled', true);
                           }
                           $.each(data.result, function (key, val) {
                               $("#student_id").append('<option value=' + val.student_id + '>' + val.student_identity_number + '</option>');
                            });
                       }
                    },
                    error: function(data, textStatus, message){
                        console.log("error");
                    }
                });
            } else {
                $('#deportment').val('');
                $('#batch').focus();
            }
        }
    });

    $('#student_id').on('change', function (e) {
        var formName = $(this).closest('form').attr('name');
        if(formName === "result_form") {
            var token = $('#_token').val();
                $.ajax({
                    url: '{{ route('exam.list') }}',
                    type: 'post',
                    data: {_token: token},
                    success: function (data) {
                        if(data.message === "success") {
                            $('#exam_id').find('option[value]').remove();
                            if(data.result.length) {
                                $("#exam_id").attr('disabled', false);
                                $("#exam_id").append('<option value="">--SELECT--</option>');
                            } else {
                                $("#exam_id").val('');
                                $("#exam_id").attr('disabled', true);
                            }
                            $.each(data.result, function (key, val) {
                                $("#exam_id").append('<option value=' + val.id + '>' + val.name + '</option>');
                            });
                        }
                    },
                    error: function(data, textStatus, message){
                        console.log("error");
                    }
                });
            }
    });

    $('#exam_id').on('change', function (e) {
        var formName = $(this).closest('form').attr('name');
        if(formName === "result_form") {
            var token = $('#_token').val();
            $.ajax({
                url: '{{ route('subject.list') }}',
                type: 'post',
                data: {_token: token},
                success: function (data) {
                    if(data.message === "success") {
                        $('#subject_id').find('option[value]').remove();
                        if(data.result.length) {
                            $("#subject_id").attr('disabled', false);
                            $("#subject_id").append('<option value="">--SELECT--</option>');
                        } else {
                            $("#subject_id").val('');
                            $("#subject_id").attr('disabled', true);
                        }
                        $.each(data.result, function (key, val) {
                            $("#subject_id").append('<option value=' + val.id + '>' + val.subject_code + '</option>');
                        });
                    }
                },
                error: function(data, textStatus, message){
                    console.log("error");
                }
            });
        }
    });

    // Result

    $('#result_deportment').on('change', function (e) {
        e.preventDefault();
            var batchVal = $('#result_batch').val();
            var depVal = $('#result_deportment').val();
            var token = $('#_token').val();
            if(batchVal.length && depVal.length) {
                $.ajax({
                    url: '{{ route('student.list') }}',
                    type: 'post',
                    data: {_token: token, deportment: depVal, batch: batchVal},
                    success: function (data) {
                        if(data.message === "success") {
                            $('#result_student_id').find('option[value]').remove();
                            if(data.result.length) {
                                $("#result_student_id").attr('disabled', false);
                                $("#result_student_id").append('<option value="">--SELECT--</option>');
                            } else {
                                $("#result_student_id").attr('disabled', true);
                            }
                            $.each(data.result, function (key, val) {
                                $("#result_student_id").append('<option value=' + val.student_id + '>' + val.student_identity_number + '</option>');
                            });
                        }
                    },
                    error: function(data, textStatus, message){
                        console.log("error");
                    }
                });
            } else {
                $('#result_deportment').val('');
                $('#result_batch').focus();
            }
    });

    $('#result_student_id').on('change', function (e) {
            var token = $('#_token').val();
            $.ajax({
                url: '{{ route('exam.list') }}',
                type: 'post',
                data: {_token: token},
                success: function (data) {
                    if(data.message === "success") {
                        $('#result_exam_id').find('option[value]').remove();
                        if(data.result.length) {
                            $("#result_exam_id").attr('disabled', false);
                            $("#result_exam_id").append('<option value="">--SELECT--</option>');
                        } else {
                            $("#result_exam_id").val('');
                            $("#result_exam_id").attr('disabled', true);
                        }
                        $.each(data.result, function (key, val) {
                            $("#result_exam_id").append('<option value=' + val.id + '>' + val.name + '</option>');
                        });
                    }
                },
                error: function(data, textStatus, message){
                    console.log("error");
                }
            });
    });

    $('#result_exam_id').on('change', function (e) {
            var token = $('#_token').val();
            var batch = $('#result_batch').val();
            var deportment = $('#result_deportment').val();
            var student_id = $('#result_student_id').val();
            var exam_id = $('#result_exam_id').val();
            $('.result_table').hide();
            $.ajax({
                url: '{{ route('result.getResult') }}',
                type: 'post',
                data: {_token: token, batch: batch, deportment: deportment, student_id: student_id, exam_id: exam_id  },
                success: function (data) {
                    console.log(data);
                    if(data.message === "success") {
                        if(data.result.length) {
                            $('.result_table').show();
                        }
                        $.each(data.result, function (key, val) {
                            var count = key + 1;
                            console.log(val.mark);
                            $('#body_exam_result').append('<tr><td>'+count+'</td><td>'+val.name+'</td><td>'+val.subject_code+'</td><td>'+val.mark+'</td></tr>')
                        });
                    }
                },
                error: function(data, textStatus, message){
                    console.log("error");
                }
            });
    });
</script>


