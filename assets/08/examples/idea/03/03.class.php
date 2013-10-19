<?php

/**
 * A (work in progress version of a) basic template class
 * Don't use this file in production as it's not the final version
 *
 * @author		Bramus Van Damme <bramus.vandamme@kahosl.be>
 *
 * @version		0.1 - First version: Load in template file and render data into it
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
	 * Template render status
	 *
	 * @var bool
	 */
	private $rendered = false;


	/**
	 * Class constructor.
	 *
	 * @param	string[optional] $template Path to the .tpl file
	 * @return	void
	 */
	public function __construct($template = null) {

		// If a template is given, load it!
		if($template != null) $this->loadTemplate($template);

	}

	/**
	 * Set the template file/string
	 *
	 * @return	void
	 * @param	string $template
	 * @param	string[optional] $type
	 */
	public function loadTemplate($template) {

		// redefine arguments
		$template = (string) $template;

		// file doesn't exist or can't be read
		if(!file_exists($template)) throw new Exception('The given template "'. $template .'" doesn\'t exist or can\'t be read');

		// exists & readable
		else {

			// load contents of the file
			$this->content = file_get_contents($template);

			// load status
			$this->loaded = true;

		}

	}


	/**
	 * Parse all the needed data and so on
	 *
	 * @return	string the content with the data rendered into
	 */
	public function render($data) {

		// save your hip: only render when you need to!
		if(!$this->rendered) {

			// loop data and replace them in the content
			if(sizeof($data) != 0) {
				foreach ($data as $key => $value) {
					$this->content = str_replace('{{ '. $key .' }}', htmlentities($value), $this->content);
				}
			}

			// adjust rendered status
			$this->rendered = true;

		}

		// Return the content
		return $this->content;

	}

}

// EOF