<div class="container">
<?php
$result = $conn->query("SELECT Фильм.id AS id, Фильм.title AS ftitle, Сеанс.datetime_start AS data, Фильм.image FROM Фильм JOIN Сеанс ON Фильм.id = Сеанс.id_film");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo '
        
        <div class="card border-dark mb-3" >
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-1">  
                        <img src="' . $row['image'] . '" alt="Task picture" height="60px">
                    </div>
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=t" >
                    <div>
                        <h5 class="card-title">' . $row['ftitle'] . '</h5>
                        
                        </div>
                    </a>
                    <h8>Начало:</h8>
                        <h8>' . $row['data'] . '</h8>
                    </div>
                    <div class="col-md-1">
                        <a href="deletesession.php?id=' . $row['id'] . '"class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
            
        </div>
 </div>';
}
?>