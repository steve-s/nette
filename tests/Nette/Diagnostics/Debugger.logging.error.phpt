<?php

/**
 * Test: Nette\Diagnostics\Debugger error logging.
 *
 * @author     David Grudl
 * @exitCode   254
 * @httpCode   500
 * @outputMatch %A%OK!
 */

use Nette\Diagnostics\Debugger,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


// Setup environment
$_SERVER['HTTP_HOST'] = 'nette.org';

Debugger::$logDirectory = TEMP_DIR . '/log';
Tester\Helpers::purge(Debugger::$logDirectory);

Debugger::$consoleMode = FALSE;
Debugger::$mailer = 'testMailer';

Debugger::enable(Debugger::PRODUCTION, NULL, 'admin@example.com');

function testMailer() {}

Debugger::$onFatalError[] = function() {
	Assert::match('%a%Fatal error: Call to undefined function missing_function() in %a%', file_get_contents(Debugger::$logDirectory . '/error.log'));
	Assert::true(is_file(Debugger::$logDirectory . '/email-sent'));
	echo 'OK!';
};
ob_start();


missing_function();
