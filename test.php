<?php

ignore_user_abort();//关闭浏览器仍然执行
set_time_limit(10);
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );
$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
$ms  = $c->public_timeline(1,2,0); // done

var_dump($ms);
//do{
//    $ret = $c->update( $_REQUEST['text'] );	//发送微博
//	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
//		echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
//	} else {
//		echo "<p>发送成功</p>";
//	}
//	file_put_contents("log.log",date('Y-m-d h:i:s').PHP_EOL,FILE_APPEND);//记录日志
//	sleep(3600);//等待时间，进行下一次操作。
//}while(true);
?>