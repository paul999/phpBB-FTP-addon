<?php
/**
*
* ftp_attach [English]
*
* @package language
* @version $Id$
* @copyright (c) 2010 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	// UMIL
	'ADDON_FTP'						=> 'FTP addon for attachment function',
	
	// ERROR
	'FTP_ATTACH_ERR_CONNECTING_SERVER'	 => 'Could not connect to FTP server',
	'FTP_ATTACH_ERR_UNABLE_TO_LOGIN'	   => 'Could not loggin to FTP server',
	'FTP_ATTACH_ERR_CHANGING_DIRECTORY'  => 'Could not change FTP path',
	'FTP_ATTACH_NO_CLASS'                => 'No valid ftp class found.<br />Check your settings in admin.',
	'NO_FTP_METHOD'                      => 'There is no valid FTP method found for your server. You can\'t use this MOD.',
	
	'FTP_ATTACH_COPY_ERR'		    	=> 'Could not save attachment at FTP server',
	'FTP_ATTACH_COPY_THUMB_ERR'		=> 'Could not save attachment at FTP server',
	
	// ACP
	'ACP_ATTACHMENT_FTP_SETTINGS'   => 'Attachment FTP settings',
	'ATTACHMENT_FTP'                => 'Enable FTP functions',
	'ATTACHMENT_FTP_EXPLAIN'        => 'Save attachments at a different server with FTP functions',
	'ATTACHMENT_FTP_HOST'           => 'FTP host',
	'ATTACHMENT_FTP_TYPE'           => 'Connection type',
	'ATTACHMENT_FTP_TYPE_EXPLAIN'   => 'Method to connect with the FTP server. Only change it when advised',
	'ATTACHMENT_FTP_USER'           => 'FTP user',
	'ATTACHMENT_FTP_PASS'           => 'FTP password',
	'ATTACHMENT_FTP_PASS_EXPLAIN'   => 'Old FTP password isnt displayed.
		<strong>This password is currently saved plain text.
			Use a account that only has access to the upload directory for attachments!!!</strong>',
	'ATTACHMENT_FTP_PATH'           => 'FTP path',  
	'ATTACHMENT_FTP_PATH_EXPLAIN'   => 'Path to the upload directory. As said above, give only a account that can acsess the upload dir.',
	
	'FTP_ATTACHMENT_FTP'        => 'FTP',
	'FTP_ATTACHMENT_FTP_FSOCK'  => 'FTP fsock',
));

?>