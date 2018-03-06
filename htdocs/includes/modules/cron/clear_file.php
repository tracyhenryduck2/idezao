<?php

/**
 *  * $Author: dezao $
*/

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}
$cron_lang_com = ROOT_PATH . 'languages/' .$GLOBALS['_CFG']['lang']. '/cron/clear_file_desc.php';
if (file_exists($cron_lang_com))
{
    global $_LANG;
    include_once($cron_lang_com);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'clear_file_desc';

    /* 作者 */
    $modules[$i]['author']  = 'ECSHOP开发中心';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.68ecshop.com';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.0';

    /* 配置信息 */
    $modules[$i]['config']  = array(
    );

    return;
}

/* 清除缓存 */
clear_all_files();

?>