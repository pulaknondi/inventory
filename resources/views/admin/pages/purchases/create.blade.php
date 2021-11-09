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
                                    <option value="{{ $product->id}}">{{ $product->name}}({{$product->code}})</option>
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
                
                <form action="{{ route('purchases.store') }}" class="form" id="sellForm" method="post">
                    @csrf                  
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
                                                <th>Total</th>
                                                <th>Action</th>
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
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</section>
<!-- Select2 End -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type='text/javascript'>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(e){

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

      if(response['data'] != null){
         len = response['data'].length;
      }
  
      if(len > 0){
        for(var i=0; i<len; i++){
           var id = response['data'][i].id;
           var name = response['data'][i].name;
           var cost = response['data'][i].cost;
           var qty = response['data'][i].qty;
  
           var tr_str = "<tr id='"+id+"'>" +
             "<td align='center'><input type='hidden' name='pro_id[]' value='"+id+"'>" + (id) + "</td>" +
             "<td align='center'><input type='hidden' name='pro_name[]' value='"+name+"'>"+ name +"</td>" +
             "<td align='center'><input type='text' name='pro_cost[]' class='form-control' id='disabledInput"+id+"' readonly='readonly' value='" + cost + "' /></td>" +
             "<td align='center'><input type='hidden' value='"+qty+"'><span class='badge badge-pill badge-light-warning mr-1'>" + qty + "</span></td>" +
             "<td align='center'><div class='input-group'><button type='button' onclick='decrement("+id+")'>-</button><input type='text' id='quantity"+id+"'name='pro_qty[]'  class='form-control' value='1' data-bts-button-down-class='btn btn-success' data-bts-button-up-class='btn btn-success' /><button type='button' onclick='increment("+id+")'>+</button></div></td>" +
             "<td align='center'></td>" +
             "<td align='center'></td>" +
             "<td align='center'><input type='text' name='pro_total[]' class='form-control' id='total"+id+"' class='total"+id+"' readonly='readonly' value='"+(cost* 1)+"' /></td>" +
             "<td align='center'><button class='btn btn-outline-danger text-nowrap px-1' onclick='btnDelete("+id+")'><span>Delete</span></button></td>" +
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
   
   <script>

    function increment(id) {
       var quantity_field = "quantity"+id;
       var cost_field = "disabledInput"+id;
       var total_field = "total"+id;
       var quanitty = $("#"+quantity_field).val(parseInt($("#"+quantity_field).val()) + 1) ;
       var total_cost = parseInt($("#"+cost_field).val());
       var total_qnty =  parseInt(quanitty.val());
       var sum = total_cost*total_qnty;
       var total_input =parseInt($("#"+total_field).val(sum));
       return false;
    }
    function decrement(id) {
       var quantity_field = "quantity"+id;
       var cost_field = "disabledInput"+id;
       var total_field = "total"+id;
       var quanitty = $("#"+quantity_field).val(parseInt($("#"+quantity_field).val()) - 1) ;
       var total_cost = parseInt($("#"+cost_field).val());
       var total_qnty =  parseInt(quanitty.val());
       var sum = total_cost*total_qnty;
       var total_input =parseInt($("#"+total_field).val(sum));
       return false;
    }
    function btnDelete(id) {
       $("#" + id).remove();   
    }

   </script>

@endsection        