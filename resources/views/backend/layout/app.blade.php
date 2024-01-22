<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
  <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>

  <!--plugins-->
  <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200') }}"/>
  <link href="{{ asset('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap') }}" rel="stylesheet">

  <!--Theme Styles-->
  <link href="{{ asset('backend/assets/css/dark-theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/semi-dark.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/header-colors.css') }}" rel="stylesheet" />
  <!--custom -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/custom/toastify.min.css') }}">
  <link href="{{asset('backend/assets/css/custom/dataTables.min.css')}}" rel="stylesheet"/>

  <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom/jquery.dataTables.min.js')}}"></script>

  <script src="{{ asset('backend/assets/js/custom/toastify-js.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom/axios.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom/config.js') }}"></script>


  <title>Fobia - Bootstrap5 Admin Template</title>
</head>

<body>
  <!--start wrapper-->
  <div class="wrapper">
    <div id="loader" class="LoadingOverlay d-none">
      <div class="Line-Progress">
          <div class="indeterminate"></div>
      </div>
    </div>
    <!--start sidebar -->
    @include('backend.layout.sidebar')
    <!--end sidebar -->

    <!--start top header-->
    @include('backend.layout.top-header')
    <!--end top header-->


    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">
            @yield('content')
      </div>
      <!-- end page content-->
    </div>
    <!--end page content wrapper-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
      <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
      <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <ion-icon name="color-palette-outline" class="me-0"></ion-icon>
      </button>
      <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <h6 class="mb-0">Theme Variation</h6>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
            <label class="form-check-label" for="LightTheme">Light</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
            <label class="form-check-label" for="DarkTheme">Dark</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option3">
            <label class="form-check-label" for="SemiDark">Semi Dark</label>
          </div>
          <hr />
          <h6 class="mb-0">Header Colors</h6>
          <hr />
          <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
              <div class="col">
                <div class="indigator headercolor1" id="headercolor1"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor2" id="headercolor2"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor3" id="headercolor3"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor4" id="headercolor4"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor5" id="headercolor5"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor6" id="headercolor6"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor7" id="headercolor7"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor8" id="headercolor8"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--end switcher-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

  </div>
  <!--end wrapper-->


  <!-- JS Files-->
  <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script type="module" src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js') }}"></script>
  <!--plugins-->
  <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/index.js') }}"></script>
  <!-- Main JS-->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>
</body>
</html>