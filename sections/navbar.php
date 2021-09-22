<nav class="navbar bg-dark navbar-dark navbar-expand-md fixed-top">
<a class="navbar-brand" href="./index">
    <img src=".\assets\img\logo\LTgold2.png" width="50" height="30" class="d-inline-block align-top" alt="logo">
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto" id="navScrollspy">
              <li class="nav-item">
                <a class="nav-link" href="#section-jumbotron">To the top</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#section-description">Description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#section-features">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#section-pricing">Pricing</a>
              </li>
            </ul>
            <ul class="navbar-nav navbar-right" id="navScrollspy">
             
                <?php if (isset($_SESSION['login'])) {
                          echo '
                          <li class="nav-item">
                          <a class="nav-link" href="./profile">Profil page</a>
                          </li>
                          <li class="nav-item">
                          <a class="nav-link" href="./includes/logout.inc.php">Logout page</a>
                          </li>
                          
                          ';
                      } else {
                          echo '
                          <li class="nav-item">
                          <a class="nav-link" href="./registar">Registar page</a>
                          </li>
                          <li class="nav-item">
                          <a class="nav-link" href="./login">Login page</a>
                          </li>
                          ';
                      }
                
                ?>
             
            </ul>
  </div>
</nav>
