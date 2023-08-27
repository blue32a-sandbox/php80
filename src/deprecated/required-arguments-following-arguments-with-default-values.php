<?php

/**
 * デフォルト値を持つ引数の後に、必須の引数が続く場合、
 * デフォルト値は意味をなしません。
 */

// Deprecated: Required parameter $b follows optional parameter $a
// function test1($a = [], $b) {}
// test1([1], 2);

function test2($a, $b) {} // 変更後
test2([1], 2);

function test3(array $a = null, $b) {} // まだ許可されている
test3(null, 1);

function test4(?array $a, $b) {} // 推奨される書き方
test4(null, 1);
