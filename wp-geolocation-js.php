<?php
/*
Plugin Name: WP GeoLocation JS
Plugin URI: hhttp://www.wp-geolocation.com
Version: 0.1
Author: <a href="http://www.wp-geolocation.com">Patrick Friedl</a>
Description: This plugin uses the <a href="http://www.maxmind.com" target="_blank">MaxMind</a> GeoIP Javascript Web Service to return the Country, Region, City, Latitude, and Longitude for your web visitors for use in WordPress content via short codes. <a href="http://www.maxmind.com" target="_blank">MaxMind's</a> API is extremely fast, lightweight, and most of all, free. DISCLAIMER: The author of this plugin is in no way associated with <a href="http://www.maxmind.com" target="_blank">MaxMind</a>, and this plugin is not sanctioned or supported by <a href="http://www.maxmind.com" target="_blank">MaxMind</a> in any way. This plugin is offered with no warranties or guarantees, expressed or implied. The author of this plugin is in no way responsible for any results associated with the use of this plugin. <a href="http://www.wp-geolocation.com" target="_blank">WP-GeoLocation.com</a>: plugin page, instructions and support.

Copyright 2010  Patrick Friedl  (email: pfriedl[at]nebulus[dot]org)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
// set up the WPGeoLocation class
if (!class_exists("WPGeoLocation")) {
	class WPGeoLocation {

		function WPGeoLocation() { //constructor
		}

		function addHeaderCode() {
		?>
<!-- begin wp geolocation script -->
<script language="javascript" src="http://j.maxmind.com/app/geoip.js"></script>
<script language="javascript">
mmjsCountryCode = geoip_country_code();
mmjsCountryName = geoip_country_name();
mmjsCity = geoip_city();
mmjsRegion = geoip_region();
mmjsRegionName = geoip_region_name();
mmjsLat = geoip_latitude();
mmjsLong = geoip_longitude();
mmjsPostalCode = geoip_postal_code();
mmjsIPAddress = "<?php echo $_SERVER['REMOTE_ADDR']; ?>";
</script>
<!-- end wp geolocation script -->
			<?php
		}
		function getCountryCode() {
			return '<script language="javascript">document.write(geoip_country_code());</script>';
		}
		function getCountryName() {
			return '<script language="javascript">document.write(geoip_country_name());</script>';
		}
		function getCity() {
			return '<script language="javascript">document.write(geoip_city());</script>';
		}
		function getRegion() {
			return '<script language="javascript">document.write(geoip_region());</script>';
		}
		function getRegionName() {
			return '<script language="javascript">document.write(geoip_region_name());</script>';
		}
		function getLatitude() {
			return '<script language="javascript">document.write(geoip_latitude());</script>';
		}
		function getLongitude() {
			return '<script language="javascript">document.write(geoip_longitude());</script>';
		}
		function getPostalCode() {
			return '<script language="javascript">document.write(geoip_postal_code());</script>';
		}
		function getIPAddress() {
			return $_SERVER['REMOTE_ADDR'];
		}

	}
} // end class WPGeoLocation

// initialize the WPGeoLocation class
if (class_exists("WPGeoLocation")) {
    $wp_geolocation = new WPGeoLocation();
	global $geo_countrycode;
	global $geo_countryname;
	global $geo_city;
	global $geo_region;
	global $geo_regionname;
	global $geo_latitude;
	global $geo_longitude;
	global $geo_postalcode;
}

// set up actions and filters
if (isset($wp_geolocation)) {
    // actions
	add_action('wp_head', array(&$wp_geolocation, 'addHeaderCode'), 100);

    // filters
    // no filters

    // shortcodes
    add_shortcode('mmjs-countrycode', array(&$wp_geolocation, 'getCountryCode'));
    add_shortcode('mmjs-countryname', array(&$wp_geolocation, 'getCountryName'));
    add_shortcode('mmjs-city', array(&$wp_geolocation, 'getCity'));
    add_shortcode('mmjs-region', array(&$wp_geolocation, 'getRegion'));
    add_shortcode('mmjs-regionname', array(&$wp_geolocation, 'getRegionName'));
    add_shortcode('mmjs-lat', array(&$wp_geolocation, 'getLatitude'));
    add_shortcode('mmjs-long', array(&$wp_geolocation, 'getLongitude'));
    add_shortcode('mmjs-ip', array(&$wp_geolocation, 'getIPAddress'));
    add_shortcode('mmjs-postalcode', array(&$wp_geolocation, 'getPostalCode'));
}
?>