<?php

$food = 'cake';

$returnValue = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};

var_dump($returnValue); // "This food is a cake"

// 厳密に値を比較する
$r1 = match ('1') {
    1 => 'int 1',
    '1' => 'string 1',
};

var_dump($r1); // "string 1"

// 複数の式をカンマ区切りにすると論理OR
$r2 = match (2) {
    1, 2 => "1 or 2",
    3, 4 => "3 or 4",
};

var_dump($r2); // "1 or 2"

// defaultパターンは前の分岐にマッチしなかったあらゆる場合にマッチする
$r3 = match (3) {
    1, 2 => "1 or 2",
    default => "other",
};

var_dump($r3); // "other"

// 全ての場合を網羅しなければならない
try {
    match (5) {
        1, 2 => "1 or 2",
        3, 4 => "3 or 4",
    };
} catch (\UnhandledMatchError $e) {
    var_dump($e->getMessage()); // "Unhandled match value of type int"
}

// 厳密な一致チェックを行わずに match 式を使う
$age = 23;

$r4 = match (true) {
    $age >= 65 => 'senior',
    $age >= 25 => 'adult',
    $age >= 18 => 'young adult',
    default => 'kid',
};

var_dump($r4); // "young adult"
