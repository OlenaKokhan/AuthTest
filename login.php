<?php
require_once 'connection.php';

session_start();
$currentTime = time();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    header("Allow: POST");
    return;
}

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['remember'])){
    $email = $_POST['email'];
    $password = md5(md5(sha1($_POST['password'])));
    $remember = $_POST['remember'];

    $query = "SELECT * FROM user WHERE email='" . $email . "' AND password='" . $password . "' LIMIT 1";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if($result->num_rows > 0)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);

        $query = "UPDATE user SET last_visited ='".$currentTime."' WHERE id='" . $row['id'] . "'";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        $_SESSION['id'] = $row['id'];
        $_SESSION['last_visited'] =  date("d M Y h:i:s A", $currentTime);

        saveSession($remember);

        return  'views/auth_view.php';
    } else {
        echo checkAttempts();
    }
}


function checkAttempts()
{
    if (!isset($_SESSION['count'])){
        $_SESSION['count'] = 1;
        return '-1';
    } elseif (!isset($_SESSION['count']) && $_SESSION['count'] > 0){
        $_SESSION['count'] = $_SESSION['count']--;
        return '-1';
    } else {
        unset ($_SESSION['count']);
        $_SESSION['sleep_time'] = time() + 60 * 3;
        return '<h2>Blocked for 3 minutes!!</h2><a href="/">К авторизации</a>';
    }

}

function saveSession($remember = false, $http_only = true, $days = 7)
{
    if ($remember) {
        $session_id = session_id();
        $expire = time() + $days * 24 * 3600;
        $domain = "";
        $secure = false;
        $path = "/";
        setcookie("session_id", $session_id, $expire, $path, $domain, $secure, $http_only);
    }
}