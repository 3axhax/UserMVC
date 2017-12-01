<h1><?= static::$title ?></h1>
<?php if ($_SESSION['user']['role'] == 'a'): ?>
    <p>
        <a href="/user/create" class="btn btn-success">Добавить пользователя <span
                class="glyphicon glyphicon-plus"></span></a>
    </p>
<?php endif; ?>
<table class="table table-striped table-hover">
    <tr>
        <th>№</th>
        <th>
            <a href="/user/sort/name_<?= ((key($sortrules) == 'name') && (current($sortrules) == 'ASC')) ? 'd' : 'up' ?>">ФИО
                <span
                    class="glyphicon glyphicon-sort<?= (key($sortrules) == 'name') ? (current($sortrules) == 'ASC') ? '-by-attributes' : '-by-attributes-alt' : '' ?>"></span></a>
        </th>
        <th>
            <a href="/user/sort/login_<?= ((key($sortrules) == 'login') && (current($sortrules) == 'ASC')) ? 'd' : 'up' ?>">Логин
                <span
                    class="glyphicon glyphicon-sort<?= (key($sortrules) == 'login') ? (current($sortrules) == 'ASC') ? '-by-attributes' : '-by-attributes-alt' : '' ?>"></span></a>
        </th>
        <th>
            <a href="/user/sort/email_<?= ((key($sortrules) == 'email') && (current($sortrules) == 'ASC')) ? 'd' : 'up' ?>">E-mail
                <span
                    class="glyphicon glyphicon-sort<?= (key($sortrules) == 'email') ? (current($sortrules) == 'ASC') ? '-by-attributes' : '-by-attributes-alt' : '' ?>"></span></a>
        </th>
        <th>
            <a href="/user/sort/role_<?= ((key($sortrules) == 'role') && (current($sortrules) == 'ASC')) ? 'd' : 'up' ?>">Роль
                <span
                    class="glyphicon glyphicon-sort<?= (key($sortrules) == 'role') ? (current($sortrules) == 'ASC') ? '-by-attributes' : '-by-attributes-alt' : '' ?>"></span></a>
        </th>
        <th></th>
    </tr>
    <form name="filter" action="/user" method="post">
        <tr>
            <th></th>
            <th><input type="text" class="form-control filter" name="name" value="<?= $filter['name'] ?>"></th>
            <th><input type="text" class="form-control filter" name="login" value="<?= $filter['login'] ?>"></th>
            <th><input type="text" class="form-control filter" name="email" value="<?= $filter['email'] ?>"></th>
            <th>
                <select class="form-control filter" name="role" onchange="document.forms['filter'].submit()">
                    <option value></option>
                    <option value="a" <?= ($filter['role'] == 'a') ? 'selected' : '' ?>>Администратор</option>
                    <option value="u" <?= ($filter['role'] == 'u') ? 'selected' : '' ?>>Пользователь</option>
                </select>
            </th>
            <th class="text-center">
                <a title="Применить фильтр" onclick="document.forms['filter'].submit()"><span
                        class="glyphicon glyphicon-filter"></span></a>
                <a title="Очистить" onclick="$('.filter').val(''); document.forms['filter'].submit()"><span
                        class="glyphicon glyphicon-remove"></span></a>
                <button type="submit" hidden></button>
            </th>
        </tr>
    </form>
    <?php
    $i = 0;
    foreach ($users as $user):?>
        <tr>
            <td>
                <?= ++$i ?>
            </td>
            <td>
                <?= $user['name'] ?>
            </td>
            <td>
                <?= $user['login'] ?>
            </td>
            <td>
                <?= $user['email'] ?>
            </td>
            <td>
                <?php
                switch ($user['role']) {
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
            <td class="text-center">
                <a href="/user/view/<?= $user['id'] ?>" title="Просмотр"><span
                        class="glyphicon glyphicon-eye-open"></span></a>
                <a href="/user/edit/<?= $user['id'] ?>" title="Редактировать"><span
                        class="glyphicon glyphicon-pencil"></span></a>
                <a href="/user/delete/<?= $user['id'] ?>" title="Удалить"
                   onclick="return confirm('Действительно удалить пользователя <?= $user['login'] ?>')"><span
                        class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>