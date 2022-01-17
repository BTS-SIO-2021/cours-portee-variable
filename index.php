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

    /* Meme si j'appelle plusieurs fois ma fonction test3(), le résultat est toujours 1. En effet, la variable $y est détruite dès la fin de l'exécution de ma fonction. A nouveau quand j'appelle ma fonction elle est réinitialisé à 0 tel que je l'ai définie dans ma fonction. $y est une sorte de variable "jettable" : je l'utilise dans ma fonction et puis je la jette (elle n'existe plus). 
    */
    function test3(){
        $y = 0;
        $y++;
        echo '$y contient la valeur : ' .$y. '<br>';
    }
    // En effet mon echo ici me renvoie "undefinied variable, $y n'existe que localement à l'intérieure de ma fonction test3();
    echo $y;

    function test4(){
        $z = 'coucou';
        //echo $z;
    }

    test1();
    test1bis();
    test2();
    test3();
    test3();
    test3();
    
    // Ici $z existe.
    test4();

    // $z est déclaré dans un contexte local, elle n'existe donc pas dans un contexte global
    echo 'La valeur de la variable $z contient '.$z. '<br>';

    /* Tout ce qu'on vient de voir jusque là est le comportement par défaut.
    Nous pouvons en fonction de nos besoins, modifier ce comportement. 
    Par exemple, nous pourrions avoir besoin d'utiliser une variable yant une portée globale à l'intérieur d'une fonction.

    Pour réaliser cela, nous allons utiliser le mot clef global avant la déclaration des variables que nous souhaitons utiliser dans notre fonction. En résumé, utiliser global nous permet d'indiquer à php que les variables déclarées dans la fonction sont en fait des variables globales. En terme pur informatique, on dit les variables globales ont été importées dans le contexte local de référence. 
    */
    $x = 25;

    function porteeGlobal(){
        global $x ;
        echo 'La valeur de $x global est : '.$x.'<br>';
        $x = $x+5;
        echo 'La nouvelle valeur de $x est '.$x.'<br>';
    }

    porteeGlobal();

    /*
    A l'inverse avoir accès dans un contexte global à une variable locale nécessite d'utiliser dans mon contexte local (donc ma fonction) le return afin que ma fonction me renvoie la valeur de ma variable locale. Ensuite je vais stocker ça dans une variable globale afin de pouvoir l'utiliser dans un contexte global.
    */
    function fromLocaltoGlobal(){
        $z = "toto";
        return $z;
    }

    $ab = fromLocaltoGlobal();

    echo $ab ;

    /* 
    On sait que une variable locale (donc à l'intérieur déclarée l'intérieur d'une fonction) est DETRUITE à la fin de l'exécution de cette fonction. 
    OR, il arrive que nous souhaitions CONSERVER notre variable locale afin de l'utiliser dans d'autres contextes LOCAUX. Pour faire en sorte que la fonction (= le contexte local) se souvienne de la valeur de la variable, nous allons utiliser le mot-clef static.
    */

    function compteur(){
        static $y = 0;
        $y++;
        echo 'La valeur de $y est '.$y. '<br>';
    }

    // Ici $y est égal à 1
    compteur();
    // Au 2eme appel de ma fonction, elle se "souvient" grâce à l'utilisation du mot-clef static, de la dernière valeur de $y et utilise cette dernière valeur. Donc ici $y est égal à 2;
    compteur();
    // Idem, même logique donc ici $y est égal à 3;
    compteur();
?>