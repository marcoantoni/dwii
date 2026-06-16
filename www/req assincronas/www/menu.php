<!-- Navbar -->
<nav class="blue darken-3">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo">Redes</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="login.php"><i class="material-icons left">login</i>Login</a></li>
      <li class="<?= ($_SESSION["pagina_ativa"] ?? '') === 'mostrar_usuarios' ? 'active' : '' ?>"><a href="mostrar.php" ><i class="material-icons left">people</i>Mostrar Usuários</a></li>
      <li class="<?= ($_SESSION["pagina_ativa"] ?? '') === 'ex_assincrono' ? 'active' : '' ?>"><a href="exemplo_assincrono.php" ><i class="material-icons left">autorenew</i>Exemplo requisição assíncrona</a></li>
    </ul>
  </div>
</nav>