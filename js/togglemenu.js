jQuery(function($){
$(document).ready(function(){
  $('.toggle').click(function(){
	$(this).next('ul').toggleClass('dep-visible');
	$(this).toggleClass('dep-visible');
 });
});
});