<?php

/**
 * @file
 * Level 0: No errors, even though issues exist.
 */

/**
 * Returns welcome message.
 */
function greet(string $name): void {
  echo "Welcome " . $name;
}

// Bug 1: Passing wrong type (expects string but int given).
greet(123);

/**
 * Bug 2: Returning wrong type.
 */
function get_age(): int {
  // String instead of int.
  return "30";
}

// Bug 3: Undefined variable usage.
echo $undefinedVar;

// Bug 4: Dead code.
if (FALSE) {
  echo "This will never run";
}
