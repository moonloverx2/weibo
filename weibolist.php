<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );



//  do{
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
	$ms = $c->home_timeline(1,50,0,0,0,0 );
	$id = 0;
	$id = file_get_contents("id.log");
	echo $id;
	for($i=0;$i<count($ms['statuses']);$i++)
	{
		var_dump($ms);
		if(!empty($ms['statuses'][$i]['retweeted_status']))
		{
			if($ms['statuses'][$i]['retweeted_status']['reposts_count']>50||$ms['statuses'][$i]['retweeted_status']['comments_count']>50);
			{
// 				if($ms['statuses'][$i]['retweeted_status']['id']>$id)
// 				{
				   //echo "別人转发内容:".$ms['statuses'][$i]['retweeted_status']['text']."<br\><br\><br\><br\>";
				   //file_put_contents("id.log",$ms['statuses'][$i]['retweeted_status']['id']);
				   //$c->update(str_replace("http","(via ".$ms['statuses'][$i]['retweeted_status']['name'].") http",$ms['statuses'][$i]['retweeted_status']['text']));
				    //var_dump($ms['statuses'][$i]['retweeted_status']['user']['name']);
               // var_dump($ms['statuses'][$i]['retweeted_status']['text']);
				   //echo str_replace("http","(via ".$ms['statuses'][$i]['retweeted_status']['user']['name'].") http",$ms['statuses'][$i]['retweeted_status']['text']);
// 				}
			}
			continue;
		}
		if($ms['statuses'][$i]['comments_count']>50||$ms['statuses'][$i]['reposts_count']>50)
		{
// 			if($ms['statuses'][$i]['id']>$id)
// 			{
			  //echo "自己发布内容:".$ms['statuses'][$i]['text']."<br\><br\><br\><br\>\n\n\n\n";
			  //file_put_contents("id.log",$ms['statuses'][$i]['id']);
			  //echo str_replace("http","(via ".$ms['statuses'][$i]['user']['name'].") http",$ms['statuses'][$i]['text']);
			  //$c->update(str_replace("http","(via ".$ms['statuses'][$i]['name'].") http",$ms['statuses'][$i]['text']));
// 			}
		}
	}
//  	sleep(3600);//等待时间，进行下一次操作。
//  }while(true);

// file_put_contents("id.log",date('Y-m-d h:i:s'));
// $m = file_get_contents("id.log");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新浪微博V2接口演示程序-Powered by Sina App Engine</title>
</head>

<body>
	<!--<?=$user_message['screen_name']?>,您好！ 
	--><h2 align="left">发送新微博</h2>
	<form action="" >
		<input type="text" name="text" style="width:300px" />
		<input type="submit" />
	</form>
<?php
if( isset($_REQUEST['text']) ) {
	$ret = $c->update( $_REQUEST['text'] );	//发送微博
	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
		echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
	} else {
		echo "<p>发送成功</p>";
	}
}
?>

<?php if( is_array( $ms['statuses'] ) ): ?>
<?php foreach( $ms['statuses'] as $item ): ?>
<div style="padding:10px;margin:5px;border:1px solid #ccc">
	<?=$item['text'];?>
</div>
<?php endforeach; ?>
<?php endif; ?>

</body>
</html>
