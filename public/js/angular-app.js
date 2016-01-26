(function() {
    var module = angular.module('phonecatApp', []);

    module.controller('SearchController', function() {
		$('.search-text').keyup(function(){
    	var token = $('.token').val();
    	var dataString = '_token=' + token + '&term=' + $(this).val();

    	$.ajax({
				type: "GET",
				url: "/ajax/search/",
				data: dataString,
				success: function(response)
				{
					console.log(response);
				}
			});
    	});
	});
});