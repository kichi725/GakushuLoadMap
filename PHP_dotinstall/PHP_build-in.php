<?php

//========================================================
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

//========================================================
$input = '  dot_taro   ';
$input = trim($input); // 空白を除去して再代入

echo strlen($input) . PHP_EOL;        // 長さを調べる
echo strpos($input, '_') . PHP_EOL;   // 文字列検索

$input = str_replace('_', '-', $input); // 文字列検索
echo $input . PHP_EOL;

/* 結果
8
3
dot-taro
*/
