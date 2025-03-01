<?php
    // $c = 7;
    // $b = 6;
    // // $a = &$c;

    // function f(&$s) {
    //     ++$s;
    // }
    // echo $b."<BR>";
    // f($b);
    // echo $b."<BR>";

    // $a = 10;
    // $z = 'a';
    
    // echo $$z."<BR>";

    // $a=5;$b=2; $c=1;

    // list($a,$b,$c)=F1($a,$b,$c);

    // print "a=$a,b=$b, c=$c<BR>";

    // $d=50;$e=20; $f=10;

    // list($d,$e,$f)=F1($d,$e,$f);

    // print "d=$d,e=$e, f=$f<BR>";

    // function F1($d, $e, $f) {
    //     $d++; $e--; $f++;
    //     return array($d, $e, $f);
    // }

    // $a =50; $b=20; $c=10;
    // function F2(&$d, &$e, &$f) {
    //     $d++; $e--; $f++;
    // }

    // F2($a, $b, $c);
    // print "a = $a, b = $b, c = $c"."<BR>";


    // $func ='sin';
    // $y = 30;
    // $x = $y/180*pi();

    // $z = $func($x);
    // print"$func($y<SUP>o</sup>)= $z<BR>"; //sin(30o) = 0.5

    // eval("\$$z = $func($x);");
    // echo $z;

    // echo "<a href = 'index.php?FIO=maxim&x=1000000000000'>Link</a>";
    // if (!empty($_GET)) {
    //     foreach($_GET as $z=>$value) {
    //         eval("\$$z='$value';");
    //     }
    //     echo  "Имя = $FIO, оклад = $value";

        
    // }



    $names = [
        "XVI" => "Иван Васильевич",
        "XVIII" => "Пётр Алексеевич",
        "XIX" => "Николай Павлович"
    ];
    
    foreach ($names as $CEN => $name) {
        echo "<a href='index.php?vek=$CEN'>$CEN vek</a><br>";
    }

    if (!empty($_GET['vek'])) {
        $vek = $_GET['vek']; 
        if (array_key_exists($vek, $names)) {
            echo "В $vek веке царствовал " . $names[$vek];
        }
    }
