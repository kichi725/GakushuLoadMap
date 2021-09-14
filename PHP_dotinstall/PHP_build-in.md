# 詳解PHP ビルトイン関数編
ビルドイン関数 - PHPにあらかじめ組み込まれている関数

[PHP公式サイト](https://www.php.net/)

***Google検索で調べる方法***

`○○ 関数 site:php.net` で検索

## [sprintf()](https://www.php.net/manual/ja/function.sprintf.php)
表示の幅の設定や、小数点以下の桁数の設定など、フォーマットされた文字列を返す

***データ型***
+ 文字列 %s
+ 整数 %d
+ 浮動小数点 %f

***違い***
* sprintf() : フォーマットされた文字列を返す
* printf()  : フォーマット済みの文字列を表示する
```
× $a = printf();
○ $a = sprintf();
```
