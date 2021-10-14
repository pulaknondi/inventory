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
                        <a href="{{route('unit.create')}}">
                            <button type="submit" class="btn btn-primary" >Add Unit</button>
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
            <th>Unit Code</th>
            <th>Unit Name</th>
            <th>Base Unit</th>
            <th>Operator</th>
            <th>Operator Value</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  if($units != null): ?>
        <?php foreach($units as $unit): ?>
        <tr>
            <td>{{ $unit->id}}</td>
            <td>{{ $unit->unit_code}}</td>
            <td>{{ $unit->unit_name}}</td>
            <td><?php  if($unit->base_unit == 1): echo "peice"; elseif($unit->base_unit == 2): echo "Meter"; else: echo "Kilogram"; endif ?></td>
            <td> <?php  if($unit->operator == 1): echo "*"; elseif($unit->operator == 2): echo "/"; else: echo "null"; endif ?></td>
            <td>{{ $unit->operation_value}}</td>
            <td><div class="dropdown">
            <button class="btn btn-sm btn-circle btn-outline-success btn-pill" data-toggle="dropdown">
                <i class="la la-cog"></i>Action
            </button>
                <div class="dropdown-menu dropdown-menu-right">
                 <a href="{{ route('unit.edit',$unit->id) }}">   
                    <button type="submit" class="dropdown-item accept-item text-success"><i class="la la-check text-success"></i>Edit</button>
                </a>
                <a href="" class="dropdown-item text-info"><i class="la la-info text-info"></i>Delate</a>
            </div></td>
        </tr>
        <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>
 
@endsection        