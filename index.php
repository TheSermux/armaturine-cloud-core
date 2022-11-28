<?
require_once __DIR__.'/boot.php';
require_once __DIR__.'/collection.php';


$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
/*
print_r(get_users());
echo '<br>';
echo '<br>';
print_r(get_journal());
echo '<br>';
echo '<br>';
print_r(get_workers());
echo '<br>';
echo '<br>';
print_r(get_departments());*/
?>

<?php 
    if ($user) { 
        if($user['role'] == 0){
    	   header('Location: pages/main_adm.php');
        }else{
            header('Location: pages/main_audit.php');
        }
	?>

    


<?php } else { ?>

<h1 style="font-family: 'Arial';">Журнал инцидентов информационной безопасности</h1>


<form method="post" action="do_login.php"> 
    <input type="text" name="username" placeholder="Логин" /><br><br>
    <input type="password" name="password"  placeholder="Пароль" />

    <div id="submit">
        <p></p>
        <button type="submit" class="btn btn-primary text-dark">Войти</button>
    </div>
</form>


<p><tt>Это открытая часть. Сюда можно вхуярить таблицу, как требуется в методичке курсача</tt></p>



<?php } ?>