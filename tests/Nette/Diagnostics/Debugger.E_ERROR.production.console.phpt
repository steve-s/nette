<?php

/**
 * Test: Nette\Diagnostics\Debugger E_ERROR in production & console mode.
 *
 * @author     David Grudl
 * @exitCode   254
 * @httpCode   500
 * @outputMatch OK!
 */

use Nette\Diagnostics\Debugger,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


Debugger::$consoleMode = TRUE;
Debugger::$productionMode = TRUE;

Debugger::enable();

Debugger::$onFatalError[] = function() {
	Assert::match('ERROR:%A%', ob_get_clean());
	echo 'OK!';
};
ob_start();


missing_function();
