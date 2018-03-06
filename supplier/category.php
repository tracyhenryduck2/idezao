<?php

/**
 *  * $Author: dezao $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
$exc = new exchange($ecs->table("supplier_category"), $db, 'cat_id', 'cat_name');

/* act操作项的初始化 */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'list';
}
else
{
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

/*------------------------------------------------------ */
//-- 商品分类列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list')
{

	admin_priv('category_list');

    /* 获取分类列表 */
    $cat_list = cat_list_2(0, 0, false);



    /* 模板赋值 */
    $smarty->assign('ur_here',      $_LANG['04_category_list']);
    $smarty->assign('action_link',  array('href' => 'category.php?act=add', 'text' => $_LANG['04_category_add']));
    $smarty->assign('full_page',    1);

    $smarty->assign('cat_info',     $cat_list);


    /* 列表页面 */
    assign_query_info();
    $smarty->display('category_list.htm');
}

/*------------------------------------------------------ */
//-- 排序、分页、查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    /* 代码修改 By  www.68ecshop.com Start */
    if(empty($_POST['cat_name']))
    {
        /* 获取分类列表 */
        $cat_list = cat_list_2(0, 0, false);
    }
    // 如果查询条件不为空
    else {
        $cat_list = search_cat($_POST['cat_name']);
    }
    /* 代码修改 By  www.68ecshop.com End */
    $smarty->assign('cat_info',     $cat_list);

    make_json_result($smarty->fetch('category_list.htm'));
}
/*------------------------------------------------------ */
//-- 添加商品分类
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add')
{
    /* 权限检查 */
	admin_priv('cat_manage');
    /* 模板赋值 */
    $smarty->assign('ur_here',      $_LANG['04_category_add']);

    /* 代码修改 By  www.68ecshop.com Start */
//    $smarty->assign('action_link',  array('href' => 'category.php?act=list', 'text' => $_LANG['03_category_list']));
    $smarty->assign('action_link',  array('href' => 'category.php?act=list', 'text' => $_LANG['04_category_list']));
    /* 代码增加 By  www.68ecshop.com End */

    $smarty->assign('goods_type_list',  goods_type_list(0)); // 取得商品类型
    $smarty->assign('attr_list',        get_attr_list()); // 取得商品属性

    $smarty->assign('cat_select',   cat_list_2(0, 0, true));
    $smarty->assign('form_act',     'insert');
    $smarty->assign('cat_info',     array('is_show' => 1));




    /* 显示页面 */
    assign_query_info();
    $smarty->display('category_info.htm');
}

