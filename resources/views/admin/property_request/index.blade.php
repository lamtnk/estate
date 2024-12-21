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
                        <h3>Danh sách yêu cầu khách hàng</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách yêu cầu khách hàng</li>
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
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-2">Bất Động Sản</th>
                                    <th class="col-1">Họ Tên</th>
                                    <th class="col-2">Địa chỉ Email</th>
                                    <th class="col-1">Số Điện Thoại</th>
                                    <th class="col-1">Thời gian</th>
                                    <th class="col-1">Loại yêu cầu</th>
                                    <th class="col-1">Mục đích mua</th>
                                    <th class="col-1">Hình thức thăm quan</th>
                                    <th class="col-2">Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($propertyRequests as $propertyRequest)
                                    <tr>
                                        <td>{{ $propertyRequest->property->name }}</td>
                                        <td>{{ $propertyRequest->name }}</td>
                                        <td>{{ $propertyRequest->email }}</td>
                                        <td>{{ $propertyRequest->phone }}</td>
                                        <td>{{ $propertyRequest->formatted_datetime }}</td>
                                        <td>
                                            {{ $propertyRequest->request_type == 'consultation' ? 'Tư vấn' : 'Thăm quan' }}
                                        </td>
                                        <td>
                                            @if ($propertyRequest->purpose == 'residential')
                                                Mua để ởở
                                            @elseif ($propertyRequest->purpose == 'investment')
                                                Mua để đầu tư
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($propertyRequest->visit_type == 'direct')
                                                Trải nghiệm thực tế
                                            @elseif ($propertyRequest->visit_type == 'video call')
                                                Call video trực tiếp
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $propertyRequest->message }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    @endsection
