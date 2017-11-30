<h1>Создать нового пользователя</h1>
<form action="/user/create" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-2 control-label">Логин:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="login">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Пароль:</label>
        <div class="col-lg-3">
            <input type="password" class="form-control" name="password">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Подтвердить пароль:</label>
        <div class="col-lg-3">
            <input type="password" class="form-control" name="confirmpassword">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">ФИО:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="name">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">E-mail:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="email">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Роль:</label>
        <div class="col-lg-3">
            <label><input type="radio" name="role" value="a"> Администратор </label>
            <label><input type="radio" name="role" value="u"> Пользователь </label>
        </div>
    </div>
    <div class="col-lg-offset-2">
        <button type="submit" class="btn btn-success" value="create" name="submitbutton">Создать</button>
    </div>
</form>
<?php if (($ans !== true) && ($ans)) :?>
    <div class="col-lg-offset-1 col-lg-11 text-danger"><?=$ans?></div>
<?php endif;?>
<?php
/*echo '<pre>';
print_r($ans);*/