/*------------------------------------------------------ */
//-- 商品分类添加时的处理
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'insert')
{
    /* 权限检查 */
	admin_priv('cat_manage');
    /* 初始化变量 */
    $cat['cat_id']       = !empty($_POST['cat_id'])       ? intval($_POST['cat_id'])     : 0;
    $cat['parent_id']    = !empty($_POST['parent_id'])    ? intval($_POST['parent_id'])  : 0;
    $cat['sort_order']   = !empty($_POST['sort_order'])   ? intval($_POST['sort_order']) : 0;
    $cat['keywords']     = !empty($_POST['keywords'])     ? trim($_POST['keywords'])     : '';
    $cat['cat_desc']     = !empty($_POST['cat_desc'])     ? $_POST['cat_desc']           : '';
    $cat['measure_unit'] = !empty($_POST['measure_unit']) ? trim($_POST['measure_unit']) : '';
    $cat['cat_name']     = !empty($_POST['cat_name'])     ? trim($_POST['cat_name'])     : '';
    /* 代码增加 By  www.68ecshop.com Start */
    $arrCatName = explode("," ,$cat['cat_name']);
    /* 代码增加 By  www.68ecshop.com End */
    $cat['show_in_nav']  = !empty($_POST['show_in_nav'])  ? intval($_POST['show_in_nav']): 0;
    $cat['is_show_cat_pic'] = !empty($_POST['is_show_cat_pic'])  ? intval($_POST['is_show_cat_pic']): 0;
    $cat['cat_pic_url'] = !empty($_POST['cat_pic_url'])  ? htmlspecialchars($_POST['cat_pic_url']): '';
    $cat['cat_goods_limit'] = !empty($_POST['cat_goods_limit'])  ? intval($_POST['cat_goods_limit']): '';
    $cat['style']        = !empty($_POST['style'])        ? trim($_POST['style'])        : '';
    $cat['is_show']      = !empty($_POST['is_show'])      ? intval($_POST['is_show'])    : 0;
    $cat['grade']        = !empty($_POST['grade'])        ? intval($_POST['grade'])      : 0;
    $cat['filter_attr']  = !empty($_POST['filter_attr'])  ? implode(',', array_unique(array_diff($_POST['filter_attr'],array(0)))) : 0;

    $cat['cat_recommend']  = !empty($_POST['cat_recommend'])  ? $_POST['cat_recommend'] : array();
	$cat['supplier_id'] = $_SESSION['supplier_id'];

	$catpic = upload_category_pic($cat['cat_id']);//上传图片
	if(!empty($catpic)){
		$cat['cat_pic'] = $catpic;
	}
    /* 代码增加 By  www.68ecshop.com Start */
    foreach($arrCatName as $arrCatNameValue)
    {
        $cat['cat_name'] = $arrCatNameValue;
    /* 代码增加 By  www.68ecshop.com End */

    if (cat_exists_supplier($_SESSION['supplier_id'],$cat['cat_name'], $cat['parent_id']))
    {
        /* 同级别下不能有重复的分类名称 */
       $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
       sys_msg($_LANG['catname_exist'], 0, $link);
    }

    if($cat['grade'] > 10 || $cat['grade'] < 0)
    {
        /* 价格区间数超过范围 */
       $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
       sys_msg($_LANG['grade_error'], 0, $link);
    }

    /* 入库的操作 */
    if ($db->autoExecute($ecs->table('supplier_category'), $cat) !== false)
    {
        $cat_id = $db->insert_id();

		/*
		*  暂时注释掉这部分代码
		*/

        if($cat['show_in_nav'] == 1)
        {
            $vieworder = $db->getOne("SELECT max(vieworder) FROM ". $ecs->table('supplier_nav') . " WHERE type = 'middle' AND supplier_id=".$_SESSION['supplier_id']);
            $vieworder += 2;
            //显示在自定义导航栏中
            $sql = "INSERT INTO " . $ecs->table('supplier_nav') .
                " (name,ctype,cid,ifshow,vieworder,opennew,url,type,supplier_id)".
                " VALUES('" . $cat['cat_name'] . "', 'c', '".$db->insert_id()."','1','$vieworder','0', '" . build_uri('supplier', array('go'=>'category','suppid'=>$_SESSION['supplier_id'],'cid'=> $cat_id), $cat['cat_name']) . "','middle',".$_SESSION['supplier_id'].")";
            $db->query($sql);
        }
        insert_cat_recommend($cat['cat_recommend'], $cat_id);
        /* 代码增加 By  www.68ecshop.com Start */
    }
    }
        /* 代码增加 By  www.68ecshop.com End */


        //admin_log($_POST['cat_name'], 'add', 'category');   // 记录管理员操作
        clear_cache_files();    // 清除缓存

        /*添加链接*/
        $link[0]['text'] = $_LANG['continue_add'];
        $link[0]['href'] = 'category.php?act=add';

        $link[1]['text'] = $_LANG['back_list'];
        $link[1]['href'] = 'category.php?act=list';

        sys_msg($_LANG['catadd_succed'], 0, $link);
        /* 代码删除 By  www.68ecshop.com Start */
//    }
        /* 代码删除 By  www.68ecshop.com End */
    }

