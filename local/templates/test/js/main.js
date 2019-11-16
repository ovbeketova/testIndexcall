$( document ).ready(function() {
   $('#product [name="action"]').change(function() {
		val=$(this).val();
		$('#product').find('[data-action]').hide();
		$('#product').find('[data-action*='+val+']').show();
	});
	$('#product [name="action"]').change();
	
	$('#product').submit(function() {
		var formData = new FormData(document.getElementById('product'));
		var formAction=$(this);
		$.ajax({
			dataType: 'json',
			type: 'POST',
			url:  '/ajax/action.php',
			processData: false,
			contentType: false,
			data: formData,
			success: function(res) {
				if(res.status=='success'){
					formAction.append('<div class="success">'+res.res+'</div>');
				}else{
					formAction.append('<div class="error">'+res.error+'</div>');
				}		
			}
		  });
	  return false;
	});
});