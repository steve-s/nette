<?php

/**
 * Test: Nette\Diagnostics\Debugger errors and shut-up operator.
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
Debugger::$productionMode = FALSE;

Debugger::enable();

Debugger::$onFatalError[] = function() {
	Assert::match("exception 'Nette\\FatalErrorException' with message 'Call to undefined function missing_function()' in %a%:%d%
Stack trace:
#0 [internal function]: %a%Debugger::_shutdownHandler()
#1 {main}
(stored in %a%)
", ob_get_clean());
	echo 'OK!';
};
ob_start();


@missing_function();
