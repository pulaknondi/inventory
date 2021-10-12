@extends('admin.admin-layout')
@section('admin_content')
 <!-- Basic multiple Column Form section start -->
 <section id="multiple-column-form">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('product.store')}}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-10">
                                <div class="form-group">
                                    <label for="first-name-column">Product Name</label>
                                    <input type="text" id="first-name-column" class="form-control" placeholder="Product Name" name="name" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Code</label>
                                    <input type="text" id="last-name-column" class="form-control" placeholder="Code" name="code" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="customSelect">Select Brand</label>
                                    <select class="custom-select" id="brand" name="brand">
                                        <option selected="">Open brand menu</option>
                                        <?php foreach($brands as $brand): ?>
                                        <option value="{{ $brand->id}}">{{ $brand->name}}</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="customSelect">Select Category</label>
                                    <select class="custom-select" id="category" name="category">
                                        <option selected="">Open category menu</option>
                                        <?php foreach($categories as $category): ?>
                                        <option value="{{ $category->id}}">{{ $category->name}}</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">Unit Id</label>
                                    <input type="text" id="company-column" class="form-control" name="unitid" placeholder="Unit id" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Cost</label>
                                    <input type="text" id="company-column" class="form-control" name="cost" placeholder="Cost" />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Price</label>
                                    <input type="text" id="company-column" class="form-control" name="price" placeholder="price" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Quantity</label>
                                    <input type="text" id="company-column" class="form-control" name="quantity" placeholder="Quantity" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Alert Quantity</label>
                                    <input type="text" id="company-column" class="form-control" name="alrt_qty" placeholder="Alert Quantity" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                <label for="email-id-column">Upload Image</label>
                                <div class="custom-file">
                                        <input type="file" name="image" class="form-control custom-file-input" id="customFile" >
                                        <label class="custom-file-label" for="customFile">Choose product pic</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Description</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="customSelect">Feature</label>
                                    <select class="custom-select" id="feature" name="feature">
                                        <option selected="">Open feature menu</option>
                                        <option value="1">yes</option>
                                        <option value="0">no</option>
                                    </select>
                                </div>
                            </div>                
                            
                            <div class="col-12">
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