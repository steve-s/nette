<?php

/**
 * Test: Nette\Config\Configurator and services inheritance and overwriting.
 *
 * @author     David Grudl
 */

use Nette\Config\Configurator,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$configurator = new Configurator;
$configurator->setDebugMode(FALSE);
$configurator->setTempDirectory(TEMP_DIR);
$container = $configurator->addConfig('files/config.inheritance4.neon', Configurator::NONE)
	->createContainer();


Assert::type( 'Nette\Application\Application', $container->getService('application') );
