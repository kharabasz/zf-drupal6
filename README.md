Zend Framework Drupal 6
==========

Adapter to allow Zend Framework to use Drupal's existing db connection

Usage
-----

Originally written for:

* Zend Framework 1.x
* Drupal 6.x

But, the concept could be extended to newer versions of zf and drupal.

Allows you further use of the http://drupal.org/project/zend contributed module by hooking Zend_Db_Table into Drupal's existing db connection.

```php
function module_init()
{
    global $db_url;

    // initialize Zend Autoloader
    require('Zend/Loader/Autoloader.php');
    $autoloader = Zend_Loader_Autoloader::getInstance();
    $autoloader->registerNamespace('My_');

    // initialize Zend Db
    $options = parse_url( $db_url );
    $db = Zend_Db::factory('Drupal', array(
        'host'     => $options["host"],
        'username' => $options["user"],
        'password' => urldecode($options["pass"]),
        'dbname'   => substr($options["path"], 1),
        'profiler' => true,
        'charset'  => "utf8",
        'adapterNamespace' => 'My_DbAdaptor',
    ));
    Zend_Db_Table::setDefaultAdapter($db);
}
```