@extends('admin.admin-layout')
@section('admin_content')
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Brand</h4>
                </div>
                <div class="card-body">
                   <form action="{{ route('category.update',$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="brand-name">Category Name</label>
                                    <input type="text" id="name" class="form-control" value="{{ $data->name}}" placeholder="Brand Name" name="name" />
                                </div>
                                
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" value="{{ $data->image}}"  class="custom-file-input" id="customFile" >
                                        <label class="custom-file-label" for="customFile">Choose Category pic</label>
                                    </div>
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