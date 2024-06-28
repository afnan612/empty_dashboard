@extends('Admin.layouts.master')
@section('title')
    المشرفين
@stop

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    {{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">--}}
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    /*
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">*/

    /*<!-- Font-->*/
    <link href="https://db.onlinewebfonts.com/c/7712e50ecac759e968ac145c0c4a6d33?family=Droid+Arabic+Kufi"
          rel="stylesheet">
@endsection


@section('content')

    <!-- Start Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            {{--                                <h4 class="mb-sm-0 font-size-18">المشرفين</h4>--}}

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">المشرفين</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <button type="button" id="addBtn"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-plus me-1"></i> اضافة جديد
                                </button>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">

                                    <thead class="table-light">
                                    <tr>
                                        <th>id</th>
                                        <th>الاسم</th>
                                        <th>البريد الاكتروني</th>
                                        <th>الصورة</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td><img src="{{ asset($admin->image) }}" style="width: 80px;height:80px;border-radius: 50%"></td>
                                            <td>

                                                <a href="javascript:void(0);" class="text-info editBtn" data-id="{{ $admin->id }}"> <i class="mdi mdi-pencil font-size-18"></i></a>

                                                <a href="javascript:void(0);" class="text-danger delete" data-id="{{ $admin->id }}"><i class="mdi mdi-delete font-size-18"></i> </a>


{{--                                                <button id="editBtn" type="button"--}}
{{--                                                        class="btn btn-primary waves-effect waves-light editBtn"--}}
{{--                                                        data-id="{{ $admin->id }}">--}}
{{--                                                    <i class="mdi mdi-pencil d-block font-size-2"></i>--}}
{{--                                                </button>--}}

{{--                                                <button id="delete" type="button"--}}
{{--                                                        class="btn btn-danger waves-effect waves-light"--}}
{{--                                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop"--}}
{{--                                                        data-id="{{ $admin->id }}">--}}
{{--                                                    <i class="mdi mdi-trash-can d-block font-size-2"></i>--}}
{{--                                                </button>--}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ##### Add Modal ##### -->
                <div id="editOrCreate" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title"><span id="operationType"></span></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="modal-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).on('click', '#addBtn', function () {
            $('#operationType').text('اضافة')
            $('#editOrCreate').modal('show')
            $('#modal-body').load("{{route("admins.create")}}")

        });
    </script>

    <script>
        // Create New Data By Ajax
        $(document).on('submit', 'Form#addForm', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#addForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#addButton').html('<span style="margin-right: 4px;">انتظر ..</span><i class="bx bx-loader bx-spin"></i>');
                },
                complete: function (){
                    $('#addButton').html('اضافة');
                },
                success: function (data) {
                    if (data.status == 200) {
                        // $('#main-datatable').DataTable().ajax.reload(null, false);
                        // show custom message or use the default
                        toastr.success((data.message) ?? 'تم اضافة البيانات بنجاح');
                        // Reload the page after a delay
                        setTimeout(function () {
                            location.reload();
                        }, 2000); // Delay for 2 seconds before reloading
                    } else
                        toastr.error('عذرا هناك خطأ فني 😞');
                    $('#addButton').html('اضافة').attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value);
                                });
                            }
                        });
                    } else
                        toastr.error('عذرا هناك خطأ فني 😞');
                    $('#addButton').html("اضافة").attr('disabled', false);
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>


    <script>
        // Show Edit Modal
        $(document).on('click', '.editBtn', function () {
            var id = $(this).data('id');
            // $('#modal-body').html(loader)
            $('#operationType').text('تعديل');
            $('#editOrCreate').modal('show')
            var editUrl = "{{route("admins.edit",':id')}}";
            editUrl = editUrl.replace(':id', id)
            setTimeout(function () {
                $('#modal-body').load(editUrl)
            }, 500)
        });
    </script>

    <script>
        // Update Script using Ajax
        $(document).on('submit', 'Form#updateForm', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#updateForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#updateButton').html('<span style="margin-right: 4px;">انتظر ..</span><i class="bx bx-loader bx-spin"></i>');
                },
                complete: function (){
                    $('#updateButton').html('تحديث');
                },
                success: function (data) {
                    if (data.status == 200) {
                        // $('#main-datatable').DataTable().ajax.reload();
                        toastr.success((data.message) ?? 'تم تحديث البيانات بنجاح');
                    } else
                        toastr.error('عذرا هناك خطأ فني 😞');

                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value, 'Error');
                                });
                            }
                        });
                    } else
                        toastr.error('عذرا هناك خطأ فني 😞');
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>

    <script>
        // Show Delete SweetAlert & Delete Using Ajax
        $(document).on('click', '.delete', function () {
            var id = $(this).data('id');
            // swal.fire({
            //     title: "حذف بيانات",
            //     text: "هل انت متأكد من عملية حذف البيانات !",
            //     icon: "warning",
            //     showCancelButton: true,
            //     confirmButtonColor: "#dc5339",
            //     confirmButtonText: "نعم, احذف !",
            //     cancelButtonText: "تراجع",
            //     okButtonText: "اضافة",
            //     closeOnConfirm: false
            // }).then((result) => {
            //     if (!result.isConfirmed) {
            //         return true;
            //     }
            var csrfToken = "{{ csrf_token() }}";

            var url = '{{ route("admins.destroy",":id") }}';
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {
                    "X-CSRF-Token": csrfToken
                },
                beforeSend: function () {
                    $('#loader-overlay').show()
                },
                success: function (data) {

                    window.setTimeout(function () {
                        $('#loader-overlay').hide()
                        if (data.status == 200) {
                            toastr.success('تم حذف البيانات بنجاح')
                        } else if (data.status == 405) {
                            toastr.warning("لا يمكنك حذف الايميل المسجل به !")
                        } else {
                            toastr.error('عذرا هناك خطأ فني 😞');
                        }

                    }, 300);
                }, error: function (data) {

                    if (data.status === 500) {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value)
                                });
                            }
                        });
                    }
                }

            });
        });
    </script>
@endsection
