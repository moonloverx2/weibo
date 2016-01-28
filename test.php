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
	var_dump($ms);
	for($i=0;$i<count($ms['statuses']);$i++)
	{
// 		if(!empty($ms['statuses'][$i]['retweeted_status']))
// 		{
 			if(!empty($ms['statuses'][$i]['retweeted_status']['original_pic']))
			{
				echo "==============".$ms['statuses'][$i]['retweeted_status']['original_pic'];
				continue;
			}
			if(!empty($ms['statuses'][$i]['original_pic']))
			{
				echo ">>>>>>>>>".$ms['statuses'][$i]['original_pic'];
			}
		
// 			else
// 			{
// 				echo "原微博图片太多";
// 			}
// 			if($ms['statuses'][$i]['retweeted_status']['reposts_count']>50||$ms['statuses'][$i]['retweeted_status']['comments_count']>50);
// 			{
// // 				if($ms['statuses'][$i]['retweeted_status']['id']>$id)
// // 				{
// 			       if(strpos($ms['statuses'][$i]['retweeted_status']['text'],"http") > 0){
//                     $c->update(str_replace("http","(via ".$ms['statuses'][$i]['retweeted_status']['user']['name'].") http",$ms['statuses'][$i]['retweeted_status']['text']));
//                    }   
// 				   else
// 				   {
// 					 $c->update($ms['statuses'][$i]['retweeted_status']['text']."(via ".$ms['statuses'][$i]['retweeted_status']['user']['name'].")");
// 				   }
// // 				}
// 			}
// 			continue;
// 		}
// 		if($ms['statuses'][$i]['comments_count']>50||$ms['statuses'][$i]['reposts_count']>50)
// 		{
// 		if(count($ms['statuses'][$i]['pic_urls'])==1)
// 			{
// 				echo $ms['statuses'][$i]['original_pic'];
// 			}
// 		else
// 			{
// 				echo "微博图片太多";
// 			}
// // 			if($ms['statuses'][$i]['id']>$id)
// // 			{
//              	if(strpos($ms['statuses'][$i]['text'],"http") > 0){
//                   $c->update(str_replace("http","(via ".$ms['statuses'][$i]['user']['name'].") http",$ms['statuses'][$i]['text']));
//                  }   
// 				 else
// 				 {
// 					$c->update($ms['statuses'][$i]['text']."(via ".$ms['statuses'][$i]['user']['name'].")");
// 				 }
// // 			}
// 		}
	}
//      sleep(3600);//等待时间，进行下一次操作。
//  }while(true);
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
