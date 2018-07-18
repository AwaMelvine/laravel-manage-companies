@if (Session::has('message'))
  <div class="alert <?php echo Session::has('alert-class') ? Session::get('alert-class') : '' ?>" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  		<span aria-hidden="true">×</span>
  	</button>
      {{ Session::get('message') }}
  </div>
@endif
