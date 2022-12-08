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
    <?php 
        require_once("conn_game.php");
    ?>
    <?php
      $dt = $conn->query("SELECT * FROM game where status = 0");
      $lstname = array();
      $lstimg = array();
      $lstdes = array();
      $lstinfo = array();

      foreach($dt as $row){
        array_push($lstname,$row["name"]);
        array_push($lstimg,$row["img"]);
        array_push($lstdes,$row["des"]);
        array_push($lstinfo,$row["info"]);
      }
    ?>
<header class="py-4 bg-dark">

</header>

    <div class="container-fluid">
        <?php
            $db = 0;
            $n = 0;
            $_SESSION['img'] = $lstimg;
            $_SESSION['name'] = $lstname;
            $_SESSION['des'] = $lstdes;
            do{
              if($n >= count($lstname)){
                break;
              }
              echo "<div class=\"col\">";
              echo "<div class=\"card card-cover h-100 overflow-hidden text-bg-light rounded-5 border border-5 border-dark shadow-lg\">";
              echo "<div class=\"d-flex flex-column h-100 p-3 pt-5 pb-3 text-dark text-shadow-1\">";
              echo "<img src=\"".$lstimg[$n]."\" class=\"rounded mx-auto d-block\" style=\"width: 250px; height: 250px;\">";
              echo "<h3 class=\"pt-2 mt-2 mb-4 display-7 lh-1 fw-bold\">".$lstname[$n]."</h3>";
              echo "<ul class=\"d-flex list-unstyled mt-auto\">";
              echo "<li class=\"me-auto\">";
              echo "</li>";
              echo "<li class=\"d-flex align-items-center\">";
              echo "<svg class=\"bi\" width=\"1em\" height=\"1em\"><use xlink:href=\"#geo-fill\"></use></svg>";
              echo "<p>".$lstdes[$n]."<img src=\"game_img/star.png\" style=\"width: 30px; height: 30px;\"></p>";
              echo "</li>";
              echo "<li class=\"d-flex align-items-center\">";
              echo "<svg class=\"bi\" width=\"1em\" height=\"1em\"><use xlink:href=\"#calendar3\"></use></svg>";
              echo "<a class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" href = \"index_game.php?email=".$email."&btnid=".$n."&db=".$db."\">Information</a>";
              // echo "<form class=\"align-items-center justify-content-center\" method=\"post\" action=\"index_game.php?email=".$email."\"> <input type=\"hidden\" name=\"btnid\" value=\"".$n."\"></input> <input type=\"hidden\" name=\"db\" value=\"".$db."\"></input> <input class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" type=\"submit\" value=\"Information\"></input> </form>";
              // echo "<form class=\"align-items-center justify-content-center\" method=\"post\" action=\"index_game.php?email=".$email."\"> <input type=\"hidden\" name=\"btnid\" value=\"".$n."\"></input> <input type=\"hidden\" name=\"btnid\" value=\"".$db."\"></input> <input class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" type=\"submit\" value=\"Information\"></input> </form>";
              echo "</li>";
              echo "</ul>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              $n += 1;
            }while($n%4 != 0);
        ?>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top bg-dark">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">© 2022</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex py-3">
      <span class="mb-3 mb-md-3 me-5 text-muted">Trần Việt Thắng - 52000715</span>
    </ul>
  </footer>
</body>
</html>