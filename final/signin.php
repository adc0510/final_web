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
<body style="background-image: url('index_img/signup_bg.png'); background-repeat: no-repeat; background-size: 100%;">
    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">

        <main class="form-signin" style="width: 50%;">
            <form class="align-items-center justify-content-center" method="post" action="signin.php">
                <a href="index.php"><img class="mb-4" src="index_img/logo.png" alt="" width="72" height="57" style="border-radius: 15px;"></a>
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
                    <label for="floatingPassword">Password</label>
                </div>
            
                <input class="w-100 btn btn-lg btn-primary mt-5 mb-5" type="submit" value="Login"></input>
            </form>

            <?php
                require_once("conn_game.php");
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];

                    if(empty($email) or empty($pass)){
                        echo "<div class=\"alert alert-warning\" role=\"alert\"> Vui lòng nhập thông tin </div>";
                    }else{
                        $flag = false;
                        $dt = $conn->query("SELECT * FROM users");
                        foreach($dt as $row){
                            if($row['user'] == $email){
                                if($row['pass'] != $pass){
                                    echo "<div class=\"alert alert-danger\" role=\"alert\"> Sai Mật Khẩu </div>";
                                }else{
                                    $flag = true;
                                    echo "<div class=\"alert alert-success\" role=\"alert\"> Đăng Nhập Thành Công </div>";
                                    header("Refresh: 1; url=index.php?email=".$email);
                                }
                            }
                        }
                        if($flag == false){
                            echo "<div class=\"alert alert-danger\" role=\"alert\"> Tài Khoản Chưa Được Đăng Ký </div>";
                        }

                        
                    }
                }
            ?>
        </main>

    </div>
</body>
</html>