<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $pren = md5($_POST['pren']);
    $nm = md5($_POST['nm']);

   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist';
   }else{
      if($pass != $cpass){
         $error[] = 'password not mathched!';
      }else{
         $insert = "INSERT INTO user_form(email, password) VALUES('$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:head.php');
      }
   }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/ed10354978.js" crossorigin="anonymous"></script>


    <title>Connexon</title>
</head>

<body>
    <section class="contenair">
        <div class="title">
            <img src="logo.png">
            <p>Créez votre compte pour une experiance inoubliable</p>

        </div>
        <form action="" method="post" class="formulaire">
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
            <h1>S'inscrire</h1>
            <h4>C'est rapide et facile</h4>
            <hr>
            <div class="input-nom-prenom">
                <input type="text" name="pren" placeholder="Prenom">
                <input type="text" name="nm" placeholder="Nom">
            </div>
            <input type="email" name="usermail" class="num-mdp" placeholder="Numero ou email">
            <input type="password" name="password" class="num-mdp" placeholder="nouveau mot de passe">
            <input type="password" name="cpassword" class="num-mdp" placeholder="confirmez">
            <div class="texte">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam officia sit beatae libero dignissimos est, architecto tempora porro, commodi quia eveniet, voluptates quo ducimu</p>

            </div>
            <div class="center-btn-submit">
                <input type="submit" value="S'inscrire" class="submit" name="submit" id="btn-s-inscrire">
                

                <p class="link"><a href="login.php">contuniez avec un compte existant</a></p>



            </div>



        </form>
    </section>

    </section>
    <script>
        function afficher() {
            document.querySelector('.inscription').classList.toggle('.active')
        }
    </script>
</body>

</html>