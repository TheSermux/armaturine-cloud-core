<?php

require_once(realpath('../boot.php'));

//print_r($_POST);

if($_POST['new_user'])
{
    // Добавим пользователя в базу
    $stmt = pdo()->prepare("INSERT INTO `users` (`username`, `password`, `last_name`, `name`, `patronim`, `role`) VALUES (:username, :password, :last_name, :name, :patronim, :role)");
    $stmt->execute([
        'username' => $_POST['login'],
        'password' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
        'last_name' => $_POST['ln'],
        'name' => $_POST['name'],
        'patronim' => $_POST['patromin'],
        'role' => $_POST['role'][0],
    ]);

    header('Location: /pages/users_adm.php');
}

if($_POST['new_worker'])
{
    // Добавим пользователя в базу
    $stmt = pdo()->prepare("INSERT INTO `workers` (`last_name`, `name`, `patronim`, `date_priem`, `zarplata`, `department_id`) VALUES (:last_name, :name, :patronim, :date_priem, :zarplata, :department_id)");
    $stmt->execute([
        'last_name' => $_POST['ln'],
        'name' => $_POST['name'],
        'patronim' => $_POST['patronim'],
        'department_id' => $_POST['dep'][0],
        'date_priem' => $_POST['dp'],
        'zarplata' => $_POST['zp'],
    ]);

    header('Location: /pages/worker_zp_adm.php');
}

if($_POST['new_shukher'])
{
    // Добавим пользователя в базу
    $stmt = pdo()->prepare("INSERT INTO `journal` (`about`, `sotrudnik_id`, `date`, `otdel_id`) VALUES (:about, :sotrudnik_id, :date, :otdel_id)");
    $stmt->execute([
        'about' => $_POST['about'],
        'sotrudnik_id' => $_POST['sotrudnik_id'][0],
        'date' => $_POST['date'],
        'otdel_id' => $_POST['otdel_id'][0],
    ]);

    header('Location: /');
}

if($_GET['del_shukher'])
{
    // Добавим пользователя в базу
    $stmt = pdo()->prepare("DELETE FROM `journal` WHERE `id` = :id ");
    $stmt->execute([
        'id' => $_GET['del_shukher'],
    ]);

    header('Location: /');
}

if($_GET['del_user'])
{
    // Добавим пользователя в базу
    $stmt = pdo()->prepare("DELETE FROM `users` WHERE `id` = :id ");
    $stmt->execute([
        'id' => $_GET['del_user'],
    ]);

    header('Location: /pages/users_adm.php');
}

if($_GET['del_worker'])
{
    // Добавим пользователя в базу
    $stmt = pdo()->prepare("DELETE FROM `workers` WHERE `id` = :id ");
    $stmt->execute([
        'id' => $_GET['del_worker'],
    ]);

    header('Location: /pages/worker_zp_adm.php');
}
