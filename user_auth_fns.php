<?php
require_once 'db_fns.php';
function register($username,$email,$password){
//数据库中注册新用户
//返回 true 或者错误信息
//连接数据库
$conn=db_connect();
//检查用户名是否存在
$conn->query("SET NAMES `UTF-8`");
$result=$conn->query("select * from user where username='".$username."'");
if(!$result)
{
	throw new Exception('Could not execute query');
}
if($result->num_rows>0){
throw new Exception('That username is taken - goback and choose another one.');
}
//if ok,put in db
$sql="insert into user values('".$username."',sha1('".$password."'),'".$email."')";
echo $sql;
$result=$conn->query($sql);
if(!$result){
	throw new Exception('Could not register you in database - please try again later.');
}
return true;
}
function login($username,$password)
{
	//check usernmae and password in db
	//if yes,return true
	//else throw exception
	//connect to db
	$conn=db_connect();
	$sql="select * from user where username='".$username."'and passwd=sha1('".$password."')";
	$result=$conn->query($sql);
	if(!$result)
	{
		echo $sql;
		throw new Exception('Could not log you in.');
	}	
	if($result->num_rows>0){
		return true;
	}
	else {
		throw new Exception('Could not log you in.');
	}
}
function check_valid_user(){
	//检测用户是否有有效的会话
	if(isset($_SESSION['valid_user'])){
		echo "Logged in as ".$_SESSION['valid_user'].".<br/>";
	}
	else {
		do_html_heading('Problem:');
		echo 'You are not logged in.<br/>';
		do_html_url('login.php', 'Login');
		do_html_footer();
		exit;
	}
}
?>