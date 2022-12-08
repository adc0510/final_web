
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
    <title>Trang Chủ</title>
</head>
<body>
  <?php
    require_once("conn_game.php");
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

        
        
        <?php
          $flag_login = false;
          if($email != ""){
            $flag_login = true;
          }
        
          if($flag_login == false){
            $loginf = "<div class=\"text-end \"> <a href= \"signin.php\" type=\"button\" class=\"btn btn-outline-success me-2 border border-3 border-dark\" style=\"background-color: #00E676; border-radius: 25px\">Login</a> <a href=\"signup.php\" type=\"button\" class=\"btn btn-outline-success border border-3 border-dark\" style=\"background-color: #00E676; border-radius: 25px\">Sign-up</a> </div>";
          }else{
            $loginf = "<div class=\"text-end \"> <form method=\"post\"> <input type=\"submit\" class=\"btn btn-outline-success me-2 border border-3 border-dark\" style=\"background-color: #2979FF; color: black; border-radius: 25px\" value=\"".$email."\"></input> <a href= \"user.php?email=".$email."\"><img src=\"index_img/user.png\" alt=\"\" style=\"border-radius: 25%; width: 50px; height: 50px;\"></a> <a href= \"index.php\" type=\"button\" class=\"btn btn-outline-success me-2 border border-3 border-dark\" style=\"background-color: #00E676; border-radius: 25px\">Logout</a> </form> </div>";
          }
          echo $loginf;
        ?>
      </div>
    </div>
  </header>

  <div style="background-color: black; height: 2px;"></div>
  <div class="container">
    <h2 class="pb-2 border-bottom border-dark border-3">Game Hàng Động</h2>
    <?php
      $dt = $conn->query("SELECT * FROM action_game");
      $lstname = array();
      $lstimg = array();
      $lstdes = array();

      foreach($dt as $row){
        array_push($lstname,$row["name"]);
        array_push($lstimg,$row["img"]);
        array_push($lstdes,$row["des"]);
      }
    ?>
    <div id="carouselExampleControls0" class="carousel slide " data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container px-0 py-0" id="custom-cards">
  
        
            <div class="row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-5">

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
          </div>
        </div>

        <?php
          while($n < count($lstname)){
            echo "<div class=\"carousel-item\">";
            echo "<div class=\"container px-0 py-0\" id=\"custom-cards\">";
            echo "<div class=\"row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-5\">";
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
              // echo "<form class=\"align-items-center justify-content-center\" method=\"post\" action=\"index_game.php?email=".$email."\"> <input type=\"hidden\" name=\"btnid\" value=\"".$n."\"></input> <input class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" type=\"submit\" value=\"Information\"></input> </form>";
              echo "</li>";
              echo "</ul>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              $n += 1;
            }while($n%4 != 0);
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
          $db += 1;
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls0" data-bs-slide="prev" style="top:40%; background-color: black; border-radius: 50px; height: 100px; width: 100px;">
        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
        <span class="visually-hidden ">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls0" data-bs-slide="next" style="top:40%; background-color: black; border-radius: 50px; height: 100px; width: 100px;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>


  <div class="container">
    <h2 class="pb-2 border-bottom border-dark border-3">Game Giải Đố</h2>
    <?php
      $dt = $conn->query("SELECT * FROM puzzle_game");
      $lstname = array();
      $lstimg = array();
      $lstdes = array();
      foreach($dt as $row){
        array_push($lstname,$row["name"]);
        array_push($lstimg,$row["img"]);
        array_push($lstdes,$row["des"]);
      }
    ?>
    <div id="carouselExampleControls1" class="carousel slide " data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container px-0 py-0" id="custom-cards">
  
        
            <div class="row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-5">

              <?php
                $n = 0;
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
                  // echo "<form class=\"align-items-center justify-content-center\" method=\"post\" action=\"index_game.php?email=".$email."\"> <input type=\"hidden\" name=\"btnid\" value=\"".$n."\"></input> <input class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" type=\"submit\" value=\"Information\"></input> </form>";
                  echo "</li>";
                  echo "</ul>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  $n += 1;
                }while($n%4 != 0);
              ?>

            </div>
          </div>
        </div>

        <?php
          while($n < count($lstname)){
            echo "<div class=\"carousel-item\">";
            echo "<div class=\"container px-0 py-0\" id=\"custom-cards\">";
            echo "<div class=\"row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-5\">";
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
              // echo "<form class=\"align-items-center justify-content-center\" method=\"post\" action=\"index_game.php?email=".$email."\"> <input type=\"hidden\" name=\"btnid\" value=\"".$n."\"></input> <input class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" type=\"submit\" value=\"Information\"></input> </form>";
              echo "</li>";
              echo "</ul>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              $n += 1;
            }while($n%4 != 0);
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
          $db += 1;
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev" style="top:40%; background-color: black; border-radius: 50px; height: 100px; width: 100px;">
        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
        <span class="visually-hidden ">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next" style="top:40%; background-color: black; border-radius: 50px; height: 100px; width: 100px;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container">
    <h2 class="pb-2 border-bottom border-dark border-3">Game Moba</h2>
    <?php
      $dt = $conn->query("SELECT * FROM moba_game");
      $lstname = array();
      $lstimg = array();
      $lstdes = array();
      foreach($dt as $row){
        array_push($lstname,$row["name"]);
        array_push($lstimg,$row["img"]);
        array_push($lstdes,$row["des"]);
      }
    ?>
    <div id="carouselExampleControls2" class="carousel slide " data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container px-0 py-0" id="custom-cards">
            <div class="row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-5">

              <?php
                $n = 0;
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
                  // echo "<form class=\"align-items-center justify-content-center\" method=\"post\" action=\"index_game.php?email=".$email."\"> <input type=\"hidden\" name=\"btnid\" value=\"".$n."\"></input> <input class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" type=\"submit\" value=\"Information\"></input> </form>";
                  echo "</li>";
                  echo "</ul>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  $n += 1;
                }while($n%4 != 0)
              ?>
        
            </div>
          </div>
        </div>

        <?php
          while($n < count($lstname)){
            echo "<div class=\"carousel-item\">";
            echo "<div class=\"container px-0 py-0\" id=\"custom-cards\">";
            echo "<div class=\"row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-5\">";
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
              // echo "<form class=\"align-items-center justify-content-center\" method=\"post\" action=\"index_game.php?email=".$email."\"> <input type=\"hidden\" name=\"btnid\" value=\"".$n."\"></input> <input class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" type=\"submit\" value=\"Information\"></input> </form>";
              echo "</li>";
              echo "</ul>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              $n += 1;
            }while($n%4 != 0);
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev" style="top:40%; background-color: black; border-radius: 50px; height: 100px; width: 100px;">
        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
        <span class="visually-hidden ">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next" style="top:40%; background-color: black; border-radius: 50px; height: 100px; width: 100px;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
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
