jQuery(function($){
$(document).ready(function(){
  $('.toggle').click(function(){
	$(this).next('ul').toggleClass('visible');
	$(this).toggleClass('visible');
 });
});
});