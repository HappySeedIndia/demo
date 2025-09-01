<?php
// Example 1: Using create_function() (deprecated in PHP 7.2+, removed in 8.0)
$fn = create_function('$a,$b', 'return $a + $b;'); // ❌ Will be flagged

// Example 2: Using each() function (deprecated in PHP 7.2)
$array = [1, 2, 3];
while (list($key, $val) = each($array)) { // ❌ Deprecated
    echo $val;
}

// Example 3: Array and string offset using curly braces (deprecated in PHP 7.4)
$str = "Hello";
echo $str{1}; // ❌ Deprecated
