<?php
if (!$_COOKIE['login'] && !$_SESSION['login'] && !$_SESSION['admin']):?>
    <div class="headerAuthWrap">
        <p class="headerAuthMessage">Вы не авторизованный пользователь. Вы можете <a class="signUp" href="/engine/auth/auth.php?signUp=true">зарегистрироваться</a> или <a class="signIn" href="/engine/auth/auth.php?signIn=true">войти</a>?</p>
    </div>
<?php
endif;
?>