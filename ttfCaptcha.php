<?php
	
	session_start();

	$image = imagecreatetruecolor(100, 30);
	$bgcolor = imagecolorallocate($image, 255, 255, 255);
	imagefill( $image, 0 , 0 , $bgcolor);
	$fontface = 'STKAITI.TTF';
	$captcha = '';
	/*for( $i=0;$i<4;$i++ ){
		$fontsize = 6;
		$fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0,120));
		
		$data = 'abcdefghigklmnopqrstuvwxyz123456789';
		$fontcontent = substr( $data, rand( 0,strlen($data)-1 ), 1);
		$captcha .= $fontcontent;
		$x = ($i*100 / 4) + rand(5, 10);
		$y = rand(5, 10);

		imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	}*/

	$str = '的一了是我不在人们有来他这上着个地到大里说去子得也和那要下看天时过出
小么起你都把好还多没为又可家学只以主会样年想能生同老中从自面前头到它后然
走很像见两用她国动进成回什边作对开而已些现山民候经发工向事命给长水几义三
声于高正妈手知理眼志点心战二问但身方实吃做叫当住听革打呢真党全才四已所敌
之最光产情路分总条白话东席次亲如被花口放儿常西气五第使写军吧文运在果怎定
许快明行因别飞外树物活部门无往船望新带队先力完间却站代员机更九您每风级跟
笑啊孩万少直意夜比阶连车重便斗马哪化太指变社似士者干石满决百原拿群究各六
本思解立河爸村八难早论吗根共让相研今其书坐接应关信觉死步反处记将千找争领
或师结块跑谁草越字加脚紧爱等习阵怕月青半火法题建赶位唱海七女任件感准张团
屋爷离色脸片科倒睛利世病刚且由送切星晚表够整认响雪流未场该并底深刻平伟忙
提确近亮轻讲农古黑告界拉名呀土清阳照办史改历转画造嘴此治北必服雨穿父内识
验传业菜爬睡兴';
	$strdb = str_split( $str, 3);

	for( $i=0;$i<4;$i++ ){
		$fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0,120));
		$index = rand(0, count($strdb));
		$cn = $strdb[$index];
		$captcha_code = $cn;
		imagettftext($image, mt_rand(20,24), mt_rand(-60,60), (40*$i)+20, mt_rand(30,35), $fontcolor, $fontface, $cn);
		
	}
	
	$_SESSION['authcode'] = $captch_code;

	for( $i=0; $i<200;$i++) {
		$pointercolor = imagecolorallocate($image, rand(50,20), rand(50,20), rand(50,20));
		imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
	}

	for( $i=0; $i<3;$++){
		$linecolor = imagecolorallocate($image, rand(80,220), rand(80,220), rand(80,220));
		imageline($image, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $linecolor);
	}

	header('content-type: image/png');

