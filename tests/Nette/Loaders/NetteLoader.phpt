<?php

/**
 * Test: Nette\Loaders\NetteLoader basic usage.
 *
 * @author     David Grudl
 */

use Nette\Loaders\NetteLoader,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$loader = NetteLoader::getInstance();
$loader->register();

Assert::true( class_exists('Nette\Diagnostics\Debugger') ); // Class Nette\Diagnostics\Debugger loaded?
