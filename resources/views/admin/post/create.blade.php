
@extends('layouts.admin_layout')


@section('title', 'Додати кейс')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-3">
        </div><!-- /.col -->
        <div class="col-sm-3">
          <h1 class="m-0">Додати кейс</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
        </div><!-- /.col -->
        <div class="col-sm-3">
        </div><!-- /.col -->
        </div><!-- /.col -->
      </div><!-- /.row -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9">
      @if (session('success'))
      <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
      </div>
      </div>
    </div>
  @endif

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9">
        <!-- general form elements -->
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
                <div class="form-group">
                    <label>Категорії</label>
                    <select name="cat_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                        @endforeach
                    </select>

                  </div>
                  <div class="form-group">
                    <textarea name="text" class="editor"></textarea>
                </div>
              </div>
                            </div>
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
  </section>
  <!-- /.content -->
