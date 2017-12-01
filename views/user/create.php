<h2>Создать нового пользователя</h2>
<form action="/user/create" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-2 control-label">Логин:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="login" <?= (isset($_REQUEST['login'])) ? 'value="'.$_REQUEST['login'].'"' : '' ?>>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Пароль:</label>
        <div class="col-lg-3">
            <input type="password" class="form-control" name="password" <?= (isset($_REQUEST['password'])) ? 'value="'.$_REQUEST['password'].'"' : '' ?>>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Подтвердить пароль:</label>
        <div class="col-lg-3">
            <input type="password" class="form-control" name="confirmpassword" <?= (isset($_REQUEST['confirmpassword'])) ? 'value="'.$_REQUEST['confirmpassword'].'"' : '' ?>>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">ФИО:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="name" <?= (isset($_REQUEST['name'])) ? 'value="'.$_REQUEST['name'].'"' : '' ?>>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">E-mail:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="email" <?= (isset($_REQUEST['email'])) ? 'value="'.$_REQUEST['email'].'"' : '' ?>>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Роль:</label>
        <div class="col-lg-3">
            <label><input type="radio" name="role" value="a" <?= ((isset($_REQUEST['role'])) && ($_REQUEST['role'] == 'a')) ? 'checked' : '' ?>> Администратор </label>
            <label><input type="radio" name="role" value="u" <?= ((isset($_REQUEST['role'])) && ($_REQUEST['role'] == 'u')) ? 'checked' : '' ?>> Пользователь </label>
        </div>
    </div>
    <div class="col-lg-offset-2">
        <button type="submit" class="btn btn-success" value="create" name="submitbutton">Создать <span class="glyphicon glyphicon-plus"></button>
    </div>
</form>

<?php if (($ans !== true) && ($ans)) :?>
    <br>
    <div class="alert alert-danger alert-dismissible col-lg-offset-2 col-lg-3" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=$ans?>
    </div>
<?php endif;?>
<?php
/*echo '<pre>';
print_r($ans);*/