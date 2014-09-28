define(['knockout', 'jquery'], function(ko, $){
	
	var refill = {
		tabs:function(elem){
			var self = this;
			$(elem).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
			$(elem).on('click', 'li > a', function(event){
				if (!$(this).hasClass('is-active'))
				{
					event.preventDefault();
					var accordionTabs = $(this).closest('.accordion-tabs');
					accordionTabs.find('.is-open').removeClass('is-open').hide();
				
					$(this).next().toggleClass('is-open').toggle();
					accordionTabs.find('.is-active').removeClass('is-active');
					$(this).addClass('is-active');
				}
				else
				{
					event.preventDefault();
				}
			});
		}
	};
	
	
	return refill;
	
});