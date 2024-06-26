<h2>Создание сеанса</h2>
<form method="post" action="insertsession.php" enctype="multipart/form-data">

    <p><label>
            Зал: <select name="id_hall">

                <?php
                $result = $conn->query("SELECT * FROM Зал");
                while ($row = $result->fetch()) {
                    echo '<option value='.$row['id'].'>'.$row['title'].'</option>';

                }
                ?>
            </select>
        </label>

    <p><label>
            Фильм: <select name="id_film">

                <?php
                $result = $conn->query("SELECT * FROM Фильм");
                while ($row = $result->fetch()) {
                    echo '<option value='.$row['id'].'>'.$row['title'].'</option>';

                }
                ?>
            </select>
        </label>

    <p><label>
            Начало: <input type="text" name="datetime_start">
        </label>
    <p><label>
            Пользователь: <select name="id_user">

                <?php
                $result = $conn->query("SELECT * FROM user");
                while ($row = $result->fetch()) {
                    echo '<option value='.$row['id_user'].'>'.$row['lastname'].'</option>';

                }
                ?>
            </select>
        </label>

    <div class="mb-3">
        <input type="text" class="form-control" name="image">
        <div class="form-text">Введите URL изображения</div>
    </div>


        </label>
    <p><input type="submit" value="Создать">

</form>