<!DOCTYPE html>
<html class="html-logIn-Register">
    <head>
        <?php
            include_once __DIR__ . '/../controller/head.php';
        ?>
    </head>
    <body>
        <section class="section-logIn-Register">
            <div class="form-box">
                <div class="form-value">
                    <form action="./index.php?resource=user_info" method="post" onsubmit="return validateFormLogIn()" name="logInForm">
                            <h2 class="headers-LogIn-Register"> Log In</h2>
                            <div class="inputbox">
                                <img class="img-logIn-register" src="img/mail-outline.svg" alt="E-mail Icon">
                                <input name="email" class="input-logIn-register" type="email" required>
                                <label class="label-logIn-register" for="">Username | E-mail</label>
                            </div>
                            <div class="inputbox">
                                    <img class="img-logIn-register" src="img/lock-closed-outline.svg" alt="Lock Icon">
                                    <input name="password" class="input-logIn-register" type="password" required>
                                    <label class="label-logIn-register" for="">Password</label> 
                            </div>

                            <button type="submit" class="button-logIn-register" onclick="validateFormLogIn()"><span class="span-logIn-register"></span> Log In </button>
                            <div class="register">
                                <p class="p-register">Don't have an account? </p>
                                <a class="a-register" href="./index.php?resource=register"> Register Here</a>
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