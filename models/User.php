<?php

class User
{
    public static function getUserList()
    {
        $db = Db::getConnection();
        $userList = array();

        $result = $db->query('SELECT * FROM user');

        $i = 0;
        while($row = $result->fetch()) {
            $userList[$i]['id'] = $row['id'];
            $userList[$i]['login'] = $row['login'];
            $userList[$i]['password'] = $row['password'];
            $userList[$i]['name'] = $row['name'];
            $userList[$i]['email'] = $row['email'];
            $userList[$i]['role'] = $row['role'];
            $i++;
        }

        return $userList;
    }
    public static function getUserById($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM user WHERE id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $userItem = $result->fetch();

            return $userItem;
        }
    }
    public static function checkUsersAuth($userlogin)
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM user WHERE login="'.$userlogin['login'].'" AND password="'.$userlogin['password'].'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return ($_SESSION['user'] = $result->fetch()) ? false : 'Неверный логин/пароль';
    }
    public static function setUserLogout()
    {
        if (isset($_SESSION['user']))
        {
            unset($_SESSION['user']);
        }
    }
    public static function validateUser($request)
    {
        switch ($request['submitbutton']){
            case 'create':
                $db = Db::getConnection();
                $result = $db->query('SELECT * FROM user WHERE login="'.$request['login'].'"');
                if (!($result)) {
                    if ($request['password'] == $request['confirmpassword']) {
                        if (filter_var($request['email'], FILTER_VALIDATE_EMAIL)) return true;
                        else return 'Введён некорректный E-mail';
                    } else return 'Подтверждение пароля не совпадает';
                } else return 'Пользователь "'.$request['login'].'" уже существует';
                break;
        }
    }
}