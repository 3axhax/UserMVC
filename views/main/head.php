<div class="wrap">
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Главная</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav navbar-right nav">
                <?php if (!isset($_SESSION['user'])):?>
                <li>
                    <a href="/login"><span class="glyphicon glyphicon-log-in"> Войти</a>
                </li>
                <?php endif;?>
                <?php if (isset($_SESSION['user'])):?>
                    <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?=$_SESSION['user']['login']?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/user"><span class="glyphicon glyphicon-list"> Список пользователей</a>
                        </li>
                        <li>
                            <a href="/user/edit/<?=$_SESSION['user']['id']?>"><span class="glyphicon glyphicon-user"> Профиль</a>
                        </li>
                        <li>
                            <a href="/logout"><span class="glyphicon glyphicon-log-out"> Выйти</a>
                        </li>
                    </ul>
                        </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>
<div class="container">