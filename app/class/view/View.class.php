<?php

namespace view;

/**
 * A View object that builds a HMI that can be obtained by parsing/using the object as a string such as with a "echo" or a "strval()" (see __toString()).
 */
class View{
	
	/**
	 * Accesses to the language defined in the session, that is the code of the language for this view.
	 * 	(default is "fr")
	 * 
	 * @return string
	 */
	public function getLanguage(): string{
		if((isset($_SESSION['oria_lang'])) && (is_string($_SESSION['oria_lang']))){
			return $_SESSION['oria_lang'];
		}else{
			return 'fr';
		}
	}

	/**
	 * Accesses the HMI/display as a string.
	 * 	(purpose of a View object)
	 * 
	 * @return string
	 */
	public function __toString(): string{
		$r="Default stringified view";
		return $r;
	}

}

?>
