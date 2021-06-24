
<?php

// if che previene dall'accesso diretto dell'url da parte di qualche simpaticone
if (! defined('ROOT_URL')) {
die;
}

// se non si mette un id nel url allora tornerà alla homepage
if (!isset($_GET['id'])) {
    echo "<script>location.href='".ROOT_URL."';</script>";
    exit;
  } 

$id = htmlspecialchars(trim($_GET['id']));

$pm = new ProductManager();
$product = $pm->get($id);

// var_dump($product);

// se l'id non esiste allora tornerà alla homepage
if (! (property_exists($product, 'id')) ) {
    echo "<script>location.href='".ROOT_URL."';</script>";
    exit;
}
?>

<div class="jumbotron">
  <h1 class="display-5"><?php echo $product->name; ?></h1>
  <p class="lead">Prezzo: <?php echo $product->price; ?> €</p>
  <hr class="my-4">
  <p><?php echo $product->description; ?></p>
  <p class="lead p-3">
    <form method="post">
      <input name="id" type="hidden" value="<?php echo $product->id; ?>">
      <input name="add_to_cart" type="submit" class="btn btn-primary right" value="Aggiungi al carrello">
    </form>   
  </p>
</div>