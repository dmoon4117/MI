<meta chatset="utf-8">
<?php
include("his.php");

showresult();


?>
	<form action="m_search.php" method="post" name="form">
		<input type="hidden" value="<?=$tmp[0]?>" name="picname">
		<input type="hidden" value="<?=$tmp[1]?>" name="color">
		<input type="hidden" value="<?=$tmp[2]?>" name="shape">
		<script>document.form.submit();</script>
	</form>
<?
function showresult(){
$matchnow = array("","100");// 맞는 이미지의 이름과 비교값을 저장하는 배열
matchimg($matchnow);
resultToString($matchnow);
}

//findmatch함수 결과를 한글로 변환 하는 함수
function resultToString(&$matchnow){
	$strTok = explode("_",$matchnow[0]);

	$cnt = count($strTok);
	for($i=0;$i<$cnt;$i++){
		($strTok[$i]."<br>");
	}
	if($strTok[1]=="yellow")
		$color = "노랑";
	else if($strTok[1]=="red")
		$color = "빨강";
	else if($strTok[1]=="green")
		$color = "초록";
	else if($strTok[1]=="white")
		$color = "하양";
	else if($strTok[1]=="black")
		$color = "검정";

	if($strTok[2]=="circle")
		$shape = "원형";
	else if($strTok[2]=="elipse")
		$shape = "타원형";
	else if($strTok[2]=="halfcir")
		$shape = "반원형";
	else if($strTok[2]=="hexagon")
	 	$shape = "육각형";
	else if($strTok[2]=="pentagon")
	 	$shape = "오각형";

	global $tmp;
	global $pictmp;
	$tmp[0] = $strTok[0];
	$tmp[1] = $color;
	$tmp[2] = $shape;


}


//matching함수에서 가장 유사한 사진의 속성을 저장하는 함수
function findmatch(&$matchnow,&$type,&$shape){ //

	if($matchnow[1]>$shape){
		$matchnow[0] = $type;
		$matchnow[1] = $shape;
	}
}

//데이터베이스의 사진들과 올린 사진을 비교하는 함수
function matchimg(&$matchnow){

$sh = new shapecompareImages();
$filename = $_GET['filename'];
$sam = "uploads/$filename.jpg"; //비교할 사진의 위치


	$shape = $sh->compare($sam,"sample/Bearese_green_elipse.jpg");
	//echo "bcircle: $shape\n";
	//echo "<br>";
	$type = "Bearese_green_elipse";
	findmatch($matchnow,$type,$shape);



	$shape = $sh->compare($sam,"sample/Zithromax_white_elipse.jpg");
	//echo "bcircle: $shape\n";
	//echo "<br>";
	$type = "Zithromax_white_elipse";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/YASMIN_yellow_circle.jpg");
	//echo "gcircle: $shape\n";
	//echo "<br>";
	$type = "YASMIN_yellow_circle";
	findmatch($matchnow,$type,$shape);


	$shape = $sh->compare($sam,"sample/XARELTO_red_circle.jpg");
	//echo "gelipse: $shape\n";
	//echo "<br>";
	$type = "XARELTO_red_circle";
	findmatch($matchnow,$type,$shape);



	$shape = $sh->compare($sam,"sample/Varocomin_red_elipse.jpg");
	//echo "gpentagon: $shape\n";
	//echo "<br>";
	$type = "Varocomin_red_elipse";
	findmatch($matchnow,$type,$shape);


	$shape = $sh->compare($sam,"sample/Ursa_white_circle.jpg");
	//echo "grectangle: $shape\n";
	//echo "<br>";
	$type = "Ursa_white_circle";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Tanamin_yellow_elipse.jpg");
	//echo "gsquare: $shape\n";
	//echo "<br>";
	$type = "Tanamin_yellow_elipse";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Stillen_green_elipse.jpg");
	//echo "rcircle: $shape\n";
	//echo "<br>";
	$type = "Stillen_green_elipse";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/SOPARON-S_red_elipse.jpg");
	//echo "relipse: $shape\n";
	//echo "<br>";
	$type = "SOPARON-S_red_elipse";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Rokins_white_pentagon.jpg");
	//echo "rrectangle: $shape\n";
	//echo "<br>";
	$type = "Rokins_white_pentagon";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Requip_white_pentagon.jpg");
	//echo "rsquare: $shape\n";
	//echo "<br>";
	$type = "Requip_white_pentagon";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Penid_white_circle.jpg");
	//echo "rtraingle: $shape\n";
	//echo "<br>";
	$type = "Penid_white_circle";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Pelubi SR_yellow_circle.jpg");
	//echo "ycircle: $shape\n";
	//echo "<br>";
	$type = "Pelubi SR_yellow_circle";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Pakinol_green_pentagon.jpg");
	//echo "ysquare: $shape\n";
	//echo "<br>";
	$type = "Pakinol_green_pentagon";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Orothine F_black_circle.jpg");
	//echo "ytriangle: $shape\n";
	//echo "<br>";
	$type = "Orothine F_black_circle";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Newbutin SR_white_elipse.jpg");
	//echo "ytriangle: $shape\n";
	//echo "<br>";
	$type = "Newbutin SR_white_elipse";
	findmatch($matchnow,$type,$shape);
	$shape = $sh->compare($sam,"sample/Mayqueen-S_green_elipse.jpg");
	//echo "ytriangle: $shape\n";
	//echo "<br>";
	$type = "Mayqueen-S_green_elipse";
	findmatch($matchnow,$type,$shape);
	$shape = $sh->compare($sam,"sample/Loxoprofen_white_hexagon.jpg");
	//echo "ytriangle: $shape\n";
	//echo "<br>";
	$type = "Loxoprofen_white_hexagon";
	findmatch($matchnow,$type,$shape);


	$shape = $sh->compare($sam,"sample/Kiromin_green_circle.jpg");
	//echo "ytriangle: $shape\n";
	//echo "<br>";
	$type = "Kiromin_green_circle";
	findmatch($matchnow,$type,$shape);

	$shape = $sh->compare($sam,"sample/Kagen_red_circle.jpg");
	//echo "ytriangle: $shape\n";
	//echo "<br>";
	$type = "Kagen_red_circle";
	findmatch($matchnow,$type,$shape);

		$shape = $sh->compare($sam,"sample/Joins_yellow_elipse.jpg");
		//echo "ytriangle: $shape\n";
		//echo "<br>";
		$type = "Joins_yellow_elipse";
		findmatch($matchnow,$type,$shape);


		$shape = $sh->compare($sam,"sample/Histal_green_circle.jpg");
		//echo "ytriangle: $shape\n";
		//echo "<br>";
		$type = "Histal_green_circle";
			findmatch($matchnow,$type,$shape);


			$shape = $sh->compare($sam,"sample/Dexamethasone_white_halfcir.jpg");
			//echo "ytriangle: $shape\n";
			//echo "<br>";
			$type = "Dexamethasone_white_halfcir";
				findmatch($matchnow,$type,$shape);


				$shape = $sh->compare($sam,"sample/Astosin Sugar Coated_black_circle.jpg");
				//echo "ytriangle: $shape\n";
				//echo "<br>";
				$type = "Astosin Sugar Coated_black_circle";
					findmatch($matchnow,$type,$shape);

	return $matchnow;
}



?>
