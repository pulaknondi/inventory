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
                            <select class="select2 form-control form-control-lg" id='select2-search-container' name='search'>
                                <?php foreach($products as $product): ?>
                                <option value="{{ $product->id}}">{{ $product->name}}</option>
                                <?php endforeach; ?>
                            </select>
                                 
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="needs-validation">
                                <input type="submit" id="but_search" value='Search' class="btn btn-primary waves-effect waves-float waves-light">
                            </div>
                        </div> 
                    </div>
                </div>
                

                 <!-- Bordered table start -->
                 <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="product_tbl">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Net Unit Cost</th>
                                            <th>Stock</th>
                                            <th>Qty</th>
                                            <th>Discount</th>
                                            <th>Tax</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered table end -->
            </div>
        </div>
    </div>
</section>
<!-- Select2 End -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type='text/javascript'>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $('#but_search').click(function(){
        var pro_id = Number($('#select2-search-container option:selected').val());
        if(pro_id > 0){

           $.ajax({
              url: 'getProbyid',
              type: 'post',
              data: {_token: CSRF_TOKEN, pro_id: pro_id},
              dataType: 'json',
              success: function(response){
                 createRows(response);
              }
           });
        }
      });

   });


    function createRows(response){
      var len = 0;
      $('#product_tbl tbody').empty();
      if(response['data'] != null){
         len = response['data'].length;
      }
  
      if(len > 0){
        for(var i=0; i<len; i++){
           var id = response['data'][i].id;
           var name = response['data'][i].name;
           var cost = response['data'][i].cost;
           var qty = response['data'][i].qty;
          
           var tr_str = "<tr>" +
             "<td align='center'>" + (i+1) + "</td>" +
             "<td align='center'>" + name + "</td>" +
             "<td align='center'>" + cost + "</td>" +
             "<td align='center'><span class='badge badge-pill badge-light-warning mr-1'>" + qty + "</span></td>" +
             "<td align='center'><div class='input-group'><input type='text' class='touchspin-color' value='1' data-bts-button-down-class='btn btn-success' data-bts-button-up-class='btn btn-success' /></div></td>" +
             "<td align='center'></td>" +
             "<td align='center'></td>" +
           "</tr>";
           $("#product_tbl tbody").append(tr_str);
        }

      }else{
         var tr_str = "<tr>" +
           "<td align='center'>No record found.</td>" +
         "</tr>";

         $("#product_tbl tbody").append(tr_str);
      }
    } 
   </script>
  
@endsection        