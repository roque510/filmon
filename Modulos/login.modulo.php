<?php 
require_once("medoo.php");
require("config.php");

$database = new medoo([
          'database_type' => 'mysql',
          'database_name' => $DBM,
          'server' => $SVR,
          'username' => $USR,
          'password' => $PW,
          'charset' => 'utf8'
        ]);

$query = "UPDATE  `users` SET `membership_id` = 1 ,  `mem_expire` = DATE_ADD(  CURDATE() , INTERVAL 7 DAY ) WHERE  `membership_id` = 0";

$data = $database->query($query)->fetchAll();


 ?>
<div class="form">
      
      
      
      <div class="tab-content">
      
       <h1 style="color: white;">Welcome Back!</h1>
          
          <form id="login" action="login.php" method="post">
          
            <div class="field-wrap">
            <label>
              usuario<span class="req">*</span>
            </label>
            <input name="usuario" type="text"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              <?php echo utf8_decode("Contraseña"); ?><span class="req">*</span>
            </label>
            <input name="pass" type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="/membresia/index.php">Olvido <?php echo utf8_decode("Contraseña?"); ?></a></p>
          
          <button class="button button-block"/>Iniciar Sesion</button>
          
          </form>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->