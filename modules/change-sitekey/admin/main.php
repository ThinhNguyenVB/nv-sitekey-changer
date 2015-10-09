<?php

/**
 * @Project SITEKEY_CHANGER 4.x
 * @Author KENNY NGUYEN (nguyentiendat713@gmail.com) 
 * @Copyright (C) 2015 tradacongnghe.com. All rights reserved
 * @Based on NukeViet CMS 
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Fri, 18 Sep 2015 11:52:59 GMT
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['album'];
$old_sitekey = $global_config['sitekey'];
$new_sitekey = md5($_SERVER['SERVER_NAME'] . NV_ROOTDIR . $client_info['session_id']);
$action = $nv_Request->get_int( 'action', 'post', 0 );

$xtpl = new XTemplate( 'main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'GLANG', $lang_global );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );
$xtpl->assign( 'OLD_SITEKEY', $old_sitekey );
$xtpl->assign( 'NEW_SITEKEY', $new_sitekey );

if($old_sitekey != $new_sitekey)
{
	$xtpl->parse( 'main.compare' );
	if( $action == 1 )
	{
		$fname = NV_ROOTDIR . "/config.php";
		$content = file_get_contents( $fname );
		$content = str_replace( $old_sitekey, $new_sitekey, $content );
		$fhandle = fopen( $fname,"w" );
		$fwrite = fwrite( $fhandle, $content );
		if($fwrite === false)
		{
			$xtpl->parse( 'main.error' );
		}
		else
		{
			$xtpl->parse( 'main.success' );
			fclose( $fhandle );
		}
	}
}
$xtpl->parse( 'main.warn' );
$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';
