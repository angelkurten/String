# String
Manejo de Strings Orientado a Objetos

String es una interfaz que permite interactuar con una cadena de texto como si fuera un objeto

```
<?php
  require('String.php');
  
  use AngelKurten\String\String;
  
  $str = new String('Si :PARAM es :BOOLEAN se incrementa :TIME');
  
  $array = [':PARAM' => 'cut', ':BOOLEAN' => 'TRUE', ':TIME' => '<b>parcialmente</b>'];
  
  echo  $str->replace($array)->concat('el valor de X en 30');
```
