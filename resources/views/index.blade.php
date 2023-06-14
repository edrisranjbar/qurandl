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
                            <i class="fas fa-money-check fa-2x text-gray-300"></i>
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
                            <h6 class="font-weight-bold text-success mb-2">قرائت ها</h6>
                            <div class="ml-3 h6 mb-0 text-gray-800">
                                <span class="money">۱</span>
                                تومان
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-cash-register fa-2x text-gray-300"></i>
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
                            <h6 class="font-weight-bold text-info mb-2">لورم ایپسوم</h6>
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
                            <h6 class="font-weight-bold text-warning mb-2">وام های جاری</h6>
                            <div class="h6 mb-0 ml-3 text-gray-800">
                                ۱۲۳ </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
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
                    <h6 class="m-0 font-weight-bold text-primary">یادآوری های امروز</h6>
                </div>
                <div class="card-body">
                    لورم ایپسوم
                </div>
                <div class="d-block ml-auto mr-3 mb-3">
                    <a href="{{url('admin/reminder/installments')}}"
                        class="float-left ml-2 mt-2 btn btn-sm btn-outline-primary">
                        یادآوری اقساط پرداخت نشده
                    </a>
                    <a href="{{url('admin/reminder/membership')}}"
                        class="float-left ml-2 mt-2 btn btn-sm btn-outline-primary">
                        یادآوری حق عضویت های پرداخت نشده
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">آخرین واریزی ها</h6>
                </div>
                <div class="card-body">
                    <img src="images/empty.svg" class="w-50 d-block mx-auto">
                    <p class="text-center"> نتیجه ای یافت نشد</p>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">آخرین برداشت ها</h6>
                </div>
                <div class="card-body">
                    <img src="{{ url('/') }}/images/empty.svg" class="w-50 d-block mx-auto">
                    <p class="text-center"> نتیجه ای یافت نشد</p>
                </div>
            </div>
        </div>
    </div>

</div>
@stop