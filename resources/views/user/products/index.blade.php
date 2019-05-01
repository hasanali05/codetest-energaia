@extends('user.master')

@section('custom-css')

  <!-- Custom styles for this page -->
  <link href="{{ asset('/') }}/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right">
                <a href="{{ route('products.create') }}">Add product</a>
              </h6>
              <h6 class="m-0 font-weight-bold text-primary">Products with inventory</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Buying Price</th>
                      <th>Selling Price</th>
                      <th>Inventory</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Product Name</th>
                      <th>Buying Price</th>
                      <th>Selling Price</th>
                      <th>Inventory</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <th>{{ $product->name }}</th>
                      <th>{{ $product->buying_price }}</th>
                      <th>{{ $product->selling_price }}</th>
                      <th>{{ $product->inventories->sum('quantity') }}</th>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection

@section('custom-js')

  <!-- Page level plugins -->
  <script src="{{asset('/')}}/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('/')}}/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('/')}}/sbadmin/js/demo/datatables-demo.js"></script>
@endsection