/*------------------------------------------------------ */
//-- 编辑商品分类信息
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit')
{
   admin_priv('cat_manage');
    $cat_id = intval($_REQUEST['cat_id']);
    $cat_info = get_cat_info($cat_id);  // 查询分类信息数据
    $attr_list = get_attr_list();
    $filter_attr_list = array();

    if ($cat_info['filter_attr'])
    {
        $filter_attr = explode(",", $cat_info['filter_attr']);  //把多个筛选属性放到数组中

        foreach ($filter_attr AS $k => $v)
        {
            $attr_cat_id = $db->getOne("SELECT cat_id FROM " . $ecs->table('attribute') . " WHERE attr_id = '" . intval($v) . "'");
            $filter_attr_list[$k]['goods_type_list'] = goods_type_list($attr_cat_id);  //取得每个属性的商品类型
            $filter_attr_list[$k]['filter_attr'] = $v;
            $attr_option = array();

            foreach ($attr_list[$attr_cat_id] as $val)
            {
                $attr_option[key($val)] = current ($val);
            }

            $filter_attr_list[$k]['option'] = $attr_option;
        }

        $smarty->assign('filter_attr_list', $filter_attr_list);
    }
    else
    {
        $attr_cat_id = 0;
    }

    /* 模板赋值 */
    $smarty->assign('attr_list',        $attr_list); // 取得商品属性
    $smarty->assign('attr_cat_id',      $attr_cat_id);
    $smarty->assign('ur_here',     $_LANG['category_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['04_category_list'], 'href' => 'category.php?act=list'));

    //分类是否存在首页推荐
    $res = $db->getAll("SELECT recommend_type FROM " . $ecs->table("supplier_cat_recommend") . " WHERE cat_id=" . $cat_id . " AND supplier_id=".$_SESSION['supplier_id']);
    if (!empty($res))
    {
        $cat_recommend = array();
        foreach($res as $data)
        {
            $cat_recommend[$data['recommend_type']] = 1;
        }
        $smarty->assign('cat_recommend', $cat_recommend);
    }

    $smarty->assign('cat_info',    $cat_info);
    $smarty->assign('form_act',    'update');
    $smarty->assign('cat_select',  cat_list_2(0, $cat_info['parent_id'], true));
    $smarty->assign('goods_type_list',  goods_type_list(0)); // 取得商品类型

    /* 显示页面 */
    assign_query_info();
    $smarty->display('category_info.htm');
}

elseif($_REQUEST['act'] == 'add_category')
{
    $parent_id = empty($_REQUEST['parent_id']) ? 0 : intval($_REQUEST['parent_id']);
    $category = empty($_REQUEST['cat']) ? '' : json_str_iconv(trim($_REQUEST['cat']));

    if(cat_exists_supplier($_SESSION['supplier_id'],$category, $parent_id))
    {
        make_json_error($_LANG['catname_exist']);
    }
    else
    {
        $sql = "INSERT INTO " . $ecs->table('supplier_category') . "(cat_name, parent_id, is_show, supplier_id)" .
               "VALUES ( '$category', '$parent_id', 1, ".$_SESSION['supplier_id'].")";

        $db->query($sql);
        $category_id = $db->insert_id();

        $arr = array("parent_id"=>$parent_id, "id"=>$category_id, "cat"=>$category);

        clear_cache_files();    // 清除缓存

        make_json_result($arr);
    }
}

/*------------------------------------------------------ */
//-- 编辑商品分类信息
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'update')
{
    /* 权限检查 */
	admin_priv('cat_manage');
    /* 初始化变量 */
    $cat_id              = !empty($_POST['cat_id'])       ? intval($_POST['cat_id'])     : 0;
    $old_cat_name        = $_POST['old_cat_name'];
    $cat['parent_id']    = !empty($_POST['parent_id'])    ? intval($_POST['parent_id'])  : 0;
    $cat['sort_order']   = !empty($_POST['sort_order'])   ? intval($_POST['sort_order']) : 0;
    $cat['keywords']     = !empty($_POST['keywords'])     ? trim($_POST['keywords'])     : '';
    $cat['cat_desc']     = !empty($_POST['cat_desc'])     ? $_POST['cat_desc']           : '';
    $cat['measure_unit'] = !empty($_POST['measure_unit']) ? trim($_POST['measure_unit']) : '';
    $cat['cat_name']     = !empty($_POST['cat_name'])     ? trim($_POST['cat_name'])     : '';
    $cat['is_show']      = !empty($_POST['is_show'])      ? intval($_POST['is_show'])    : 0;
    $cat['show_in_nav']  = !empty($_POST['show_in_nav'])  ? intval($_POST['show_in_nav']): 0;
    $cat['is_show_cat_pic'] = !empty($_POST['is_show_cat_pic'])  ? intval($_POST['is_show_cat_pic']): 0;
    $cat['cat_pic_url'] = !empty($_POST['cat_pic_url'])  ? htmlspecialchars($_POST['cat_pic_url']): '';
    $cat['cat_goods_limit'] = !empty($_POST['cat_goods_limit'])  ? intval($_POST['cat_goods_limit']): '';
    $cat['style']        = !empty($_POST['style'])        ? trim($_POST['style'])        : '';
    $cat['grade']        = !empty($_POST['grade'])        ? intval($_POST['grade'])      : 0;
    $cat['filter_attr']  = !empty($_POST['filter_attr'])  ? implode(',', array_unique(array_diff($_POST['filter_attr'],array(0)))) : 0;
    $cat['cat_recommend']  = !empty($_POST['cat_recommend'])  ? $_POST['cat_recommend'] : array();
	$cat['supplier_id'] = $_SESSION['supplier_id'];

	$catpic = upload_category_pic($cat_id);//上传图片
	if(!empty($catpic)){
		$cat['cat_pic'] = $catpic;
	}

    /* 判断分类名是否重复 */

    if ($cat['cat_name'] != $old_cat_name)
    {
        if (cat_exists_supplier($_SESSION['supplier_id'],$cat['cat_name'],$cat['parent_id'], $cat_id))
        {
           $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
           sys_msg($_LANG['catname_exist'], 0, $link);
        }
    }

    /* 判断上级目录是否合法 */
    $children = array_keys(cat_list_2($cat_id, 0, false));     // 获得当前分类的所有下级分类
    if (in_array($cat['parent_id'], $children))
    {
        /* 选定的父类是当前分类或当前分类的下级分类 */
       $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
       sys_msg($_LANG["is_leaf_error"], 0, $link);
    }

    if($cat['grade'] > 10 || $cat['grade'] < 0)
    {
        /* 价格区间数超过范围 */
       $link[] = array('text' => $_LANG['go_back'], 'href' => 'javascript:history.back(-1)');
       sys_msg($_LANG['grade_error'], 0, $link);
    }

    $dat = $db->getRow("SELECT cat_name, show_in_nav FROM ". $ecs->table('supplier_category') . " WHERE cat_id = '$cat_id'");

    if ($db->autoExecute($ecs->table('supplier_category'), $cat, 'UPDATE', "cat_id='$cat_id'"))
    {
        if($cat['cat_name'] != $dat['cat_name'])
        {
            //如果分类名称发生了改变
            $sql = "UPDATE " . $ecs->table('supplier_nav') . " SET name = '" . $cat['cat_name'] . "' WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle' AND supplier_id=".$_SESSION['supplier_id'];
            $db->query($sql);
        }

		/*
		* 暂时注释掉这部分代码
		*/

        if($cat['show_in_nav'] != $dat['show_in_nav'])
        {
            //是否显示于导航栏发生了变化
            if($cat['show_in_nav'] == 1)
            {
                //显示
                $nid = $db->getOne("SELECT id FROM ". $ecs->table('supplier_nav') . " WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle' AND supplier_id=".$_SESSION['supplier_id']);
                if(empty($nid))
                {
                    //不存在
                    $vieworder = $db->getOne("SELECT max(vieworder) FROM ". $ecs->table('supplier_nav') . " WHERE type = 'middle' AND supplier_id=".$_SESSION['supplier_id']);
                    $vieworder += 2;
                    $uri = build_uri('supplier', array('go'=>'category','suppid'=>$_SESSION['supplier_id'],'cid'=> $cat_id), $cat['cat_name']);

                    $sql = "INSERT INTO " . $ecs->table('supplier_nav') . " (name,ctype,cid,ifshow,vieworder,opennew,url,type,supplier_id) VALUES('" . $cat['cat_name'] . "', 'c', '$cat_id','1','$vieworder','0', '" . $uri . "','middle',".$_SESSION['supplier_id'].")";
                }
                else
                {
                    $sql = "UPDATE " . $ecs->table('supplier_nav') . " SET ifshow = 1 WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle' AND supplier_id=".$_SESSION['supplier_id'];
                }
                $db->query($sql);
            }
            else
            {
                //去除
                $db->query("UPDATE " . $ecs->table('supplier_nav') . " SET ifshow = 0 WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle' AND supplier_id=".$_SESSION['supplier_id']);
            }
        }

        //更新首页推荐
        insert_cat_recommend($cat['cat_recommend'], $cat_id);


        /* 更新分类信息成功 */
        clear_cache_files(); // 清除缓存
        //admin_log($_POST['cat_name'], 'edit', 'category'); // 记录管理员操作

        /* 提示信息 */
        $link[] = array('text' => $_LANG['back_list'], 'href' => 'category.php?act=list');
        sys_msg($_LANG['catedit_succed'], 0, $link);
    }
}

/*------------------------------------------------------ */
//-- 批量转移商品分类页面
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'move')
{
    /* 权限检查 */
    admin_priv('cat_drop');


    $cat_id = !empty($_REQUEST['cat_id']) ? intval($_REQUEST['cat_id']) : 0;

    /* 模板赋值 */
    $smarty->assign('ur_here',     $_LANG['move_goods']);
    $smarty->assign('action_link', array('href' => 'category.php?act=list', 'text' => $_LANG['04_category_list']));

    //$smarty->assign('cat_select', cat_list(0, $cat_id, true));
    $smarty->assign('cat_select', cat_list_2(0, $cat_id, true));
    $smarty->assign('form_act',   'move_cat');

    /* 显示页面 */
    assign_query_info();
    $smarty->display('category_move.htm');
}

