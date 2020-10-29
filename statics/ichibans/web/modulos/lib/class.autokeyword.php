<?php //á


class autokeyword {

	//declare variables
	//the site contents
	var $contents;
	var $encoding;
	//the generated keywords
	var $keywords;
	//minimum word length for inclusion into the single word
	//metakeys
	var $wordLengthMin;
	var $wordOccuredMin;
	//minimum word length for inclusion into the 2 word
	//phrase metakeys
	var $word2WordPhraseLengthMin;
	var $phrase2WordLengthMinOccur;
	//minimum word length for inclusion into the 3 word
	//phrase metakeys
	var $word3WordPhraseLengthMin;
	//minimum phrase length for inclusion into the 2 word
	//phrase metakeys
	var $phrase2WordLengthMin;
	var $phrase3WordLengthMinOccur;
	//minimum phrase length for inclusion into the 3 word
	//phrase metakeys
	var $phrase3WordLengthMin;
	
	var $stopwords;	

	function autokeyword($params, $encoding)
	{
	
		//get parameters
		$this->encoding = $encoding;
		mb_internal_encoding($encoding);
		$this->contents = $this->replace_chars($params['content']);

		// single word
		$this->wordLengthMin = ($params['min_word_length'])?$params['min_word_length']:5;
		$this->wordOccuredMin = ($params['min_word_occur'])?$params['min_word_occur']:2;

		// 2 word phrase
		$this->word2WordPhraseLengthMin = ($params['min_2words_length'])?$params['min_2words_length']:3;
		$this->phrase2WordLengthMin = ($params['min_2words_phrase_length'])?$params['min_2words_phrase_length']:10;
		$this->phrase2WordLengthMinOccur = ($params['min_2words_phrase_occur'])?$params['min_2words_phrase_occur']:2;

		// 3 word phrase
		$this->word3WordPhraseLengthMin = ($params['min_3words_length'])?$params['min_3words_length']:3;
		$this->phrase3WordLengthMin = ($params['min_3words_phrase_length'])?$params['min_3words_phrase_length']:10;
		$this->phrase3WordLengthMinOccur = ($params['min_3words_phrase_occur'])?$params['min_3words_phrase_occur']:2;

		//parse single, two words and three words
		$this->stopwords = $params['stopwords'];

	}

	function get_keywords()
	{
		$keywords = array_merge($this->parse_words(),$this->parse_2words(),$this->parse_3words());
		return $keywords;
	}

	//turn the site contents into an array
	//then replace common html tags.
	function replace_chars($content)
	{
		//convert all characters to lower case
		$content = mb_strtolower($content);
		//$content = mb_strtolower($content, "UTF-8");
		$content = strip_tags($content);

      //updated in v0.3, 24 May 2009
		$punctuations = array(',', ')', '(', '.', "'", '"',
		'<', '>', '!', '?', '/', '-',
		'_', '[', ']', ':', '+', '=', '#',
		'$', '&quot;', '&copy;', '&gt;', '&lt;', 
		'&nbsp;', '&trade;', '&reg;', ';', 
		chr(10), chr(13), chr(9));

		$content = str_replace($punctuations, " ", $content);
		// replace multiple gaps
		$content = preg_replace('/ {2,}/si', " ", $content);

		return $content;
	}

	//single words META KEYWORDS
	function parse_words()
	{
		//list of commonly used words
		// this can be edited to suit your needs
		$common = $this->stopwords;
		//create an array out of the site contents
		$s = explode(" ", $this->contents);
		//initialize array
		$k = array();
		//iterate inside the array
		foreach( $s as $key=>$val ) {
			//delete single or two letter words and
			//Add it to the list if the word is not
			//contained in the common words list.
			if(mb_strlen(trim($val)) >= $this->wordLengthMin  && !in_array(trim($val), $common)  && !is_numeric(trim($val))) {
				$k[] = trim($val);
			}
		}
		//count the words
		$k = array_count_values($k);
		//sort the words from
		//highest count to the
		//lowest.
		$occur_filtered = $this->occure_filter($k, $this->wordOccuredMin);
		arsort($occur_filtered);

		$imploded = $this->arreglo($occur_filtered);
		//release unused variables
		unset($k);
		unset($s);

		return $imploded;
	}

	function parse_2words()
	{
		//create an array out of the site contents
		$x = explode(" ", $this->contents);
		//initilize array

		//$y = array();
		for ($i=0; $i < count($x)-1; $i++) {
			//delete phrases lesser than 5 characters
			if( (mb_strlen(trim($x[$i])) >= $this->word2WordPhraseLengthMin ) && (mb_strlen(trim($x[$i+1])) >= $this->word2WordPhraseLengthMin) )
			{
				$y[] = trim($x[$i])." ".trim($x[$i+1]);
			}
		}

		//count the 2 word phrases
		$y = array_count_values($y);

		$occur_filtered = $this->occure_filter($y, $this->phrase2WordLengthMinOccur);
		//sort the words from highest count to the lowest.
		arsort($occur_filtered);

		$imploded = $this->arreglo($occur_filtered);
		//release unused variables
		unset($y);
		unset($x);

		return $imploded;
	}

	function parse_3words()
	{
		//create an array out of the site contents
		$a = explode(" ", $this->contents);
		//initilize array
		$b = array();

		for ($i=0; $i < count($a)-2; $i++) {
			//delete phrases lesser than 5 characters
			if( (mb_strlen(trim($a[$i])) >= $this->word3WordPhraseLengthMin) && (mb_strlen(trim($a[$i+1])) > $this->word3WordPhraseLengthMin) && (mb_strlen(trim($a[$i+2])) > $this->word3WordPhraseLengthMin) && (mb_strlen(trim($a[$i]).trim($a[$i+1]).trim($a[$i+2])) > $this->phrase3WordLengthMin) )
			{
				$b[] = trim($a[$i])." ".trim($a[$i+1])." ".trim($a[$i+2]);
			}
		}

		//count the 3 word phrases
		$b = array_count_values($b);
		//sort the words from
		//highest count to the
		//lowest.
		$occur_filtered = $this->occure_filter($b, $this->phrase3WordLengthMinOccur);
		arsort($occur_filtered);

		$imploded = $this->arreglo(", ", $occur_filtered);
		//release unused variables
		unset($a);
		unset($b);

		return $imploded;
	}

	function occure_filter($array_count_values, $min_occur)
	{
		$occur_filtered = array();
		foreach ($array_count_values as $word => $occured) {
			if ($occured >= $min_occur) {
				$occur_filtered[$word] = $occured;
			}
		}

		return $occur_filtered;
	}

	function arreglo($array)
	{
		$c = array();
		foreach($array as $key=>$val) {
			$c[] = $key;
		}
		return $c;
	}
}
?>