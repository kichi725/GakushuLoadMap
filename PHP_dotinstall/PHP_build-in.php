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

// 日本語の場合
$input = ' こんにちは  ';
$input = trim($input);

// マルチバイトに対応した関数を使用
echo mb_strlen($input) . PHP_EOL;
echo mb_strpos($input, 'に') . PHP_EOL;

// str_replaceは文字コードがUTF-8なら日本語も扱える
$input = str_replace('にち', 'ばん', $input);
echo $input . PHP_EOL;

/* 結果
5
2
こんばんは
*/

//========================================================
$input = '20200320Item-A  1200';
$input = substr_replace($input, 'Item-B  ', 8, 8); // 文字列置換

$date = substr($input, 0, 8);
$product = substr($input, 8, 8);
$amount = substr($input, 16); // 最後までの場合桁数を省略可

echo $date . PHP_EOL;
echo $product . PHP_EOL;
// echo $amount . PHP_EOL;
echo number_format($amount) . PHP_EOL; // 3桁数ごとに区切る

/* 結果
20200320
Item-B  
1,200
*/
