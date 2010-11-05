<?php
/**
*
* @package phpBB3
* @version $Id$
* @copyright (c) 2010 Paul Sohier
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * Needed config items:
 * * attachment_ftp
 * * attachment_ftp_type
 * * attachment_ftp_host
 * * attachment_ftp_user
 * * attachment_ftp_pass
 * * attachment_ftp_path
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
 * Upload a FTP to a remote server
 *
 * @param array $filedata
 * @param object $file
 * @return bool
 */
function ftp_upload_attachment(&$filedata, &$file)
{
	global $user, $phpbb_root_path, $phpEx, $config;

	$user->add_lang('mods/ftp_attach');

	$transfer = ftp_object($filedata);

	if (!$transfer)
	{
		return false;
	}

	if (!$transfer->copy_file($phpbb_root_path . $config['upload_path'] . '/' . $file->get('realname'), $file->get('realname')))
	{
		$filedata['error'][] = $user->lang['FTP_ATTACH_COPY_ERR'];
		$file->remove();

		return false;
	}

	// Need also to move the thumbnail :)
	if ($filedata['thumbnail'])
	{
		if (!$transfer->copy_file($file->get('destination_path') . '/thumb_' . $file->get('realname'), 'thumb_' . $file->get('realname')))
		{
			$filedata['error'][] = $user->lang['FTP_ATTACH_COPY_THUMB_ERR'];

			$file->remove();

			return false;
		}
		// Need also to remove the thumbnail
		@unlink($file->get('destination_path') . '/thumb_' . $file->get('realname'));
	}

	$file->remove();

	return true;
}

/**
 * Remove a file from a remote server
 *
 * @param string $filename
 * @return bool
 */
function ftp_delete_file($filename)
{
	global $user, $phpbb_root_path, $phpEx, $config;

	$user->add_lang('mods/ftp_attach');

	$transfer = ftp_object($filedata);

	if (!$transfer)
	{
		return false;
	}

	return $transfer->delete_file($filename);
}

/**
 * Check if a file exists at a ftp server
 * Same as file_exists for local filesystem.
 *
 * @param string $filename
 * @param object $transfer
 * @return bool
 */
function ftp_file_exists($filename, $transfer = false)
{
	global $user;

	$user->add_lang('mods/ftp_attach');

	if ($transfer === false)
	{

		$object = array('error' => array());

		$transfer = ftp_object($object);

		if (!$transfer || sizeof($object['error']))
		{
			return false;
		}
	}

	return $transfer->file_exists('./', $filename);
}

/**
 * Get a file from a remote FTP server.
 *
 * @param string $filename
 * @return mixed false in case a error happens, other wise the local filename
 */
function ftp_get_file(&$filename)
{
	global $user, $phpbb_root_path;

	$user->add_lang('mods/ftp_attach');

	if (!file_exists($phpbb_root_path . 'store/' . $filename))
	{
		$object = array('error' => array());

		$transfer = ftp_object($object);

		if (!$transfer || sizeof($object['error']))
		{
			trigger_error(implode('<br />', $object['error']));
			return false;
		}

		if (!ftp_file_exists($filename, $transfer))
		{
			trigger_error($user->lang['ERROR_NO_ATTACHMENT'] . '<br /><br />' . sprintf($user->lang['FILE_NOT_FOUND_404'], $filename));
		}

		$transfer->download_file($phpbb_root_path . 'store/' . $filename, $filename);
	}

	$filename = $phpbb_root_path . 'store/' . $filename;

	return $filename;
}

/**
 * Returns a ftp object (Based from the classes that exists in functions_transfar)
 *
 * @param array $filedata
 * @return mixed
 */
function ftp_object(&$filedata)
{
	global $user, $phpbb_root_path, $phpEx, $config;

	if (!class_exists('transfer'))
	{
		include("{$phpbb_root_path}includes/functions_transfer.$phpEx");
	}

	switch ($config['attachment_ftp_type'])
	{
		case 'ftp':
			$class = 'ftp';
		break;

		case 'fsock':
			$class = 'ftp_fsock';
		break;

		default:
			$filedata['error'][] = $user->lang['FTP_ATTACH_NO_CLASS'];
			return false;
	}

	if (!class_exists($class))
	{
		// This should not happen, what happened?
		$filedata['error'][] = $user->lang['FTP_ATTACH_NO_CLASS'];
		return false;
	}

	$class = new $class($config['attachment_ftp_host'], $config['attachment_ftp_user'], $config['attachment_ftp_pass'], $config['attachment_ftp_path']);

	$result = $class->open_session();

	if ($result !== true)
	{
		$filedata['error'][] = $user->lang['FTP_ATTACH_' .  $result];
		return;
	}
	return $class;
}
?>