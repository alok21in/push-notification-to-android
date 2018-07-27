<?php
/**
 * @Alok Dubey
 * copyright@2018
* send push notification to android php using fcm
 */
define("KEY", "Yor fcm key here");// change it with your fcm key
define("TITLE", "Your project title"); //cheange it with your project title
define("ICON", "default");
define("SOUND", "default");


 function sendpush($message,$device_token,$data) //$message= message you want to send , $device_token= user device you want to send notification and $data=['test'=>$test,test2=>$test2] (data if any you want to send with push if not pass in it an blank array);
  {

$url = 'https://fcm.googleapis.com/fcm/send';

$fields = array(
'notification'=>array("title" => TITLE,"body" => $message,"icon" => ICON,"sound" => SOUND),
'registration_ids' => array($device_token),
'data' => array("data" => $data)
);
$fields = json_encode($fields);

$headers = array (               
'Authorization: key=' . KEY,
'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4); 
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);

$result = curl_exec($ch);

if ($result===false) {
echo 'Curl error:' . curl_error($ch);exit;
}




curl_close($ch);
}



?>
