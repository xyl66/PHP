<?php
function filled_out($form_vars){
	//检测表单是否完全填写
	foreach ($form_vars as $key=>$value )
	{
		if((!isset($key))||($value==''))
		{
			return false;
		}
	}
	return true;
}
function valid_email($address){
//检测邮件地址是否有效
	if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address))
	{
		return true;
	}
	else 
	{
		return  false;
	}
}
/*在用户提交该表单时，我们还要做两件事：
（通过 PHP trim() 函数）去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
（通过 PHP stripslashes() 函数）删除用户输入数据中的反斜杠（\）*/
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}