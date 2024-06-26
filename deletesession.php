<?php
require "dbconnect.php";
try {
    echo ("SELECT * FROM Сеанс");
    $result = $conn->query("SELECT * FROM Сеанс");
    $row = $result->fetch();
    $result = $conn->query("SELECT * FROM Сеанс");
    if ($result->rowCount() == 0) throw new PDOException('Фильм не найден', 1111 );
    $sql = 'DELETE FROM Сеанс WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Сеанс успешно удалён";
    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка удаления сеанса: " . $error->getMessage();
}
// перенаправление на главную страницу приложения
header('Location: http://6hw/index.php?page=t');
exit( );