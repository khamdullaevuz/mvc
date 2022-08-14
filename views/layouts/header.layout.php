<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><?=APP_NAME?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link<?=Router::currentRoute('') ? ' active' : ''?>" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?=Router::currentRoute('product') ? ' active' : ''?>" href="/product">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?=Router::currentRoute('about') ? ' active' : ''?>" href="/about">About</a>
        </li>
    </div>
  </div>
</nav>
<br>