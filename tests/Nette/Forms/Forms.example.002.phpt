<?php

/**
 * Test: Nette\Forms example.
 *
 * @author     David Grudl
 */

use Nette\Forms\Form,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST = array('text'=>'a','submit1'=>'Send',);


$form = new Form;

$form->addProtection('Security token did not match. Possible CSRF attack.', 3);

$form->addHidden('id')->setDefaultValue(123);
$form->addSubmit('submit', 'Delete item');
$form->fireEvents();

Assert::matchFile(__DIR__ . '/Forms.example.002.expect', $form->__toString(TRUE) );
