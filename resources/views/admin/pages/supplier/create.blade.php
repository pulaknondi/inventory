@extends('admin.admin-layout')
@section('admin_content')
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Supplier</h4>
                </div>
                <div class="card-body">
                   <form action="{{ route('unit.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-12">
                            
                                <div class="form-group">
                                    <label for="brand-name">Supplier Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Supplier Name" name="supplyer_name" />
                                </div>
                                <div class="form-group">
                                    <label for="brand-name">Company Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Company Name" name="company_name" />
                                </div>

                                <div class="form-group">
                                    <label for="brand-name">Email</label>
                                    <input type="text" id="name" class="form-control" placeholder="email" name="email" />
                                </div>

                                <div class="form-group">
                                    <label for="brand-name">Phone Number</label>
                                    <input type="text" id="name" class="form-control" placeholder="phone" name="phone" />
                                </div>

                                <div class="form-group">
                                    <label for="brand-name">Country</label>
                                    <input type="text" id="name" class="form-control" placeholder="country" name="country" />
                                </div>

                                <div class="form-group">
                                    <label for="brand-name">City</label>
                                    <input type="text" id="name" class="form-control" placeholder="city" name="city" />
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