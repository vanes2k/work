<?php  return '/**
 * Сниппет для получение постов с вк через метод wall.get 
 * Nikita Demchev 2020
 */
ini_set(\'display_errors\', 1);
ini_set(\'display_startup_errors\', 1);
error_reporting(E_ALL);
header(\'Content-Type: text/html; charset=utf-8\');

$GID = \'-182438565\'; //ИД группы
$ACT = \'af7d175eaf7d175eaf7d175e46af0ffb08aaf7daf7d175ef07e04015ed8b995c5d29c8b\'; //ТОКЕН РАЗРАБОДЧИКА

$contnet = file_get_contents("https://api.vk.com/method/wall.get?owner_id=${GID}&count=10&v=5.120&access_token=${ACT}");

$json = json_decode($contnet);

$out = \'\';
/*foreach($json->response->items as $key => $val){
    //echo $val->text;
    if(isset($val->attachments[0]->photo) && $val->attachments[0]->type == \'photo\'){
    $out .= \'<a href="https://vk.com/public185995097?w=wall-185995097_\'.$val->id.\'"><img src="\'.$val->attachments[0]->photo->sizes[3]->url.\'"></a>\';
    }
}*/

foreach ($json->response->items as $key => $val) {
    //echo $val->text;
    $date = date(\'m/d/Y H:i\', $val->date);
    $img = \'\';
    if (isset($val->attachments[0]->photo) && $val->attachments[0]->type == \'photo\') {
        //$out .= \'<a href="https://vk.com/public185995097?w=wall-185995097_\'.$val->id.\'"><img src="\'.$val->attachments[0]->photo->sizes[3]->url.\'"></a>\';
        $url = $val->attachments[0]->photo->sizes[3]->url;
        $img = "
        <div class=\\"width:100%\\">
        <img style=\\"display:block; margin:0 auto;\\" src=\\"$url\\">
        </div>
        ";
    }
    $text = nl2br($val->text);
    $out .= "
    <div class=\\"column  is-5 mx-1 box\\" >
        <time class=\\"is-size-7 has-text-link\\">$date</time>
        <div class=\\"has-text-black-bis content\\">
        $img
        $text
        </div>
    </div>
    ";
}


return $out;
return;
';