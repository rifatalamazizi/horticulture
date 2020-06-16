<!-- Plugins JS File -->
<script src="{{ asset('public/frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.hoverIntent.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/superfish.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.plugin.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.countdown.min.js')}}"></script>

<!-- Main JS File -->
<script src="{{ asset('public/frontend/assets/js/main.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/demos/demo-13.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.elevateZoom.min.js')}}"></script>


<!-- Add to cart AJAX alertify JS start -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- Real Time Add to Cart -->
<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	function addToCart(product_id){
		var url = "{{ url('/') }}";
		$.post( url+"/api/carts/store", 
			{ 
				product_id: product_id 
			})
		  .done(function( data ) {
		  	data = JSON.parse(data);
		    if(data.status == 'success'){
		    	// toast
		    	alertify.set('notifier','position', 'top-right'); // top-center , top-left, bottom-right, bottom-center, bottom-left
				alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
  
		    	$("#totalItems").html(data.totalItems);
		    }
		  });
	}
</script>

<!-- Add to cart AJAX alertify JS end -->