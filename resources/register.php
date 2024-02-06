<!DOCTYPE html>
<html class="html-logIn-Register">
    <head>
        <?php
            include_once __DIR__ . '/../controller/head.php';
        ?>
    </head>
    <body>
        <section class="section-logIn-Register">
            <div class="form-box" id="form-box-register">
                <div class="form-value">
                    <form action="./index.php?resource=register_confirm" method="post" onsubmit="return validateForm()" name="registerForm">
                        <h2 class="headers-LogIn-Register"> Register </h2>
                        <div class="inputbox">
                            <img class="img-logIn-register" src="./img/userIcon.png" alt="User Name Icon">
                            <input class="input-logIn-register" type="name" name="newUserName" required>
                            <label class="label-logIn-register" for="">User name</label>
                        </div>
                        <div class="inputbox">
                            <img class="img-logIn-register" src="./img/mail-outline.svg" alt="E-mail Icon">
                            <input class="input-logIn-register" type="email" name="newUserEmail" required>
                            <label class="label-logIn-register" for="">E-mail <Address></Address></label>
                        </div>
                        <div class="inputbox">
                                <img class="img-logIn-register" src="./img/lock-closed-outline.svg" alt="Lock Icon">
                                <input class="input-logIn-register" type="password" name = "newUserPassword" required>
                                <label class="label-logIn-register" for="">Password</label> 
                        </div>
                        <div class="inputbox">
                                <img class="img-logIn-register" src="./img/addressIcon.svg" alt="Lock Icon">
                                <input class="input-logIn-register" type="text" name = "newUserAddress" required>
                                <label class="label-logIn-register" for="">Address</label> 
                        </div>
                        <div class="inputbox">
                                <img class="img-logIn-register" src="./img/cityIcon.svg" alt="Lock Icon">
                                <input class="input-logIn-register" type="text" name = "newUserCity" required>
                                <label class="label-logIn-register" for="">City</label> 
                        </div>
                        <div class="inputbox">
                                <img class="img-logIn-register" src="./img/zipCodeIcon.svg" alt="Lock Icon">
                                <input class="input-logIn-register" type="text" name = "newUserPostalCode" required>
                                <label class="label-logIn-register" for="">Zip Code</label> 
                        </div>

                        <button type="submit" class="button-logIn-register" onclick="return validateForm()"><span class="span-logIn-register"></span> Register </button>
                        <div class="register">
                            <p class="p-register">Already have an account? </p>
                            <a class="a-register" href="./index.php?resource=log_in"> Log In Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
                include_once __DIR__ . '/../controller/footer.php';
        ?>     
    </body>
</html>
