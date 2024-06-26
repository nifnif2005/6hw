<?php
require "dbconnect.php";

try {
    $sql = 'INSERT INTO Сеанс(id_hall, id_film, datetime_start, id_user, image) VALUES(:id_hall, :id_film, :datetime_start, :id_user, :image)';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id_hall', $_POST['id_hall']);
    $stmt->bindValue(':id_film', $_POST['id_film']);
    $stmt->bindValue(':datetime_start', $_POST['datetime_start']);
    $stmt->bindValue(':id_user', $_POST['id_user']);

    $stmt->bindValue(':image', $_POST['image']);
    $stmt->execute();
    $_SESSION['msg'] = "Сеанс успешно добавлен";
    // return generated id
    // $id = $pdo->lastInsertId('id');

}catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка добавления сеанса: " . $error->getMessage();
}




// перенаправление на главную страницу приложения
header('Location: http://6hw/index.php?page=t');
exit( );
