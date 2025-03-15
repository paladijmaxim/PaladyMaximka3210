<?php
// function transformText(&$words) {
//     $index = 0; 
//     foreach ($words as &$word) {
//         if ($index % 2 == 1) {
//             $word = strtoupper($word);
//         }
//         $index++; 
//     }
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
//     $text = $_POST['text'];
//     $words = explode(' ', $text);
//     transformText($words);
//     $transformedText = implode(' ', $words);
//     echo "<p>$transformedText</p>";
// }
?>
<?php
    // echo file_get_contents('../text.txt');
    // var_dump($_SERVER);
    
    // file_put_contents('text.txt', "1 2 3 4\r\n5");
    // rename('text.txt', 'try.txt');
    // unlink('../text.txt');
    // var_dump(file_exists('../text.txt'));
    // var_dump(file_exists('try.txt'));


    // $arr = [1,2,3,4,5];
    // echo filesize('try.txt');

    $a = 2; $b = 5;

print "$a<sup>$b</sup> = $c <BR>";

//Напечатается 2<sup>5</sup> =

require('a_b_req.txt');

print "$a<sup>$b</sup> = $c <BR>";
