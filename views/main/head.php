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
                    <a href="/login">Войти</a>
                </li>
                <?php endif;?>
                <?php if (isset($_SESSION['user'])):?>
                    <li>
                        <a href="/user">Список пользователей</a>
                    </li>
                    <li>
                        <a href="/user/edit/<?=$_SESSION['user']['id']?>">Профиль (<?=$_SESSION['user']['login']?>)</a>
                    </li>
                    <li>
                        <a href="/logout">Выйти (<?=$_SESSION['user']['login']?>)</a>
                    </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>
<div class="container">