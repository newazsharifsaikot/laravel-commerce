@extends("layouts.frontend.master")

@section("title")
    My Cart
@endsection

@section("css")

@endsection

@section("content")
    <div class="container my-4">
        @if($cartItems->count() > 0)
            <div class="card shadow p-3">
                @php $total = 0  @endphp
                @foreach($cartItems as $item)
                    <div class="card-body py-1">
                        <div class="row border p-1 align-items-center product_data">
                            <div class="col-md-2">
                                <img src="{{asset('uploads/images/product/'.$item->products->image)}}" alt="Product img" width="70" height="70">
                            </div>
                            <div class="col-md-4">
                                <h5><strong>{{$item->products->name}}</strong></h5>
                            </div>
                            <div class="col-md-2">
                                <h5>${{$item->products->selling_price}}</h5>
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" value="{{$item->product_id}}" class="product_id" name="product_id">
                                @if($item->products->quantity > $item->quantity)
                                    <label for="">Quantity</label>
                                    <div class="input-group text-center mb-3 d-flex align-items-center">
                                        <button class="input-group-text px-2 decrement_btn quantity_change">-</button>
                                        <input type="text" class="form-control text-center input_field quantity_input" name="quantity" value="{{$item->quantity}}" />
                                        <button class="input-group-text px-2 increment_btn quantity_change">+</button>
                                    </div>
                                    @php $total += $item->products->selling_price * $item->quantity  @endphp
                                    @else
                                    <h6>Out Of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 text-center">
                                <button class="btn btn-danger btn-sm delete_cart"><i class="fas fa-trash" style="cursor: pointer"></i> Remover</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="card-footer d-flex justify-content-between">
                    <h6 style="font-size: 20px"><strong>Total Price : $ {{$total}}</strong></h6>
                    <a href="{{route('checkout')}}" class="btn btn-success btn-md border-0">Proceed to Checkout</a>
                </div>
            </div>

            @else
            <h5 class="d-block bg-warning text-center text-white py-2">Cart is Empty</h5>

        @endif
    </div>
@endsection

@section("js")

@endsection