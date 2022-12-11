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
      margin-top: 15px;
      align-self: center;
      background-color: purple;
      border-radius: 5px;
    }
  </style>


  <?php
  require_once("conn_game.php");
  ?>
  <?php
  $dt = $conn->query("SELECT * FROM game where status = 0");
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
  <header class="py-4 bg-dark"></header>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2">
        <div class="navbox">
          <div class="col-lg-12">
            <a href="admin_management.php" style="color: white;">Game list</a>
          </div>
          <div class="col-lg-12">
            <a href="#" style="color: white;">Ban list</a>
          </div>
          <div class="col-lg-12">
            <a href="admin_management.php" style="color: white;">Game list</a>
          </div>
        </div>

      </div>
      <div class="col-lg-10">
        <?php
        $db = 0;
        $n = 0;
        $_SESSION['img'] = $lstimg;
        $_SESSION['name'] = $lstname;
        $_SESSION['des'] = $lstdes;
        ?>
        <table class="table">
          <tr>
            <th>Name</th>
            <th>Image</th>
            <th>des</th>
            <th>Qualification</th>
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
              <td><?php echo "<p>" . $lstdes[$n] . "<img src=\"game_img/star.png\" style=\"width: 30px; height: 30px;\"></p>"; ?></td>
              <td>
                <select id="<?php echo $lstid[$n] ?>">
                  <option value="1">Approve</option>
                  <option value="0">Deny</option>
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