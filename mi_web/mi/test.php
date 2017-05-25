<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?
	include 'Snoopy.class.php';
	$snoopy  = new Snoopy;
	$snoopy->fetch("http://terms.naver.com/entry.nhn?docId=2131157&cid=51000&categoryId=51000");
	$txt=$snoopy->results;
  	$rex="/h3 class='stress'>(.*?)<\/h3>/";
 	preg_match_all($rex,$txt,$o);
  	print_r($o);
	//print $snoopy->results;
?>
</body>
</html>