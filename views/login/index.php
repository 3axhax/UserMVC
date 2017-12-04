<h1>Вход</h1>
<form class="form-horizontal" action="/login" method="post">
    <div class="form-group">
        <label class="col-lg-1 control-label">Логин</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="userlogin">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-1 control-label">Пароль</label>
        <div class="col-lg-3">
            <input type="password" class="form-control" name="userpassword">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"> Войти</button>
        </div>
    </div>
</form>
<?php if (($ans !== true) && ($ans)) :?>
    <br>
    <div class="alert alert-danger alert-dismissible col-lg-offset-1 col-lg-3" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=$ans?>
    </div>
<?php endif;?>