@extends('client.layouts.master')

@section('main')
    <!-- Body content -->
    <div class="content-area blog-page padding-top-40" style="background-color: #FCFCFC; padding-bottom: 55px;">
        <div class="container">
            <div class="row">
                <div class="blog-lst col-md-9">
                    @foreach ($news as $item)
                        <section class="post">
                            <div class="text-center padding-b-50">
                                <h2 class="wow fadeInLeft animated">{{ $item->title }}</h2>
                                <div class="title-line wow fadeInRight animated"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="author-category">
                                        Thuộc dự án <a href="#">{{ $item->Project->name }}</a> By <a
                                            href="#">{{ $item->User->name }}</a>
                                    </p>
                                </div>
                                <div class="col-sm-6 right">
                                    <p class="date-comments">
                                        <a href="#"><i class="fa fa-calendar-o"></i>
                                            {{ $item->published_at->format('F d, Y') }}</a>
                                        <a href="single.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                                    </p>
                                </div>
                            </div>
                            <div class="image wow fadeInLeft animated">
                                <a href="#">
                                    <img src="{{ url('assets/images/thumb') . '/' . $item->image }}" alt=""
                                        style="width: 100%; height: 350px;">
                                </a>
                            </div>
                            <p class="read-more">
                                <a href="{{ route('client.news.detail', ['id' => $item->id]) }}"
                                    class="btn btn-default btn-border"
                                    style="background-color: rgb(255, 255, 0); color: black;">Đọc thêm</a>
                            </p>
                        </section>
                    @endforeach
                    @if ($news instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="pagination-wrapper text-right" style="font-size: 1.2em; ">
                            {{ $news->appends(['tag' => $tagId ?? null])->links('pagination::bootstrap-4') }}
                        </div>
                    @endif
                </div>
                {{-- ASIDE-Right --}}
                <div class="blog-asside-right col-md-3">
                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Giới thiệu</h3>
                        </div>
                        <div class="panel-body text-widget">
                            <p>

                                Ngôi nhà nhỏ bên đồi, bao quanh bởi khu vườn xanh mát và tiếng chim hót, mang đến không gian
                                sống yên bình và thơ mộng. Từng chi tiết được chăm chút kỹ lưỡng, tạo nên cảm giác ấm áp và
                                gần gũi – một tổ ấm lý tưởng để tận hưởng cuộc sống.
                            </p>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu wow  fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tìm kiếm</h3>
                        </div>
                        <div class="panel-body">
                            <form role="search" action="{{ route('client.news.search') }}" method="GET">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Search" type="text" name="query">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-smal">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- TAGS --}}
                    <div class="panel sidebar-menu wow  fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Các thẻ</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="tag-cloud">
                                @foreach ($tags as $tag)
                                    <li><a href="{{ route('client.news.filterByTag', ['tag' => $tag->id]) }}"><i
                                                class="fa fa-tags"></i> {{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
