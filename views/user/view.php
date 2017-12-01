<h1><?=static::$title?></h1>
<?php if ($_SESSION['user']['role'] == 'a'):?>
<p>
    <a class="btn btn-primary" href="/user/edit/<?=$user->id?>">Изменить <span class="glyphicon glyphicon-pencil"></a>
    <a class="btn btn-danger" href="/user/delete/<?=$user->id?>" onclick="return confirm('Действительно удалить пользователя <?=$user->login?>')">Удалить <span class="glyphicon glyphicon-trash"></a>
</p>
<?php endif;?>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <td><?=$user->id?></td>
    </tr>
    <tr>
        <th>Логин</th>
        <td><?=$user->login?></td>
    </tr>
    <tr>
        <th>ФИО</th>
        <td><?=$user->name?></td>
    </tr>
    <tr>
        <th>E-mail</th>
        <td><?=$user->email?></td>
    </tr>
    <tr>
        <th>Роль</th>
        <td>
            <?=$user->roleFull()?>
        </td>
    </tr>
</table>