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
                                <i class="fas fa fa-users fa-2x text-gray-300"></i>
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
                                <i class="fas fa-eye fa-2x text-gray-300"></i>
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
                        <h6 class="m-0 font-weight-bold text-dark">محبوب ترین ها</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="reciter-leaderbord">
                            <thead class="table-dark">
                                <th class="text-center" scope="col">رتبه</th>
                                <th scope="col" class="text-center">نام قاری</th>
                                <th scope="col" class="text-center">تعداد بازدید ها</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-center">1</th>
                                    <td>
                                        <a href="">مشاری راشد العفاسی</a>
                                    </td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">2</th>
                                    <td>
                                        <a href="">عبدالستار سماک</a>
                                    </td>
                                    <td>150</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">3</th>
                                    <td>
                                        <a href="">رعد الکردی</a>
                                    </td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">4</th>
                                    <td>
                                        <a href="">محمود خلیل الحصری</a>
                                    </td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">5</th>
                                    <td>
                                        <a href="">عبدالباسط عبدالصمد</a>
                                    </td>
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
                        <h6 class="m-0 font-weight-bold text-dark">آمار بازدید ها</h6>
                    </div>
                    <div class="card-body py-5">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script defer src="{{ asset('assets/js/chart-line.js') }}"></script>
