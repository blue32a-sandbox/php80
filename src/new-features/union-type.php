<?php

declare(strict_types=1);

function foo(int|string $v) {
    var_dump($v);
}

foo('Hello');
foo(123);

// Fatal error: Uncaught TypeError: foo(): Argument #1 ($v) must be of type string|int, bool given
// foo(true);

// ?int と int|null は同じ
function bar(?int $v) {
    var_dump($v);
}

bar(123);
bar(null);
