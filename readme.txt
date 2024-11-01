=== WP GeoLocation ===
Contributors: Patrick Friedl
Donate link: http://www.wp-geolocation.com
Tags: ip location, geoip, geolocation, ip address location, geo ip, ip geolocation, ip to location, geotargeting, ip address, location from ip address, ip country, ip locator, ip location, ip town, ip city, geomarketing

Requires at least: 2.7
Tested up to: 2.9
Stable tag: 1.0

This plugin uses the MaxMind GeoIP JS Web Service to return the Country, Region, City, Latitude, and Longitude WordPress shortcodes.

== Description ==

This plugin uses the MaxMind GeoIP Javascript Web Service to return the Country, Region,
City, Latitude, and Longitude for your web visitors for use in WordPress content via short
codes. MaxMind's API is extremely fast, lightweight, and most of all, free.

DISCLAIMER: The author of this plugin is in no way associated with MaxMind, and this
plugin is not sanctioned or supported by MaxMind in any way. This plugin is offered
with no warranties or guarantees, expressed or implied. The author of this plugin is
in no way responsible for any results associated with the use of this plugin.

== Installation ==

1. Upload `wp-geolocation-js.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use any of the following shortcodes in your posts or pages:
   [mmjs-countrycode] : returns the ISO 3166-2 country code
   [mmjs-countryname] : returns the country name
   [mmjs-city]        : returns the city name
   [mmjs-region]      : returns the ISO 3166-2 country code (state or province abreviation)
   [mmjs-regionname]  : returns the region name
   [mmjs-lat]         : returns latitude
   [mmjs-long]        : returns longitude
   [mmjs-postalcode]  : returns post/zip code
   [mmjs-ip]          : returns ip address
4. The following JavaScript variables are also made availble in your theme:
   mmjsCountryCode
   mmjsCountryName
   mmjsCity
   mmjsRegion
   mmjsRegionName
   mmjsLat
   mmjsLong
   mmjsPostalCode
   mmjsIPAddress

== Frequently Asked Questions ==

= Does WP GeoLocation work all the time? =
According to MaxMind.com, their geolocation service is online 99.95% of the time.

= Does WP GeoLocation always display info accurately? =
No. If your visitor is using a proxy, then their actual geolocation info will be incorrect.

= How accurate is the geolocation information? =
Pretty accurate. This plugin accesses MaxMind's server to get geolocation data, so it's usually on target.
However, if your visitor is from a small town, their location may resolve to the nearest large metro area.

= What are the disadvantages of using the JavaScript service? =
The main disadvantage is that the information is saved to JavaScript variables as opposed to PHP variables.
This means that you can't have wordpress act differently with post content until the page is loaded.

The updside is that the JavaScript service is far more accurate than the free GeoIP database that is offered.

If you want more control (but less accuracy), then the pure php geolocation plugin (in development) may be for you.

== Changelog ==

= 1.0 =
* New code