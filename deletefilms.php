<?php
    require "dbconnect.php";
    try {
        echo ("SELECT * FROM Фильм");
        $result = $conn->query("SELECT * FROM Фильм");
        $row = $result->fetch();
        $result = $conn->query("SELECT * FROM Фильм");
        if ($result->rowCount() == 0) throw new PDOException('Фильм не найден', 1111 );
        $sql = 'DELETE FROM Фильм WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Фильм успешно удален";
        // return generated id
        // $id = $pdo->lastInsertId('id');
    } catch (PDOexception $error) {
        if ($error->getCode() == '23000') {
            $_SESSION['msg'] = "Ошибка удаления фильма: данный фильм используется в другой таблице и не может быть удалён";
        } else {
            $_SESSION['msg'] = "Ошибка удаления фильма: " . $error->getMessage();
        }
    }
    // перенаправление на главную страницу приложения
    header('Location: http://6hw/index.php?page=t');
    exit( );


