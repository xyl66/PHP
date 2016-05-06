<?php
require_once 'bookmark_fns.php';
session_start();
//创建变量
$username=test_input($_POST['username']);
$passwd=test_input($_POST['passwd']);
if($username&&$passwd){
//尝试登录
try{
	login($username,$passwd);
	//如果在数据库存在用户id
	$_SESSION['valid_user']=$username;//保存数据岛会话变量中
}
catch (Exception $e){
	// 登录失败
	do_html_header('Problem:');
	echo 'You could not be logged in.
		  You must be logged in to view this page.';
	do_html_url('login.php', 'Login');
	do_html_footer();
	exit;
}
}
do_html_header('Home');
check_valid_user();
//获取当前用户保存的购物车
if($url_arry=get_user_urls($_SESSION['valid_user'])){
	display_user_urls($url_arry);
}
//获取选择菜单
display_user_menu();
do_html_footer();
?>
<script>
function bm_table.submit(){
....
}
</script>