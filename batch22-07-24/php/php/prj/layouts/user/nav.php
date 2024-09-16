<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
      aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">



        <li class="nav-item">
          <a class="nav-link  <?php echo (chopExtension($_SERVER["PHP_SELF"]) == "dashboard.php") ? "active" : "" ?>  "
            href="<?php echo DASHBOARD ?>" aria-current="page">DASHBOARD
            <span class="visually-hidden">(current)</span></a>
        </li>

        <?php
        if (!isset($_SESSION["user_id"]) && empty($_SESSION["user_id"])) {
          # code...
        

          ?>

          <li class="nav-item">
            <a class="nav-link  <?php echo (chopExtension($_SERVER["PHP_SELF"]) == "login.php") ? "active" : "" ?>"
              href="<?php echo LOGIN ?>">LOGIN</a>
          </li>

          <li class="nav-item">
            <a class="nav-link  <?php echo (chopExtension($_SERVER["PHP_SELF"]) == "signup.php") ? "active" : "" ?>"
              href="<?php echo SIGNUP ?>">SIGNUP</a>
          </li>
          
          |<?php } else { ?>

          <li class="nav-item">
            <a class="nav-link  <?php echo (chopExtension($_SERVER["PHP_SELF"]) == "logout.php") ? "active" : "" ?>"
              href="<?php echo LOGOUT ?>">LOGOUT</a>
          </li>

        <?php } ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdownId">
            <a class="dropdown-item" href="#">Action 1</a>
            <a class="dropdown-item" href="#">Action 2</a>
          </div>
        </li>
      </ul>
      <form class="d-flex my-2 my-lg-0">
        <input class="form-control me-sm-2" type="text" placeholder="Search" />
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          Search
        </button>
      </form>
    </div>
  </div>
</nav>