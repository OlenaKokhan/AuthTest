<h2>Вход</h2>
<div class="err" id="add_err"></div>

<?php if (isset($_SESSION['sleep_time'])) {
    unset($_SESSION['sleep_time']);
} ?>

<form class="ajax" method="post">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="checkbox">
        <label><input type="checkbox" id="remember" value="remember"> Запомнить меня</label>
    </div>

    <p><b>Тестовый юзер</b><br> Email: 1@1.1<br> Пароль: 1111</p>
    <button type="submit" class="btn btn-default" id="login">Войти</button>
</form>