<?php
   echo  "hello bot";
   $accessToken = "0SMOtwQiJzvKEx8AXzIVdhqvwerERDB4bIBA6EKpZIOby7Z0AD7ZLTVugXkuWWt9pRID1yNCbkBMX3hzuHDvLjXJicbihWedMTdUN/rwppzF3rmzyCuIxiDLQZ3YDLKQRocawwyzBkj3521t0t0TggdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"
   if($message == "สวัสดี"){
	  $arrayPostData['to'] = $id;
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
	  $arrayPostData['messages'][1]['type'] = "sticker";
	  $arrayPostData['messages'][1]['packageId'] = "2";
	  $arrayPostData['messages'][1]['stickerId'] = "34";
	  pushMsg($arrayHeader,$arrayPostData);
   }else if($message == "ชื่ออะไร" || $message == "ชื่อไร" ){
	  $arrayPostData['to'] = $id;
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = "ชื่อบอทไลน์ จร้า เธอชื่ออะไร";
	  $arrayPostData['messages'][1]['type'] = "sticker";
	  $arrayPostData['messages'][1]['packageId'] = "1";
	  $arrayPostData['messages'][1]['stickerId'] = "124";
	  pushMsg($arrayHeader,$arrayPostData);
   }else if($message == "เราชื่อก๊อง" || $message == "ชื่อก๊อง" || $message == "ก๊อง"){
	  $arrayPostData['to'] = $id;
	  $arrayPostData['messages'][0]['type'] = "sticker";
	  $arrayPostData['messages'][0]['packageId'] = "1";
	  $arrayPostData['messages'][0]['stickerId'] = "125";
	  $arrayPostData['messages'][1]['type'] = "text";
	  $arrayPostData['messages'][1]['text'] = "I na hee";
	  pushMsg($arrayHeader,$arrayPostData);
   }else if($message == "เราชื่อปลื้ม" || $message == "ชื่อปลื้ม" || $message == "ปลื้ม"){
	  $arrayPostData['to'] = $id;
	  //$arrayPostData['messages'][0]['type'] = "sticker";
	  //$arrayPostData['messages'][0]['packageId'] = "1";
	  //$arrayPostData['messages'][0]['stickerId'] = "125";
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = "หล่อจังน้องเปรม เริงเมือง";
	  pushMsg($arrayHeader,$arrayPostData);
   }else if($message == "เราชื่อโจ้" || $message == "ชื่อโจ้" || $message == "โจ้"){
	  $arrayPostData['to'] = $id;
	  //$arrayPostData['messages'][0]['type'] = "sticker";
	  //$arrayPostData['messages'][0]['packageId'] = "1";
	  //$arrayPostData['messages'][0]['stickerId'] = "125";
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = "หล่อจังพี่โจ้";
	  pushMsg($arrayHeader,$arrayPostData);
   }else if($message == "เราชื่อฟลุ๊ก" || $message == "ชื่อฟลุ๊ก" || $message == "ฟลุ๊ก"){
	  $arrayPostData['to'] = $id;
	  //$arrayPostData['messages'][0]['type'] = "sticker";
	  //$arrayPostData['messages'][0]['packageId'] = "1";
	  //$arrayPostData['messages'][0]['stickerId'] = "125";
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = "กรี๊ดดด พี่ฟลุ๊ก!!!";
	  pushMsg($arrayHeader,$arrayPostData);
   }else if($message == "เราชื่อยุ่ง" || $message == "ชื่อยุ่ง"){
	  $arrayPostData['to'] = $id;
	  //$arrayPostData['messages'][0]['type'] = "sticker";
	  //$arrayPostData['messages'][0]['packageId'] = "1";
	  //$arrayPostData['messages'][0]['stickerId'] = "125";
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = "สวัสดีครับ บอส";
	  pushMsg($arrayHeader,$arrayPostData);
   }else if($message == "ยุ่ง"){
	  $arrayPostData['to'] = $id;
	  //$arrayPostData['messages'][0]['type'] = "sticker";
	  //$arrayPostData['messages'][0]['packageId'] = "1";
	  //$arrayPostData['messages'][0]['stickerId'] = "125";
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = "ถามแค่นี้ทำไมต้องด่าด้วย บอทเสียใจ TT";
	  pushMsg($arrayHeader,$arrayPostData);
   }else{
   	  $arrayPostData['to'] = $id;
	  //$arrayPostData['messages'][0]['type'] = "sticker";
	  //$arrayPostData['messages'][0]['packageId'] = "1";
	  //$arrayPostData['messages'][0]['stickerId'] = "125";
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = "บอทไม่เข้าใจที่คุณพูด";
	  pushMsg($arrayHeader,$arrayPostData);
   }
   function pushMsg($arrayHeader,$arrayPostData){
	  $strUrl = "https://api.line.me/v2/bot/message/push";
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL,$strUrl);
	  curl_setopt($ch, CURLOPT_HEADER, false);
	  curl_setopt($ch, CURLOPT_POST, true);
	  curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
	  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  $result = curl_exec($ch);
	  curl_close ($ch);
   }
   exit;
?>

<?php
/*
    $accessToken = "";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัดสยามพารากอน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
        replyMsg($arrayHeader,$arrayPostData);
    }
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;
   */
?>
