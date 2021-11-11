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
                         <div class="col-md-4 mb-1">
                            <select class="select2 form-control form-control-lg" id='supplier' name='supplier'>
                                <?php foreach($suppliers as $supplier): ?>
                                    <option value="{{ $supplier->id}}">{{ $supplier->name}}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <select class="select2 form-control form-control-lg" id='select2-search-container' name='search'>
                                <?php foreach($products as $product): ?>
                                    <option value="{{ $product->id}}">{{ $product->name}}({{$product->code}})</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
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
                    <div class="table-responsive">
                        <div class="offset-md-8 col-md-4">
                            <table class="table table-bordered">
                                <tbody>
                                    <th>Total Quantity</th>
                                    <th id="grnd_qty">1</th>
                                    <th>Grand Total</th>
                                    <th id="sum">0.00</th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <section id="multiple-column-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <hr>
                                    
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Order Tax</label>
                                                        <input type="text" id="order-tax" class="form-control" placeholder="Order Tax" name="order_tax">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Discount</label>
                                                        <input type="text" id="discount" class="form-control" placeholder="Discount" name="discount">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Shipping</label>
                                                        <input type="text" id="shipping" class="form-control" placeholder="Shipping" name="shipping">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="basicSelect">Status</label>
                                                        <select class="form-control" id="basicSelect" name="status">
                                                            <option value="1">recived</option>
                                                            <option value="2">pending</option>
                                                            <option value="3">ordered</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Amount</label>
                                                        <input type="text" id="amount" class="form-control" placeholder="Amount" name="amount">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="basicSelect">Payment Type</label>
                                                        <select class="form-control" id="basicSelect" name="pay_type">
                                                            <option value="1">Cash</option>
                                                            <option value="2">Card</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Note</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Note"></textarea>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                   
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
    var total_taka = 0;
    var grand_qty = 0;   
    function createRows(response){
        
        var len = 0;

        if(response['data'] != null){
            len = response['data'].length;
        }
  
        if(len > 0){
            
            for(var i=0; i<len; i++){
                var id    = response['data'][i].id;
                var name  = response['data'][i].name;
                var cost  = response['data'][i].cost;
                var qty   = response['data'][i].qty;
                var tr_str = "<tr id='"+id+"'>" +
                    "<td align='center'><input type='hidden' name='pro_id[]' value='"+id+"'>" + (id) + "</td>" +
                    "<td align='center'><input type='hidden' name='pro_name[]' value='"+name+"'>"+ name +"</td>" +
                    "<td align='center'><input type='text' name='pro_cost[]' class='form-control' id='disabledInput"+id+"' readonly='readonly' value='" + cost + "' /></td>" +
                    "<td align='center'><input type='hidden' value='"+qty+"'><span class='badge badge-pill badge-light-warning mr-1'>" + qty + "</span></td>" +
                    "<td align='center'><div class='input-group'><button type='button' onclick='decrement("+id+")'>-</button><input type='number' id='quantity"+id+"' name='pro_qty[]'  class='quantity form-control' value='1' data-bts-button-down-class='btn btn-success' data-bts-button-up-class='btn btn-success' /><button type='button' onclick='increment("+id+")'>+</button></div></td>" +
                    "<td align='center'></td>" +
                    "<td align='center'></td>" +
                    "<td align='center'><input type='text' name='pro_total[]' class='form-control' id='total"+id+"' class='total"+id+"' readonly='readonly' value='"+(cost* 1)+"' /></td>" +
                    "<td align='center'><button class='btn btn-outline-danger text-nowrap px-1' onclick='btnDelete("+id+")'><span>Delete</span></button></td>" +
                    "</tr>";
                
                    $("#product_tbl tbody").append(tr_str);
            }
          
           
            var value = $('#total'+id).val();
            total_taka += parseFloat(value);
            $('#sum').text(total_taka);

            var qty_value = $('#quantity'+id).val();
            grand_qty += parseInt(qty_value);
            $('#grnd_qty').text(grand_qty);

            }else{

            var tr_str = "<tr>" +
            "<td align='center'>No record found.</td>" +
            "</tr>";
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