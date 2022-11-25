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
    <title>Document</title>
</head>
<body>
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
            $loginf = "<div class=\"text-end \"> <form method=\"post\"> <input type=\"submit\" class=\"btn btn-outline-success me-2 border border-3 border-dark\" style=\"background-color: #2979FF; color: black; border-radius: 25px\" value=\"".$email."\"></input> <a href= \"index.php?email=".$email."\"><img src=\"index_img/user.png\" alt=\"\" style=\"border-radius: 25%; width: 50px; height: 50px;\"></a> </form> </div>";
          }
          echo $loginf;
        ?>
        <?php
          require_once("conn_game.php");
          if(isset($_GET['method'])){
            $method = $_GET['method'];

            if($method == "fv"){
              $db = $_GET['db_name'];
              $id_game = $_GET['id'];
              $cur_fv = $conn->query("SELECT * FROM users WHERE user='$email'");
              $cur_fv_game = "";
              foreach($cur_fv as $row){
                $cur_fv_game = ($row['fv_game']);
              }
              if(!str_contains($cur_fv_game,$db." ".$id_game)){
                $sql = "UPDATE users SET fv_game = ? WHERE user='$email'";
                $run = $conn->prepare($sql);
                $run->execute([$cur_fv_game."".$db." ".$id_game."/n"]);
              }
            }
            if($method == "dl"){
              $db = $_GET['db_name'];
              $id_game = $_GET['id'];
              $cur_dl = $conn->query("SELECT * FROM users WHERE user='$email'");
              $cur_dl_game = "";
              foreach($cur_dl as $row){
                $cur_dl_game = ($row['dl_game']);
              }
              if(!str_contains($cur_dl_game,$db." ".$id_game)){
                $sql = "UPDATE users SET dl_game = ? WHERE user='$email'";
                $run = $conn->prepare($sql);
                $run->execute([$cur_dl_game."".$db." ".$id_game."/n"]);
              }
            }
          }
        ?>
      </div>
    </div>
  </header>

        <div class="p-2 m-2 border border-5 border-warning bg-primary justify-content-center align-items-center" style="border-radius: 25px; height: 280px;">
          <div class="d-flex justify-content-center align-items-center " style="height: 100%">
            <div class="align-items-center justify-content-center" style="width: 70%;">
                <?php
                    echo "<h1 class=\"d-flex align-items-center justify-content-center m-5\">".$email."</h1>";
                    $money = "0";
                    require_once("conn_game.php");
                    $dt = $conn->query("SELECT * FROM users");
                    $index_row = null;
                    foreach($dt as $row){
                        if($row["user"] == $email){
                            $index_row = $row;
                        }
                    }
                    echo "<h1 class=\"d-flex align-items-center justify-content-center m-5\">Money in account: ".$index_row["money"]." VND</h1>";
                ?>
            </div>
            <div style="width: 30%;"  class="d-flex justify-content-center">
                <img src="index_img/user.png" style="height: 250px;">
            </div>
          </div>
        </div>
    </div>

    <div class="p-2 m-2 border border-5 border-warning bg-dark text-dark" style="border-radius: 25px;">
        <div class="d-flex p-2 m-2 border border-5 border-warning bg-light justify-content-center align-items-center" style="border-radius: 25px; width: 99.1%; ">
          <div class="container justify-content-center align-items-center m-2" style="width: 100%;">

            <div class="p-2 m-2 border border-5 border-warning bg-dark text-dark" style="border-radius: 25px; width: 100%">
                <div class="p-2 m-2 border border-5 border-warning bg-danger justify-content-center align-items-center " style="border-radius: 25px; ">
                    <div class="container justify-content-center align-items-center bg-">
                        <h1>Favourite Game</h1>
                        <?php
                            $fv_game = $index_row["fv_game"];
                            $game = explode("/n",$fv_game);
                            array_pop($game);
                            foreach($game as $ind){
                              $inds = explode(" ",$ind);
                              $dt_game = $conn->query("SELECT * FROM $inds[0] WHERE id='$inds[1]'");
                              foreach($dt_game as $row){
                                echo "<div class=\"p-2 m-2 border border-5 border-warning bg-dark text-dark\" style=\"border-radius: 25px; width: 100%\">";
                                  echo "<div class=\"d-flex p-2 m-2 border border-5 border-warning bg-light justify-content-between align-items-center\" style=\"border-radius: 25px; \">";
                                  echo "<img class=\"p-2 m-2 border border-5 border-warning bg-dark\" src=\"".$row["img"]."\" style=\"height: 100px; border-radius: 25px;\">";
                                  echo "<h2>".$row["name"]."</h2>";
                                  echo "<h2>".$row["des"]."<img  src=\"game_img/star.png\" style=\"height: 50px; border-radius: 25px;\"></h2>";
                                  echo "<br>";
                                  echo "</div>";
                                  echo "</div>";
                              }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="p-2 m-2 border border-5 border-warning bg-dark text-dark" style="border-radius: 25px; width: 100%">
                <div class="p-2 m-2 border border-5 border-warning bg-success justify-content-center align-items-center" style="border-radius: 25px; ">
                    <div class="container justify-content-center align-items-center">
                        <h1>Download Game</h1>
                        <?php
                            $dl_game = $index_row["dl_game"];
                            $game = explode("/n",$dl_game);
                            array_pop($game);
                            foreach($game as $ind){
                              $inds = explode(" ",$ind);
                              $dt_game = $conn->query("SELECT * FROM $inds[0] WHERE id='$inds[1]'");
                              foreach($dt_game as $row){
                                echo "<div class=\"p-2 m-2 border border-5 border-warning bg-dark text-dark\" style=\"border-radius: 25px; width: 100%\">";
                                  echo "<div class=\"d-flex p-2 m-2 border border-5 border-warning bg-light justify-content-between align-items-center\" style=\"border-radius: 25px; \">";
                                  echo "<img class=\"p-2 m-2 border border-5 border-warning bg-dark\" src=\"".$row["img"]."\" style=\"height: 100px; border-radius: 25px;\">";
                                  echo "<h2>".$row["name"]."</h2>";
                                  echo "<h2>".$row["des"]."<img  src=\"game_img/star.png\" style=\"height: 50px; border-radius: 25px;\"></h2>";
                                  echo "<br>";
                                  echo "</div>";
                                  echo "</div>";
                              }
                            }
                        ?>
                    </div>
                </div>
            </div>

          </div>
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