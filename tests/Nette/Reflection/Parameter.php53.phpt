<?php

/**
 * Test: Nette\Reflection\Parameter and closure tests.
 *
 * @author     David Grudl
 * @phpversion 5.3
 */

use Nette\Reflection,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$reflect = new Reflection\GlobalFunction(function($x, $y) {});
$params = $reflect->getParameters();
Assert::same( 2, count($params) );
Assert::same( 'Function {closure}()', (string) $params[0]->declaringFunction );
Assert::null( $params[0]->class );
Assert::null( $params[0]->declaringClass );
Assert::same( 'Function {closure}()', (string) $params[1]->declaringFunction );
Assert::null( $params[1]->class );
Assert::null( $params[1]->declaringClass );
