<?php
ob_start();
require('./sheep_core/config.php');
?>

<!DOCTYPE html>
<html lang="pt-brs">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>Mini Loja PHP</title>
</head>

<body>

  <div class="header">
    <p class="logo"><i class="fa fa-cc-mastercard"></i>Mini loja</p>
    <div class="cart">
      <p><i class="fa fa-shopping-cart"></i>0</p>
    </div>
  </div>


  <div class="container">

    <div class="lista-produtos">
      <form action="filtros/criar.php" method="POST">
      <div class="corpo-produto">
        <div class="imgProduto">
          <img src="assets/img/produto1.jpg" alt="" class="produtoMiniatura"/>
        </div>
        <div class="titulo">
            <p>Curso DevOps</p>
            <h2>R$ 340,00</h2>
            <input type="hidden" name="id_produto" value="" />
            <input type="hidden" name="valor_produto" value="" />
            <button type="submit" name="addcarinho" class="button">Adicionar ao Carrinho</button>
        </div>
      </div>
      </form>

      <form action="filtros/criar.php" method="POST">
      <div class="corpo-produto">
        <div class="imgProduto">
          <img src="assets/img/produto2.jpg" alt="" class="produtoMiniatura"/>
        </div>
        <div class="titulo">
            <p>Curso Back And</p>
            <h2>R$ 920,00</h2>
            <input type="hidden" name="id_produto" value="" />
            <input type="hidden" name="valor_produto" value="" />
            <button type="submit" name="addcarinho" class="button">Adicionar ao Carrinho</button>
        </div>
      </div>
      </form>

      <form action="filtros/criar.php" method="POST">
      <div class="corpo-produto">
        <div class="imgProduto">
          <img src="assets/img/produto3.jpg" alt="" class="produtoMiniatura"/>
        </div>
        <div class="titulo">
            <p>Curso Block Chains</p>
            <h2>R$ 419,00</h2>
            <input type="hidden" name="id_produto" value="" />
            <input type="hidden" name="valor_produto" value="" />
            <button type="submit" name="addcarinho" class="button">Adicionar ao Carrinho</button>
        </div>
      </div>
      </form>

      <form action="filtros/criar.php" method="POST">
      <div class="corpo-produto">
        <div class="imgProduto">
          <img src="assets/img/produto1.jpg" alt="" class="produtoMiniatura"/>
        </div>
        <div class="titulo">
            <p>Curso Front End</p>
            <h2>R$ 523,00</h2>
            <input type="hidden" name="id_produto" value="" />
            <input type="hidden" name="valor_produto" value="" />
            <button type="submit" name="addcarinho" class="button">Adicionar ao Carrinho</button>
        </div>
      </div>
      </form>
    </div>
  </div>


</body>

</html>