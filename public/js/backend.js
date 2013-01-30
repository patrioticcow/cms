var AJAX = (function () {
	
	var loading = $('.loading');
	
    function AJAX() {
        
    }
    
    AJAX.prototype.getPage = function () {
    	var li = $('#left-menu').find('li');
    	li.find('a').on("click", function(){
    		var href = $(this).attr('href');
    		console.log(href);
    		loading.show();
    		li.addClass("active");
			li.siblings().removeClass("active");
    		$.when( $.ajax(href) ).then(function(data){
    			$('#ajax_content').html(data);
    			loading.hide();
    		});
    		return false;
    	});
    	
    };
    
    return AJAX;
})();

var page = new AJAX();
page.getPage();