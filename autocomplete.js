$(document).ready(function() {
	$("#searchcustomers").keyup(function() {
		$.get("customsuggest2.php", {searchname: $(this).val()}, function(data){
		
			$("#Customers").html(data);
			
		});	
		
	});
	
});