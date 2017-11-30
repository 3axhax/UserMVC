<?php

class SiteController
{
    public static $title = 'Заголовок';
    
    public static function render($views, $params=[])
    {
        extract($params);
        include_once(ROOT. '/config/headlink.php');
        include_once(ROOT. '/views/main/head.php');
        include_once(ROOT . '/views/'.$views.'.php');
        include_once(ROOT. '/config/footerlink.php');
        return true;
    }
    public static function setTitle($title)
    {
        static::$title = $title;
    }
}