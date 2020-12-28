<?php
/**
 * Plugin Name: Umpteenth GDPR Test Plugin - Rock Content (GDPR Test Plugin - Rock Content)
 * Plugin URI: http://gioiamongelli.com/gdpr-plugin
 * Description: GDPR Test Plugin for Rock Content.
 * Version: 1.0
 * Author: Gioia Mongelli
 * Author URI: http://gioiamongelli.com
 */


 function gdpr_test_plugin() {

    if(array_key_exists('submit_scripts_update',$_POST)) 
	{
		update_option('gdpr_header_scripts',$_POST['header_scripts']);
		update_option('gdpr_footer_scripts',$_POST['footer_scripts']);
	}

 ?>
 <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"><strong>Settings have been saved.</strong></div>

 <?php
	
	$header_scripts = get_option('gdpr_header_scripts','none');
	$footer_scripts = get_option('gdpr_footer_scripts','none');
	?>

<div class="wrap">
		        <h2>Test GDPR Plugin Settings</h2>  
		            <form method="POST" action="options.php">
                        <fieldset>
                            <label for="enable-gdpr-message">Enable GDPR Message</label><br/>
                            <input id="option-yes" type="radio" name="gdpr-on" value="true" checked>On</input>
                            <input id="option-no" type="radio" name="gdpr-off" value="false">Off</input>
                        </fieldset>
                        <fieldset>
                            <label for="gdpr-message-positioning">Choose message display</label><br/>
                            <input id="option-header" type="radio" name="gdpr-header" value="false">Header</input>
                            <input id="option-footer" type="radio" name="gdpr-footer" value="true" checked>Footer</input>
                        </fieldset>
                        <fieldset>
                            <label for="gdpr-text">GDPR Message</label>
                            <textarea name="gdpr-message" class="large-text" cols="50" rows="5">We use cookies to provide our services and for analytics and marketing. To find out more about our use of cookies, please see our Privacy Policy. By continuing to browse our website, you agree to our use of cookies. </textarea> 
                            <p class="description">This is the default GDPR notice message.</p>
                        </fieldset>
                        <fieldset>
                            <label for="refuse-consent">Refuse consent</label><br/>
                            <input id="refuse-consent" name="refuse-consent" type="checkbox" value="1" checked></input>
                            <p class="description">Give user the chance to refuse third party cookies (check by default).</p>
                        </fieldset>
                        <fieldset>
                            <label for="button-text">Button text</label><br/>
                            <input type="text" name="button-text" value="Accept"></input>
                        </fieldset>
                        <fieldset>
                            <label for="gdpr-style">Theme style</label><br/>
                            <input id="ocean" name="ocean" type="radio" value="true" checked>Ocean</input>
                            <input id="light" name="light" type="radio" value="false">Light</input>
                            <input id="forest" name="forest" type="radio" value="false">Forest</input>
                            <p class="description">Choose the theme style for the message</p>
                        </fieldset>
                            <input type="submit" name="submit_scripts_update" class="button button-primary" value="Submit changes" >
                    </form>

</div>
<?php

 }

 add_action('admin_menu', 'gdpr_test_admin_menu');

function gdpr_test_admin_menu() {
	add_menu_page('GDPR Message Settings', 'Test GDPR Plugin Settings', 'manage_options', 'gdpr-test-admin-menu', 'gdpr_test_plugin', '',200); //manage_options is the options available to admin or any user who has manage_options availability. gdpr-test-admin-menu is a slug. gdpr_scripts_page is a callback on how the page will look like.'' is for the image showing next to the name, 200 is for the positioning.
}




