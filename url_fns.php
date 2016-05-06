<?php
function do_html_url($url,$title)
{
	?>
	<a href="<?php echo $url?>"><?php echo $title?></a>
<?php }
?>
<?php
function get_user_urls($username){
	//查询数据库
	$conn=db_connect();
	$sql="select bm_URL from bookmark where username='".$username."'";
	$result=$conn->query($sql);
	if(!$result){
		return  false;
	}
	//已数组返回查询到的结果
	$url_array=array();
	for($count=1;$row=$result->fetch_row();++$count){
		$url_array[$count]=$row[0];
	}
	return  $url_array;
} 
?>