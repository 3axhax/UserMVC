<h1><?=static::$title?></h1>
<p>
    <a class="btn btn-primary" href="#">Изменить</a>
    <a class="btn btn-danger" href="#" data-confirm="?" data-method="post">Удалить</a>
</p>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <td><?=$user['id']?></td>
    </tr>
    <tr>
        <th>Логин</th>
        <td><?=$user['login']?></td>
    </tr>
    <tr>
        <th>ФИО</th>
        <td><?=$user['name']?></td>
    </tr>
    <tr>
        <th>E-mail</th>
        <td><?=$user['email']?></td>
    </tr>
    <tr>
        <th>Роль</th>
        <td>
            <?php
            switch ($user['role']){
                case 'a':
                    echo 'Администратор';
                    break;
                case 'u':
                    echo 'Пользователь';
                    break;
                default:
                    echo $user['role'];
            }
            ?>
        </td>
    </tr>
</table>