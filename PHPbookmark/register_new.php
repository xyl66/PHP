<?php
//引用文件
require_once 'bookmark_fns.php';
//创建变量
$email=test_input($_POST['email']);
$username=test_input($_POST['username']);
$passwd=test_input($_POST['passwd']);
$passwd2=test_input($_POST['passwd2']);
//启动会话
//在使用会话前要先开启
session_start();
try{
	//检查表单是否填写
	if(!filled_out($_POST))
	{
		throw new Exception('You have not filled the form out correctly-please go back and try again.');
	}
	//检查邮箱合法性
	if(!valid_email($email))
	{
		throw new Exception('That is not a valid email address.Please go back and try again.');
	}
	//密码输入是否一致
	if($passwd!=$passwd2)
	{
		throw new Exception('The passwords you entered do not match - palease go back and try again.');
	}
	//检查 密码长度
	if((strlen($passwd)<6)||(strlen($passwd)>16))
	{
		throw new Exception('Your password must be between 6 and 16 characters. Please go back and try again.');
	}
	//数据库注册用户
	register($username,$email,$passwd);
	//注册会话变量
	$_SESSION['valid_user']=$username;
	//provide link to member page
	do_html_header('Registration successful');
	echo 'Your registration was successful. Go to the members page to start setting up your bookmarks!';
	do_html_url('member.php','Go to members page');
	//end page
	do_html_footer();
}
catch (Exception $e)
{
	do_html_header('Problem:');
	echo $e->getMessage();
	do_html_footer();
	exit;
}
?>