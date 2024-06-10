<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <h1>Students List</h1>

    <div class="table">
        
        <div class="table_element">ID</div>
        <div class="table_element">ФИO</div>
        <div class="table_element">Группа</div>
        <div class="table_element">Фото</div>

        <?php
            require_once 'settings.php';

            $connection = new mysqli($host, $user, $pass, $data);
            if ($connection->connect_error) die('Error connection');

            $query = 'SELECT * FROM students';
            // $insert = 'INSERT INTO `students` (`ID`, `FLP`, `GROYP`, `Photo`) VALUES (NULL, '', '', NULL)';
            $result = $connection->query($query);

            $rows = $result->num_rows;

            for($i = 0; $i < $rows; $i++){
                $result -> data_seek($i);
                foreach ($result->fetch_assoc() as $col_value) {
                    print "<div class='table_element'>$col_value</div>\n";
                }
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                addFunction();
            }
            
            function addFunction($connection){
                $insert = 'INSERT INTO `students` (`ID`, `FLP`, `GROYP`, `Photo`) VALUES (NULL, NULL, NULL, NULL)';
                $connection->query($insert);
            }

        ?>

    </div>
    <form action="" method="post" class="newItemForm">
        <input type="text" id="FLP">
        <input type="text" id="Group">    
        <input type="submit" value="Добавить">
    </form>

</body>
</html>