var AJAX = (function () {
	
	var loading = $('.loading');
	
    function AJAX() {
    	
    }
    
    AJAX.prototype.getPage = function () {
    	var _this = this;
    	var li = $('#left-menu').find('li');
    	li.find('a').on("click", function(){
    		var href = $(this).attr('href');
    		loading.show();
    		li.addClass("active");
			li.siblings().removeClass("active");
    		$.when( $.ajax(href) ).then(function(data){
    			$('#ajax_content').html(data);
    			loading.hide();
    			_this.ckeditor('content');
    		});
    		return false;
    	});
    };
    
    AJAX.prototype.addPage = function () {
    	$('#add_page').submit(function() {
    		return false;
    	});
    };
    
    AJAX.prototype.ckeditor = function (field) {
    	CKEDITOR.replace( field );
    };
    
    return AJAX;
})();

var page = new AJAX();
page.getPage();