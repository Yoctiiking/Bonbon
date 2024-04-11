        <?php session_start();
          if(isset($_SESSION['courriel'])){
          require('inclus/entete2.inc');
        } else {
          require('inclus/entete.inc');
        } 
        if(isset($_GET["action"])){
            if($_GET["action"] == "deconnecter"){
              session_unset();  
              session_destroy();
              header("Location: index.php");
            }
          }
        ?>


          <p>
            Bonjour,<br /><br />
            Pour faire plaisir à mes enfants et aux amis de mes enfants, j'ai
            ouvert cette boutique de bonbons en 2010 et depuis, elle n'a cessé de
            prendre de l'expension. Aujourd'hui, avec la venue du Web, je suis
            heureux de vous présenter la nouvelle façon de magasiner des bonbons
            ...
          </p>
          <p class="text-center">Bon magasinage !</p>


        <?php if(isset($_SESSION['courriel'])){
          require('inclus/piedPage2.inc');
        } else {
          require('inclus/piedPage.inc');
        }?>