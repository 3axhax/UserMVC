<?php

class User
{
    
    public $report = true;
    
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
    public function validateUser($request)
    {
        switch ($request['submitbutton']){
            case 'create':
                if ($this->uniqueUser($request['login'])) {
                    if ($request['password'] == $request['confirmpassword']) {
                        if (filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
                            if ($this->allFieldsFill($request)) return true;
                            else {
                                $this->report = 'Не все поля заполнены';
                                return false;
                            }
                        } else {
                            $this->report = 'Введён некорректный E-mail';
                            return false;
                        }
                    } else {
                        $this->report = 'Подтверждение пароля не совпадает';
                        return false;
                    }
                } else {
                    $this->report = 'Пользователь "'.$request['login'].'" уже существует';
                    return false;
                }
                break;
        }
    }
    private function uniqueUser($login)
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM user WHERE login="'.$login.'"');
        return !($result = $result->fetch());
    }
    private function allFieldsFill($request)
    {
        $this->report = $request;
        return (isset($request['login']) && isset($request['password']) && isset($request['confirmpassword']) && isset($request['name']) && isset($request['email']) && isset($request['role']));
    }
    public function saveUser($request)
    {
        $db = Db::getConnection();
        return $result = $db->query('INSERT INTO `user` (`id`, `login`, `password`, `name`, `email`, `role`) VALUES (NULL, "'.$request['login'].'", "'.$request['password'].'", "'.$request['name'].'", "'.$request['email'].'", "'.$request['role'].'");');
    }
    public static function deleteUser($id)
    {
        $db = Db::getConnection();
        return $result = $db->query('DELETE FROM `user` WHERE `user`.`id` = '.$id.'');
    }
}