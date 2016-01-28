$(document).ready(function(){
	$(document).on('change', '#js-select-client',function(){
		var client_id = $(this).val();
		
		if (client_id == '') {
			alert('Please select Client Name');
			return false;
		}
		$.ajax({
		  type: "POST",
		  url: $(this).data('route'),
		  data: {'client_id' : client_id},
		  success: function(result){
			  $('#js-select-product').html(result);
		  },
		  dataType: 'html'
		});
	});
	
	$(document).on('click', '#js-search',function(){
		search($(this).data('route'));
	});
	
	
});

function search(url) {
	var client_id = $('#js-select-client').val();
		var product_id = $('#js-select-product').val();
		var range = $('#js-select-range').val();
		
		if (client_id == '') {
			alert('Please select Client Name');
			return false;
		}
		
		
		$.ajax({
		  type: "POST",
		  url: url,
		  data: {'client_id' : client_id, 'product_id': product_id, 'range' : range},
		  success: function(result){
			  $('.js-search-result').html(result);
		  },
		  dataType: 'html'
		});
}