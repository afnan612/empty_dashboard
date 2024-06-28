<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" />

<form id="updateForm" class="updateForm" action="{{ route('admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    {{ csrf_field() }}
    <div class="modal-body">
    <input type="hidden" name="id" value="{{  $admin->id}}">

        <div class="form-group">
            <label for="image">الصورة</label>

            <input type="file" class="dropify" name="image" data-default-file="{{getUserImage($admin->image)}}" accept="image/png, image/gif, image/jpeg,image/jpg" />
        </div>

    <div class="form-group">
        <label for="exampleInputEmail1">الاسم </label>
        <input type="text" class="form-control" id="slider_title" name="name" value="{{ $admin->name}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">الايميل</label>
        <input type="text" class="form-control" id="slider_description" name="email" value="{{$admin->email}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">كلمة المرور</label>
        <input type="text" class="form-control" id="slider_btn_text" name="password" value="" >
    </div>

{{--    <div class="form-group">--}}
{{--        <label >الصورة</label>--}}
{{--        <input type="file" class="form-control-file" name="image" value=" {{  $admin->image}}"  >--}}
{{--    </div>--}}
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>


