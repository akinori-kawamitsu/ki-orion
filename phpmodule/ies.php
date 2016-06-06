<script>
var ua = window.navigator.userAgent.toLowerCase();
if (ua.indexOf("msie 10") != -1){
document.write('<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/ie10.css" />');
}
else if (ua.indexOf("linux; u;") >0){
document.write('<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/ie10.css" />');
}
</script>
<!--[if lte IE 9]>
<script src="<?php bloginfo('template_url');?>/js/jquery.matchHeight.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function() {
jQuery("[class^='flex'] [class^='col-']").matchHeight();
});
</script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/ie9.css" />
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url');?>/js/html5shiv.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/ie8.css" />
<![endif]-->
