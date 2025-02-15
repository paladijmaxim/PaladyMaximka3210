<?php
    // $arr = [2, 'r', 6, 8];
    // for ($i = 0; $i < sizeof($arr);$i++) {
    //     echo $arr[$i].' ';
    // }

    // $arr2['a'] = 2;
    // $arr2['b'] = 'r';
    // $arr2['c'] = 6;
    // $arr2['d'] = 8;
    // for ($i = 0; $i < sizeof($arr2);$i++) {
    //     echo $arr2[$i].' ';
    // }

    // $arr3 = [
    //     1 => 2,
    //     'b' => 'r',
    //     'c' => 6,
    //     4 => 8
    // ];
    // foreach($arr3 as $elem) {
    //     echo "$elem ";
    // }

    // $a = array(1,2);
    // $b = array(2,1);
    // var_dump($a == $b);
    

    // $c = [
    //     'a' => 'b',
    //     3 => 'c',
    //     '4' => 1
    // ];

    // $d = [
    //     'a' => 'f',
    //     3 => 'c',
    //     '4' => 1
    // ];

    // print_r($c+$d);


// $arr_2 = [
//     1 => [1,2,3],
//     'd' => [5,6,'g', 'l'],
//     3 => [3,5,6,7]
// ];
// foreach($arr_2 as $arr){
//     foreach($arr as $elem){
//         echo "$elem, ";
//     }
//     echo '<BR>';
// }


// $arr = [ 'a', 'b', 'c', 'b', 'a'];
// $cnt_a = 0;
// $cnt_b = 0;
// $cnt_c = 0;
// foreach($arr as $cnt_a_) {
//     if $cnt_a_ == 'a':
//         $cnt_a++;
// };
// echo $cnt_a;

// LAB2/////////////////////////////////////////
// #3
// $arr = [1,2,3,4,5];
// print_r(array_reverse($arr));

// #4
// $a = ['a', 'b','c'];
// $b = [1,2,3];
// $c = array_combine($a,$b);
// print_r($c);

// #5
// $arr = [
//     'a'=> 1, 
//     'b'=> 2, 
//     'c'=> 3
// ];

// $keys = array_keys($arr);
// $values = array_values($arr);

// print_r($keys);
// print_r($values);

#6
// $arr = ['a', 'b', 'c', 'd', 'e'];

// $res = array_map('strtoupper', $arr);
// print_r($res);

#7

$a = [1,2,3];
$b = [ 'a', 'b', 'c'];
$res = array_merge($a, $b);
print_r($res);