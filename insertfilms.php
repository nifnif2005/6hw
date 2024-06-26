<?php
    require_once "dbconnect.php";
    // print_r($_FILES);
    print_r($_FILES['picture']);
    $path = 'assets/'. time().$_FILES['picture']['name'];
    echo $path;
    if(!move_uploaded_file($_FILES['picture']['tmp_name'], "../".$path)) {
        $_SESSION['message'] = 'Ошибка при загрузке изображения';
    }

        try {
            $sql = 'INSERT INTO Фильм(title, duration, image) VALUES(:title, :duration, :image)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':title', $_POST['title']);
            $stmt->bindValue(':duration', $_POST['duration']);
            $stmt->bindValue(':image', $_POST['image']);
            $stmt->execute();
            $_SESSION['msg'] = "Фильм успешно добавлен";
            // return generated id
            // $id = $pdo->lastInsertId('id');

        } catch (PDOexception $error) {
            $_SESSION['msg'] = "Ошибка добавления фильма: " . $error->getMessage();
        }

    // перенаправление на страницу категорий
    header('Location: http://6hw/index.php?page=t');
    exit( );

