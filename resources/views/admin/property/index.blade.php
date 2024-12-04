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
                        <h3>Danh sách bất động sản</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách bất động sản</li>
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
                        <a href="{{ route('admin.property.show_add') }}" class="btn btn-primary">Thêm bất động sản</a>
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-1">Dự án</th>
                                    <th class="col-1">Loại BDS</th>
                                    <th class="col-2">Tên BDS</th>
                                    <th class="col-1">Giá (VND)</th>
                                    <th class="col-1">Tổng diện tích (m2)</th>
                                    <th class="col-3">Mô tả</th>
                                    <th class="col-1">Tình trạng</th>
                                    <th class="col-2">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                    <tr>
                                        <td>{{ $property->project->name }}</td>
                                        <td>{{ $property->propertyType->name }}</td>
                                        <td>{{ $property->name }}</td>
                                        <td>{{ round($property->price) }}</td>
                                        <td>{{ $property->area }}</td>
                                        <td>{{ $property->description }}</td>
                                        <td>
                                            <span
                                                class="badge
                                                @if ($property->status == 'available') bg-success
                                                @elseif($property->status == 'rented') bg-primary
                                                @else bg-secondary @endif">
                                                {{ ucfirst($property->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.property.images.index', $property->id) }}"
                                                class="btn btn-info">Kho ảnh</a>
                                            <a href="{{ route('admin.property.edit', $property->id) }}"
                                                class="btn btn-warning">Sửa</a>
                                            <a href="{{ route('admin.property.delete', $property->id) }}"
                                                class="btn btn-danger">Xóa</a>
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
