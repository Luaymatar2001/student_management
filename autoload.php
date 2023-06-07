<?
// RSP-4 standerd make the name of file like name of class
if (!function_exists('load_class')) {

    function load_class($class_name)
    {
        $class_file = __DIR__ . "\\" . $class_name . ".php";
        $trait_file = __DIR__ . "\\trait\\" . $class_name . ".php";
        if (file_exists($class_file)) {
            include $class_file;
        } elseif (file_exists($trait_file)) {
            include $trait_file;
        }
    }
    spl_autoload_register('load_class');
}
