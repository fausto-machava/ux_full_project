<?php
    include './util/conection.php';
    use \Exception;

    try{
        $sql = $conection->prepare("SELECT * FROM user Order By created_at ASC");
        $sql->execute();
        $users = $sql->get_result()->fetch_all();
    } catch(Exception $e){
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="./util/AddUser.php" method="post">
            <?php
                $resposta = $_GET['resp'];
                $exception = $_GET['exception'];
                if(isset($resposta)){
                    if(isset($exception)){
                        echo "<div>Failed to add user: ".$exception."</div>";
                    } else{
                        echo $resposta == 1 ? "<div>User added sucessfully</div>" : "<div>Failed to add user</div>";
                    }
                }
            ?>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" required></textarea>
            </div>
            <input type="hidden" name="action" value="add">
            <input class="btn" role="button" type="submit" value="Send" />
        </form>
        <table border="1px">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($users as $user) {
                        echo "
                            <tr>
                                <td>$user[0]</td>
                                <td>$user[1]</td>
                                <td>$user[2]</td>
                                <td>$user[3]</td>
                            </tr>
                        ";      
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
