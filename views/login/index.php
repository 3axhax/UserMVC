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
            <button type="submit" class="btn btn-primary">Вход</button>
        </div>
    </div>
    <?php if (($ans !== true) && ($ans)) :?>
        <div class="col-lg-offset-1 col-lg-11 text-danger"><?=$ans?></div>
    <?php endif;?>
</form>
<?php
/*echo '<pre>';
print_r($ans);*/