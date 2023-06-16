@extends('layouts.master')
@section('title', 'داشبود')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid text-right">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h6 class="font-weight-bold text-primary mb-2">قاری ها</h6>
                                <div class="h6 ml-3 mb-0 text-gray-800">
                                    ۱۷
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa fa-microphone fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h6 class="font-weight-bold text-success mb-2">دانلود های امروز</h6>
                                <div class="ml-3 h6 mb-0 text-gray-800">
                                    <span>۱</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-download fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h6 class="font-weight-bold text-info mb-2">بازدید کنندگان امروز</h6>
                                <div class="h6 ml-3 mb-0 text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h6 class="font-weight-bold text-warning mb-2">بازدید های امروز</h6>
                                <div class="h6 mb-0 ml-3 text-gray-800">
                                    ۱۲۳ </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa fa-line-chart fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">محبوب ترین ها</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped shadow-sm" id="reciter-leaderbord">
                            <thead class="table-primary">
                                <th scope="col">رتبه</th>
                                <th scope="col">نام قاری</th>
                                <th scope="col">تعداد بازدید ها</th>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>mishary</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>rashid</td>
                                    <td>20fds0</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>rashid</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>rashid</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>rashid</td>
                                    <td>200</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">آمار بازدید ها</h6>
                    </div>
                    <div class="card-body py-5">
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
