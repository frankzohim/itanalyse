<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Utils
 *
 * @author franklin.fofe
 */
class Utils {
    public static function month($intMonth){
        $month;
        switch ($intMonth){
            case 1 : 
                echo "Janvier";
                break;
            case 2 : 
                echo "Février";
                break;
            case 3 : 
                echo "Mars";
                break;
            case 4 : 
                echo "Avril";
                break;
            case 5 : 
                echo "Mai";
                break;
            case 6 : 
                echo "Juin";
                break;
            case 7 : 
                echo "Juillet";
                break;
            case 8 : 
                echo "Août";
                break;
            case 9 : 
                echo "Septembre";
                break;
            case 8 : 
                echo "Octobre";
                break;
            case 8 : 
                echo "Novembre";
                break;
            case 8 : 
                echo "Décembre";
                break;
            default : 
                break;
        }
    }
}
