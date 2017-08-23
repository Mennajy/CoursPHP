<?php

class HtmlHelper
{
    public static function link(
        $controleur,
        $action,
        $titre,
        $options = []
    ) {
        return '<a href="index.php?c=' . $controleur
            . '&amp;a=' . $action . '">'
            . $titre . '</a>';
    }
}