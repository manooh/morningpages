require.config({
	'paths':{
		'knockout':'vendor/knockout',
		'jquery':'//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min',
		'autogrow':'vendor/jquery.autosize',
		'validate':'vendor/jquery.validate.min',
		'jgrowl':'vendor/jgrowl.min'
	},
	'shim':{
		'autogrow':{
			'deps':['jquery']
		},
		'validate':{
			'deps':['jquery']
		},
		'jgrowl':{
			'deps':['jquery']
		}
	}
});

define([
	'knockout',
	'jquery',
	'bindings',
	'models/user',
	'models/modal',
	'site'
], function(ko, $, bindings, user, modal, site){
	
	var writeModel = function(){
		var self = this;
		
		self.user = new user();
		self.user.wakeUp().then(function(){
			self.writtenwords('');
		});
		
		self.optionsmodal = new modal($('#user-options-modal'));
		self.shortcutsmodal = new modal($('#shortcuts-modal'));
		
		self.writtenwords = ko.observable('');
		self.totalwords = ko.observable(0);
		self.wordcount = ko.computed(function(){
			var total = $.trim(self.writtenwords()).split(/\s+/).length;
			if(self.writtenwords().length == 0) total = 0;
			total += parseInt(self.user.wordcount());
			self.totalwords(total);
			return total;
		}, this);
		
		
		
		self.hamburgerClick = function(){
			$( ".user-options" ).slideToggle( "slow", function() {
				// Animation complete.
			});
		};
		
		self.saveUserInfo = function(){
			self.user.saveInfo().then(function(data){
				self.optionsmodal.hide();
				site.say('Your settings have been saved.');
			});
		};
		
		self.goToPreviousPage = function(obg, ev){
			var date = $(ev.target).val();
			window.location.href = '/write/'+date;
		};
		
	};
	
	ko.applyBindings(new writeModel());
	
});

