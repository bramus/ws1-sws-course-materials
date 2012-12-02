<?php

/**
 * A (work in progress version of a) template class
 * Don't use this file in production as it's not the final version
 *
 * @author		Bramus Van Damme <bramus.vandamme@kahosl.be>
 *
 * @version		0.3 - First version: load in template and assign variables in it
 */
class Template {


	/**
	 * Final output
	 *
	 * @var string
	 */
	private $content;


	/**
	 * Template load status
	 *
	 * @var bool
	 */
	private $loaded = false;


	/**
	 * Template parse status
	 *
	 * @var bool
	 */
	private $parsed = false;


	/**
	 * List of variables to be replaced by
	 *
	 * @var array
	 */
	private $replacements = array('key' => array(), 'value' => array());


	/**
	 * Class constructor.
	 *
	 * @param	string[optional] $template Path to the .tpl file
	 * @return	void
	 */
	public function __construct($template = null) {

		// If a template is given, load it!
		if($template != null) $this->setTemplate($template);

	}

	/**
	 * Set the template file/string
	 *
	 * @return	void
	 * @param	string $template
	 * @param	string[optional] $type
	 */
	public function setTemplate($template) {

		// redefine arguments
		$template = (string) $template;

		// file doesn't exist or can't be read
		if(!file_exists($template)) throw new Exception('The given template "'. $template .'" doesn\'t exist or can\'t be read');

		// exists & readable
		else {
			// load contents of the file
			$this->content = @file_get_contents($template);

			// load status
			$this->loaded = true;

		}

	}


	/**
	 * Assigns a given value to one a given variable
	 *
	 * @param	string $key
	 * @param	string $value
	 * @return	void
	 */
	public function assign($key, $value) {

		// no template loaded
		if(!$this->loaded) throw new Exception('Cannot assign a replacement: no template has been loaded');

		// store the given values on the replacements array
		$this->replacements['key'][] = (string) $key;
		$this->replacements['value'][] = (string) $value;

	}


	/**
	 * Displays the content and exists script execution
	 *
	 * @param boolean[optional] $exit Should we exit after echoing?
	 * @return	void
	 */
	public function display($exit = null) {

		// get the contents and echo them
		echo $this->getContent();

		// should we stop?
		if ($exit !== null) exit;

	}


	/**
	 * Get the content of the template (by default parses it too)
	 *
	 * @return	string
	 */
	public function getContent($parseTemplate = true) {

		// parse document (if needed)
		if(!$this->parsed && ($parseTemplate === true)) $this->parse();

		// return parsed content
		return $this->content;

	}


	/**
	 * This method will parse all the needed tags, iterations, options and so on
	 *
	 * @return	void
	 */
	private function parse() {

		// save your hip: only parse when you need to!
		if(!$this->parsed) {

			// parse: parse regular replacements
			$this->content = $this->parseReplacements($this->content, $this->replacements);

			// adjust parse status
			$this->parsed = true;

		}

	}


	/**
	 * Parses all the replacements into a given content piece
	 *
	 * @param	string $content
	 * @param	array $replacements
	 * @return	void
	 */
	private function parseReplacements($content, $replacements) {

		// items were added
		if(count($replacements) != 0) {

			// loop search elements
			foreach ($replacements['key'] as $key_index => $key_key) {
				// search pattern
				$toReplace = '{$'. $key_key .'}';

				// parse value into content
				$content = str_replace($toReplace, $replacements['value'][$key_index], $content);

			}

		}

		// return the content
		return $content;

	}

}

// EOF