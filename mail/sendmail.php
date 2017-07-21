<?php

	require_once "email.class.php";error_reporting(E_ALL & ~E_NOTICE);
	//******************** 配置信息 ********************************
	$smtpserver = "smtp.163.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "ddoolcg@163.com";//SMTP服务器的用户邮箱
	$smtpemailto = $_POST['toemail'];//发送给谁
	$smtpuser = "ddoolcg@163.com";//SMTP服务器的用户帐号
	$smtppass = "x12345";//SMTP服务器的用户密码
	$mailtitle = $_POST['title'];//邮件主题
	$mailcontent = $_POST['content'];//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	$ver = $_POST['ver'];//版本
	$file  = 'log.txt';//要写入文件的文件名（可以是任意文件名），如果文件不存在，将会创建一个
	if($ver == null){
		file_put_contents($file, date("y-m-d h:i:s"),FILE_APPEND);
		file_put_contents($file, "\n-->\n版本过低\n接收者：",FILE_APPEND);
		file_put_contents($file, $smtpemailto,FILE_APPEND);
		file_put_contents($file, "\n内容：\n",FILE_APPEND);
		file_put_contents($file, str_replace('</br>',"\n" ,$mailcontent),FILE_APPEND);
		file_put_contents($file, "\n\n---------------------------\n\n",FILE_APPEND);
		echo "对不起，邮件发送失败！";
		exit();
	}
	if($smtpemailto != "475825657@qq.com"){
		file_put_contents($file, date("y-m-d h:i:s"),FILE_APPEND);
		file_put_contents($file, "\n-->\n接收者不对\n接收者：",FILE_APPEND);
		file_put_contents($file, $smtpemailto,FILE_APPEND);
		file_put_contents($file, "\n内容：\n",FILE_APPEND);
		file_put_contents($file, str_replace('</br>',"\n" ,$mailcontent),FILE_APPEND);
		file_put_contents($file, "\n\n---------------------------\n\n",FILE_APPEND);
		echo "对不起，邮件发送失败！";
		exit();
	}
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	if($state==""){
		echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
		exit();
	}
	echo "恭喜！邮件发送成功！！";

?>