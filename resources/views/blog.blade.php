@extends('layouts.style')
@section('content')
    	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category Page</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="./category.html"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="{{ asset('storage/'. $product->image) }}" alt="No Image found">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="{{ asset('storage/'. $product->image) }}">
								<img src="{{ asset('storage/'. $product->image) }}" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">{{$product->name}}</h2>
					<h3 class="p-price">Rs. {{$product->price}}</h3>
					<h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href="#reviews">Add your review</a>
					</div>
					<form action="{{route('carts.store')}}" method="POST">
						@csrf
						<input type="hidden" name="product_id" value="{{$product->id}}">
						<div class="fw-size-choose">
							<p>Size</p>
							<div class="sc-item">
								<input type="radio" name="size" id="xs-size" value="32" checked>
								<label for="xs-size">32</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="size" id="s-size" value="34">
								<label for="s-size">34</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="size" id="m-size" value="36">
								<label for="m-size">36</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="size" id="l-size" value="38">
								<label for="l-size">38</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="size" id="xl-size" value="40">
							</div>
							<div class="sc-item">
								<input type="radio" name="size" id="xxl-size" value="42">
								<label for="xxl-size">42</label>
							</div>
						</div>
						<div class="quantity">
							<p>Quantity</p>
							<div class="pro-qty">
								<input type="text" name="quantity" value="1">
							</div>
						</div>
						<button type="submit" class="site-btn">Add To Cart</button>
				    </form>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
									<p>Approx length 66cm/26" (Based on a UK size 8 sample)</p>
									<p>Mixed fibres</p>
									<p>The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5'8"</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="/img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->
	<section class="related-product-section" id="reviews">
		<div class="container">
			<div class="section-title">
				<h2>REVIEWS</h2>
			</div>

			<div class="">
				@foreach($product->reviews as $review)
					{!! $review->review !!}
				@endforeach
			</div>
		    <div>
				<form action="{{route('reviews.store', $product->slug)}}" method="POST">
					@csrf
					<div class="form-group">
						<input id='x' type="hidden" name="review">
						<trix-editor input="x" ></trix-editor>
					</div>
					<button class="btn btn-primary" type="submit">Add Review</button>
				</form>
			</div>
		</div>
	
	</section>

	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				<div class="product-item">
					<div class="pi-pic">
						<img src="/img/product/1.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<img src="/img/product/2.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="/img/product/3.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="/img/product/4.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="/img/product/6.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->

	@section('css')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
	@endsection

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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
	@endsection

	@endsection

	