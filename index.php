<?php
    include_once __DIR__ . "/db/db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Data Base</h1>
    </header>

    <main>
        <?php  
            $sql_query = "SELECT COUNT(*) AS `number_students`, YEAR(`enrolment_date`) as `enrollment_year` FROM `students` GROUP BY YEAR(`enrolment_date`);";
            $result = mysqli_query($connection_to_db,$sql_query);

            $result_check = mysqli_num_rows($result);

            var_dump($result);
            var_dump($result -> num_rows);
        ?>


                <?php if($result_check > 0) { ?>

                    <!-- inserico il risultato object? inside an Array -->
                    <?php while($students_per_year = mysqli_fetch_assoc($result)) { ?>
                        
                        <?php //var_dump($students_per_year); ?>

                        <ul>
                            <li>
                                <?php   foreach ($students_per_year as $student => $value) { ?>
                                    <h1><?php echo $student ; ?></h1> 
                                    <h1><?php echo $value . " "; ?></h1>
                                <?php } ?>
                            </li>
                            <hr>
                        </ul>

                    <?php } ?>

                <?php } ?>
        
    </main>
</body>
</html>