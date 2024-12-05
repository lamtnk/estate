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
                        <h3>Sửa tin tức</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Dự Án</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sửa tin tức</h4>
                            </div>
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

                                {{-- Form thêm dự án --}}
                                <form action="{{ route('admin.news.edit', $new->id )}}" 
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title', $new->title) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="published_at" class="form-label">Ngày đăng bài</label>
                                        <input type="date" class="form-control" id="published_at" name="published_at"
                                            value="{{ old('published_at', $new->published_at) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Hình ảnh (Bỏ trống nếu không muốn cập nhật ảnh)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="project_id">Chọn dự án</label>
                                        <select class="form-control" id="project_id" name="project_id">
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}"
                                                    {{ $project['id'] == $new['project_id'] ? 'selected' : '' }}>
                                                    {{ $project->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội Dung Chi Tiết</label>
                                        <div id="summernote" class="form-control">{{ old('content', $new->content) }}</div>
                                        <input type="hidden" id="content" name="content" value="{{ old('content') }}">
                                    </div>

                                    <input type="hidden" name="author_id" value="{{ $new->author_id }}">
                                    <button type="submit" class="btn btn-warning">Sửa Dự Án</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection

    @section('scripts')
        <script src="{{ url('') }}/assets/vendors/summernote/summernote-lite.min.js"></script>
        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 300,
                placeholder: 'Nhập nội dung chi tiết của dự án...',
                callbacks: {
                    onChange: function(contents, $editable) {
                        // Cập nhật giá trị của trường ẩn mỗi khi có thay đổi
                        $('#content').val(contents);
                    }
                }
            });

            // Trước khi submit form, đảm bảo nội dung Summernote được lưu vào trường ẩn
            $('form').on('submit', function() {
                var content = $('#summernote').summernote('code'); // Lấy nội dung HTML từ Summernote
                $('#content').val(content); // Gán nội dung vào trường ẩn
            });
        </script>
    @endsection
