<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style_login.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-color:#222627">
            <div class="wrap-login100 shadow p-3 mb-5 bg-white rounded">
                <form class="login100-form validate-form" action="action/aksi_login.php" method="post" accept-charset="utf-8">
                    <span class="login100-form-title p-b-26">
                        Welcome
                    </span>
                    <?php
                    if(isset($_SESSION["errorMessage"])) {
                        ?>
                        <div style="padding: 7px 10px;
                        background: #fff1f2;
                        border: #ffd5da 1px solid;
                        color: #d6001c;
                        border-radius: 4px;
                        margin: 30px 10px 10px 10px;">
                            <?php echo $_SESSION["errorMessage"]; ?>
                        </div>
                        <?php
                        unset($_SESSION["errorMessage"]);
                    }
                    ?>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100" data-placeholder="Username/Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>