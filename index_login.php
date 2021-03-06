<?php
//    session_start();
    require 'partials/database.php';
    // OM INLOGGNING SKETT FÖR ÖVER 10 MIN (10 * 60 sekunder = 600) SEDAN SKER AUTOMATISKT UTLOGGNING:
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    
// ANNARS VISAS SIDAN I INLOGGAT LÄGE MED ANVÄNDARNAMN OCH LOG OUT-LÄNK:
} else {  
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


  
// OM MAN ÅTERVÄNDER TILL INDEX EFTER ETT MISSLYCKAT REGISRERINGSFÖRSÖK:
    if(isset($_GET["registration_error"])){
        echo "Din registrering misslyckades då du inte fyllt i alla fält.";
    }
?>
    <div class="hidden-xs hidden-sm col-md-4 login-wrap">
        <div class="login-field">
            <?php
            if(isset($_SESSION["user"])){
                echo "<h1 class='text-center white-text'>Välkommen:<br/>" . 
                $_SESSION["user"]["username"] . 
                "</h1>";   
            ?>
                <a class="btn-default btn-lg btn-block" href="profilepage.php">Till Profilsida</a>
                <a class="btn button-green btn-lg btn-block" href="new_post_form.php">Skriv inlägg</a><br>
                <a href="partials/log_out.php"><h3>Logga ut</h3></a>

                <?php
            }
                else{
            ?>

                    <form class="index-form" action="partials/login.php" method="POST">

                        <div class="form-group">
                            <input type="text" placeholder="&#xf007;  Användarnamn" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="password" placeholder="&#xf023;  Lösenord" name="password" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" value="LOGGA IN" class="btn button-green btn-lg btn-block">
                        </div>
                        <p>Har du inget konto?</p>
                        <a href="register_form.php">
                            <h3>Registrera dig</h3>
                        </a>
                        <?php
            }
         ?>
        </div>
    </div>

    </form>