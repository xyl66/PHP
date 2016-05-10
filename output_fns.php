<?php
function do_html_header($title){
	//print an HTML header
	?><!DOCTYPE HTML>
	<html lang="zh-CN">
	<head><!--
	引入bootstrap
	-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php  echo $title;?></title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!--
	引入bootstrap
	-->
	</head>
	<body>
	<div class="container">
	<div class="row">
	<div class="col-xs-12 col-sm-2">
	<img src="./img/bookmark.png" alt="PHPbookmark logo" boder="0" align="left" valign="bottom" height="55" width="57"/>
	</div>
	<div class="<div class="col-xs-12 col-sm-10">
	<h1>PHPbookmark</h1>
	</div>
	</div>
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
	<div class="site">
	<div class="row">
	<div class="col-xs-6 col-sm-3" >
	<p>&#149&nbsp;Store your bookmarks online with us!</p>
	</div>
	<div class="col-xs-6 col-sm-3" >
	<p>&#149&nbsp;See what other users use!</p>
	</div>
	<div class="col-xs-6 col-sm-3" >
	<p>&#149&nbsp;Share your favorite links with others!</p>
	</div>
	<div class="col-xs-6 col-sm-3" >
	<p>&#149&nbsp;Read this when you have time!</p>
	</div>
	</div>
	</div>
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
	<lable>Username:</lable><input name="username" type="text"><br/>
	<lable>Password:</lable><input name="passwd" type="password"><br/>
	<input id="login" type="submit" value="Login">
	</form>
	<a>Forgot your password?</a>
	</div>
	
<?php 
}
function do_html_footer(){
	//print footer
	?>
	</div>
	</body>

<?php 
}
function display_registration_form(){
	//print registration_form
	?>
	<div class="regist_dv">
	<form action="register_new.php" method="post">
	<label>Email address:</label><input name="email" type="text"><br/>
	<label>Preferred username:</label><input name="username" type="text"><br/>
	<label>Password:</label><input name="passwd" type="password"><br/>
	<label>Confirm password:</label><input name="passwd2" type="password"><br/>
	<input id="regist" type="submit" value="Register">
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
	<input name="del_me[]" type="checkbox" value="<?php echo $url?>">
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
		|<span style=\"color: #cccccc\">Delete BM</html> &nbsp;|&nbsp;|
		<?php 
		do_html_url('change_passwd', 'Change password')."|".do_html_url('recommend.php', 'Recommend URLs to me')."|".do_html_url('logout.php', 'Logout')
		?>
<?php }
}
?>
