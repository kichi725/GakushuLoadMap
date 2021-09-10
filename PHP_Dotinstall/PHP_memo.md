# 詳解PHP 基礎文法変

使用バージョン PHP7.4.2

HTMLを書かず、PHPのみ記述する場合は、閉じタブは書かない

## // コメントは３種類

```
// comment
```

```
# comment
```

```
/*
comment
comment
*/
```

## PHPの文字列の扱い
文字列の中でシングルコーテーションを使いたい場合

```
× echo 'It's my life';
```
```
〇 echo "It's my life";
```
### ダブルコーテーションを使う場合、変数をそのまま入れることができる
```
$name = 'TARO';
echo "Hello, $name ";
```
### ダブルクォーテーションの中でダブルコーテーションを使いたい場合
バックスラッシュを入れる
```
echo "It's \"Sunday\". Hello";
```

## ナウドキュメント
```
$text = <<<'EOT' <-必ず改行、コメントもダメ
hello!
	Good Morning
text!
EOT;

echo $text;
```
## ヒアドキュメント
```
$text = <<<"EOT"
$text = <<<EOT
```
このどちらかにすることで変数を埋め込むことができる

## 演算
```+, -, *, /, %, **（べき乗）```
```
echo 2 + '3' . PHP_EOL; ←これは5になる
```

## 定数 2種類
```
define('NAME', 'TARO');
const NAME = 'TARO';
```
## 使用変数の方を調べる
```
var_dump($name);
```

## 関数
```
function sampleA() {}
// 引数あり
function sampleB($message // 仮引数) {}
sampleB('TEST' // 実引数)
function sampleB($message = 'SAMPLE') 仮引数の初期化もできる
```
## 変数のスコープ
```
$rate = 1.1;
function sum($a, $b, $c) {
	return ($a + $b + $c) * $rate;
}
```
↑エラーになる
関数内で```$rate```を定義するか、```global $rate;```とする。
ただし```global```はあまり使わない


## 無名関数 クロージャー
```
function sum($a, $b){}

$sum = function ($a, $b) {
};

echo $sum(100, 200);
```

## 関数の型付け
```
function showInfo($name, $score) {
	echo $name . ' : ' . $score . PHP_EOL;
}
// 呼出
shwoInfo('Taro', 40); // Taro : 40
shwoInfo('Taro', 'English'); // Taro : English <- 意図しない型の値入れてもそのまま出力される
```
```
function showInfo(String $name, int $score) { // <- 引数の前に型を記入
	echo $name . ' : ' . $score . PHP_EOL;
}
// 呼出
shwoInfo('Taro', 'English'); // Error
shwoInfo('Taro', '40'); // Taro : 40 <- 勝手に変換
```
```declare(strict_type=1);```を文頭につけることで強い型付けになる
```
declare(strict_type=1);
function showInfo(String $name, int $score) {
	echo $name . ' : ' . $score . PHP_EOL;
}
// 呼出
shwoInfo('Taro', 'English'); // Error
shwoInfo('Taro', '40'); // Error
```

## 配列
値とキーがセットになったもの
```
$nums = [ 12, 66, 3 ];
echo $nums[2] . PHP_EOL; // 出力結果：3
```
インデックスをキーにしても使える
```
$nums = [
	'first'  => 12,
	'second' => 66,
	'third'  => 3
];
echo $nums['second'] . PHP_EOL; // 出力結果：66
```
### foreach文
```
$nums = [ 12, 66, 3 ];
foreach ($nums as &num) { // $numsから1個ずつ値を取り出して$numに入れて使う
	echo &num . PHP_EOL;
}
/*
結果
12
66
3
*/
```
keyを使った場合
```
foreach ($nums as $key => $num) {
	echo $key . ' : ' . $num . PHP_EOL;
}
/*
結果
first : 12
second : 66
third : 3
*/
```
