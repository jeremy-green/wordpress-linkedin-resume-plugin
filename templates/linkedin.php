<?php
if ( false === function_exists('lcfirst') ):
    function lcfirst( $str )
    { return (string)(strtolower(substr($str,0,1)).substr($str,1));}
endif;
if(isset($_POST['submit']))
{
	$values = array();
	foreach ($fields as $field) {
		$values[$field] = json_decode(stripslashes($_POST[$field]));
		if(empty($values[$field])) {
			$values[$field] = $_POST[$field];
		}
	}

	$address = str_replace(' ', '+', $_POST['main-address']);
	$url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&sensor=false';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_USERAGENT, 'INTERNET');
	//curl_setopt($ch, CURLOPT_VERBOSE, false);
	//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	//curl_setopt($ch, CURLOPT_USERPWD, $token . ':x');
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
	//curl_setopt($ch, CURLOPT_COOKIEFILE, 'FIERCE');
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	$output = curl_exec($ch);
	curl_close($ch);

	$output = json_decode($output);

	$values['address']->street_number = $output->results[0]->address_components[0]->long_name;
	$values['address']->route = $output->results[0]->address_components[1]->long_name;
	$values['address']->locality = $output->results[0]->address_components[3]->long_name;
	$values['address']->region = $output->results[0]->address_components[6]->long_name;
	$values['address']->region_abbr = $output->results[0]->address_components[6]->short_name;
	$values['address']->country = $output->results[0]->address_components[7]->long_name;
	$values['address']->country_abbr = $output->results[0]->address_components[7]->short_name;
	$values['address']->postal_code = $output->results[0]->address_components[8]->long_name;

	$values['address']->formatted_address = $output->results[0]->formatted_address;
	$values['address']->geo = $output->results[0]->geometry->location;

	update_option('resume_data', $values);
}
?>
<form action="" method="post">
<?php foreach($fields as $field) : ?>
<?php
$parts = explode('-', strtolower($field));
$parts = array_map('ucfirst', $parts);
$jsName = lcfirst(implode('', $parts));
?>
<style>
	label {
		display: block;
	}
</style>
<p><label for="<?php echo $field; ?>"><?php echo ucwords(str_replace('-', ' ', $field)); ?></label> <input type="text" class="regular-text" id="<?php echo $jsName; ?>" name="<?php echo $field; ?>" /></p>
<?php endforeach;  ?>
<?php submit_button(); ?>
</form>

<script type="text/javascript" src="http://platform.linkedin.com/in.js">
/*
	api_key: <?php echo $apikey . PHP_EOL; ?>
	onLoad: onLinkedInLoad
	authorize: true
	scope:r_basicprofile,r_emailaddress,r_network,r_fullprofile,r_contactinfo
*/
</script>
<script type="text/javascript">
	function onLinkedInLoad() {
		IN.Event.on(IN, "auth", onLinkedInAuth);
	}

	function onLinkedInAuth() {
		IN.API.Profile("me")
		.fields(["<?php echo implode('", "', $fields); ?>"])
		.result(displayProfiles);
	}

	function displayProfiles(profiles) {
		console.log(profiles);
		var profile  = profiles.values[0];
		var str;
		var positions;
		var coArray = [];
		for (var id in profile) {
			str = profile[id]
			if(profile[id] instanceof Object) {
				str = JSON.stringify(profile[id]);
				if(id === 'positions') {
					positions = profile[id].values;
					for (position in positions) {
						coArray.push(positions[position].company.id);
					}
				}
			}
			jQuery('#' + id).val(str);
		}

		var len = coArray.length;
		for (var i = 0; i < len; i++) {
			IN.API.Raw("/companies/" + coArray[i] + ':(id,name,universal-name,company-type,ticker,website-url,industries,status,logo-url,locations,description,founded-year)')
  			.result(function(result) {
  				console.log(result);
  			})
  			.error(function(error) {
  				console.log(error);
  			});
		}
	}
</script>
<script type="IN/Login"></script>