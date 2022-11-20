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
        $val = $_POST['search'];
        $tb = array("action_game","puzzle_game","moba_game");
        $all_game = array();
        foreach($tb as $mtb){
            $dt_game = $conn->query("SELECT * FROM $mtb");
            foreach($dt_game as $row){
                array_push($all_game,$row);
            }
        }
        $lst_s = array();
        foreach($all_game as $row){
            if(str_contains($row['name'],$val)){
                array_push($lst_s,$row);
            }
        }
        $img = array();
        $name = array();
        $des = array();
        $id = array();
        foreach($lst_s as $row){
            array_push($img,$row['img']);
            array_push($name,$row['name']);
            array_push($des,$row['des']);
            array_push($id,$row['id']);
        }
        $db = array();
        $bg_img = array();
        for($i = 0; $i < count($img); $i++){
            foreach($tb as $tbdt){
                $g_dt = $conn->query("SELECT * FROM $tbdt");
                foreach($g_dt as $row){
                    if($row['name'] == $name[$i]){
                        array_push($db,array_search($tbdt,$tb));
                    }
                }
            }
            array_push($bg_img,str_replace(".","_bg.",$img[$i]));
        }
        for($i = 0; $i < count($img); $i++){
            echo "<div class=\"container\">";
            echo "<div class=\"d-flex align-items-center justify-content-between border border-5 border-warning m-3 bg-dark\" style=\"border-radius: 25px;\">";
            echo "<div class=\" align-items-center justify-content-start\" style=\"width: 25%; height: 100%;\">";
            echo "<img src=\"".$img[$i]."\" alt=\"\" width=\"300px\" style=\"border-radius: 25px;\" class=\"border border-5 border-warning mt-5 ms-5 mb-2 bg-light\">";
            echo "<div class=\"ms-5 mb-5 mt-2 border border-5 border-warning pt-4 ps-3 bg-light\" style=\"border-radius: 25px; width: 300px;\">";
            echo "<h3>".$name[$i]."</h3>";
            echo "<h2>".$des[$i]."<img src=\"game_img/star.png\" style=\"width: 50px; height: 50px;\" class=\"m-2\"></h2>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"d-flex justify-content-end align-items-end m-4 pe-5 pb-4 border border-5 border-warning\" style=\"width: 67%;  height: 465px; background-image: url('".$bg_img[$i]."'); background-size: 100% 100%; border-radius: 50px;\">";
            echo "<div class=\"d-flex align-items-end justify-content-center\" style=\"border-radius: 25px;\">";
            echo "<a class=\"w-100 btn btn-lg btn-info mt-5 mb-5\" href = \"index_game.php?email=".$email."&btnid=".($id[$i] - 1)."&db=".$db[$i]."\">Information</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>

    
</body>
</html>