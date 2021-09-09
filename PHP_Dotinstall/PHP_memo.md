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