/*------------------------------------------------------ */
//-- 处理批量转移商品分类的处理程序
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'move_cat')
{
    /* 权限检查 */
    admin_priv('cat_drop');

    $cat_id        = !empty($_POST['cat_id'])        ? intval($_POST['cat_id'])        : 0;
    $target_cat_id = !empty($_POST['target_cat_id']) ? intval($_POST['target_cat_id']) : 0;

    /* 商品分类不允许为空 */
    if ($cat_id == 0 || $target_cat_id == 0)
    {
        $link[] = array('text' => $_LANG['go_back'], 'href' => 'category.php?act=move');
        sys_msg($_LANG['cat_move_empty'], 0, $link);
    }

    /* 更新商品分类 */
    //$sql = "UPDATE " .$ecs->table('goods'). " SET cat_id = '$target_cat_id' ".
          // "WHERE cat_id = '$cat_id'";
    $sql = "UPDATE " .$ecs->table('supplier_goods_cat'). " SET cat_id = '$target_cat_id' ".
           "WHERE cat_id = '$cat_id' AND supplier_id = ".$_SESSION['supplier_id'];
    if ($db->query($sql))
    {
        /* 清除缓存 */
        clear_cache_files();

        /* 提示信息 */
        $link[] = array('text' => $_LANG['go_back'], 'href' => 'category.php?act=list');
        sys_msg($_LANG['move_cat_success'], 0, $link);
    }
}

