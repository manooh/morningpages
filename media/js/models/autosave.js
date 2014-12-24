define(['jquery'],function($){
	
	var autosave = function(element){
		var self = this;
		
		self.element = element;
		self.content = self.element.val();
		
		self.get = function(){
			return $.getJSON('/ajax/write/getautosave',function(reply){
				self.content = reply.content;
			});
		};
		
		self.savetimer = setInterval(function(){
			self.save();
		}, 10000);
		
		self.save = function(){
			var newcontent = self.element.val();
			if(newcontent && newcontent.length > 1 && newcontent != self.content)
			{
				self.content = newcontent;
				$.post('/ajax/write/autosave',{
					'content':self.content
				}, function(reply){
					
				},'json');
			}
		};
		
	};
	
	return autosave;
	
});
