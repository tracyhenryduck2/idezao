<?php

/**
 *  * $Author: dezao $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

$templates = empty($topic['template']) ? 'map.dwt' : $topic['template'];

$cache_id = sprintf('%X', crc32($_SESSION['user_rank'] . '-' . $_CFG['lang'] . '-' . $topic_id));

if (!$smarty->is_cached($templates, $cache_id))
{


    /* 模板赋值 */
    assign_template();
    $position = assign_ur_here();
    $smarty->assign('page_title',       $position['title']);       // 页面标题
    $smarty->assign('show_marketprice', $_CFG['show_marketprice']);
    $smarty->assign('sort_goods_arr',   $sort_goods_arr);          // 商品列表
    $smarty->assign('topic',            $topic);                   // 专题信息
    $smarty->assign('keywords',         $topic['keywords']);       // 专题信息
    $smarty->assign('description',      $topic['description']);    // 专题信息
    $smarty->assign('title_pic',        $topic['title_pic']);      // 分类标题图片地址
    $smarty->assign('base_style',       '#' . $topic['base_style']);     // 基本风格样式颜色

}
/* 显示模板 */
$smarty->display($templates, $cache_id);

?>