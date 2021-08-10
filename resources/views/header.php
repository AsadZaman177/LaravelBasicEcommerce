<?php 
use App\Http\Controllers\ProductController;
$total = 0;
if (Session::has('user')){
$total = ProductController::cartItem();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">About</a>
        </li>
        <?php if (Session::has('user')){ ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#"><bold><?php echo session('user')['name'] ?></bold></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/logout">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/login">Login/Register</a>
          </li>
        <?php } ?>

        </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
       <ul class=" nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/cart">Cart(<?php echo $total ?>)</a>
        </li>
      </ul>
    </div>
  </div>
</nav>