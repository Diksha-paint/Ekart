@extends('layouts.style')

@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
                <h4>Your cart</h4>
                <div class="site-pagination">
                    <a href="">Home</a> /
                    <a href="">Your cart</a>
                </div>
            </div>
        </div>
        <!-- Page info end -->
	<!-- cart section end -->
	<section class="cart-section mb-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									
									<th class="product-th">Product</th>
									<th class="quy-th">Quantity</th>
									<th class="size-th">Size</th>
									<th class="total-th">Price</th>
									<th></th>
								</tr>
							</thead>
							
							<tbody>
								@foreach($items as $item)
									<tr>

										<td class="product-col">
											<img src="{{asset('storage/'.$item->model->image)}}" alt="">
											<div class="pc-title">
												<h4>{{ $item->name }}</h4>
												<p>${{ $item->model->price }}</p>
											</div>
										</td>
										<td class="quy-col">
											<div class="quantity">
												<a href="{{ route('carts.down', [$item->id, $item->quantity]) }}">-</a>
													<input type="text" value="{{$item->quantity}}">
												<a href="{{ route('carts.up', [$item->id, $item->quantity]) }}">+</a>
											</div>
										</td>
										<td class="size-col"><h4>{{ $item->attributes->size }}</h4></td>
										<td class="total-col"><h4>${{ $item->model->price * $item->quantity}}</h4></td>
										<td class="float-right">
											<form action="{{route('carts.destroy', $item->id)}}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit">X</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total <span>${{Cart::getTotal()}}</span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">					
					<a href="{{ route('checkout.index') }}" class="site-btn">Proceed to checkout</a>
					<a href="" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
		</div>
	</section>
    <!-- cart section end -->
    
    @section('scripts')
		<!--====== Javascripts & Jquery ======-->
		<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
		<script src="{{asset('js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
		<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('js/jquery-ui.min.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>
	@endsection

@endsection