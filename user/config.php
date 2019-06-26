<?php
include_once 'E:\phpStudy\WWW\YOURLS\spyc.php';
$data = spyc_load_file('E:\phpStudy\WWW\YOURLS\spyc.yml');

//include_once '/code/spyc.php';
//$data = spyc_load_file('/code/spyc.yml');

if(isset($_ENV['YOURLS_DB_USER'])){
    define( 'YOURLS_DB_USER', $_ENV['YOURLS_DB_USER'] );
    define( 'YOURLS_DB_PASS', $_ENV['YOURLS_DB_PASS'] );
    define( 'YOURLS_DB_NAME', $_ENV['YOURLS_DB_NAME'] );
    define( 'YOURLS_DB_HOST', $_ENV['YOURLS_DB_HOST'] );
    define( 'YOURLS_SITE', $_ENV['YOURLS_SITE'] );
    define( 'USER_NAME', $_ENV['USER_NAME'] );
    define( 'PASS_WORD', $_ENV['PASS_WORD'] );
}else {
    if( !defined( 'YOURLS_DB_USER' ) ) {define('YOURLS_DB_USER', $data['YOURLS_DB_USER']);}
    if( !defined( 'YOURLS_DB_PASS' ) ) { define('YOURLS_DB_PASS', $data['YOURLS_DB_PASS']);}
    if( !defined( 'YOURLS_DB_NAME' ) ) { define('YOURLS_DB_NAME', $data['YOURLS_DB_NAME']);}
    if( !defined( 'YOURLS_DB_HOST' ) )  {define('YOURLS_DB_HOST', $data['YOURLS_DB_HOST']);}
    if( !defined( 'YOURLS_SITE' ) )  {define('YOURLS_SITE', $data['YOURLS_SITE']);}
    if( !defined( 'USER_NAME' ) )  {define('USER_NAME', $data['USER_NAME']);}
    if( !defined( 'PASS_WORD' ) )  {define('PASS_WORD', $data['PASS_WORD']);}
}

/** MySQL tables prefix */
define( 'YOURLS_DB_PREFIX', 'yourls_' );

/*
 ** Site options
 */

/** YOURLS installation URL -- all lowercase, no trailing slash at the end.
 ** If you define it to "http://sho.rt", don't use "http://www.sho.rt" in your browser (and vice-versa) */


//define( 'YOURLS_SITE', 'localhost/YOURLS/' );

/** Server timezone GMT offset */
define( 'YOURLS_HOURS_OFFSET', 0 ); 

/** YOURLS language
 ** Change this setting to use a translation file for your language, instead of the default English.
 ** That translation file (a .mo file) must be installed in the user/language directory.
 ** See http://yourls.org/translations for more information */
define( 'YOURLS_LANG', 'zh_CN');

/** Allow multiple short URLs for a same long URL
 ** Set to true to have only one pair of shortURL/longURL (default YOURLS behavior)
 ** Set to false to allow multiple short URLs pointing to the same long URL (bit.ly behavior) */
define( 'YOURLS_UNIQUE_URLS', true );

/** Private means the Admin area will be protected with login/pass as defined below.
 ** Set to false for public usage (eg on a restricted intranet or for test setups)
 ** Read http://yourls.org/privatepublic for more details if you're unsure */
define( 'YOURLS_PRIVATE', true );

/** A random secret hash used to encrypt cookies. You don't have to remember it, make it long and complicated. Hint: copy from http://yourls.org/cookie **/
define( 'YOURLS_COOKIEKEY', 'Y169hd{4Nk62R1C-3chqqfGsjFO&PX2FIp_PkaU5' );

/** Username(s) and password(s) allowed to access the site. Passwords either in plain text or as encrypted hashes
 ** YOURLS will auto encrypt plain text passwords in this file
 ** Read http://yourls.org/userpassword for more information */
$yourls_user_passwords = array(
    $data['USER_NAME'] => $data['PASS_WORD'] /* Password encrypted by YOURLS */ ,
	// 'username2' => 'password2',
	// You can have one or more 'login'=>'password' lines
	);

/** Debug mode to output some internal information
 ** Default is false for live site. Enable when coding or before submitting a new issue */
define( 'YOURLS_DEBUG', true );
	
/*
 ** URL Shortening settings
 */

/** URL shortening method: 36 or 62 */
define( 'YOURLS_URL_CONVERT', 36 );
/*
 * 36: generates all lowercase keywords (ie: 13jkm)
 * 62: generates mixed case keywords (ie: 13jKm or 13JKm)
 * Stick to one setting. It's best not to change after you've started creating links.
 */

/** 
* Reserved keywords (so that generated URLs won't match them)
* Define here negative, unwanted or potentially misleading keywords.
*/
$yourls_reserved_URL = array(
	'porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick',
);

/*
 ** Personal settings would go after here.
 */

