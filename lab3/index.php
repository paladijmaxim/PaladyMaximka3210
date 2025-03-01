<?php
function transformText(&$words) {
    $index = 0; 
    foreach ($words as &$word) {
        if ($index % 2 == 1) {
            $word = strtoupper($word);
        }
        $index++; 
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
    $text = $_POST['text'];
    $words = explode(' ', $text);
    transformText($words);
    $transformedText = implode(' ', $words);
    echo "<p>$transformedText</p>";
}
?>