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

//========================================================
$input = 'Call us at 03-3001-1256 or 03-3015-3222';
// 正規表現
$pattern = '/\d{2}-\d{4}-\d{4}/';
// 特定のパターンで文字列検索、置換
preg_match($pattern, $input, $matches); // はじめに見つけた1つ
preg_match_all($pattern, $input, $matches); // マッチしたものすべて
print_r($matches);

// パターンに応じて置換
$input = preg_replace($pattern, '**-****-****', $input);
echo $input . PHP_EOL;

/* 結果
Array
(
    [0] => Array
        (
            [0] => 03-3001-1256
            [1] => 03-3015-3222
        )

)
Call us at **-****-**** or **-****-****
*/

//========================================================
// 文字列と配列を相互に変換
$d = [2020, 11, 15];
echo "$d[0]-$d[1]-$d[2]" . PHP_EOL;
// 区切り文字で配列の要素を連結
echo implode('-', $d) . PHP_EOL;

// 文字列を区切り文字で分けて配列へ
$t = '17:32:45';
print_r(explode(':', $t));

//========================================================

// 数学関連の関数
$n = 5.6283;

// 小数点以下を切り上げ
echo ceil($n) . PHP_EOL;
// 切り捨て
echo floor($n) . PHP_EOL;
// 小数点以下を四捨五入して整数
echo round($n) . PHP_EOL;
// 小数点以下を2桁に
echo round($n, 2) . PHP_EOL;

// 乱数生成
echo mt_rand(1, 6) . PHP_EOL; // 1以上6以下

// 最大最小
echo max(4, 9, 6) . PHP_EOL;
echo min(4, 9, 6) . PHP_EOL;

// 定数
echo M_PI . PHP_EOL; // 円周率
echo M_SQRT2 . PHP_EOL; // 2の平方根

//========================================================

$scores = [30, 40, 50];

// 先頭に追加
array_unshift($scores, 10, 20);
// 末尾に追加
array_push($scores, 60, 70);
$scores[] = 80;

// 先頭を削除（）
array_shift($scores);
array_pop($scores);

print_r($scores);

//========================================================
// 配列の要素を切り出す
$scores = [30, 40, 50, 60, 70];
$partial = array_slice($scores, 2, 3);
$partial = array_slice($scores, -2); // 末尾から-2

print_r($scores); // 元配列は変更しない
print_r($partial);

//========================================================
// array_splice()で要素を削除、置換
$scores = [30, 40, 50, 60, 70, 80];

// 元配列を直接変更
// array_splice($scores, 2, 3);
// 削除した位置に要素を挿入
array_splice($scores, 2, 3, 100);
// 削除せず、間に複数の要素を挿入
array_splice($scores, 2, 0, [100, 101]);

print_r($scores);


//========================================================
// ソート、シャッフル
$scores = [40, 50, 20, 30];
// 並び替え
sort($scores);
rsort($scores);
print_r($scores);
// 元配列を直接変更
shuffle($scores);
print_r($scores);
// ランダムで要素を取り出し、新しい配列でキーを返す
$picked = array_rand($scores, 2);
echo $scores[$picked[0]] . PHP_EOL;
echo $scores[$picked[1]] . PHP_EOL;
