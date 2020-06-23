<?php
    require "header.php";
?>

<main>
    <div class="conteiner">
        <secttion class="content">
        <h1>Signup</h1>
            <form action="includes/signup.inc.php" method="post">
                <input class="input-text" type="text" name="uid" placeholder="Username">
                <input class="input-text" type="email" name="mail" placeholder="E-mail">
                <input class="input-text" type="password" name="pwd" placeholder="Password">
                <input class="input-text" type="password" name="repeat-password" placeholder="Repeat Password">
                <button type="submit" class="button button-submit" name="signup-submit" value="SignUp">SignUp</button>
            </form>
        </section>
    </div>    
</main>


<?php
    require "footer.php";
?>