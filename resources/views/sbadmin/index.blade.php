<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EnerGaia Project</title>
  @include('sbadmin.partials.header-assets')

  @yield('custom-css')


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    @yield('menu')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('sbadmin.partials.topbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @if(session()->has('message'))
          <div class="row">
            <h1 class="alert alert-success text-center w-100">{{session()->get('message')}}</h1>
          </div>
          @endif

          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @include('sbadmin.partials.footer-assets')
  @yield('custom-js')



</body>

</html>
