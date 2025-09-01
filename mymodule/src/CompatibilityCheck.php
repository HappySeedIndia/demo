<?php

/**
 * @file
 * Example 1: Using create_function() (deprecated in PHP 7.2+, removed in 8.0)
 */

// ❌ Will be flagged
$fn = create_function('$a,$b', 'return $a + $b;');

// Example 2: Using each() function (deprecated in PHP 7.2)
$array = [1, 2, 3];
// ❌ Deprecated
while ([$key, $val] = each($array)) {
  echo $val;
}

// Example 3: Array and string offset using curly braces (deprecated in PHP 7.4)
$str = "Hello";
// ❌ Deprecated
echo $str{1};
