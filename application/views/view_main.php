<?php
//session_start();
//include 'connect_db.php';
?>

        <form action="exit.php">
            <button type="submit">Exit</button>
        </form>
        <h1>
            <?php
            //echo $_SESSION['user_name'];
            ?>
        </h1>

        <!--Блок с полем ввода описания таска и кнопками 'Dell ALL' и 'READY ALL'-->
        <div class="block1">
            <form action="general_script_task.php" method="post" class="form_auth">
                <div class="add_task">
                    <input type="text" placeholder="Task description" name="description">
                    <input type="submit" value="Add Task" name="add_task">
                </div>
                <div>
                    <button type="submit" value="Remove All" name="remove_all">Del All</button>
                    <button type="submit" value="Ready All" name="ready_all">Ready All</button>
                </div>
            </form>
        </div>

        <!--Блок с тасками-->
        <div class="block2">
            
                <?php
                /*
                //Вывод тасков
                while ($task = $query_all_user_tasks->fetch(PDO::FETCH_LAZY)){
                    
                    //Цветовой индикатор статуса
                    switch ($task->status){
                        case "READY":
                            $color = 'red';
                            break;
                        case "UNREADY":
                            $color = 'blue';
                            break;
                    }

                    echo '<form action="individual_script_task.php" method="post" style="border-left: 2px solid ' . $color . '; padding: 4px;">';
                    echo '<p style="width: 180px;">' . $task->description . '</p><br>';
                    echo '<div class="task_buttons">';
                    echo '<button name="status" value="' . $task->id . '">' . $task->status . '</button>';
                    echo '<button name="delete" value="' . $task->id . '">Delete</button>';
                    echo '</div>';
                    echo '</form><br>';
                }
                */
                ?>   
        </div>
