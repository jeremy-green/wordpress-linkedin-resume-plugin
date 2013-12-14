<?php
/*
 * Plugin Name: Resume Generator
 * Description:
 *
 * https://www.linkedin.com/secure/developer
 * http://developer.linkedin.com/documents/profile-fields
 */
require 'View.php';

add_action('admin_menu', 'resumeInit');
add_action('admin_print_scripts', 'doJSLibs' );
add_action('admin_print_styles', 'doCSS' );
add_action('admin_head', 'doJS');
add_shortcode('resume', 'resumeShortCode');

global $resume_data;
$resume_data = get_option('resume_data');

function doCSS()
{
	wp_enqueue_style('thickbox');
}

function doJSLibs()
{
	wp_enqueue_script('editor');
	wp_enqueue_script('thickbox');
	add_action( 'admin_head', 'wp_tiny_mce' );
}

function doJS()
{
echo <<<EOF
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        editor_selector : "mceAdvanced",
        entity_encoding: "raw",
        element_format : "html"
	});
	jQuery('.datepicker').datepicker({
    	onClose: function() {
    		//console.log(jQuery(this).val());
    	}
    });
});
</script>
EOF;
}

function resumeInit()
{
	require 'ResumeBuilder.php';
	new ResumeBuilder;
}
function resumeShortCode($atts)
{
	global $resume_data;

	$sections = explode(',', str_replace(' ', '', $atts['sections']));

	if(!empty($sections)) {
		foreach ($sections as $section) {
			if (!empty($resume_data[$section])) {
				View::render('templates/' . $section . '.php', (array)$resume_data[$section]);
			}
		}
	}
}