<?php

// 
$name = 'Apple';
$score = 32.246;

$info = "[$name][$score]";
echo $info . PHP_EOL;

// 表示桁数指定
$info = sprintf("[%15s][%10.2f]", $name, $score);
echo $info . PHP_EOL;

// 左詰め表示や余った桁を特定の文字で埋める
$info = sprintf("[%-15s][%010.2f]", $name, $score);
echo $info . PHP_EOL;

/* 結果
[Apple][32.246]
[          Apple][     32.25]
[Apple          ][0000032.25]
*/
