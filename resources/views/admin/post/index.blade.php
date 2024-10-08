@extends('layouts.admin_layout')

@section('title', 'Усі кейси')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <h1 class="m-0">Усі кейси</h1>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 30%">Кейс</th>
                                    <th style="width: 30%">Категорія</th>
                                    <th style="width: 30%">Дата додавання кейсу</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post['id'] }}</td>
                                    <td>{{ $post['title'] }}</td>
                                    <td>{{ $post->category['title'] }}</td>
                                    <td>{{ $post['created_at'] }}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post['id']) }}">
                                            <i class="fas fa-pencil-alt"></i> Редагувати
                                        </a>
                                        <form action="{{ route('post.destroy', $post['id']) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                <i class="fas fa-trash"></i> Видалити
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
