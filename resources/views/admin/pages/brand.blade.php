@extends('admin.admin-layout')
@section('admin_content')
<div class="content-wrapper">
    <div class="content">							
        <div class="row">
			<div class="col-lg-8">
				<div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Create Brand</h2>
                    </div>
                    <div class="card-body">
                        <form >
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="name"  required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" placeholder="description" required>
                                    
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image"> 
                                </div>
                            </div>
                            
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection        