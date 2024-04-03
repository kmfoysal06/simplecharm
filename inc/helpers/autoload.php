<?php
/**
 * Class File Autoloader
 * @package SimpleCharm
 * @since 1.3
 */
spl_autoload_register('simplecharm_autoloader');
function simplecharm_autoloader($class) {
	$namespace = 'SIMPLECHARM_THEME';
 
	if (strpos($class, $namespace) !== 0) {
		return;
	}
 
	$class = str_replace($namespace, '', $class);
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
 
	$directory = get_template_directory();
	$path = strtolower($directory . $class);

 
	if (file_exists($path)) {
		require_once($path);
	}
}