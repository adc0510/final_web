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
<header class="p-3">
    <div class="container" style="background-image: url(index_img/head_bg.gif);">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="index_img/logo.png" alt="" style="width: 80px; border-radius: 25px;">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-black text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <?php
            ob_start();
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
  <?php
    require_once("conn_game.php");
    
    $db = $_GET['db'];
    $tb = array("action_game","puzzle_game","moba_game");
    $sql = "SELECT * FROM ".$tb[$db];
    $conn->prepare($sql);
    $dt = $conn->query($sql);
    $lst = array();
    foreach($dt as $row){
      array_push($lst,$row);
    }
    $btnid = $_GET['btnid'];
    $id = $lst[$btnid]['id'];
    $img = $lst[$btnid]['img'];
    $name = $lst[$btnid]['name'];
    $des = $lst[$btnid]['des'];
    $info = $lst[$btnid]['info'];
    $comment = $lst[$btnid]['comment'];
    $bg_img = str_replace(".","_bg.",$img);
    
    ?>
    <div class="d-flex align-items-center justify-content-between border border-5 border-warning m-3 bg-dark" style="border-radius: 25px;">
      <div class=" align-items-center justify-content-start" style="width: 25%; height: 100%;">
          <?php
            echo "<img src=\"".$img."\" alt=\"\" width=\"300px\" style=\"border-radius: 25px;\" class=\"border border-5 border-warning mt-5 ms-5 mb-2 bg-light\">";
            echo "<div class=\"ms-5 mb-5 border border-5 border-warning pt-2 ps-3 bg-light\" style=\"border-radius: 25px; width: 300px;\">";
            echo "<h3>".$name."</h3>";
            echo "<h2>".$des."<img src=\"game_img/star.png\" style=\"width: 50px; height: 50px;\" class=\"m-2\"></h2>";
            echo "</div>";
          ?>
      </div>
      <?php
        echo "<div class=\"d-flex justify-content-end align-items-end m-4 pe-5 pb-4 border border-5 border-warning\" style=\"width: 75%;  height: 450px; background-image: url('".$bg_img."'); background-size: 100% 100%; border-radius: 50px;\">";
      ?>
        <div class="d-flex align-items-end justify-content-center" style="border-radius: 25px;">
          <?php
            echo "<a href=\"user.php?email=".$email."&db_name=".$tb[$db]."&id=".$id."&method=fv\" class=\"btn btn-danger d-flex align-items-center justify-content-center me-4 border border-5 border-warning\" style=\"width: 300px;  height: 80px; font-size: 40px; border-radius: 25px;\">Favorite</a>";
            
            echo "<a href=\"user.php?email=".$email."&db_name=".$tb[$db]."&id=".$id."&method=dl\" class=\"btn btn-success d-flex align-items-center justify-content-center border border-5 border-warning\" style=\"width: 300px;  height: 80px; font-size: 40px; border-radius: 25px;\">Download</a>";
          ?>
          </div>
    </div>
  </div>

  <div class="d-flex align-items-center justify-content-between border border-5 border-warning m-3 bg-dark" style="border-radius: 25px;">

    <div style="width: 30%; border-radius: 25px; height: 500px;" class="border border-5 border-warning m-3 p-2 bg-light">
      <div class="overflow-scroll" style="height: 470px;">
        <h2 class="ms-5">Thông Tin</h2>
        <div style="background-color: black; height: 2px;"></div>
        <div>
        <?php
          $lstinfo = explode('/n',$info);
          foreach($lstinfo as $row){
            echo "<h5>".$row."</h5>";
            echo "<br><br>";
          }
        ?>
        </div>
      </div>
    </div>

    <div style="width: 70%; border-radius: 25px; height: 500px;" class="border border-5 border-warning m-3 p-2 bg-light">
      <div class="align-items-start">
        <h2 class="ms-5">Bình Luận</h2>
        <div style="background-color: black; height: 2px;"></div>
      </div>

      <div class="p-2 m-2 border border-5 border-warning bg-dark text-dark" style="border-radius: 25px; height: 320px;">
        <div class="p-2 m-2 border border-5 border-warning bg-light" style="border-radius: 25px; height: 280px;">
          <div class="overflow-scroll" style="height: 250px;">
            <?php
              $cmts = explode('/n',$comment);
              array_pop($cmts);
              foreach($cmts as $cmt){
                $lst_cmt = explode(' ',$cmt);
                echo "<h4>".$lst_cmt[0]." :</h4>";
                echo "<br>";
                echo "<p>".$lst_cmt[1]."</p>";
                echo "<div style=\"height: 1px ;background-color: black \"></div>";
              }
            ?>
          </div>
        </div>
      </div>

      <div class=" d-flex align-bottom border border-5 border-warning m-2 p-2 bg-dark text-light" style="border-radius: 25px;">
        
        <form class="d-flex align-bottom m-0 p-0 bg-dark text-light w-100" method="post" action="" id="cmt">
          <input class="mx-2 px-3" style="border-radius: 25px; width: 96%;" placeholder="Thêm Bình Luận . . . . " name="cmt"></input>
          <button class="px-2 border border-5 border-warning" style="border-radius: 15px;" type="submit"> <h4>Send</h4> </button>
        </form>
        <?php

          if(isset($_POST['cmt'])){
            $cmt = $_POST['cmt'];
            $cur_cmt = $conn->query("SELECT * FROM $tb[$db] WHERE id='$id'");
            $cur = "";
            foreach($cur_cmt as $row){
              $cur = $cur.$row['comment'];
            }
            $str = $cur."".$email." ".$cmt."/n";
            $sql = "UPDATE $tb[$db] SET comment='$str' WHERE id='$id'";
            $conn->query($sql);
            header("refresh:0");
            ob_end_flush();
          }
        ?>
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