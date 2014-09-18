<?php

/**
 * Magic Constants
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

	echo '<h2>./</h2>' . PHP_EOL;
	echo '<strong>dirname(./) :</strong><br /><code>' . dirname('./') . '</code><br />' . PHP_EOL;
	echo '<strong>realpath(./) :</strong><br /><code>' . realpath('./') . '</code><br />' .PHP_EOL;

	echo '<h2>__FILE__</h2>' . PHP_EOL;
	echo '<strong>__FILE__ :</strong><br /><code>' . __FILE__ . '</code><br />' .PHP_EOL;
	echo '<strong>dirname(__FILE__) :</strong><br /><code>' . dirname(__FILE__) . '</code><br />' .PHP_EOL;

	echo '<h2>__DIR__</h2>' . PHP_EOL;
	echo '<strong>__DIR__ :</strong><br /><code>' . __DIR__ . '</code><br />' . PHP_EOL;

// EOF