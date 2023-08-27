<?php

/**
 * アサーションに失敗すると、デフォルトで例外をスローするようになった。
 * AssertionErrorがスローされる。
 */

try {
    assert(false);
} catch (AssertionError $e) {
    var_dump($e->getMessage()); // "assert(false)"
}
