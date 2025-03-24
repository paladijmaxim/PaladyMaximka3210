<?php

// $a = 'Здравствуйте, Петрова Мария Ивановна! Пока';
// $reg = '/\b[А-ЯЕЁ][а-яеё]+\s([А-ЯЕЁ][а-яеё]+\s)[А-ЯЕЁ][а-яеё]+\b/u';
// preg_match($reg, $a, $matches);
// var_dump($matches);
// $name = $matches[1];
// echo '<BR>'.$name;


// echo '<BR>'.preg_replace('#a.+x#', '!', 'a23e4x qw x e'); 
// echo '<BR>'.preg_replace('#a.+?x#', '!', 'a23e4x qw x e'); 
// echo '<BR>'.preg_replace('#xa{1,2}x#', '!', 'xx xax xaax xaaax');


// NUMBER 1
echo '<BR>'.'NUMBER 1:';
echo '<BR>'.preg_replace('/(\d)/', '$1$1', 'a1b2c3');

// NUMBER 2
echo '<BR>'.'NUMBER 2:';
echo '<BR>'.preg_match('/^https?:\/\/[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/', "https://site.ru");
echo '<BR>'.preg_match('/^https?:\/\/[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/', "http://site.ru");

// NUMBER 3 (11)
echo '<BR>'.'NUMBER 3:';
echo '<BR>'.preg_replace('/([a-zA-Z0-9]+)@([a-zA-Z0-9]+)/', '$2@$1', 'aaa@bbb eee7@kkk');

// NUMBER 4 (31)
echo '<BR>'.'NUMBER 4:';
echo '<BR>'.preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/', '$3.$2.$1', '31-12-2014');

// NUMBER 5 (32)
echo '<BR>'.'NUMBER 5:';
preg_match_all('/\d+/', "iuinrheh 345 herfgyu 2 wqerf", $matches); 
echo '<BR>'.array_sum($matches[0]); 

// NUMBER 6 (34)
echo '<BR>'.'NUMBER 6:';
echo '<BR>'.preg_match('/\.(txt|html|php)$/i', 'lab4.php');
echo '<BR>'.preg_match('/\.(txt|html|php)$/i', 'lab4.txt');
echo '<BR>'.preg_match('/\.(txt|html|php)$/i', 'lab4.html');
echo '<BR>'.preg_match('/\.(txt|html|php)$/i', 'lab4.htm');

