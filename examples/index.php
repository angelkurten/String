<?php
   require_once('../src/String.php');

    use AngelKurten\String\String;

    $str = new String( '<b>Hola String</b>', true);

    echo $str->concat('<i>Bienvenido al mundo</i>');

    var_dump($str);

    echo $str->setString('Mi nombre es <b> :NAME </b>')
        ->replace([':NAME' => 'Angel Kurten'])
        ->concat('y soy de :COUNTRY')
        ->replace([':COUNTRY' => 'Colombia'])
        ->setParse(false);

    var_dump($str);

