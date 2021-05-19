<?php
/**
 * Сниппет для получение постов с вк через метод wall.get 
 * Nikita Demchev 2020
 */
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

$contnet = file_get_contents('https://api.vk.com/method/wall.get?owner_id=-182438565&count=10&v=5.120&access_token=af7d175eaf7d175eaf7d175e46af0ffb08aaf7daf7d175ef07e04015ed8b995c5d29c8b');

$json = json_decode($contnet);

$out = '';
foreach($json->response->items as $key => $val){
    //echo $val->text;
    if(isset($val->attachments[0]->photo) && $val->attachments[0]->type == 'photo'){
    $out .= '<a href="https://vk.com/public182438565?w=wall-182438565_'.$val->id.'"><img src="'.$val->attachments[0]->photo->sizes[3]->url.'"></a>';
    }
}
return $out;
return;
