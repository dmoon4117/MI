<html>
   <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="libs/css/onsenui.css">
       <link rel="stylesheet" href="libs/css/onsen-css-components.css">
       <link rel="stylesheet" href="libs/css/functions.css">
       <script src="libs/js/onsenui.min.js"></script>
   </head>
   <body>
       <ons-page>
           <ons-toolbar>
               <div class="left">
                   <ons-toolbar-button>
                      <a href="javascript:history.go(-1)" style="color:#eb5e2f;"><ons-icon icon="ion-arrow-left-c" style="vertical-align: -4px; font-size: 28px;"></ons-icon></a>
                   </ons-toolbar-button>
               </div>
               <div class="center">M.I.</div>
               <div class="right">
               </div>
           </ons-toolbar>

           <div class="select-list">
               <h3 class="search-title">
                   <ons-icon icon="ion-android-radio-button-off" style="color:#f20;line-height:0px;font-size: 16px;padding-right:5px;"></ons-icon>
                   그 외 다른 결과..
               </h3>
           </div>

           <? searching(); ?>
           <div class="footer">
             <p align="center" class="small" style="font-weight:300;">© KU <strong>M.I.</strong> All Rights Reserved.</p>
           </div>
       </ons-page>
   </body>
</html>
<?

function searching(){
 $shape = $_POST['radio-stacked1'];
 $color = $_POST['radio-stacked2'];
 $type = $_POST['radio-stacked3'];
 $search = $_POST['search'];
 $piccolor = $_POST['color'];
 $picshape = $_POST['shape'];
 $picname = $_POST['picname'];



 //$query  =$picname.$picshape;
 $query = $shape.$color.$type.$search.$piccolor.$picshape;
 $client_id = "nB0FUyEHBYkjSutlzNCs";
 $client_secret = "hu7k_QhCUT";
 $encText = urlencode($query);
 $url = "https://openapi.naver.com/v1/search/encyc.json?query=".$encText."&display=10";

 $is_post = false;
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_POST, $is_post);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 $headers = array();
 $headers[] = "X-Naver-Client-Id: ".$client_id;
 $headers[] = "X-Naver-Client-Secret: ".$client_secret;
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 $xml = curl_exec ($ch);
 $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 curl_close ($ch);

 if($status_code == 200) {
   $decode = json_decode($xml, true);
   for($x=0; $x<=100; $x++){

       $data = $decode['items'][$x]['link'];
       $data1 = $decode['items'][$x]['title'];
       $data1 =  str_replace('<b>', "", $data1);
       $data1 =  str_replace('</b>', "", $data1);
      // echo $data1;
       $data2 = $decode['items'][$x]['thumbnail'];
       $data3 = $decode['items'][$x]['description'];
         if(preg_match('/cid=51000&categoryId=51000/',$data)){
         ?>
         <form method="post" action="m_reresult.php">
           <input type="hidden" value=<?echo $data?>  name="url">
           <input type="hidden" value=<?echo $data1?> name="title">
  <div class="detail_info">
             <p class="place_photo">  <img src=<? echo $data2 ?> height="80px"></a>
             <div class="item_content">
                 <p class="place_title"> <? echo $data1 ?><br>
                 <p class="place_desc"><? echo $data3?></p><br>
         <input type="submit" value="상세보기" class="readmore">

             </div>
         </div>
           </form>

<?
              }
  }
}
 else {
     echo "Error 내용:".$response;
 }


}


?>
