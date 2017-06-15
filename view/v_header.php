   <header>
    <form action="<?PHP $PHP_SELF ?>" method="post">
        <nav id="menu_gral">
      	<ul id="menu">
      		<li><a href="../controller/c_perfil.php?menu=0">Inicio</a></li>

      		<?php 

            if ($_SESSION['tipoUsuario']=='administrador') {
              include('v_perfil_admin.php');
            } elseif ($_SESSION['tipoUsuario']=='usuario') {
              include('v_perfil_usuario.php');
            } else {
              include('v_perfil_consultor.php');
            }
            
          ?>
      		<li><a href="">Perfil</a>
      			<ul>
              <li><a href="../controller/c_perfil.php?menu=1">Subir Foto</a></li>
      				<li><a href="../controller/c_perfil.php?menu=2">Modificar Datos</a></li>
      				<li><a href="../controller/c_perfil.php?menu=3">Logout</a></li>
      			</ul>
      		</li>
      	</ul>
      </nav>
      </form>
    </header>
     <div class=de_reloj>
        <form name="form_reloj">
          <input class="reloj" type="text" name="reloj" size="10" onfocus="window.document.form_reloj.reloj.blur()">
        </form>
      </div> 

    <div>
    	<hr>
    	<h2>Perfil <?php echo $_SESSION['username']?> </h2>