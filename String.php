<?php namespace AngelKurten\String;


/**
 * Class String
 * @package AngelKurten\String
 *
 */
class String {

    private $string;
    private $original;
    private $separator;
    private $parse = true;

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

    public function length()
    {

        return strlen($this->string);
    }

    public function invert()
    {
        $this->string = strrev($this->string);
        return $this;
    }

    public function upper()
    {
        $this->string =  strtoupper($this->string);
        return $this;
    }

    public function lower()
    {
        $this->string = strtolower($this->string);
        return $this;
    }

    public function upWords()
    {
        $this->string = ucwords($this->string);
        return $this;
    }

    public function upFirst()
    {
        $this->string = ucfirst($this->string);
        return $this;
    }

    public function downFirst()
    {
        $this->string = lcfirst($this->string);
        return $this;
    }

    public function fragment($limit, $break = "<br />", $cut = true)
    {
        $this->string = wordwrap($this->string, $limit, $break, $cut);
        return $this;
    }

    public function replace($array)
    {
        $this->string = str_ireplace(array_keys($array), array_values($array), $this->string);
        return $this;
    }

    public function partial($start, $length = null)
    {
        if (is_null($length))
        {
            $this->string = substr($this->string, $start);
        }

        $this->string = substr($this->string, $start, $length);
        return $this;
    }

    public function toArray($delimiter = " ")
    {
        return explode($delimiter,$this->string);
    }


    public function hash($salt = null)
    {
        return crypt($this->string, $salt);
    }

    public function HtmlToString()
    {
        $this->string = htmlentities($this->string, ENT_QUOTES | ENT_HTML5, "UTF-8");
        return $this;
    }

    public function StringToHtml()
    {
        $this->string = html_entity_decode($this->string, ENT_QUOTES | ENT_HTML5, "UTF-8");
        return $this;
    }

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


    public function __toString()
    {
        if($this->parse)
        {
            return htmlentities($this->string);
        }

        return $this->string;
    }

}
