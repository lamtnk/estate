@extends('client.layouts.master')

@section('main')
    <div class="content-area blog-page padding-top-40" style="background-color: #FCFCFC; padding-bottom: 55px;">
        <div class="container">
            <div class="row">
                <div class="blog-lst col-md-9 p0">
                    <section id="id-100" class="post single">

                        <div class="post-header single">
                            <div class="">
                                <h2 class="wow fadeInLeft animated">{{ $new->title }}</h2>
                                <div class="title-line wow fadeInRight animated"></div>
                            </div>
                            <div class="row wow fadeInRight animated">
                                <div class="col-sm-6">
                                    <p class="author-category">
                                        Thuộc dự án <a href="#">{{ $new->Project->name }}</a> By <a
                                            href="#">{{ $new->User->name }}</a>
                                    </p>
                                </div>
                                <div class="col-sm-6 right">
                                    <p class="date-comments">
                                        <a href="single.html"><i class="fa fa-calendar-o"></i>
                                            {{ $new->published_at->format('F d, Y') }}</a>
                                        <a href="single.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                                    </p>
                                </div>
                            </div>
                            <div class="image wow fadeInRight animated">
                                <img src="{{ url('assets/images/thumb') . '/' . $new->image }}" alt=""
                                    style="width: 100%; height: 350px;">
                            </div>
                        </div>

                        <div id="post-content" class="post-body single wow fadeInLeft animated">
                            <p>
                                {{ $new->content }}
                            </p>
                        </div>
                        <div class="post-footer single wow fadeInBottum animated">
                            <ul class="pager">
                                <li class="previous"><a href="#"><i class=""></i>← Older </a></li>
                                <li class="next disabled"><a href="#">Newer →<i class=""></i> </a></li>
                            </ul>
                        </div>

                    </section>
                    {{-- Comment --}}
                    <section id="comments" class="comments wow fadeInRight animated">
                        <h4 class="text-uppercase wow fadeInLeft animated">3 comments</h4>


                        <div class="row comment">
                            <div class="col-sm-3 col-md-2 text-center-xs">
                                <p>
                                    <img src="assets/img/client-face1.png" class="img-responsive img-circle" alt="">
                                </p>
                            </div>
                            <div class="col-sm-9 col-md-10">
                                <h5 class="text-uppercase">Julie Alma</h5>
                                <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2011 at 12:00 am</p>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                    egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                    Donec eu libero sit amet quam egestas semper.
                                    Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                                </p>
                            </div>
                        </div>
                        <!-- /.comment -->


                        <div class="row comment last">

                            <div class="col-sm-3 col-md-2 text-center-xs">
                                <p>
                                    <img src="assets/img/client-face2.png" class="img-responsive img-circle" alt="">
                                </p>
                            </div>

                            <div class="col-sm-9 col-md-10">
                                <h5 class="text-uppercase">Louise Armero</h5>
                                <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2012 at 12:00 am</p>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                    egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                    Donec eu libero sit amet quam egestas semper.
                                    Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                                </p>
                            </div>

                        </div>
                        <!-- /.comment -->
                    </section>
                    {{-- Form Comment --}}
                    <section id="comment-form" class="add-comments">
                        <h4 class="text-uppercase wow fadeInLeft animated">Để lại bình luận</h4>
                        <form>
                            <div class="row wow fadeInLeft animated">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Tên <span class="required">*</span>
                                        </label>
                                        <input class="form-control" id="name" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row wow fadeInLeft animated">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="required">*</span>
                                        </label>
                                        <input class="form-control" id="email" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row wow fadeInLeft animated">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="comment">Bình luận <span class="required">*</span>
                                        </label>
                                        <textarea class="form-control" id="comment" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row wow fadeInLeft animated">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary"><i class="fa fa-comment-o"></i>Gửi phản hồi</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>


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

                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Gợi ý các mẫu</h3>
                        </div>
                        <div class="panel-body recent-property-widget">
                            <ul>
                                @foreach ($properties as $item)
                                    <li>
                                        <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                            <a href="single.html"><img
                                                    src="{{ url('assets/images/thumb') . '/' . $item->primaryImage->image_path }}"></a>
                                            <span class="property-seeker">
                                                <b class="b-1">A</b>
                                                <b class="b-2">S</b>
                                            </span>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                            <h6> <a href="single.html">{{ $item->name }} </a></h6>
                                            <span class="property-price">{{ $item->price }} $</span>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>


                    <div class="panel sidebar-menu wow  fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Các thẻ</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="tag-cloud">
                                @foreach ($new->tags as $tag)
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
