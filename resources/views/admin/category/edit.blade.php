
@extends('layouts.admin_layout')


@section('title', 'Редагувати категорії')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-3">
        </div><!-- /.col -->
        <div class="col-sm-3">
          <h1 class="m-0">Редагувати категорії {{ $category['title'] }}</h1>
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
          <form action="{{ route('category.update', $category['id'] )}}" method="POST">
            @csrf
            @method('PUTS')
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Назва</label>
                <input type="text" value="{{ $category['title'] }}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введіть назву категорії" required>
              </div>
                            </div>
                   </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Відновити</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
</div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
