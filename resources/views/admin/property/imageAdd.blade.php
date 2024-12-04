@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/assets/vendors/summernote/summernote-lite.min.css">
@endsection

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
                        <h3>Thêm Ảnh </h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Ảnh</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- Hiển thị thông báo lỗi --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- Form thêm Ảnh --}}
                                <form action="{{ route('admin.property.images.store', $propertyId) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" type="file" id="image" name="image"
                                            accept="image/*" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm Ảnh</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
