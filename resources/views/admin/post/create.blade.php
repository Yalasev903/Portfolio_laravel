@extends('layouts.admin_layout')

@section('title', 'Додати кейс')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3"></div><!-- /.col -->
            <div class="col-sm-3">
                <h1 class="m-0">Додати кейс</h1>
            </div><!-- /.col -->
            <div class="col-sm-3"></div><!-- /.col -->
            <div class="col-sm-3"></div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
                @endif

                <div class="card card-primary">
                    <!-- form start -->
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Назва</label>
                                <input type="text" name="title" class="form-control" placeholder="Введіть назву кейса">
                            </div>
                            <div class="form-group">
                                <label>Категорії</label>
                                <select name="cat_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label>Текст</label>
                                <textarea name="text" class="editor"></textarea>
                            </div>
                        </div> --}}
                        <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/zz5yzfkvutel7xxsey78ithzogwrudzczlqmwlyft73cupew/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    file_picker_callback : elFinderBrowser
  });
  function elFinderBrowser (callback, value, meta) {
    tinymce.activeEditor.windowManager.openUrl({
        title: 'File Manager',
        url: '/elfinder/tinymce5',
        /**
         * On message will be triggered by the child window
         *
         * @param dialogApi
         * @param details
         * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
         */
        onMessage: function (dialogApi, details) {
            if (details.mceAction === 'fileSelected') {
                const file = details.data.file;

                // Make file info
                const info = file.name;

                // Provide file and text for the link dialog
                if (meta.filetype === 'file') {
                    callback(file.url, {text: info, title: info});
                }

                // Provide image and alt text for the image dialog
                if (meta.filetype === 'image') {
                    callback(file.url, {alt: info});
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype === 'media') {
                    callback(file.url);
                }

                dialogApi.close();
            }
        }
    });
}
</script>
<textarea>
</textarea>

<div class="form-group">
    <label for="feature_image">Функції Зображення</label>
    <img src="" alt="" class="img-uploaded" style="display: block; width: 300px;">
    <input type="text" class="form-control" id="feature_image" name="feature_image" value="" readonly>
    <a href="" class="popup_selector btn btn-primary" data-inputid="feature_image">Додати адресу Зображення</a>
</div>
                        <!-- /.card-body -->


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Додати</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
</section>
<!-- /.content -->

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
@endsection
