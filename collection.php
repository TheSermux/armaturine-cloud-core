<?
require_once __DIR__.'/boot.php';

// блок запросов к базе
function get_users(){

    $stmt = pdo()->prepare("SELECT * FROM `users` ");
    //$stmt->execute(['id' => $_SESSION['user_id']]);
    $stmt->execute();
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $info;
}


function get_journal(){

    $stmt = pdo()->prepare("SELECT * FROM `journal` ");
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $info;
}

function get_workers(){

    $stmt = pdo()->prepare("SELECT * FROM `workers` ");
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $info;
}

function get_departments(){

    $stmt = pdo()->prepare("SELECT * FROM `departments` ");
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $info;
}

function get_log(){

    $stmt = pdo()->prepare("SELECT * FROM `log` ");
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $info;
}



//Блок иных функций

function get_worker_by_id($id = -1)
{
	$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = $id ");
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $info;

}


function get_worker_by_zp()
{
    $stmt = pdo()->prepare("SELECT * FROM `workers` ORDER BY zarplata  DESC");
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $info;

}
