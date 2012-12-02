<?php

/**
 * Template Class
 *
 * @author		Bramus Van Damme <bramus.vandamme@kahosl.be>
 * @version		1.1 - Added support for modifiers
 */

class Template {


	/**
	 * The version of this class
	 */
	const version = 1.1;


	/**
	 * Final output
	 *
	 * @var string
	 */
	private $content;


	/**
	 * Name of the currently active iteration
	 *
	 * @var string
	 */
	private $iteration;


	/**
	 * List of iterations
	 *
	 * @var array
	 */
	private $iterations = array();


	/**
	 * Template load status
	 *
	 * @var bool
	 */
	private $loaded = false;


	/**
	 * List of optional assignations
	 *
	 * @var array
	 */
	private $options = array();


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
	 * Apply a modifier on a given string
	 *
	 * @return	string
	 * @param	string $string
	 * @param	string $modifier
	 */
	public function applyModifier($string, $modifier) {

		// redefine modifier
		$modifier = str_replace(array('{', '}', '$'), '', $modifier);

		// special modifiers (with extra parameters)
		if(substr($modifier, 0, 6) == 'repeat') { $modifierValue = $modifier; $modifier = 'repeat'; } // repeat
		if(substr($modifier, 0, 9) == 'substring') { $modifierValue = $modifier; $modifier = 'substring'; } // substring
		if(substr($modifier, 0, 12) == 'truncateHtml') { $modifierValue = $modifier; $modifier = 'truncateHtml'; } // truncate
		if(substr($modifier, 0, 9) == 'truncate:') { $modifierValue = $modifier; $modifier = 'truncate'; } // truncate, mind the : (conflicts with truncateHtml resolution)

		// existing modifiers
		switch ($modifier) {

			// addslashes
			case 'addslashes':
				$string = addslashes($string);
			break;

			// htmlentities
			case 'htmlentities':
				$string = htmlentities($string);
			break;

			// lowercase
			case 'lowercase':
				$string = strtolower($string);
			break;

			// trim left side
			case 'ltrim':
				$string = ltrim($string);
			break;

			// newlines to <br />
			case 'nl2br':
				$string = nl2br($string);
			break;

			// repeat x times
			case 'repeat':

				// define array
				$aRepeat = explode(':', $modifierValue);

				// 2 items -> repeat / x
				if(count($aRepeat) == 2) {
					// repeat x times
					$iRepeat = (int) $aRepeat[1];

					// apply repetition
					$string = str_repeat($string, $iRepeat);
				}

			break;

			// trim right side
			case 'rtrim':
				$string = rtrim($string);
			break;

			// shuffle
			case 'shuffle':
				$string = str_shuffle($string);
			break;

			// stripslashes
			case 'stripslashes':
				$string = stripslashes($string);
			break;

			// substring (start, length, characters)
			case 'substring':

				// define array
				$aSubstring = explode(':', $modifierValue);

				// 3 items -> substring / start / length
				if(count($aSubstring) == 3) {

					// define start & length
					$iStart = (int) $aSubstring[1];
					$iLength = (int) $aSubstring[2];

					// apply substring
					$string = substr($string, $iStart, $iLength);

				}

			break;

			// trim entire string
			case 'trim':
				$string = trim($string);
			break;

			// truncate string
			case 'truncate':

					// define array
					$aTruncate = explode(':', $modifierValue);

					// at least 1 item!
					if(count($aTruncate) >= 2) {

						// truncate after xx characters
						$iLength = (int) $aTruncate[1];

						// needs to be truncated
						if(strlen($string) > $iLength) $string = substr($string, 0, $iLength) . '...';

					}

			break;

			// truncate html
			case 'truncateHtml':

				$aParameters = explode(':', $modifierValue);
				$length = $aParameters[1];
				$cut = (isset($aParameters[2])) ? $aParameters[2] : 'yes';

				// strip html tags
				$string = strip_tags($string);

				// don't cut
				if($cut == 'no') {

					// string is too big
					if(strlen($string) > $length) {

						// chop
						$string = substr($string, 0, $length);

						// last space position
						$iPos = strrpos($string, ' ');

						// space found
						if($iPos !== false) $string = substr($string, 0, $iPos);

					}

				}

				// allow cut
				else if(strlen($string) > $length) $string = substr($string, 0, (int) $length) .'&hellip;';

				// re-parse html
				$string = htmlentities($string);

			break;

			// first letter uppercase
			case 'ucfirst':
				$string = ucfirst($string);
			break;

			// first letter for each word uppercase
			case 'ucwords':
				$string = ucwords($string);
			break;

			// uppercase
			case 'uppercase':
				$string = strtoupper($string);
			break;

			// urlencode
			case 'urlencode':
				$string = urlencode($string);
			break;

			// rawurlencode
			case 'rawurlencode':
				$string = rawurlencode($string);
			break;
		}

		return $string;
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
	 * Assigns a given value to a given key, located inside an iteration
	 *
	 * @param	string $key
	 * @param	string $value
	 * @return	void
	 */
	public function assignIteration($key, $value) {

		// no template loaded
		if(!$this->loaded) throw new Exception('Cannot assign iteration: no template has been loaded');

		// template loaded
		else {

			// no current iteration
			if($this->iteration == '') throw new Exception('Cannot assign in iteration: no iteration has been set, you must set an iteration first');

			// has a current iteration
			else {

				$this->iterations[$this->iteration]['replacements']['key'][] = (string) $key;
				$this->iterations[$this->iteration]['replacements']['value'][] = (string) $value;

			}

		}

	}


	/**
	 * Add an optional assignation to the current iteration block
	 *
	 * @return	void
	 * @param	string $option
	 */
	public function assignIterationOption($option) {

		// no template loaded
		if(!$this->loaded) throw new Exception('Cannot assign iterationOption "' . $option . '": no template has been loaded');

		// template loaded
		else {

			// no current iteration
			if($this->iteration == '') throw new Exception('Cannot assign iterationOption "' . $option . '": no iteration has been set, you must set an iteration first');

			// has current iteration
			else {

	 			// redefine option
				$option = (string) $option;

				// option already set
				if(in_array($option, $this->iterations[$this->iteration]['options'])) throw new Exception('Cannot assign iterationOption "' . $option . '": the option has already been assigned');

				// new option
				else {

					// add option
					$this->iterations[$this->iteration]['options'][] = $option;

				}

			}

		}

	}


	/**
	 * Add an optional block to display
	 *
	 * @return	void
	 * @param	string $option
	 */
	public function assignOption($option) {

		// no template loaded
		if(!$this->loaded) throw new Exception('Cannot assign option "' . $option . '": no template has been loaded');

		// template loaded
		else {

			// redefine option
			$option = (string) $option;

			// option already added
			if(in_array($option, $this->options)) throw new Exception('Cannot assign option "' . $option . '": the option has already been assigned');

			// new option
			$this->options[] = $option;

		}

	}


	/**
	 * Remove an optional block to display
	 *
	 * @param	string $option
	 * @return	void
	 */
	public function deAssignOption($option) {

		// no template loaded
		if(!$this->loaded) throw new Exception('Cannot deassign option "' . $option . '": no template has been loaded');

		// template loaded
		else {

			// redefine option
			$option = (string) $option;

			// find $option in the options array
			$optionFound = in_array($option, $this->options);

			// option not found: throw Exception
			if($optionFound === false) throw new Exception('Cannot deassign option "' . $option . '": the option has not been assigned yet');

			// option found: remove it
			unset($this->options[array_search($option, $this->options)]);

		}

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
	 * Retrieve the name of currently active iteration
	 *
	 * @return	string
	 */
	public function getIteration() {

		return $this->iteration;

	}


	/**
	 * Retrieve the template load status
	 *
	 * @return	bool
	 */
	public function getLoaded() {

		return $this->loaded;

	}


	/**
	 * Check if the given iteration exists in the template file
	 *
	 * @param	string $iteration
	 * @return	bool
	 */
	public function iterationExists($iteration) {

		if(preg_match("/{iteration:". $iteration ."}.*?{\/iteration:". $iteration ."}/is", $this->content)) return true;
		return false;

	}


	/**
	 * Check if the given option exists in the template
	 *
	 * @param	string $option
	 * @return	bool
	 */
	public function optionExists($option) {

		if(preg_match("/{option:". $option ."}.*?{\/option:". $option ."}/is", $this->content)) return true;
		return false;

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

			// parse: parse options
			$this->parseOptions();

			// parse: parse iterations
			// (no need, they already have been parsed when setting them!)

			// cleanup: strip leftover options
			$this->stripOptions();

			// cleanup: strip leftover iterations
			$this->stripIterations();

			// cleanup: strip comments
			$this->stripComments();

			// adjust parse status
			$this->parsed = true;

		}

	}


	/**
	 * The given or current iteration will be parsed in the main content
	 *
	 * @param	string[optional] $name
	 * @return	void
	 */
	public function parseIteration($name = null) {

		// template not loaded
		if(!$this->loaded) throw new Exception('Cannot parse iteration "' . $name . '": no template has been loaded');

		// template loaded
		else {

			// iteration defined
			if($name) {

				// redefine name
				$name = (string) $name;

				// iteration doesn't exist
				if(!isset($this->iterations[$name])) throw new Exception('Cannot parse iteration "' . $name . '": You can not parse an iteration which has not been set');

				// iteration exists
				else {

					// has a parent
					if($this->iterations[$name]['parent']) {

						// define parent
						$parent = $this->iterations[$name]['parent'];

						// parse in content_temp of the parent
						$this->iterations[$parent]['content_temp'] = str_replace($this->iterations[$name]['content_search'], $this->iterations[$name]['content_parsed'], $this->iterations[$parent]['content_temp']);

						// delete iteration
						unset($this->iterations[$name]);

						// make daddy active
						$this->iteration = $parent;

					}

					// no daddy :(
					else {

						// parse in main content
						$this->content = str_replace($this->iterations[$name]['content_search'], $this->iterations[$name]['content_parsed'], $this->content);

						// delete iteration
						unset($this->iterations[$name]);

					}

				}

			}

			// no iteration defined: parse the currently active iteration
			else {

				// alas, no current iteration exists
				if($this->iteration == '') throw new Exception('Cannot parse iteration: You can not parse an iteration which has not been set');

				// parse using this functione
				else $this->parseIteration($this->iteration);

			}

		}

	}


	/**
	 * Makes the request options appear in the output
	 *
	 * @return	void
	 */
	private function parseOptions() {

		// loop options & remove tags (viz. make them )
		foreach ($this->options as $option) $this->content = str_replace(array('{option:' .  $option .'}', '{/option:' . $option . '}'), '', $this->content);

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
				$pattern = '/' . '\\{\$' . $key_key . '(\|addslashes|\|htmlentities|\|length|\|lowercase|\|ltrim|\|nl2br|\|repeat:([0-9]?)|\|rtrim|\|shuffle|\|stripslashes|\|substring:([0-9]*):([0-9]*)|\|trim|\|truncateHtml:([0-9]*)(:(yes|no))?|\|truncate:([0-9]*)|\|urlencode|\|rawurlencode|\|ucfirst|\|ucwords|\|uppercase)*' . '\\}/';

				// try to find matches
				if(preg_match_all($pattern, $content, $matches)) {

					// loop first element (is an array)
					foreach ($matches[0] as $search_string) {

						// define array with modifiers
						$aSearch = explode('|', $search_string);

						// define start value
						$sReplace = $replacements['value'][$key_index];

						// loop var with modifiers & apply modifier
						foreach($aSearch as $sSearch) $sReplace = $this->applyModifier($sReplace, $sSearch);

						// parse in template
						$content = str_replace($search_string, $sReplace, $content);

					}

				}

			}

		}

