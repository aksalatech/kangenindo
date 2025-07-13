<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('APP_NAME') or define('APP_NAME', 'Little Indo Town');
defined('FIREBASE_API_KEY') or define('FIREBASE_API_KEY', 'AAAACoSb5Tk:APA91bErch9q5_fdMoMN4sKDyuwagrQcYxrbO1tsh0rmjJnSK7qwAKgEIHQfEw2r_ByRhKdKFGOF_7ZCFddvZKrm8VoXf-mSvfs9vZLE8Lrpjrst-4khqkqoO3KNRyxotZcsxF_MprZX');
defined('VENDORPATH') OR define('VENDORPATH', "./vendor/");

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|*/

defined('FINISH')        OR define('FINISH', "1");	// Finished Project
defined('NOT_FINISH')    OR define('NOT_FINISH', "0");	// Unfinished Project
defined('ALL_PROJECT')    OR define('ALL_PROJECT', "%");	// Unfinished Project

/*
|--------------------------------------------------------------------------
| Exit Cert Codes
|--------------------------------------------------------------------------
|*/
defined('HHAK') or define('HHAK', 'HHAK');

/*
|--------------------------------------------------------------------------
| Constants for Role User
|--------------------------------------------------------------------------
*/
defined('POSITION_SUPERADMIN') 	OR define('POSITION_SUPERADMIN', 'Super Admin'); 	// Role for Administrator
defined('POSITION_ADMIN') 	OR define('POSITION_ADMIN', 'Admin'); 	// Role for Administrator
defined('POSITION_PENGGUNA') OR define('POSITION_PENGGUNA', 'Pengguna');  // Role Pengguna
defined('POSITION_PRODUSEN') OR define('POSITION_PRODUSEN', 'Produsen');  // Role Produsen

defined('SUB_POSITION_DIRJEN') 	OR define('SUB_POSITION_DIRJEN', 'Dirjen'); 	// Role for Administrator
defined('SUB_POSITION_DIREKTUR') OR define('SUB_POSITION_DIREKTUR', 'Direktur');  // Role Pengguna
defined('SUB_POSITION_KASIE') OR define('SUB_POSITION_KASIE', 'Kasie');  // Role Produsen
defined('SUB_POSITION_OPERATOR') OR define('SUB_POSITION_OPERATOR', 'Operator');  // Role Produsen
defined('SUB_POSITION_ADMIN') OR define('SUB_POSITION_ADMIN', 'Super Admin');  // Role Produsen


/*
|--------------------------------------------------------------------------
| Constants for Type Notif
|--------------------------------------------------------------------------
*/
defined('NOTIF_CERT') 	OR define('NOTIF_CERT', 'CERT'); 	// Type Certificate
defined('NOTIF_COMMENT') 	OR define('NOTIF_COMMENT', 'COMT'); 	// Type Comment


/*
|--------------------------------------------------------------------------
| Constants for Status
|--------------------------------------------------------------------------
*/
defined('CODE_ALL') 	OR define('CODE_ALL', '%'); 	// Code for All Status
defined('CODE_DONE')	OR define('CODE_DONE', '1'); 	// Code for Done Status
defined('CODE_UNDONE') 	OR define('CODE_UNDONE', '0');  // Code for Undone Status
defined('CODE_ALL_TIME') OR define('CODE_ALL_TIME', 'A');  // Code for Undone Status
defined('CODE_YEAR') OR define('CODE_YEAR', 'Y');  // Code for Undone Status
defined('CODE_NEW') OR define('CODE_NEW', 'N');  // Code for New Status
defined('CODE_FOL') OR define('CODE_FOL', 'F');  // Code for Follow Up Status
defined('CODE_PDG') OR define('CODE_PDG', 'P');  // Code for Follow Up Status
defined('CODE_APV') OR define('CODE_APV', 'A');  // Code for Approved Status
defined('CODE_RJC') OR define('CODE_RJC', 'R');  // Code for Rejected Status
defined('CODE_CAN') OR define('CODE_CAN', 'C');  // Code for Canceled Status

