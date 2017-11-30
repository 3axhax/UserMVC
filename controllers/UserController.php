<?php

include_once ROOT. '/models/User.php';
include_once ROOT. '/controllers/SiteController.php';

class UserController extends SiteController
{
    public function actionList()
    {
        $users = User::getUserList();
        $this->setTitle('Список пользователей');
        return $this->render('user/list',['users' => $users]);;
    }
    public function actionView($id)
    {
        if ($id)
        {
            $user = User::getUserById($id);
        }
        $this->setTitle('Пользователь: '. $user['login']);
        return $this->render('user/view', ['user' => $user]);;
    }
    public function actionEdit($id)
    {
        if (($_SESSION['user']['role'] != 'a') && ($_SESSION['user']['id'] != $id))
            return $this->render('main/accessden');
        else
        {
            $user = User::getUserById($id);
            return $this->render('user/edit', ['user' => $user]);
        }
    }
    public function actionCreate()
    {
        if ($_SESSION['user']['role'] != 'a')
            return $this->render('main/accessden');
        else
        {
            $user = new User();
            if (($_REQUEST) && $user->validateUser($_REQUEST))
            {
                $user->saveUser($_REQUEST);
                header('Location: /user');
            }
            else $ans = $user->report;
            return $this->render('user/create', ['ans' => $ans]);
        }
    }
    public function actionDelete($id)
    {
        if ($_SESSION['user']['role'] != 'a')
            return $this->render('main/accessden');
        else
        {
            if($id)
            {
                User::deleteUser($id);
                header('Location: /user');
            }
        }
    }
}