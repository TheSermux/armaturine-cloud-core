<?
//require_once '/boot.php';
require_once(realpath('../boot.php'));
require_once(realpath('../collection.php'));

$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo $stmt;
}
?>
<?php if ($user['role'] == 1) { ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Инциденты ИБ</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="view/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="view/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="view/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="view/css/style.css">
  <!-- endinject -->
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <!--<a class="navbar-brand brand-logo" href="index.html"><img src="view/images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="view/images/logo-mini.svg" alt="logo"/></a>-->
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <h3>Журнал инцидентов информационной безопасности</h3>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?=htmlspecialchars($user['username'])?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <form class="mt-5" method="post" action="/do_logout.php">
                <button type="submit" class="dropdown-item">
                  <i class="mdi mdi-logout text-primary"></i>
                  Выйти
                </button>
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="main_audit.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Журналирование</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <?

                    $role_id = $user['role'];
                    if($role_id == 1)
                    {
                      $role = "Аудитор";
                    }

                    ?>
                    <h2>Здравствуйте, <?=htmlspecialchars($user['last_name'])?> <?=htmlspecialchars($user['name'])?> <?=htmlspecialchars($user['patronim'])?></h2>
                    <p class="mb-md-0">Ваша роль: <?=$role?></p>
                  </div>
                 
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  
                </div>
              </div>
            </div>
          </div>
          
          <?
            $journal = get_journal();
            //print_r(get_journal());

        ?>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Инциденты информационной безопасности в структурных подразделениях</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>Описание инцидента</th>
                            <th>Сотрудник, обнаруживший инцидент</th>
                            <th>Дата устранения</th>
                            <th>Отдел</th>
                        </tr>
                      </thead>
                      <tbody>
                        <? foreach ($journal as $key => $value) {
                          
                        $worker_info = get_worker_by_id($value['sotrudnik_id']);
                        //print_r($worker_info);

                         $dep_id = $value['otdel_id'];
                          if($dep_id == 1){
                            $dep = 'Отдел разработки';
                          }elseif($dep_id == 2){
                            $dep = 'Отдел внедрения';
                          }elseif($dep_id == 3){
                            $dep = 'Бухгалтерия';
                          }elseif($dep_id == 4){
                            $dep = 'Юридический отдел';
                          }


                        ?>
                        <tr>
                            <td><?=$value['about'] ?></td>
                            <td><?=$worker_info[0]['last_name'] ?> <?=$worker_info[0]['name'] ?> <?=$worker_info[0]['patronim'] ?></td>
                            <td><?=$value['date'] ?></td>
                            <td><?=$dep ?></td>
                        </tr>
                        <?}
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?
            $journal = get_log();
            //print_r(get_journal());

          ?>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Журнал входа-выхода</p>
                  <div class="table-responsive">
                    <table  class="table table-dark">
                      <thead>
                        <tr>
                            <th>Операция</th>
                            <th>Пользователь</th>
                            <th>Дата</th>
                            <th>IP</th>
                        </tr>
                      </thead>
                      <tbody>
                        <? foreach ($journal as $key => $value) {
                        ?>
                        <tr>
                            <td><?=$value['info'] ?></td>
                            <td><?=get_worker_by_id($value['user'])[0]['username'] ?></td>
                            <td><?=$value['datetime'] ?></td>
                            <td><?=$value['ip'] ?></td>
                        </tr>
                        <?}
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 Евглевский Вячеслав 19-К-КБ1</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="view/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="view/vendors/chart.js/Chart.min.js"></script>
  <script src="view/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="view/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="view/js/off-canvas.js"></script>
  <script src="view/js/hoverable-collapse.js"></script>
  <script src="view/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="view/js/dashboard.js"></script>
  <script src="view/js/data-table.js"></script>
  <script src="view/js/jquery.dataTables.js"></script>
  <script src="view/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<?php } else { ?>
  ДОСТУП ЗАПРЕЩЕН
<?php } ?>
