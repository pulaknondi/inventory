@extends('admin.admin-layout')
@section('admin_content')

<!-- Select2 Start  -->
<section class="basic-select2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Purchases</h4>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <select class="select2 form-control form-control-lg">
                                <?php foreach($products as $product): ?>
                                <option value="{{ $product->id}}">{{ $product->name}}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="needs-validation">
                                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Add</button>
                            </div>
                        </div> 
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Select2 End -->
<!-- Basic Floating Label Form section end -->
<script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endsection        