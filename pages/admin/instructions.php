<?php settings_fields( 'csr_wp_plugin_settings' ); ?>
<?php do_settings_sections( 'csr_wp_plugin_init' ); ?>
<div class="csr_plugin_admin_content">
	<h1>Campsite Reports API How To</h1>
	<p>This plugin integrates the Campsite Reports Free Online Reservation System into your WordPress based website.</p>
	
	<p>This plugin does require that you have an account with Campsite Reports.</p>
	
	<p>Learn about all of the features offered by the Campsite Reports Free Online Reservation System at:<br/><a href="http://www.campsitereports.com/htm/free-campground-reservation-system.php" target="_blank">http://www.campsitereports.com/htm/free-campground-reservation-system.php</a><span class="dashicons dashicons-external"></span></p>
	
	<h3>Step 1: Create a Campsite Reports Account</h3>
	<div>In the account creation step of the setup, you will setup a Campsite Reports account for your campground.</div>
	<div>NOTE: If you already have an account setup with Campsite reports and the reservation system is currently enabled, you can move on to the next step of the setup.</div>
	<ol>
		<li>Go to:<br/><a href="http://www.campsitereports.com/htm/NewCampground-Step2.php" target="_blank">http://www.campsitereports.com/htm/NewCampground-Step2.php</a><span class="dashicons dashicons-external"></span></li>
		<li>Register your campgrounds account.</li>
		<li>Follow the guided process to setup your campground in the Campsite Reports system.</li>
		<ul>
			<li>NOTE: You must have your the Reservation System enabled in order for this plugin to work.</li>
		</ul>
	</ol>
	
	<h3>Step 2: Configure the WordPress Plugin</h3>
	<div>In the configuration step of the setup, you will connect your WordPress site to your Campsite Reports account.</div>
	<ol>
		<li>In the WordPress Admin, choose <b>CSR Settings</b> from the left hand menu.</li>
		<li>Insert your Park ID.  Instructions on where to find the Park ID are found on that page.</li>
		<li>Click <b>Save Changes</b></li>
	</ol>
	
	<h3>Step 3: Integrate the CSR API Into Your WordPress Site</h3>
	<div>In the integration step of the setup, you will add the registration page to your site.  The Registration Page is where your users can check availability of your campsites, reserve a site, and process payment.</div>
	<ol>
		<li>In the WordPress Admin, create a page for the Reservation Page by choosing <b>Pages -> Add New</b>.</li>
		<li>Enter a title for this page.  Example: <b>Reserve Your Campsite</b></li>
		<li>For the page content, add the following shortcode (using visual mode):<br/><pre>[csr_api_reservations/]</pre><br/>NOTE: You can add extra text and/or pictures above and/or below this shortcode if you wish.</li>
		<li>Click the <b>Publish</b> button to publish your page.</li>
		<li>Add this page to your sites main navigation, sidebar widgets, footer, and other pages to make it easily accessible for your sites users.</li>
	</ol>
	
	<h3>Additional Shortcodes (Optional)</h3>
	<div>Additional API pages can be added using the following shortcodes.</div>
	<div>After creating these pages in WordPress, you will need to enter the page URLs into your Campsite Reports account settings.</div>
	<div>For more information, <a href="http://www.campsitereports.com/htm/login.php" target="_blank">login to your Campsite Reports account</a><span class="dashicons dashicons-external"></span> and choose <b>API Setup</b>.</div>
	<ul>
		<li>Success Page</li>
		<ul>
			<li>After payment is made, customers will be directed here to see details of their purchase.  If you don't create this page, customers will be sent to the default success page at CampsiteReports.com.</li>
			<li>Shortcode:<br/><pre>[csr_api_get_success/]</li>
		</ul>
		<li>Not Purchased Page</li>
		<ul>
			<li>If customers decide to cancel and not complete their purchase, they will be sent to this page. If you don't create this page, customers will be sent to the default not-purchased page at CampsiteReports.com.</li>
			<li>Shortcode:<br/><pre>[csr_api_get_notpurchased/]</li>
		</ul>
	</ul>
	
</div>
