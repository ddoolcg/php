<?php

	require_once "email.class.php";error_reporting(E_ALL & ~E_NOTICE);
	//******************** 閰嶇疆淇℃伅 ********************************
	$smtpserver = "smtp.163.com";//SMTP鏈嶅姟鍣�	$smtpserverport =25;//SMTP鏈嶅姟鍣ㄧ鍙�	$smtpusermail = "ddoolcg@163.com";//SMTP鏈嶅姟鍣ㄧ殑鐢ㄦ埛閭
	$smtpemailto = $_POST['toemail'];//鍙戦�缁欒皝
	$smtpuser = "ddoolcg@163.com";//SMTP鏈嶅姟鍣ㄧ殑鐢ㄦ埛甯愬彿
	$smtppass = "x12345";//SMTP鏈嶅姟鍣ㄧ殑鐢ㄦ埛瀵嗙爜
	$mailtitle = $_POST['title'];//閭欢涓婚
	$mailcontent = $_POST['content'];//閭欢鍐呭
	$mailtype = "HTML";//閭欢鏍煎紡锛圚TML/TXT锛�TXT涓烘枃鏈偖浠�	$ver = $_POST['ver'];//鐗堟湰
	$file  = 'log.txt';//瑕佸啓鍏ユ枃浠剁殑鏂囦欢鍚嶏紙鍙互鏄换鎰忔枃浠跺悕锛夛紝濡傛灉鏂囦欢涓嶅瓨鍦紝灏嗕細鍒涘缓涓�釜
	if($ver == null){
		file_put_contents($file, date("y-m-d h:i:s"),FILE_APPEND);
		file_put_contents($file, "\n-->\n鐗堟湰杩囦綆\n鎺ユ敹鑰咃細",FILE_APPEND);
		file_put_contents($file, $smtpemailto,FILE_APPEND);
		file_put_contents($file, "\n鍐呭锛歕n",FILE_APPEND);
		file_put_contents($file, str_replace('</br>',"\n" ,$mailcontent),FILE_APPEND);
		file_put_contents($file, "\n\n---------------------------\n\n",FILE_APPEND);
		echo "瀵逛笉璧凤紝閭欢鍙戦�澶辫触锛�;
		exit();
	}
	if($smtpemailto != "475825657@qq.com"){
		file_put_contents($file, date("y-m-d h:i:s"),FILE_APPEND);
		file_put_contents($file, "\n-->\n鎺ユ敹鑰呬笉瀵筡n鎺ユ敹鑰咃細",FILE_APPEND);
		file_put_contents($file, $smtpemailto,FILE_APPEND);
		file_put_contents($file, "\n鍐呭锛歕n",FILE_APPEND);
		file_put_contents($file, str_replace('</br>',"\n" ,$mailcontent),FILE_APPEND);
		file_put_contents($file, "\n\n---------------------------\n\n",FILE_APPEND);
		echo "瀵逛笉璧凤紝閭欢鍙戦�澶辫触锛�;
		exit();
	}
	//************************ 閰嶇疆淇℃伅 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//杩欓噷闈㈢殑涓�釜true鏄〃绀轰娇鐢ㄨ韩浠介獙璇�鍚﹀垯涓嶄娇鐢ㄨ韩浠介獙璇�
	$smtp->debug = false;//鏄惁鏄剧ず鍙戦�鐨勮皟璇曚俊鎭�	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	if($state==""){
		echo "瀵逛笉璧凤紝閭欢鍙戦�澶辫触锛佽妫�煡閭濉啓鏄惁鏈夎銆�;
		exit();
	}
	echo "鎭枩锛侀偖浠跺彂閫佹垚鍔燂紒锛�;

?>