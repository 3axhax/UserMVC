<h1><?=static::$title?></h1>
<?php if($_SESSION['user']['role'] == 'a'):?>
    <p>
        <a href="/user/create" class="btn btn-success">Добавить пользователя <span class="glyphicon glyphicon-plus"></span></a>
    </p>
<?php endif;?>
<table class="table table-striped table-hover">
    <tr>
        <th>№</th><th>ФИО</th><th>Логин</th><th>E-mail</th><th>Роль</th><th></th>
    </tr>
    <?php
    $i = 0;
    foreach ($users as $user):?>
        <tr>
            <td>
                <?=++$i?>
            </td>
            <td>
                <?=$user['name']?>
            </td>
            <td>
                <?=$user['login']?>
            </td>
            <td>
                <?=$user['email']?>
            </td>
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
            <td>
                <a href="/user/view/<?=$user['id']?>" title="Просмотр"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="/user/edit/<?=$user['id']?>" title="Редактировать"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="#" title="Удалить"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    <?php endforeach;?>
</table>
<?php
/*echo '<pre>';
print_r($_SESSION['user']);*/