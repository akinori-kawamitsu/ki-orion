<script>
var ua = window.navigator.userAgent.toLowerCase();
if (ua.indexOf("msie 10") != -1){
document.write('<link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri());?>/css/ie10.css" />');
}
else if (ua.indexOf("linux; u;") >0){
document.write('<link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri());?>/css/ie10.css" />');
}
else if (ua.indexOf("chrome") != -1){
	document.write('<link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri());?>/css/chrome.css" />');
}
</script>
<!--[if lte IE 9]>
<script src="<?php esc_url(get_template_directory_uri());?>/js/jquery.matchHeight.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function() {
jQuery("[class^='flex'] [class^='col-']").matchHeight();
});
</script>
<link rel="stylesheet" type="text/css" href="<?php esc_url(get_template_directory_uri());?>/css/ie9.css" />
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php esc_url(get_template_directory_uri());?>/js/html5shiv.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php esc_url(get_template_directory_uri());?>/css/ie8.css" />
<![endif]-->
