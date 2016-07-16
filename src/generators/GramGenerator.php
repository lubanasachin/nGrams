<?php

/**
 * @file
 * Contains class \nGrams\generator\GramGenerator.
 */

namespace nGrams\generator;

/**
 * Generates unique nGrams from the line read from STDIN.
 */
class GramGenerator {

	/**
	 * variable to store nGram length
	 * @var int
	 */	
	protected $n;

	/**
	 * variable to store unique nGram generated
	 * @var array
	 */		
	protected $grams = array();

	/**
	 * _constructor for GramGenerator class to set nGram length
	 * @param string $line
	 * @param int $n
	 * @return
	 */
	public function __construct($n) {
		$this->n = $n;
	}

	/**
	 * Populate $grams array by grabbing strings of length $n from given string
	 * @param string $line
	 * @return 
	 */
	public function feed($line) {
		$i = 0;
		$this->grams = array();
		while ($i < strlen($line) - 1) {
			$gram = substr($line, $i, $this->n);
			$following = substr($line, $i + $this->n, 1);
			if (array_key_exists($gram, $this->grams)) $this->grams[$gram][] = $following;
			else $this->grams[$gram] = array($following);
			$i++;
		}
	}

	/**
	 * get list of generated grams from the given line
	 * @param
	 * @return 
	 */
	public function get_grams() {
		return $this->grams;
	}
}