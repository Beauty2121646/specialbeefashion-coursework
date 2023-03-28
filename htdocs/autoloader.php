<?php
/**
 * A PRS-4 class loader
 *
 * @var string $prefix         The namespace prefix
 * @var string $dir            The namespace base directory
 * @var int    $length         The namespace length
 * @var string $relative_class The relative class
 */
spl_autoload_register(function ($class)
{
    $prefix = 'Asobi\\';
    $dir    = __DIR__ . '/src/';
    $length = strlen($prefix);  // * does the class use the namespace prefix?
    /** Test namespace class */
    if (strncmp($prefix, $class, $length) !== 0) return;
    // * get the relative class name
    $relative_class = str_replace('\\', '/', substr($class, $length));
    /** Test if the file exists, require it */
    if (is_readable($file = "$dir$relative_class.php")) require $file;
});
