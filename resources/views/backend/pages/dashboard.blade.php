@extends('backend.layout.app')
@section('content')

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
            <li class="breadcrumb-item"><a href="javascript:;">
                <ion-icon name="home-outline"></ion-icon>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">eCommerce</li>
            </ol>
        </nav>
        </div>
        <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-primary">Settings</button>
            <button type="button"
            class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                href="javascript:;">Action</a>
            <a class="dropdown-item" href="javascript:;">Another action</a>
            <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
        </div>
        </div>
    </div>
      <!--end breadcrumb-->
    <div class="row row-cols-12 row-cols-lg-12 row-cols-xxl-12">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                    <div>
                    <p class="mb-0 fs-6">Total Revenue</p>
                    </div>
                    <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                    <ion-icon name="wallet-outline"></ion-icon>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <div>
                    <h4 class="mb-0">$92,854</h4>
                    </div>
                    <div class="ms-auto">+6.32%</div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->


@endsection