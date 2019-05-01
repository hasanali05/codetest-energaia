@extends('supplier.master')

@section('custom-css')

@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <!-- Dropdown Card Example -->
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add Supply</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <form class="form-horizontal" action="{{ route('supplier.store') }}" method="POST" >
          {{ csrf_field() }}
          <div class="form-group row {{ $errors->has('product_id') ? ' has-danger' : '' }}">
              <label for="inputHorizontalDnger" class="col-sm-3 col-form-label">Product name</label>
              <div class="col-sm-9">
                  <select class="form-control" name="product_id">
                      <option value="">--- Select Product Name---</option>
                      @foreach($products as $product)
                          <option value="{{ $product->id }}">{{ $product->name }}</option>
                      @endforeach
                  </select>
                  @if ($errors->has('product_id'))
                  @foreach($errors->get('product_id') as $error)
                  <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach
                  @endif
              </div>
          </div>
          <div class="form-group row {{ $errors->has('quantity') ? ' has-danger' : '' }}">
              <label for="inputHorizontalDnger" class="col-sm-3 col-form-label">Product quantity</label>
              <div class="col-sm-9">
                  <input type="number" class="form-control form-control-danger" placeholder="Product quantity" name="quantity" value="{{ old('quantity') }}" min="1">
                  @if ($errors->has('quantity'))
                  @foreach($errors->get('quantity') as $error)
                  <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach
                  @endif
              </div>
          </div>
          <div class="col-md-12 m-b-20 text-right">    
              <button type="submit" class="btn btn-primary waves-effect">Add Supply</button> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom-js')
@endsection