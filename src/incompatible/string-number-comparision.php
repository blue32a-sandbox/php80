<?php

/**
 * 数値と非数値文字列を比較する場合、 数値を文字列にキャストし、文字列と比較する
 * 数値と数値形式の文字列の比較は、以前と同じ振る舞いをする
 * 0 == "not-a-number" が false と見なされるようになった
 */

var_dump(0 == "0"); // true
var_dump(0 == "0.0"); // true
var_dump(0 == "foo"); // false
var_dump(0 == ""); // false
var_dump(42 == " 42"); // true
var_dump(42 == "42foo"); // false
