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

  <?php
  $cart = new Ler();
  $cart->Leitura('carrinho');
  ?>

  <div class="header">
    <p class="logo"><i class="fa fa-cc-mastercard"></i>Mini loja</p>
    <div class="cart">
      <p><i class="fa fa-shopping-cart"></i><?= $cart->getContaLinhas() > 0 ? $cart->getContaLinhas() : 0 ?></p>
    </div>
  </div>


  <div class="container">

    <div class="lista-produtos">
      <?php
      $ler = new Ler();
      $ler->Leitura('produtos', "ORDER BY data DESC");
      if ($ler->getResultado()) {
        foreach ($ler->getResultado() as $produto) {
          $produto = (object) $produto;
      ?>

          <form action="filtros/criar.php" method="POST">
            <div class="corpo-produto">
              <div class="imgProduto">
                <img src="<?= HOME ?>/uploads/<?= $produto->capa ?>" alt="" class="produtoMiniatura" />
              </div>
              <div class="titulo">
                <p><?= $produto->nome ?></p>
                <h2><?= $produto->valor ?></h2>
                <input type="hidden" name="id_produto" value="<?= $produto->id ?>" />
                <input type="hidden" name="valor" value="<?= $produto->valor ?>" />
                <button type="submit" name="addcarrinho" class="button">Adicionar ao Carrinho</button>
              </div>
            </div>
          </form>
      <?php
        }
      }
      ?>
    </div>
    <div class="barralateral">
      <div class="topcarrinho">
        <p>Meu Carrinho</p>
      </div>


      <?php
      if ($cart->getContaLinhas() > 0) {
        foreach ($cart->getResultado() as $carts) {


          $ler = new Ler();
          $ler->Leitura('produtos', "WHERE id = :id ORDER BY data DESC", "id={$carts['id_produto']}");
          if ($ler->getResultado()) {
            foreach ($ler->getResultado() as $produto) {
              $produto = (object) $produto;
      ?>

              <div class="item-carrinho">
                <div class="linhaImagem">
                  <img src="<?= HOME ?>/uploads/<?= $produto->capa ?>" alt="<?= $produto->nome ?>" class="img-carrinho" />
                </div>
                <p><?= $produto->nome ?></p>
                <h2><?= $produto->valor ?></h2>
                <form action="filtros/excluir.php" method="POST">
                  <input type="hidden" name="id_produto" value="<?= $produto->id ?>" />
                  <button type="submit" style="border: none; background:none;"><i style="color: white; cursor:pointer;" class="fa fa-trash-o"></i></button>
                </form>
              </div>

        <?php
            }
          }
        }
      } else {
        ?> <div class="carrinhovazio">Seu carrinho está vazio!</div>
      <?php
      }
      ?>

      <?php
        $totalCarrinho = new Ler();
        $totalCarrinho->LeituraCompleta("SELECT SUM(valor) as total FROM carrinho");
        if($totalCarrinho->getResultado()){
          $totalCompras = number_format($totalCarrinho->getResultado()[0]['total'], 2, ',',',');
        }else{
          $totalCompras = 0;
        }
      ?>

      <div class="rodape">
        <h3>Total: </h3>
        <h2 style="color: red;">R$ <?= $totalCompras ?></h2>
      </div>


    </div>

  </div>

</body>

</html>