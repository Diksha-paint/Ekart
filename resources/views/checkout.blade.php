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


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row border-secondary">
				<div class="col-lg-7 order-2 order-lg-1">
					<form class="checkout-form">
						<div class="cf-title text-center text-uppercase">Billing Address</div>
						<div class="row">
							<div class="col-md-6">
								<p>*Billing Information</p>
							</div>
							<div class="col-md-6">
								<div class="cf-radio-btns address-rb">
									<div class="cfr-item">
										<input type="radio" name="pm" id="one">
										<label for="one">Use my regular address</label>
									</div>
									<div class="cfr-item">
										<input type="radio" name="pm" id="two">
										<label for="two">Use a different address</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Address">
								<input type="text" placeholder="Address line 2">
								<input type="text" placeholder="Country">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Zip code">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone no.">
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-5 order-1 order-lg-2">
					
					<div class="checkout-cart">
					
						<h3>Your Cart</h3>
						
						<ul class="product-list">
							@foreach($items as $item)
								<li>
									<div class="pl-thumb"><img src="{{asset('storage/'.$item->model->image)}}" alt=""></div>
									<h6>{{$item->name}}</h6>
									<p>${{$item->price}}</p>
								</li>
							@endforeach
								<li>
									<h5 class="float-right">Total : ${{Cart::getTotal()}}</h5>
								</li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="row shipping-btns">
				<div class="col-lg-6">
					<div class="checkout-form">
					<div class="cf-title text-center text-uppercase">Payment</div>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="{{route('checkout.store')}}" id="payment-form" method="post">
								@csrf
								<div class="form-group">
									<label for="card-element">Credit or debit card</label>
									<div id ="card-element">
									<!-- A Stripe Element will be inserted here. -->
									</div>

								<!-- Used to display form errors. -->
									<div id="card-errors" role="alert"></div>
								</div>
								<button type="submit" class="site-btn submit-order-btn">Make Payment</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

	@section('css')
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/flaticon.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
	@endsection

	@section('scripts')
		<!--====== Javascripts & Jquery ======-->
		<script src="https://js.stripe.com/v3/"></script>
		<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
		<script src="{{asset('js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
		<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('js/jquery-ui.min.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>

		<script>
			(function(){
				// Create a Stripe client.
			var stripe = Stripe('pk_test_dtlQR5tbYtVXZAtcqKYFHItS00IxAyF3Xf');

			// Create an instance of Elements.
			var elements = stripe.elements();

			// Custom styling can be passed to options when creating an Element.
			// (Note that this demo uses a wider set of styles than the guide below.)
			var style = {
			base: {
				color: '#32325d',
				fontFamily: '"Poppins", Arial, sans-serif',
				fontSmoothing: 'antialiased',
				fontSize: '16px',
				'::placeholder': {
				color: '#aab7c4'
				}
			},
			invalid: {
				color: '#fa755a',
				iconColor: '#fa755a'
			}
			};

			// Create an instance of the card Element.
			var card = elements.create('card', {
				style: style,
				hidePostalCode: true
			});

			// Add an instance of the card Element into the `card-element` <div>.
			card.mount('#card-element');

			// Handle real-time validation errors from the card Element.
			card.addEventListener('change', function(event) {
			var displayError = document.getElementById('card-errors');
			if (event.error) {
				displayError.textContent = event.error.message;
			} else {
				displayError.textContent = '';
			}
			});

			// Handle form submission.
			var form = document.getElementById('payment-form');
			form.addEventListener('submit', function(event) {
			event.preventDefault();

			stripe.createToken(card).then(function(result) {
				if (result.error) {
				// Inform the user if there was an error.
				var errorElement = document.getElementById('card-errors');
				errorElement.textContent = result.error.message;
				} else {
				// Send the token to your server.
				stripeTokenHandler(result.token);
				}
			});
			});

			// Submit the form with the token ID.
			function stripeTokenHandler(token) {
			// Insert the token ID into the form so it gets submitted to the server
			var form = document.getElementById('payment-form');
			var hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('name', 'stripeToken');
			hiddenInput.setAttribute('value', token.id);
			form.appendChild(hiddenInput);

			// Submit the form
			form.submit();
			}
			})();
		</script>
	@endsection


@endsection