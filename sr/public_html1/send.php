<?php

$recepient = "sirbarbershop@yandex.ru";
$sitename = "Название сайта";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$message_form = trim($_POST["message_form"]);
$message = "Имя: $name \nТелефон: $phone \nТекст: $message_form";

$pagetitle = "Новая заявка с сайта \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");