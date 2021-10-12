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
                        <a href="{{route('brand.create')}}">
                            <button type="submit" class="btn btn-primary" >Add Brand</button>
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($brands as $brand): ?>
        <tr>
            <td>{{ $brand->id}}</td>
            <td>{{ $brand->name}}</td>
            <td><img alt="Photo" src="{{ asset('storage/image/'.$brand->image) }}"></td>
            <td><div class="dropdown">
            <button class="btn btn-sm btn-circle btn-outline-success btn-pill" data-toggle="dropdown">
                <i class="la la-cog"></i>Action
            </button>
                <div class="dropdown-menu dropdown-menu-right">
                 <a href="{{ route('brand.edit',$brand->id) }}">   
                    <button type="submit" class="dropdown-item accept-item text-success"><i class="la la-check text-success"></i>Edit</button>
                </a>
                <a href="" class="dropdown-item text-info"><i class="la la-info text-info"></i>Delate</a>
            </div></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
 
@endsection        