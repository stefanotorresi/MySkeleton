MySkeleton
===

Yet another Zend Framework 2 skeleton application

Installation
---

Installation is done via Composer and Bower

```
$ composer create-project -sdev --prefer-dist stefanotorresi/My-Skeleton ./install-dir
$ cd install-dir && cp config/autoload/development.dist config/autoload/local.php
```

If you navigate to the home and the CSS doesn't load properly, check your SASS executable path and set it accordingly to your environment.

Check the provided `.dist` configuration files for more details.