		// return the content
		return $content;

	}


	/**
	 * Performs the needed operations to refill the iteration
	 *
	 * @return	void
	 * @param	string[optional] $name
	 */
	public function refillIteration($name = null) {

		// template not loaded
		if(!$this->loaded) throw new Exception('Cannot refill iteration "' . $name . '": no template has been loaded');

		// template loaded
		else {

			// iteration defined?
			if($name) {

				// redefine name
				$name = (string) $name;

				// iteration doesn't exist
				if(!isset($this->iterations[$name])) throw new Exception('Cannot refill iteration "' . $name . '": the iteration has not been set yet');

				// iteration exists
				else {

					// parse regular replacements
					$this->iterations[$name]['content_temp'] = $this->parseReplacements($this->iterations[$name]['content_temp'], $this->iterations[$name]['replacements']);

					// parse options
					if(count($this->iterations[$name]['options']) != 0) {

						// loop options & remove tags
						foreach ($this->iterations[$name]['options'] as $option) $this->iterations[$name]['content_temp'] = str_replace(array('{option:' . $option . '}', '{/option:' . $option . '}'), '', $this->iterations[$name]['content_temp']);

						// reset options
						$this->iterations[$name]['options'] = array();

					}

					// strip remaining options
					$this->iterations[$name]['content_temp'] = preg_replace("/{option:(.+?)}(.+?){\/option:\\1}/is", '', $this->iterations[$name]['content_temp']);

					// add content to parsed content
					$this->iterations[$name]['content_parsed'] .= $this->iterations[$name]['content_temp'];

					// refill working content
					$this->iterations[$name]['content_temp'] = $this->iterations[$name]['content_stack'];

					// empty search/replace arrays
					$this->iterations[$name]['replacements']['key'] = array();
					$this->iterations[$name]['replacements']['value'] = array();

				}

			}

			// iteration not defined
			else {

				// no current iteration exists
				if($this->iteration == '') throw new Exception('Cannot refill iteration: no iteration has not been set yet');

				// parse using this functione
				else $this->refillIteration($this->iteration);

			}

		}

	}


	/**
	 * Defines or selects an iteration
	 *
	 * @return	void
	 * @param	string $name
	 * @param	string[optional] $parent
	 */
	public function setIteration($name, $parent = null) {

		// no template loaded
		if(!$this->loaded) throw new Exception('Cannot set iteration "' . $name . '": no template has been loaded');

		// template loaded
		else {

			// redefine arguments
			$name = (string) $name;

			// iteration has already been set (make it active)
			if(isset($this->iterations[$name])) $this->iteration = $name;

			// new iteration
			else {

				// search pattern
				$pattern = "/{iteration:$name}(.*){\/iteration:$name}/ms";

				// parent given?
				if($parent) {

					// redefine parent
					$parent = (string) $parent;

					// parent doesn't exist
					if(!isset($this->iterations[$parent])) throw new Exception('Cannot set iteration "' . $name . '": the given parent "' . $parent . '" does not exist');

					// daddy's alive!
					else {

						// no match found
						if(!preg_match($pattern, $this->iterations[$parent]['content_stack'], $matches)) throw new Exception('Cannot set iteration "' . $name . '": it is not a child of the parent "' . $parent . '"');

						// match found
						else {

							// content (without iteration tags)
							$this->iterations[$name]['content_stack'] = $matches[1];

							// content to work with (updated every refill)
							$this->iterations[$name]['content_temp'] = $matches[1];

							// content + iteration tags (for parsing)
							$this->iterations[$name]['content_search'] = $matches[0];

							// parsed string
							$this->iterations[$name]['content_parsed'] = '';

							// search & replace arrays
							$this->iterations[$name]['replacements'] = array('key' => array(), 'value' => array());

							// iteration options
							$this->iterations[$name]['options'] = array();

							// parse status
							$this->iterations[$name]['parsed'] = false;

							// has no parent
							$this->iterations[$name]['parent'] = $parent;

							// current iteration
							$this->iteration = $name;

						}

					}

				}

				// no parent!
				else {

					// no match found
					if(!preg_match($pattern, $this->content, $matches)) throw new Exception('Cannot set iteration "' . $name . '": it does not exist');

					// match found
					else {

						// content (without iteration tags)
						$this->iterations[$name]['content_stack'] = $matches[1];

						// content to work with (updated every refill)
						$this->iterations[$name]['content_temp'] = $matches[1];

						// content + iteration tags (for parsing)
						$this->iterations[$name]['content_search'] = $matches[0];

						// parsed string
						$this->iterations[$name]['content_parsed'] = '';

						// search & replace arrays
						$this->iterations[$name]['replacements'] = array('key' => array(), 'value' => array());

						// iteration options
						$this->iterations[$name]['options'] = array();

						// parse status
						$this->iterations[$name]['parsed'] = false;

						// has no parent
						$this->iterations[$name]['parent'] = null;

						// current iteration
						$this->iteration = $name;

					}

				}

			}

		}

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
		if(!file_exists($template)) throw new Exception('The given template "' . $template . '" doesn\'t exist or can\'t be read');

		// exists & readable
		else {

			// load contents of the file
			$this->content = @file_get_contents($template);

			// load status
			$this->loaded = true;

		}

	}


	/**
	 * Strip comments from the output
	 *
	 * @return	void
	 */
	private function stripComments() {

		$this->content = preg_replace("/\{\*(.+?)\*\}/s", '', $this->content);

	}


	/**
	 * Strip iterations from the output
	 *
	 * @return	void
	 */
	private function stripIterations() {

		$this->content = preg_replace("/{iteration:([a-z0-9-_]+)}.*?{\/iteration:\\1}/is", '', $this->content);

	}


	/**
	 * Strip the options from the output
	 *
	 * @return	void
	 */
	private function stripOptions() {

		$this->content = preg_replace("/{option:([a-z0-9-_]+)}.*?{\/option:\\1}/is", '', $this->content);

	}


	/**
	 * Returns the version of this class
	 * @return double
	 */
	public static function version() {

		return (float) self::version;

	}


}

//EOF