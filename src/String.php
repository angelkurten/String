<?php namespace AngelKurten\String;


/**
 * Class String
 * @package AngelKurten\String
 */
class String {

    private $string;
    private $original;
    private $separator;
    private $parse = true;


    /**
     * @param $value
     * @param bool|false $parse Is true convert all applicable characters to HTML entities
     * @param string $separator Glue for implode if is array
     */
    public function __construct($value, $parse = false, $separator = " ")
    {
        if(is_array($value))
        {
            $this->string = implode($separator, $value);
            $this->original = $this->string;
        }
        else
        {
            $this->string = $value;
            $this->original = $this->string;
        }

        $this->separator = $separator;
        $this->parse = $parse;
    }

    /**
     * @param mixed $string
     */
    public function setString($string)
    {
        $this->string = $string;
        $this->original = $string;

        return $this;
    }

    /**
     * @param bool|false $parse
     */
    public function setParse($parse)
    {
        $this->parse = $parse;
        return $this;
    }

    /**
     * Get string length
     *
     * @return int
     */
    public function length()
    {
        return strlen($this->string);
    }

    /**
     * Reverse a string
     *
     * @return $this
     */
    public function invert()
    {
        $this->string = strrev($this->string);
        return $this;
    }


    /**
     * Make a string uppercase
     *
     * @return $this
     */
    public function upper()
    {
        $this->string =  strtoupper($this->string);
        return $this;
    }

    /**
     * Make a string lowercase
     *
     * @return $this
     */
    public function lower()
    {
        $this->string = strtolower($this->string);
        return $this;
    }

    /**
     * Uppercase the first character of each word in a string
     *
     * @return $this
     */
    public function upWords()
    {
        $this->string = ucwords($this->string);
        return $this;
    }

    /**
     * Make a string's first character uppercase
     *
     * @return $this
     */
    public function upFirst()
    {
        $this->string = ucfirst($this->string);
        return $this;
    }

    /**
     * Make a string's first character lowercase
     *
     * @return $this
     */
    public function downFirst()
    {
        $this->string = lcfirst($this->string);
        return $this;
    }

    /**
     * Wraps a string to a given number of characters
     *
     * @param integer $limit Number of characters at which the string will be wrapped.
     * @param string $break The line is broken using the optional break parameter.
     * @param bool|true $cut If the cut is set to TRUE, the string is always wrapped at or before the specified width. So if you have a word that is larger than the given width, it is broken apart. When FALSE the function does not split the word even if the width is smaller than the word width.
     * @return $this
     */
    public function fragment($limit = 75, $break = "<br />", $cut = true)
    {
        $this->string = wordwrap($this->string, $limit, $break, $cut);
        return $this;
    }

    /**
     * Replace all occurrences of the search string with the replacement string
     *
     * @param array $array The Value being searched for, otherwise known as the needle. An array may be used to designate multiple needles.
     * @return $this
     */
    public function replace(Array $array)
    {
        $this->string = str_replace(array_keys($array), array_values($array), $this->string);
        return $this;
    }

    /**
     * Return part of a string
     *
     * @param integer $start The input string. Must be one character or longer.
     * @param null $length  If start is non-negative, the returned string will start at the start'th position in string, counting from zero. For instance, in the string 'abcdef', the character at position 0 is 'a', the character at position 2 is 'c', and so forth.
                            If start is negative, the returned string will start at the start'th character from the end of string.
                            If string is less than start characters long, FALSE will be returned.
     * @return $this
     */
    public function partial($start, $length = null)
    {
        if (is_null($length))
        {
            $this->string = substr($this->string, $start);
        }

        $this->string = substr($this->string, $start, $length);
        return $this;
    }

    /**
     * Split a string by string
     *
     * @param string $delimiter The boundary string.
     * @return array
     */
    public function toArray($delimiter = " ")
    {
        return explode($delimiter, $this->string);
    }


    /**
     * One-way string hashing
     *
     * @param null $salt
     * @return string
     */
    public function hash($salt = null)
    {
        if(is_null($salt))
        {
            $hash = crypt($this->string);
        }
        else
        {
            $hash = crypt($this->string, $salt);
        }

        return $hash;
    }

    /**
     * Convert all applicable characters to HTML entities
     *
     * @return $this
     */
    public function HtmlToString()
    {
        $this->string = htmlentities($this->string, ENT_QUOTES | ENT_HTML5, "UTF-8");
        return $this;
    }

    /**
     * Convert all HTML entities to their applicable characters
     *
     * @return $this
     */
    public function StringToHtml()
    {
        $this->string = html_entity_decode($this->string, ENT_QUOTES | ENT_HTML5, "UTF-8");
        return $this;
    }

    /**
     * Join array elements with a string
     *
     * @param The array or Strings for concat
     * @return $this
     */
    public function concat()
    {
        foreach(func_get_args() as $str)
        {
            if(is_array($str))
            {
                $str = implode($str, $this->separator);
            }

            $this->string .= ' '.$str;
        }

        return $this;
    }

    /**
     * Strip whitespace (or other characters)
     *
     * @param string $str Character to remove
     * @param bool $bool If true remove from the beginning of a string
     *                   If false remove from the end of a string
     * @return $this
     */
    public function trim($str = " ", $bool = true)
    {
        if($bool)
        {
            $this->string = ltrim($this->string, $str);
        }
        else
        {
            $this->string = rtrim($this->string, $str);
        }


        return $this;
    }

    /**
     * Return the string representation of the method object.
     *
     * @return string
     */
    public function __toString()
    {
        if($this->parse)
        {
            return htmlentities($this->string);
        }

        return $this->string;
    }

}
