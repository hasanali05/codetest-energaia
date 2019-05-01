@extends('user.master')

@section('custom-css')

  <!-- Custom styles for this page -->
  <link href="{{ asset('/') }}/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Inventory</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Type</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($inventories as $inventory)
                    <tr>
                      <th>{{ $inventory->product->name }}</th>
                      <th>{{ $inventory->quantity }}</th>
                      <th>{{ $inventory->status }}</th>
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