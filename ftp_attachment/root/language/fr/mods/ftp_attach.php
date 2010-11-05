<?php
/**
*
* ftp_attach [French]
*
* @package language
* @version $Id$
* @copyright (c) 2010 Paul Sohier
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
	'FTP_ATTACH_ERR_CONNECTING_SERVER'	 => 'Impossible de se connecter au serveur FTP',
	'FTP_ATTACH_ERR_UNABLE_TO_LOGIN'	 => 'Impossible de s\'identifier au serveur FTP',
	'FTP_ATTACH_ERR_CHANGING_DIRECTORY'  => 'Impossible de changer de répertoire FTP',
	'FTP_ATTACH_NO_CLASS'                => 'Aucun classe FTP valide trouvée.<br />Vérifiez vos paramètres dans l\'administration.',
	'NO_FTP_METHOD'                      => 'Aucun méthode FTP valide trouvée sur votre serveur. Vous ne pouvez pas utiliser ce MOD.',
	
	'FTP_ATTACH_COPY_ERR'		    	=> 'Impossible de sauvegarder le fichier joint sur le serveur FTP',
	'FTP_ATTACH_COPY_THUMB_ERR'			=> 'Impossible de sauvegarder la miniature sur le serveur FTP',
	
	// ACP
	'ACP_ATTACHMENT_FTP_SETTINGS'   => 'Paramètres des fichiers joints FTP',
	'ATTACHMENT_FTP'                => 'Activer les fonctions FTP',
	'ATTACHMENT_FTP_EXPLAIN'        => 'Sauvegarde les fichiers joints sur un serveur différent avec les fonctions FTP.',
	'ATTACHMENT_FTP_HOST'           => 'Nom d\'hôte FTP',
	'ATTACHMENT_FTP_TYPE'           => 'Type de connexion',
	'ATTACHMENT_FTP_TYPE_EXPLAIN'   => 'Méthode pour se connecter au serveur FTP. Changez uniquement ce paramètre quand cela est conseillé.',
	'ATTACHMENT_FTP_USER'           => 'Nom d\'utilisateur FTP',
	'ATTACHMENT_FTP_PASS'           => 'Mot de passe FTP',
	'ATTACHMENT_FTP_PASS_EXPLAIN'   => 'L\'ancien mot de passe FTP n\'est pas affiché.
		<strong>Ce mot de passe est actuellement sauvegardé en text clair.
			Utilisez un compte qui a uniquement accès au répertoire de téléchargement pour les fichiers joints !!!</strong>',
	'ATTACHMENT_FTP_PATH'           => 'Chemin FTP',  
	'ATTACHMENT_FTP_PATH_EXPLAIN'   => 'Chemin vers le répertoire de téléchargement.',
	
	'FTP_ATTACHMENT_FTP'        => 'FTP',
	'FTP_ATTACHMENT_FTP_FSOCK'  => 'FTP fsock',
));

?>