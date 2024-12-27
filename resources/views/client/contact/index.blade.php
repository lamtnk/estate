@extends('client.layouts.master')
@section('title')
    {{ 'Liên hệ' }}
@endsection
@section('main')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">Liên hệ</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="" id="contact1">
                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Address</h3>
                                <p>13/25 shibuia
                                    <br>Tokyo
                                    <br>45Y 73J
                                    <br>
                                    <strong>Japan</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> Call center</h3>
                                <p class="text-muted">This number is toll free if calling from
                                    Great Britain otherwise we advise you to use the electronic
                                    form of communication.</p>
                                <p><strong>+33 555 444 333</strong></p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                                <p class="text-muted">Please feel free to write an email to us or to use our electronic
                                    ticketing system.</p>
                                <ul>
                                    <li><strong><a href="mailto:">info@company.com</a></strong> </li>
                                    <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->
                        <hr>
                        <div id="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3728.1838167747796!2d106.66111007525208!3d20.86463998074394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjDCsDUxJzUyLjciTiAxMDbCsDM5JzQ5LjMiRQ!5e0!3m2!1svi!2s!4v1735315757515!5m2!1svi!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <hr>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h2>Biểu mẫu liên hệ</h2>
                        <form action="{{ route('client.contact.send') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="firstname">Tên của bạn</label>
                                        <input type="text" name="name" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Email</label>
                                        <input type="text" name="email" class="form-control" id="lastname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Nội dung</label>
                                        <textarea id="message" name="content" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gửi tin
                                        nhắn</button>
                                </div>
                            </div>
                            <!-- /.row -->
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
