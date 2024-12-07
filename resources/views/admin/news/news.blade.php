@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Tin tức</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách dự án</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <a href="{{ route('admin.news.show_add') }}" class="btn btn-primary">Thêm tin tức</a>
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-2">Tiêu đề</th>
                                    <th class="col-2">Ảnh</th>
                                    <th class="col-2">Thuộc dự án</th>
                                    <th class="col-2">Người đăng bài</th>
                                    <th class="col-2">Ngày xuất bản</th>
                                    <th class="col-2">Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($news as $new)
                                    <tr>
                                        <td>{{ $new->title }}</td>
                                        <td class="text-center"><img src="{{ url('assets/images/thumb') . '/' . $new->image }}" alt="" style="width: 150px; height: auto;"></td>
                                        <td>{{ $new->Project->name }}</td>
                                        <td>{{ $new->User->name }}</td>
                                        <td>{{ $new->published_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.news.show_edit', ['id' => $new->id]) }}" class="btn btn-info">Sửa</a>
                                            <a href="{{ route('admin.news.delete', ['id' => $new->id]) }}"
                                                class="btn btn-warning">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    @endsection
