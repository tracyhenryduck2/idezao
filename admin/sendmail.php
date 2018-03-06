<?php

/**
 *  * $Author: dezao $
*/

define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');

/* 模板赋值 */
$smarty->assign('ur_here', $_LANG['sendmail']);

if($_REQUEST['act'] == 'sendmail')
{
	$email = trim($_REQUEST['email']);
	
    include_once(ROOT_PATH . 'includes/fckeditor/fckeditor.php'); //类文件
	create_html_editor('content', '');
	
	$smarty->assign('email', $email);
	$smarty->display('sendmail.htm');
}

if($_REQUEST['act'] == 'send_act')
{
	$email = trim($_REQUEST['email']);
	$subject = trim($_REQUEST['subject']);
	$content = trim($_REQUEST['content']);
	
	if(send_mail($_CFG['shop_name'], $email, $subject, $content, 1))
    {
		sys_msg($_LANG['send_sucess'], 0);
    }
    else
    {
		sys_msg($_LANG['send_failure'], 1);
    }
}
?>