<?php
  require_once("templat/header.php");
  ?>
<div id="main-container" class="container-fluid">

  <h2 class="section-title">Novos filmes</h2>
  <p class="section-description">Aqui você pode ver as criticas dos filmes adicionados</p>

  <div class="movies-container">
    <div class="movie-card">
      <div class="card-img-top" style="background-image: url('<?= $BASE_URL?>/img/movies/capafilme.jpg');"></div>

      <div class="card-body">
        <p class="card-rating">
          <i class="fas fa-star"></i>  
          <span class="rating">10</span>
      </p>
      <h5 class="card-title">
        <a href="#"> Titulo do filme</a>
      </h5>
      <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
      <a href="#" class="btn btn-primary card-btn">Conhecer</a>
      </div>
    </div> 
  </div>

  <h2 class="section-title">Ação</h2>
  <p class="section-description">Melhores filmes de ação</p>

  <div class="movies-container"></div>


  <h2 class="section-title">Terror</h2>
  <p class="section-description">Melhores filmes de Terror</p>

  <div class="movies-container"></div>


</div>

<?php 
  require_once("templat/footer.php");
?>