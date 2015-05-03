<div class="csr_plugin_admin_content">
	<form method="post" action="options.php">
		<?php settings_fields( 'csr_wp_plugin' ); ?>
		<?php do_settings_sections( 'csr_wp_plugin_init' ); ?>
		<h1>Campsite Reports API Settings</h1>
		<h4>Set the options and click the button "Save Changes" button below.</h4>
	
		<h3>Park ID</h3>
		<input type="text" name="csr_park_id" value="<?php echo esc_attr( get_option('csr_park_id') ); ?>">
		<p>
			<div>NOTE: Your <b>Park ID</b> can be found in your Campsite Reports account page.</div>
			<div>Login to your account at: <a href="http://www.campsitereports.com/htm/login.php" target="_blank">http://www.campsitereports.com/htm/login.php</a><span class="dashicons dashicons-external"></span> and choose <b>My Account -> API Setup</b>.</div>
			<div>Your <b>Park ID</b> will be the numeric portion at the end of the URL in the address bar - just following <b>pid=</b></div>
		</p>

		<input type="checkbox" name="csr_show_link" id="csr_show_link" value="1" <?php echo checked(1, get_option('csr_show_link', 1), false) ?>>
		<label for="csr_show_link">Display link to Campsite Reports</label>
	
		<?php submit_button(); ?>
	</form>
</div>