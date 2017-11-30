<?php
return array(
    'user/view/([0-9]+)' => 'user/view/$1',
    'user/edit/([0-9]+)' => 'user/edit/$1',
    'user/delete/([0-9]+)' => 'user/delete/$1',
    'user/create' => 'user/create',
    'user' => 'user/list',
    'login' => 'login/index',
    'logout' => 'login/logout',
);