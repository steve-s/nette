<?php

/**
 * Test: Nette\DI\Helpers::escape()
 *
 * @author     David Grudl
 */

use Nette\DI\Helpers,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


Assert::same( 123, Helpers::escape(123) );
Assert::same( '%%', Helpers::escape('%') );
Assert::same(
	array('key1' => 123, 'key2' => '%%'),
	Helpers::escape(array('key1' => 123, 'key2' => '%'))
);
