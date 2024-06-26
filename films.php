<h1>Фильмы:</h1>
<?php
$result = $conn->query("SELECT Фильм.id AS id, 
       Фильм.title AS title, 
       Фильм.image, count(Фильм.id) as C FROM Фильм LEFT OUTER JOIN Сеанс ON Фильм.id=Сеанс.id GROUP BY Фильм.id");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header">Количесво сеансов: ' . $row['C'] . '</div>
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-1">  
                        <img src="'.$row['image'].'" alt="Task picture" height="60px">
                    </div>
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=t" >
                        <h5 class="card-title">' . $row['title'] . '</h5>
                    </a>
                    </div>
                    <div class="col-md-1">
                        <a href="deletefilms.php?id='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
            
        </div>
 
    ';
//    echo '<tr>';
//    echo '<td>' .  $row['id']. '</td><td>' . $row['name'] . '</td>';
//    echo '<td><a href=deletefilms.php?id='.$row['id'].'>Удалить</a></td>';
//    echo '</tr>';
}
?>



<h2>Добавить фильм</h2>
<form method="post" action="insertfilms.php" enctype="multipart/form-data">
    <p><label>
            Название фильма: <input type="text" name="title">
        </label>
    <p><label>
            Длительность: <input type="text" name="duration">
        </label>
    <p><label>
            <div class="mb-3">
                <input type="text" class="form-control" name="image">
                <div class="form-text">Введите URL изображения</div>
            </div>
        </label>
    <p><label>

        </label>
    <p><input type="submit" value="Добавить">
</form>




