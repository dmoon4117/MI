<?
include("Snoopy.class.php");	  


 $url = $_POST['url'];
 $title =  $_POST['title'];
 $murl = preg_replace('^/terms^', '/m.terms', $url);


$snoopy = new snoopy;
$snoopy->fetch($murl);
$txt = $snoopy->results;


$text = preg_replace('/block"><p>/', '/block"><p class=result_p>', $txt);
$ttext = preg_replace('!<div class="atomic-block breakable-block p-after-p">!', "", $text);
$tttext = preg_replace("!</div><p>!", '<p>', $ttext);
preg_match_all('^<p class=result_p>.*</p>^', $tttext,$temp);
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="libs/css/onsenui.css">
    <link rel="stylesheet" href="libs/css/onsen-css-components.css">
    <link rel="stylesheet" href="libs/css/functions.css">
    <script src="libs/js/onsenui.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <!— 본문 폰트 제어 —>
    <script type="text/javascript">
        //본문 확대축소하기
        $(function() {
            max = 30; // 글씨 크기 최대치
            min = 12; // 글씨 크기 최소치
            var fontSize = 12; //기본 폰트 사이즈입니다.
                
            $("#zoomin").bind("click", function() {          
                if (fontSize < max) {            
                    fontSize = fontSize + 5; //5px씩 증가합니다.
                            
                } else alert("가장 큰 폰트크기는 " + max + "px 입니다.");        
                $(".result_p").css({
                    "font-size": fontSize + "px"
                });    
            });    
            $("#zoomout").bind("click", function() {        
                if (fontSize > min) {            
                    fontSize = fontSize - 5; //5px씩 축소됩니다.
                            
                } else alert("가장 작은 폰트크기는 " + min + "px 입니다.");        
                $(".result_p").css({
                    "font-size": fontSize + "px"
                });    
            });
        });
        //인쇄하기
        var initBody;

        function beforePrint() {   
            initBody = document.body.innerHTML;   
            document.body.innerHTML = print_page.innerHTML;
        }

        function afterPrint() {  
            document.body.innerHTML = initBody;
        }

        function pageprint() {     
            window.onbeforeprint = beforePrint;     
            window.onafterprint = afterPrint;     
            window.print(); //크롬
        }
    </script>
</head>

<body>
    <ons-page>
        <ons-toolbar>
            <div class="left">
                <ons-toolbar-button>
                    <a href="javascript:history.go(-1)" style="color:#eb5e2f;">
                        <ons-icon icon="ion-arrow-left-c" style="vertical-align: -4px; font-size: 28px;"></ons-icon>
                    </a>
                </ons-toolbar-button>
            </div>
            <div class="center">M.I.</div>
            <div class="right">
            </div>
        </ons-toolbar>
        <div class="select-list">
            <h2 class="result_title"><? echo $title ?></h2>
            <span id="zoomin">확대</span>
            <span id="zoomout">축소</span>
            <h3 class="result_sub">외형정보</h3>
            <?echo $temp[0][0];?>
                <h3 class="result_sub">성분정보</h3>
                <?echo $temp[0][1];?>
                    <h3 class="result_sub">저장방법</h3>
                    <?echo $temp[0][2];?>
                        <h3 class="result_sub">효능효과</h3>
                        <?echo $temp[0][3];?>
                            <h3 class="result_sub">용법용량</h3>
                            <?echo $temp[0][4];?>
                                <h3 class="result_sub">사용상 주의사항</h3>
                                <?echo $temp[0][5];?>

        </div>
        <div class="footer">
            <p align="center" class="small" style="font-weight:300;">© KU <strong>M.I.</strong> All Rights Reserved.</p>
        </div>
    </ons-page>
</body>

</html>