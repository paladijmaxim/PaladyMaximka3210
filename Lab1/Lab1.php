<?php 
// номер 1
    print 'nomber 1:'.'</br>';
    $a = 27; 
    $b = 12;

    $a2 = pow($a, 2);
    $b2 = pow($b, 2);
    $root = sqrt($a2 + $b2); 
    $res = sprintf('%.2f', $root); //округление
    echo $res.'</br>'; // вывод результата


// номер 8
    print 'nomber 8:'.'</br>';
    $a = true;
    $b = false;
    var_dump($a).'</br>';
    var_dump($b).'</br>';


// номер 9
    print 'nomber 9:'.'</br>';
    $a = 2; 
    $b = 2.0; 
    $c = '2'; 
    $d = 'two'; 
    $g = true; 
    $f = false;

    echo ($a + $c).'</br>';
    echo ($a * $b).'</br>';
    echo $a * $c.'</br>';
    echo $b * $c.'</br>';
    echo $g + $f.'</br>';
    echo $g - $f.'</br>';
    echo $a - $f.'</br>';
    echo $a + $b.'</br>';
    echo $a % $g.'</br>';
    echo $c % $g.'</br>';
    echo $c + $g.'</br>';
    echo $a / $g.'</br>';
    echo $b / $g.'</br>';
    echo $c / $g.'</br>';


// номер 10 
    print 'nomber 10:'.'</br>';
    $hunter = 'охотник'; 
    $wants = 'желает'; 
    $know = 'знать'; 
    $fizan = 'фазан'; 
    $sits = 'сидит';

    $res = "Каждый $hunter $wants $know, где $sits $fizan";
    print "$res";
?>