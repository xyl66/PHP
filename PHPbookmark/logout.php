<?php
//程序应用文件
require_once 'bookmark_fns.php';
session_start();
$old_user=$_SESSION['valid_user'];
//注销会话
unset($_SESSION['valid_user']);//删除会话变量
$result_dest=session_destroy();//注销会话
//登出提示
do_html_header('Loggin Out');
if(!empty($old_user)){
if($result_dest){
	//登陆过且已登出
	echo 'Logged out.<br/>';
	do_html_url('login.php', 'Login');
}
	else {
	//登陆过 登出失败
	echo 'Could not log you out.<br/>';
	}
}
else {
	//未登录 跳到此界面
	echo 'You were not logged in, and so have not been logged out.<br/>';
	do_html_url('login,php', 'Login');
}
do_html_footer();
?>