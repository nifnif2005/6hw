<?php
date_default_timezone_set('Asia/Yekaterinburg');
require "dbconnect.php";
require "auth.php";
require "menu.php";
echo '<main class="container" style="margin-top: 100px">';
switch ($_GET['page']){
    case 'c':
        if (isset($_SESSION['login'])) {
            require "films.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра и добавления фильмов';
        }
        break;
    case 't':
        if (isset($_SESSION['login'])){
            require "session.php";
            require "sessionform.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра и создания сеансов';
        }
        break;
}
echo '</main>';

if(($_SESSION['msg']!='') or isset($msg)) {
    require "message.php";
    $_SESSION['msg']= '';
}
require "footer.php";
?>