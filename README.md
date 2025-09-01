## PHPCompatibility
[PHP Release Cycle](https://www.php.net/supported-versions.php)

#### Installation

`composer require phpcompatibility/php-compatibility --dev`

#### Running compatability checker.

`vendor/bin/phpcs --standard=PHPCompatibility --runtime-set testVersion 8.4 mymodule/`


## Git hooks

* mkdir .git/hooks
* chmod +x pre-commit

```
#!/bin/sh
./vendor/bin/phpcs web/modules/custom --standard=phpcs.xml
if [ $? -ne 0 ]; then
  echo "Code style errors found. Commit aborted."
  exit 1
fi
```

## Pass -s 