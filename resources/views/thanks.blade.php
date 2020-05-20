@extends('layouts.style')
@section('content')

<div class="card-header">
    <h2>Thanks!</h2>
</div>
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