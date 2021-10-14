@extends('admin.admin-layout')
@section('admin_content')
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Unit</h4>
                </div>
                <div class="card-body">
                   <form action="{{ route('unit.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-12">
                            
                                <div class="form-group">
                                    <label for="brand-name">Unit Code</label>
                                    <input type="text" id="name" class="form-control" placeholder="Unit Code" name="unit_code" />
                                </div>
                                <div class="form-group">
                                    <label for="brand-name">Unit Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Unit Name" name="unit_name" />
                                </div>
                                <div class="form-group">
                                    <label for="brand-name">Base Unit</label>
                                    <label for="customSelect">Select Brand</label>
                                    <select class="custom-select" id="base_unit" name="base_unit">
                                        <option selected="">Chose Base Unit</option>
                                        <option value="1">peice</option>
                                        <option value="2">Meter</option>
                                        <option value="3">Kilogram</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="brand-name">Operator</label>
                                    <select class="custom-select" id="base_operator" name="base_operator">
                                        <option selected="">Chose Base Operator</option>
                                        <option value="1">Multiply(*)</option>
                                        <option value="2">Devide(/)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="brand-name">Operation Value</label>
                                    <input type="text" id="name" class="form-control" placeholder="operation value" name="operation_value" />
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 
 <!-- Basic Floating Label Form section end -->
@endsection        