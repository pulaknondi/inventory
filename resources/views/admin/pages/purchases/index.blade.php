@extends('admin.admin-layout')
@section('admin_content')
<!-- Filled Buttons start -->
<section id="basic-buttons">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- basic buttons -->
                    <div class="demo-inline-spacing">
                        <a href="{{route('product.create')}}">
                            <button type="submit" class="btn btn-primary" >Add Product</button>
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Filled Buttons end -->
<!-- Basic table -->
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Code</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Alert Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product): ?>
        <tr>
            <td>{{ $product->id}}</td>
            <td>{{ $product->name}}</td>
            <td><img alt="Photo" width="70" height="50" src="{{ asset('storage/image/'.$product->image) }}"></td>
            <td>{{ $product->code}}</td>
            <td>{{ $product->brand->name}}</td>
            <td>{{ $product->category->name}}</td>
            <td><?php  if($product->unit->base_unit == 1): echo "peice"; elseif($product->unit->base_unit == 2): echo "Meter"; else: echo "Kilogram"; endif ?></td>
            <td>{{ $product->price}}</td>
            <td>{{ $product->qty}}</td>
            <td>{{ $product->alert_quantity}}</td>
            <td><div class="dropdown">
            <button class="btn btn-sm btn-circle btn-outline-success btn-pill" data-toggle="dropdown">
                <i class="la la-cog"></i>Action
            </button>
                <div class="dropdown-menu dropdown-menu-right">
                 <a href="">   
                    <button type="submit" class="dropdown-item accept-item text-success"><i class="la la-check text-success"></i>Edit</button>
                </a>
                <a href="" class="dropdown-item text-info"><i class="la la-info text-info"></i>Delate</a>
            </div></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
 
@endsection        