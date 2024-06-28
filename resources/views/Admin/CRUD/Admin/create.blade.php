
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" />

<form id="addForm" class="addForm" action="{{ route('admins.store') }}" method="post"   enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-body">

        <div class="form-group">
            <label for="image">الصورة</label>
            <input type="file" class="dropify" name="image"  data-default-file="{{getUserImage()}}" accept="image/png, image/gif, image/jpeg,image/jpg" />        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">الاسم</label>
        <input type="text" class="form-control" id="slider_title" name="name" >
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">الايميل</label>
        <input type="text" class="form-control" id="slider_description" name="email">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">كلمة المرور</label>
        <input type="text" class="form-control" id="slider_btn_text" name="password">
    </div>
        <div class="mb-3 h-25">

    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="addButton">تاكيد</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>


