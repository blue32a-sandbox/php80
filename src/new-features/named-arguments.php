<?php

function foo(int $a, int $b = 2, int $c = 3): int
{
    return $a + $b + $c;
}

var_dump(foo(1, 20, 30)); // 51

// 名前付き引数
var_dump(foo(a: 1, b: 20, c: 30)); // 51

// 渡す順番は関係ない
var_dump(foo(c: 30, a: 1, b: 20)); // 51
var_dump(foo(a: 1, c: 30)); // 33

// 位置を指定した引数と一緒に使う
var_dump(foo(1, c: 30, b: 20)); // 51

// 引数を...で展開して渡す
var_dump(foo(...['a' => 1, 'b' => 20, 'c' => 30])); // 51
var_dump(foo(1, ...['b' => 20, 'c' => 30])); // 51

// 引数を...で展開した後に、名前付き引数を使えるのはPHP 8.1以降
// var_dump(foo(...['a' => 1, 'b' => 20], c: 30));

// 同じ引数を複数回渡すと、Errorがスローされる
// foo(a: 1, a: 2);
// foo(1, a: 2);
// foo(1, ...['a' => 2]);
