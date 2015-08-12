**String**
=========
String is an interface that allows you to interact with a string as if it were an object

```php
<?php
  require('String.php');
  
  use AngelKurten\String\String;
  
  $str = new String('If :PARAM is :BOOLEAN increases :TIME');
  
  $array = [':PARAM' => 'cut', ':BOOLEAN' => 'TRUE', ':TIME' => '<b>partially</b>'];
  
  echo  $str->replace($array)->concat('the value of X in 30');
```

Result: If X is TRUE increases partially the value of X in 30

**Examples**
------------

### Get string length

```php 
  echo $str->length();
```

### Reverse a string
```php
  echo $str->invert();
```

### Make a string uppercase
```php
  echo $str->upper();
```

### Make a string lowercase
```php
  echo $str->lower();
```

### Uppercase the first character of each word in a string
```php
  echo $str->upWords();
```

### Make a string's first character uppercase
```php
  echo $str->upFirst();
```

### Make a string's first character lowercase
* @param integer $limit Number of characters at which the string will be wrapped.
* @param string $break The line is broken using the optional break parameter.
* @param bool|true $cut If the cut is set to TRUE, the string is always wrapped at or before the specified width. So if you have a word that is larger than the given width, it is broken apart. When FALSE the function does not split the word even if the width is smaller than the word width.
```php
  echo $str->fragment(75, '<br/>', true);
```

### Replace all occurrences of the search string with the replacement string
* @param array $array The Value being searched for, otherwise known as the needle. An array may be used to designate multiple needles.

```php
  $array = [':PARAM' => 'X', ':BOOLEAN' => 'TRUE', ':TIME' => 'parcialmente'];
  echo  $str->replace($array);
```

### Return part of a string

* @param integer $start The input string. Must be one character or longer.
* @param null $length  
  * If start is non-negative, the returned string will start at the start'th position in string, counting from zero. For instance, in the string 'abcdef', the character at position 0 is 'a', the character at position 2 is 'c', and so forth.        
  *  If start is negative, the returned string will start at the start'th character from the end of string.
  * If string is less than start characters long, FALSE will be returned.

```php
  echo  $str->partial(0, 10);
```

### Split a string by string

* @param string $delimiter The boundary string.

```php
  echo  $str->toArray();
```

### One-way string hashing

* @param $salt

```php
  echo  $str->hash('enter key here');
```

### Convert all applicable characters to HTML entities

```php
  echo  $str->HtmlToString();
```

### Convert all HTML entities to their applicable characters

```php
  echo  $str->StringToHtml();
```

### Join array elements with a string

* @param The array or Strings for concat

```php
  echo  $str->concat('the value of X in 30');
```

**Concatenate methods**
------------

Methods that can be concatenated are: 

 - invert
 - lower
 - upper
 - upWords
 - upFirst
 - downFirst
 - fragment
 - replace
 - partial
 - HtmlToString
 - StringToHtml
 - concat

**Example**
------------
```php
  echo  $str->concat('the value of X in :VALUE')->upper()->replace([':VALUE' => '100']);
```

Created By
-----------

+ [Angel Kurten](http://twitter.com/AngelKurten)
