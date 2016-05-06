<?php
function do_html_header($title){
	//print an HTML header
	?><!DOCTYPE HTML>
	<html>
	<head>
	<title><?php  echo $title;?></title>
	<style>
	body {font-family:Arial,Helvetica,sans-serif;font-size:13px}
	li,td{font-family:Arial,Helvetica,sans-serif;font-size:13px}
	hr{color:#3333cc;width:300px;text-align:left }
	a{color: #000000}
	</style>
	</head>
	<body>
	<img src="./img/bookmark.png" alt="PHPbookmark logo" boder="0" align="left" valign="bottom" height="55" width="57"/>
	<h1>PHPbookmark</h1>
	<hr />
	<?php 
	if($title)
	{
		do_html_heading($title);
	}
}
function do_html_heading($title){
	//print heading
	?>
	<h2><?php echo $title ?></h2>
	<br/>
<?php }
function display_site_info(){
	//print site_info
	?>
	<p>Store your bookmarks online with us!</p>
	<br/>
	<p>See what other users use!</p>
	<br/>
	<p>share your favorite links with others!</p>
	<br/>
<?php 
}
function display_login_form(){
	//print login_form
	do_html_url('register_form.php', 'Not a menber?')
	?>
	<br/>
	<div class="login_dv">
	<form action="member.php" method="post">
	<p>Members log in here</p><br/>
	<lable>Username:</lable><input name="username" type="text"></input><br/>
	<lable>Password:</lable><input name="passwd" type="password"></input><br/>
	<input id="login" type="submit" value="Login"></input>
	</form>
	<a>Forgot your password?</a>
	</div>
	
<?php 
}
function do_html_footer(){
	//print footer
	?>

<?php 
}
function display_registration_form(){
	//print registration_form
	?>
	<div class="regist_dv">
	<form action="register_new.php" method="post">
	<label>Email address:</label><input name="email" type="text"></input><br/>
	<label>Preferred username:</label><input name="username" type="text"></input><br/>
	<label>Password:</label><input name="passwd" type="password"></input><br/>
	<label>Confirm password:</label><input name="passwd2" type="password"></input><br/>
	<input id="regist" type="submit" value="Register"></input>
	</form>
	</div>
<?php }
function display_user_urls($url_array){
	//显示图书
	global $bm_table;
	$bm_table=true;
	?>
	<table>
	<thead>
	<tr>
	<td><h5>Bookmark</h5></td>
	<td><h5>Delete?</h5></td>
	</tr>
	</thead>
	<tbody>
	<form name="bm_table" action="delete_bms.php" method="post">
	<?php foreach($url_array as $url){?>
	<tr>
	<td>
	<a href="<?php echo $url?>"><?php echo test_input($url)?></a>
	</td>
	<td>
	<input name="del_me[]" type="checkbox" value="<?php echo $url?>"></input>
	</td>
	</tr>
	<?php }?>
	</form>
	</tbody>
	</table>
<?php }
function display_user_menu(){
	//创建菜单
	global $bm_table;
	if($bm_table){
		do_html_url('member.php', 'Home')."|".do_html_url('add_bms.php', 'Add BM')?>
		|<a href='#' onClick='bm_table.submit()';>Delete BM</a> &nbsp;|&nbsp;|
		<?php do_html_url('change_passwd', 'Change password')."|".do_html_url('recommend.php', 'Recommend URLs to me')."|".do_html_url('logout.php', 'Logout');
	}
	else 
	{
		do_html_url('member.php', 'Home')."|".do_html_url('add_bms.php', 'Add BM')?>
		|<span style=\"color: #cccccc\">Delete BM</span> &nbsp;|&nbsp;|
		<?php 
		do_html_url('change_passwd', 'Change password')."|".do_html_url('recommend.php', 'Recommend URLs to me')."|".do_html_url('logout.php', 'Logout')
		?>
<?php }
}
?>