/*------------------------------------------------------ */
//-- 编辑排序序号
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'edit_sort_order')
{
    check_authz_json('cat_manage');

    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if (cat_update($id, array('sort_order' => $val)))
    {
        clear_cache_files(); // 清除缓存
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- 编辑数量单位
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'edit_measure_unit')
{
    check_authz_json('cat_manage');

    $id = intval($_POST['id']);
    $val = json_str_iconv($_POST['val']);

    if (cat_update($id, array('measure_unit' => $val)))
    {
        clear_cache_files(); // 清除缓存
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- 编辑排序序号
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'edit_grade')
{
    check_authz_json('cat_manage');

    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if($val > 10 || $val < 0)
    {
        /* 价格区间数超过范围 */
        make_json_error($_LANG['grade_error']);
    }

    if (cat_update($id, array('grade' => $val)))
    {
        clear_cache_files(); // 清除缓存
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- 切换是否显示在导航栏
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'toggle_show_in_nav')
{
    check_authz_json('cat_manage');

    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if (cat_update($id, array('show_in_nav' => $val)) != false)
    {
        if($val == 1)
        {
            //显示
            $vieworder = $db->getOne("SELECT max(vieworder) FROM ". $ecs->table('supplier_nav') . " WHERE type = 'middle' AND supplier_id=".$_SESSION['supplier_id']);
            $vieworder += 2;
            $catname = $db->getOne("SELECT cat_name FROM ". $ecs->table('supplier_category') . " WHERE cat_id = '$id'");
            //显示在自定义导航栏中
            $_CFG['rewrite'] = 0;
            $uri = build_uri('supplier', array('go'=>'category','suppid'=>$_SESSION['supplier_id'],'cid'=> $id), $catname);

            $nid = $db->getOne("SELECT id FROM ". $ecs->table('supplier_nav') . " WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle' AND supplier_id=".$_SESSION['supplier_id']);
            if(empty($nid))
            {
                //不存在
                $sql = "INSERT INTO " . $ecs->table('supplier_nav') . " (name,ctype,cid,ifshow,vieworder,opennew,url,type,supplier_id) VALUES('" . $catname . "', 'c', '$id','1','$vieworder','0', '" . $uri . "','middle',".$_SESSION['supplier_id'].")";
            }
            else
            {
                $sql = "UPDATE " . $ecs->table('supplier_nav') . " SET ifshow = 1 WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle' AND supplier_id=".$_SESSION['supplier_id'];
            }
            $db->query($sql);
        }
        else
        {
            //去除
            $db->query("UPDATE " . $ecs->table('supplier_nav') . "SET ifshow = 0 WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle' AND supplier_id=".$_SESSION['supplier_id']);
        }
        clear_cache_files();
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- 切换是否显示
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'toggle_is_show')
{
    check_authz_json('cat_manage');

    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if (cat_update($id, array('is_show' => $val)) != false)
    {
        clear_cache_files();
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */

//-- 删除图片

/*------------------------------------------------------ */



elseif ($_REQUEST['act'] == 'delete_image')

{

     $img_id=$_GET['img_id'];

     $sqls = "UPDATE " . $GLOBALS['ecs']->table('supplier_category') . "

      SET cat_pic = ''  WHERE cat_id =".$img_id;


     $GLOBALS['db']->query($sqls);

     unlink($_GET['img_url']);

     /* 提示信息 */
     $link[] = array('text' => $_LANG['back_list'], 'href' => 'category.php?act=list');
     sys_msg($_LANG['catedit_succed'], 0, $link);



}


/*------------------------------------------------------ */
//-- 删除商品分类
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'remove')
{
    check_authz_json('cat_manage');

    /* 初始化分类ID并取得分类名称 */
    $cat_id   = intval($_GET['id']);
    $cat_name = $db->getOne('SELECT cat_name FROM ' .$ecs->table('supplier_category'). " WHERE cat_id='$cat_id'");

    /* 当前分类下是否有子分类 */
    $cat_count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('supplier_category'). " WHERE parent_id='$cat_id' AND supplier_id=".$_SESSION['supplier_id']);

    /* 当前分类下是否存在商品 */
    //$goods_count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('goods'). " WHERE cat_id='$cat_id' AND supplier_id = ".$_SESSION['supplier_id']);
    $goods_count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('supplier_goods_cat'). " WHERE cat_id='$cat_id' AND supplier_id = ".$_SESSION['supplier_id']);

    /* 如果不存在下级子分类和商品，则删除之 */
    if ($cat_count == 0 && $goods_count == 0)
    {
        /* 删除分类 */
        $sql = 'DELETE FROM ' .$ecs->table('supplier_category'). " WHERE cat_id = '$cat_id'";
        if ($db->query($sql))
        {
            //$db->query("DELETE FROM " . $ecs->table('nav') . "WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'");
            clear_cache_files();
            //admin_log($cat_name, 'remove', 'category');
        }
    }
    else
    {
        make_json_error($cat_name .' '. $_LANG['cat_isleaf']);
    }

    $url = 'category.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
    exit;
}

/*------------------------------------------------------ */
//-- PRIVATE FUNCTIONS
/*------------------------------------------------------ */
//
///**
// * 检查分类是否已经存在
// *
// * @param   string      $cat_name       分类名称
// * @param   integer     $parent_cat     上级分类
// * @param   integer     $exclude        排除的分类ID
// *
// * @return  boolean
// */
//function cat_exists($cat_name, $parent_cat, $exclude = 0)
//{
//    $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('supplier_category').
//           " WHERE parent_id = '$parent_cat' AND cat_name = '$cat_name' AND cat_id<>'$exclude'";
//    return ($GLOBALS['db']->getOne($sql) > 0) ? true : false;
//}

/**
 * 获得商品分类的所有信息
 *
 * @param   integer     $cat_id     指定的分类ID
 *
 * @return  mix
 */
function get_cat_info($cat_id)
{
    $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('supplier_category'). " WHERE cat_id='$cat_id' LIMIT 1";
    return $GLOBALS['db']->getRow($sql);
}

/**
 * 添加商品分类
 *
 * @param   integer $cat_id
 * @param   array   $args
 *
 * @return  mix
 */
function cat_update($cat_id, $args)
{
    if (empty($args) || empty($cat_id))
    {
        return false;
    }

    return $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('supplier_category'), $args, 'update', "cat_id='$cat_id'");
}


/**
 * 获取属性列表
 *
 * @access  public
 * @param
 *
 * @return void
 */
function get_attr_list()
{
    $sql = "SELECT a.attr_id, a.cat_id, a.attr_name ".
           " FROM " . $GLOBALS['ecs']->table('attribute'). " AS a,  ".
           $GLOBALS['ecs']->table('goods_type') . " AS c ".
           " WHERE  a.cat_id = c.cat_id AND c.enabled = 1 ".
           " ORDER BY a.cat_id , a.sort_order";

    $arr = $GLOBALS['db']->getAll($sql);

    $list = array();

    foreach ($arr as $val)
    {
        $list[$val['cat_id']][] = array($val['attr_id']=>$val['attr_name']);
    }

    return $list;
}

/**
 * 更新分类代表图片
 * @param int $catid 分类id
 * @param string $pic 图片路径
 */
function update_category_pic($catid,$pic){
	$sql = "UPDATE " . $ecs->table('supplier_shop_config') . " SET cat_pic = '$pic' WHERE cat_id = '$catid' AND supplier_id=".$_SESSION['supplier_id'];
    $GLOBALS['db']->query($sql);
}

/**
 * 插入首页推荐扩展分类
 *
 * @access  public
 * @param   array   $recommend_type 推荐类型
 * @param   integer $cat_id     分类ID
 *
 * @return void
 */
function insert_cat_recommend($recommend_type, $cat_id)
{
    //检查分类是否为首页推荐
    if (!empty($recommend_type))
    {
        //取得之前的分类
        $recommend_res = $GLOBALS['db']->getAll("SELECT recommend_type FROM " . $GLOBALS['ecs']->table("supplier_cat_recommend") . " WHERE cat_id=" . $cat_id . " AND supplier_id=".$_SESSION['supplier_id']);
        if (empty($recommend_res))
        {
            foreach($recommend_type as $data)
            {
                $data = intval($data);
                $GLOBALS['db']->query("INSERT INTO " . $GLOBALS['ecs']->table("supplier_cat_recommend") . "(cat_id, recommend_type, supplier_id) VALUES ('$cat_id', '$data', ".$_SESSION['supplier_id'].")");
            }
        }
        else
        {
            $old_data = array();
            foreach($recommend_res as $data)
            {
                $old_data[] = $data['recommend_type'];
            }
            $delete_array = array_diff($old_data, $recommend_type);
            if (!empty($delete_array))
            {
                $GLOBALS['db']->query("DELETE FROM " . $GLOBALS['ecs']->table("supplier_cat_recommend") . " WHERE supplier_id=".$_SESSION['supplier_id']." AND cat_id=$cat_id AND recommend_type " . db_create_in($delete_array));
            }
            $insert_array = array_diff($recommend_type, $old_data);
            if (!empty($insert_array))
            {
                foreach($insert_array as $data)
                {
                    $data = intval($data);
                    $GLOBALS['db']->query("INSERT INTO " . $GLOBALS['ecs']->table("supplier_cat_recommend") . "(cat_id, recommend_type, supplier_id) VALUES ('$cat_id', '$data', ".$_SESSION['supplier_id'].")");
                }
            }
        }
    }
    else
    {
        $GLOBALS['db']->query("DELETE FROM ". $GLOBALS['ecs']->table("supplier_cat_recommend") . " WHERE cat_id=" . $cat_id. " AND supplier_id=".$_SESSION['supplier_id']);
    }
}

/**
 * 分类商品代表图片
 * @param int $catid 商品分类id
 */
function upload_category_pic($catid){

	/* 允许上传的文件类型 */
    $allow_file_types = '|GIF|JPG|PNG|BMP|';
	foreach ($_FILES AS $code => $file)
    {
        /* 判断用户是否选择了文件 */
        if ((isset($file['error']) && $file['error'] == 0) || (!isset($file['error']) && $file['tmp_name'] != 'none'))
        {
            /* 检查上传的文件类型是否合法 */
            if (!check_file_type($file['tmp_name'], $file['name'], $allow_file_types))
            {
                sys_msg(sprintf($_LANG['msg_invalid_file'], $file['name']));
            }
            else
            {
            	$file_name = "../data/supplier/category/";

                if($code == 'cat_pic')
                {
                	$ext = array_pop(explode('.', $file['name']));
                	$file_name .= $_SESSION['supplier_id'].'c'.time() . '.' . $ext;
                    if($catid>0){
                    	$catpic = get_cat_info($catid);
	                    if (file_exists($catpic['cat_pic']))
	                    {
	                        @unlink($catpic['cat_pic']);
	                    }
                    }
                }
                /* 判断是否上传成功 */
                if (move_upload_file($file['tmp_name'], $file_name))
                {
                   return $file_name;
                }
                else
                {
                    sys_msg(sprintf($_LANG['msg_upload_failed'], $file['name'], $file_name));
                }
            }
        }
    }
}

/* 代码增加 By  www.68ecshop.com Start */
/**
 * 根据关键词搜索商品分类
 *
 * @access  public
 *
 * @return mix
 */
function search_cat($cat_name)
{
    $res = NULL;

    // 根据类别名称进行模糊查询
    $sql = "SELECT c.cat_id, c.cat_name, c.measure_unit, c.parent_id, c.is_show, c.show_in_nav, c.grade, c.sort_order, COUNT(s.cat_id) AS has_children ".
        'FROM ' . $GLOBALS['ecs']->table('supplier_category') . " AS c ".
        "LEFT JOIN " . $GLOBALS['ecs']->table('supplier_category') . " AS s ON s.parent_id=c.cat_id  where c.supplier_id = ".$_SESSION['supplier_id'].
        " GROUP BY c.cat_id ".
        "HAVING c.cat_name LIKE '%".$cat_name."%' ".
        'ORDER BY c.parent_id, c.sort_order ASC';
    $res = $GLOBALS['db']->getAll($sql);

    // 查询所有类别
    $sql = "SELECT c.cat_id, c.cat_name, c.measure_unit, c.parent_id, c.is_show, c.show_in_nav, c.grade, c.sort_order, COUNT(s.cat_id) AS has_children ".
        'FROM ' . $GLOBALS['ecs']->table('supplier_category') . " AS c ".
        "LEFT JOIN " . $GLOBALS['ecs']->table('supplier_category') . " AS s ON s.parent_id=c.cat_id  where c.supplier_id = ".$_SESSION['supplier_id'].
        " GROUP BY c.cat_id ".
        'ORDER BY c.parent_id, c.sort_order ASC';
    $res1 = $GLOBALS['db']->getAll($sql);

    // 构建一个全分类的Map集合<cat_id, cat>
    $cat_map = array();
    foreach ($res1 as $cat)
    {
        if(!empty($cat)){
            $cat_id = $cat['cat_id'];
            $cat_map[$cat_id] = $cat;
        }
    }

    // 对商品类别进行排序
    $res1 = cat_options2(0, $res1);

    // 获取查询结果的上级所有父类别
    $parents = array();
    $cat_result = array();
    foreach ($res as $cat)
    {
        $cat_result[$cat['cat_id']] = 1;
        array_push($parents, $cat);
        get_cat_parents($parents, $cat_map, $cat['cat_id']);
    }

    // 重构集合，只包含将来返回结果所包含的类别
    $cat_map = array();
    foreach ($parents as $cat)
    {
        $cat_map[$cat['cat_id']] = $cat;
    }

    // 移除与查询结果无关的类别
    $res = array();
    foreach ($res1 as $cat)
    {
        if(!empty($cat_map[$cat['cat_id']])){
            // 标识出匹配查询条件的结果
            if(empty($cat_result[$cat['cat_id']])){
                $cat['is_result'] = 2;
            }else{
                $cat['is_result'] = 1;
            }
            array_push($res, $cat);
        }
    }

    return $res;
}

/**
 *
 * 获取指定类别ID的所有上级类别并存放到指定数组中
 *
 * @access private
 * @param $parents 存放所有上级类别
 * @param $cat_map 存放所有类别的Map集合
 * @param $cat_id 待获取上级类别的类别ID
 */
function get_cat_parents(&$parents, $cat_map, $cat_id)
{

    if(empty($parents)){
        $parents = array();
    }

    $cat = $cat_map[$cat_id];
    $parent_id = $cat['parent_id'];

    $cat = $cat_map[$parent_id];

    if($parent_id != 0)
    {
        // 递归
        get_cat_parents($parents, $cat_map, $parent_id);
    }

    array_push($parents, $cat);

}
/* 代码增加 By  www.68ecshop.com End */

?>