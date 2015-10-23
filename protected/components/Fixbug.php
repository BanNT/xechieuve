<?php

class Fixbug{

    /**
     * This function like var_dump function in PHP
     * @param mixed $bugs
     */
    public static function var_dump($bugs) {
        echo "<pre>";
        if (!count($bugs)>1 && is_array($bugs)) {
            echo "<br/>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br/>";
            foreach ($bugs as $bug) {
                var_dump($bug);
                echo "<br/>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br/>";
            }
        } else {
            var_dump($bugs);
        }
        echo "</pre>";
        
        die;
    }

}
