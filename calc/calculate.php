<?php

if (isset($_POST['val'])) { 
    $res = calculate($_POST['val']); 
    if (is_numeric($res)) { 
        echo $res; 
    } else { 
        echo 'Ошибка вычисления выражения: ' . $res; 
    }
}

/**строка - число?*/
function isnum($x) {
    return is_numeric($x); 
}

function calculate($val) {
    if (empty($val)) return 'Выражение не задано!'; 

    if (!validScob($val)) {
        return 'Неправильная расстановка скобок!';
    }

    $val = str_replace(' ', '', $val);

    // Обработка отрицательных чисел в начале выражения
    if (substr($val, 0, 1) == '-') {
        $val = '0' . $val;
    }

    //выражения в скобках
    while (preg_match('/\(([^()]+)\)/', $val, $matches)) {
        $val = str_replace($matches[0], calculate($matches[1]), $val);
    }

    //умножение и деление
    while (preg_match('/(\-?\d+\.?\d*)([\/\*])(\-?\d+\.?\d*)/', $val, $matches)) {
        $result = $matches[2] == '*' ? $matches[1] * $matches[3] : $matches[1] / $matches[3];
        $val = str_replace($matches[0], $result, $val);
    }

    //сложение и вычитание
    while (preg_match('/(\-?\d+\.?\d*)([\+\-])(\-?\d+\.?\d*)/', $val, $matches)) {
        $result = $matches[2] == '+' ? $matches[1] + $matches[3] : $matches[1] - $matches[3];
        $val = str_replace($matches[0], $result, $val);
    }

    return $val; 
}

/**корректность расстановки скобок в выражении */
function validScob($expression) {
    $balance = 0;
    for ($i = 0; $i < strlen($expression); $i++) {
        if ($expression[$i] == '(') {
            $balance++;
        } elseif ($expression[$i] == ')') {
            $balance--;
            if ($balance < 0) {
                return false; 
            }
        }
    }
    return $balance == 0; 
}

?>