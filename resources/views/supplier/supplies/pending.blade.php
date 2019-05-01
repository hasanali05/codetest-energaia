@extends('supplier.master')

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
                      <th>Supplier Name</th>
                      <th>Quantity</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Product Name</th>
                      <th>Supplier Name</th>
                      <th>Quantity</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($supplies as $supply)
                    <tr>
                      <th>{{ $supply->product->name }}</th>
                      <th>{{ $supply->supplier->name }}</th>
                      <th>{{ $supply->quantity }}</th>
                      @if($supply->status == "supplied")
                      <th><span class="px-1 py-1 bg-gradient-warning text-white">{{ $supply->status }}</span></th>
                      @elseif($supply->status == "received")
                      <th><span class="px-1 py-1 bg-gradient-success text-white">{{ $supply->status }}</span></th>
                      @else
                      <th><span class="px-1 py-1 bg-gradient-danger text-white">{{ $supply->status }}</span></th>
                      @endif
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