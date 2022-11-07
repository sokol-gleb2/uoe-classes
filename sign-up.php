<?php
    include "./server/connection.php";
    
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
    
    $q = strpos($url, '?');
    $spec = "none";
    if ($q) {
        $problem = substr($url, $q, strlen($url));
        $spec = substr($problem, strpos($problem, '=')+1, strlen($problem));
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sign-up.css">
    <title>Sign Up Page</title>
</head>
<body>
    <div problem='none' class="username_taken">Username already exists - pick a different one</div>
    <div class="outer">
        <div id="loginBox" class="creating-log-in-box">

            <div id="Sign in" style="color: #a31621; text-align: center; padding: 0">
                <h2>Create Your Log-In Details</h2>
            </div>

            <div id="loginForm" style="text-align: left">
                
                <div id="Name" style="margin-left: 20px; margin-top: 40px">
                Full Name:
                <input id="nameInput" name="name_entered" size="30" style="float: right; margin-right: 5px;"/>
                </div>
                
                <div id="Email" style="margin-left: 20px; margin-top: 20px">
                Email:
                <input id="emailInput" name="email_entered" size="30" style="float: right; margin-right: 5px;"/>
                </div>
                
                <div id="Username" style="margin-left: 20px; margin-top: 20px">
                New Username:
                <input id="usernameInput" name="username_entered" size="30" style="float: right; margin-right: 5px;"/>
                </div>

                <div id="Password" style="margin-left: 20px; margin-top: 20px;">
                New Password:
                <input type="password" id="passwordInput" name="password_entered" size="30" style="float: right; margin-right: 5px;"/>
                </div>
                
                <div id="repeatPassword" style="margin-left: 20px; margin-top: 20px">
                Repeat Password:
                <input type="password" id="passwordInputRepeat" name="password_entered" size="30" style="float: right; margin-right: 5px;"/>
                </div>
            </div>

            <div class="wrapper">
                <button class="signin" id="sign-in" onclick="create()" style="margin-bottom: 10px; margin-top: 25px"><span>Create</span></button>
            </div>

            

            </div>

            <!------------------------------->

            <div id="problem" style="visibility: hidden; height: 0; text-align: center; color: red"></div>

        </div>
    </div>
    <form id="create_user_form" action="./server/create-user.php" method="POST">
        <input type='hidden' id='create_username_field' name="username" value='1'/>
        <input type='hidden' id='create_password_field' name="password" value='1'/>
        <input type='hidden' id='create_email_field' name="email" value='1'/>
        <input type='hidden' id='create_name_field' name="name" value='1'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    <script src="/js/sign-up.js"></script>
    <script>

        var spec = <?php echo json_encode($spec); ?>;
        if (spec == "username_taken") {
            document.querySelector('.username_taken').setAttribute('problem', 'username_taken');
        }
    </script>
    
</body>
</html>