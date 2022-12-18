<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <title>Admin Management</title>
</head>

<body>

<style>
    .navbox {
      margin-top: 10px;
      align-self: center;
      background-color: purple;
      border-radius: 5px;
    }
  </style>

  <?php
  require_once("conn_game.php");
  ?>
  <?php
  $dt = $conn->query("SELECT * FROM moba_game WHERE status = 0");
  $lstid = array();
  $lstname = array();
  $lstimg = array();
  $lstdes = array();
  $lstinfo = array();

  foreach ($dt as $row) {
    array_push($lstid, $row["id"]);
    array_push($lstname, $row["name"]);
    array_push($lstimg, $row["img"]);
    array_push($lstdes, $row["des"]);
    array_push($lstinfo, $row["info"]);
  }
  ?>
  <header class="py-4 bg-dark">
  <div class="container p-3" style="background-image: url(index_img/head_bg.gif); border-radius: 25px;">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="index_img/logo.png" alt="" style="width: 80px; border-radius: 25px;">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-black text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <?php
            $email = "";
            if(isset($_GET['email'])){
              $email = $_GET['email'];
            }
            echo "<li><a href =\"index.php?email=".$email."\" type=\"button\" class=\"btn btn-outline-success me-2 border border-3 border-dark\" style=\"background-color: #00E676; border-radius: 25px;\">Trang Chủ</a></li>"
          ?>
          <!-- <li><a href="#" type="button" class="btn btn-outline-success me-2 border border-3 border-dark" style="background-color: #00E676; border-radius: 25px">Trò Chơi</a></li>
          <li><a href="#" type="button" class="btn btn-outline-success me-2 border border-3 border-dark" style="background-color: #00E676; border-radius: 25px">Ứng Dụng</a></li> -->
        </ul>
        <?php
          echo "<form class=\"col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3\" method=\"post\" action=\"search.php?email=".$email."&method=search\">";
        ?>
        
          <input type="search" class="form-control form-control-light text-bg-light border border-3 border-dark" placeholder="Search..." aria-label="Search" name="search">
        </form>
      </div>
    </div>

  </header>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2" style="padding-top:10px;">
        <div class="card card-cover h-100 overflow-hidden text-bg-light rounded-5 border border-5 border-dark shadow-lg">
            <a href="admin_management.php"><h5 class="pt-2 mt-2 mb-4 display-7 lh-1 fw-bold">Danh sách phê duyệt</h5></a>
            <a href="admin_management.php"><h5 class="pt-2 mt-2 mb-4 display-7 lh-1 fw-bold">Danh sách từ chối</h5></a>
            <a href="admin_management.php"><h5 class="pt-2 mt-2 mb-4 display-7 lh-1 fw-bold">Quản lý tài khoản</h5></a>
        </div>
      </div>

      <div class="col-lg-10" style="padding-top:10px;">
         <div class="card card-cover h-100 overflow-hidden text-bg-light rounded-5 border border-5 border-dark shadow-lg">
        <?php
        $db = 0;
        $n = 0;
        $_SESSION['img'] = $lstimg;
        $_SESSION['name'] = $lstname;
        $_SESSION['info'] = $lstinfo;
        ?>
        <table class="table">
          <tr>
            <th style="font-size: 30px;">Tên</th>
            <th style="font-size: 30px;">Hình ảnh</th>
            <th style="font-size: 30px;">Ghi chú</th>
            <th style="font-size: 30px;">Phê duyệt</th>
            <th></th>
          </tr>
          <?php
          do {
            if ($n >= count($lstname)) {
              break;
            }
          ?>
            <tr>
              <form method="POST">
              <td><?php echo "<h3 class=\"pt-2 mt-2 mb-4 display-7 lh-1 fw-bold\">" . $lstname[$n] . "</h3>"; ?></td>
              <td><?php echo "<img src=\"" . $lstimg[$n] . "\" class=\"rounded d-block\" style=\"width: 50px; height: 50px;\">"; ?></td>
              <td><?php echo "<h3 class=\"pt-2 mt-2 mb-4 display-7 lh-1 fw-bold\">" . $lstinfo[$n] . "</h3>"; ?></td>
              <td>
                <select class="form-select" id="<?php echo $lstid[$n] ?>" name="<?php echo $lstid[$n] ?>">
                  <option value="1">Duyệt</option>
                  <option value="0">Không</option>
                </select>
              </td>
              <td><input type="submit" class="btn btn-success" value="Confirm"/></td>
              </form>
              <?php
                
              ?>
            </tr>
          <?php
            $n += 1;
          } while ($n % 4 != 0);
          ?>
        </table>
      </div>
        </div>
    </div>

  </div>

  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top bg-dark">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">© 2022</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex py-3">
      <span class="mb-3 mb-md-3 me-5 text-muted">Trần Việt Thắng - 52000715</span>
    </ul>
  </footer>

  <script>
    function ConfirmBtn(id) {
      var status = document.getElementById(id).value;
      var gameid = id;
      
      const xmlhttp = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function () {
            if (objXMLHttpRequest.readyState === 4) {
                if (objXMLHttpRequest.status == 200) {
                    resolve(objXMLHttpRequest.responseText);
                } else {
                    reject('Error Code: ' +  objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
                }
            }
        }

      

      xmlhttp.open("GET", "change_game_status.php?id=" + gameid + "&status=" + status, true);

      xmlhttp.send();
    }
  </script>
</body>

</html>