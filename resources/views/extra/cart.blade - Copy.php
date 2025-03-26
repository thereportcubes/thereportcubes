@extends('layout/header')
@section('title','Cart')
@section('content')

<section class="mini-banner ">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="mb-0 mini-banner-title">Cart</h1>
         </div>
      </div>
   </div>
</section>

<section class="gray-bg-light pt-5 pb-5">
   <div class="container bg-white">
      <div class="row box-shadow px-4">

      @if (count((array) session('cart')) > 0 )
         <table id="cart" class="table table-hover table-condensed table-responsive">
            <thead>
               <tr>
                  <th style="width:40%">Product</th>
                  <th style="width:20%">Report Code /License Type</th>
                  <th style="width:10%">Price</th>
                  <th style="width:8%">Quantity</th>
                  <th style="width:17%" class="text-center">Subtotal</th>
                  <th style="width:5%"></th>
               </tr>
            </thead>
            <tbody>
               @php $total = 0 @endphp

               {{-- @php print_r(session('cart')); @endphp --}}

               @if(session('cart') )
                     @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                           <td data-th="Product">
                                 <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="{{ url('public/uploads/reports')}}/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                    <div class="col-sm-9">
                                       <h6 class="nomargin">{{ $details['name'] }}</h6>
                                    </div>
                                 </div>
                           </td>
                           <td data-th="Price">{{ $details['report_code'] }}
                           <select class="form-control form-select" id="sel1dataNew">
                              <option value="1610,3700,Excel Data Pack,add">Excel Data Pack</option>
                              <option value="4,850" selected="">Single User License</option>
                              <option value="1610,6000,Multi User License,add">Multi User License</option>
                              <option value="1610,7500,Enterprise License,add">Enterprise License</option>
                           </select>
                           </td>
                           <td data-th="Price">${{ $details['price'] }}</td>
                           <td data-th="Quantity">
                                 <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                           </td>
                           <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                           <td class="actions" data-th="">
                                 <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash"></i></button>
                           </td>
                        </tr>
                     @endforeach
                  
               @endif
            </tbody>
            <tfoot>
               <tr>
                  <td colspan="4" class="text-right">&nbsp;</td>
                  <td colspan="2" class="text-right"><h5><strong>Total ${{ $total }}</strong></h5></td>
               </tr>
               <tr>
                     <td colspan="3">&nbsp;</td>
                     <td colspan="3" class="text-right" >
                        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        <button class="btn btn-success">Checkout</button>
                     </td>
               </tr>
            </tfoot>
         </table>

         @else
         <div class="text-danger">
            Your Cart is empty. &nbsp;<a href="{{ url('/') }}" class="btn btn-primary"> Continue Shopping <i class="fa fa-angle-right"></i></a>
         </div>
         @endif


        </div>
    </div>
</section>

<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>

@endsection