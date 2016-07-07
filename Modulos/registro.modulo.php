
<meta charset="utf-8">
<div class="form">      
      <div class="tab-content">
      <a  href="?pg=login" class="waves-effect waves-light btn">si ya tienes una cuenta click aqui!</a>
       <h1 style="color: white;">Obten 7 dias gratis con tu registro!</h1>
          
          <form id="login" action="login.php" method="post">
          
            <div class="field-wrap">
            <h3>
              usuario<span class="reqi">*</span>
            </h3>
            <input name="usuario" type="text" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Correo <span class="reqi">*</span>
            </label>
            <input name="usuario" type="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              <?php echo utf8_decode("Contraseña"); ?><span class="reqi">*</span>
            </label>
            <input name="pass" type="password" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="/membresia/index.php">Olvido <?php echo utf8_decode("Contraseña?"); ?></a?</p>
          
          <button class="button button-block"/>Registrarse</button>
          
          </form>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->