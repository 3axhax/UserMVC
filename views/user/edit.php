<h2>Редактировать пользователя: <?=$user->login?></h2>
<form action="/user/edit/<?=$user->id?>" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-2 control-label">Логин:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="login" value="<?=$user->login?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Пароль:</label>
        <div class="col-lg-3">
            <input type="password" class="form-control" name="password" value="<?=$user->password?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Подтвердить пароль:</label>
        <div class="col-lg-3">
            <input type="password" class="form-control" name="confirmpassword" value="<?=$user->password?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">ФИО:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="name" value="<?=$user->name?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">E-mail:</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="email" value="<?=$user->email?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Роль:</label>
        <div class="col-lg-3">
            <label><input type="radio" name="role" value="a" <?= ($user->role == 'a') ? 'checked' : '' ?> <?=($_SESSION['user']['role'] != 'a') ? 'disabled' : ''?> > Администратор </label>
            <label><input type="radio" name="role" value="u" <?= ($user->role == 'u') ? 'checked' : '' ?> <?=($_SESSION['user']['role'] != 'a') ? 'disabled' : ''?>> Пользователь </label>
        </div>
    </div>
    <div class="col-lg-offset-2">
        <button type="submit" class="btn btn-success" value="edit" name="submitbutton">Изменить <span class="glyphicon glyphicon-save"></button>
    </div>
</form>

<?php if (($ans !== true) && ($ans)) :?>
    <br>
    <div class="alert alert-<?=($ans == 'Success') ? 'success' : 'danger'?> alert-dismissible col-lg-offset-2 col-lg-3" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=($ans == 'Success') ? 'Изменеия внесены успешно' : $ans?>
    </div>
<?php endif;?>