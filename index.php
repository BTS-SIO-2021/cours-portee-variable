<?php 

    $x = 10;
    
    var_dump($_SERVER);
    /*
    Ici au dessus j'ai déclaré une variable $x qui a une portée GLOBALE. 
    (à ne pas confondre avec les super-globales. pour mémo les super-globales sont des variables mises à disposition par le langage PHP - donc nous ne les avons pas créés nous-mêmes et qui sont disponibles partout, tout le temps : https://www.php.net/manual/fr/language.variables.superglobals.php).

    Ici x à une portée globale c'est-à-dire qu'elle est disponible par défaut à l'utilisation et à la manipulation dans un contexte global. On a vu avec test1() qu'on ne peut pas utiliser une variable global dans un contexte local : une fonction est un contexte local.

    A ne pas confondre non plus avec les constantes. Les constantes sont des variables que nous définissons et qui sont disponibles partout, tout le temps. Sauf que l'idée d'une constante (comme son nom l'indique) est que la valeur ne change jamais. 
    PHP nous met aussi à disposition, des constantes "pré-définies", c'est ce qu'on appelle les constantes magiques https://www.php.net/manual/fr/language.constants.magic.php

    */

    define('SALUT', 20);
    $x= 10 ;

    // Ca ca m'affiche pas $x
    function test1(){
        echo 'La valeur de la variable x est : '.$x .'<br>';
    } 

    // Ca ca m'affiche la valeur de ma constante soit 20
    function test1bis(){
        echo 'La valeur de la variable x est : '.SALUT.'<br>';
    }

    /*
    Ici je peux utiliser ma variable $x car la portée de $x est locale et est utilisée dans un contexte local (c'est-à-dire dans ma fonction)
    */

    // Ca ca m'affiche 11 car ma variable $x a été déclarée localement (à l'intérieur de ma fonction)
    function test2(){
        $x = 11;
        echo 'La valeur de la variable x est : '.$x.'<br>';
    }

    test1();
    test2();

?>