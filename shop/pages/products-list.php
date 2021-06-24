<?php
    // if che previene dall'accesso diretto dell'url da parte di qualche simpaticone
    if (! defined('ROOT_URL')) {
        die;
        }

    $productMgr = new ProductManager();
    $products = $productMgr->getAll();
    // $products = null;
    // var_dump($products);
?>


<div class="row">
    <?php if($products) : ?>
        <?php foreach($products as $product) : ?>

        <!-- <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product->name ?></h5>
                <h6 class="card-dubtitle mb-2 text-muted"><?php echo $product->price ?> €</h6>
                <p class="card-text"><?php echo $product->description ?></p>
                <a href="<?php echo ROOT_URL . 'shop?page=view-product&id=' . $product->id ?>" class="card-link">Vedi &raquo;</a>
            </div>
        </div> -->

        <div class="product-card card mb-3 col-md-3 col-6" >
            <div class="card-header bg-dark text-light rounded-0">
                <?php echo $product->name; ?>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                <?php echo $product->description; ?>
                <small class="text-muted right"><?php echo $product->price; ?> €</small>
                </li>
            </ul>
            <div class="footer">
                <div class="product-actions">
                <button class="btn btn-secondary btn-sm btn-block rounded-0" onclick="location.href='<?php echo ROOT_URL . 'shop?page=view-product&id=' . $product->id; ?>'">Vedi</button>
                <!--<a class="btn btn-outline-primary btn-sm" href="#">Aggiungi al carrello</a>-->
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                    <input name="add_to_cart" type="submit" class="btn btn-primary btn-sm btn-block rounded-0" value="Aggiungi al carrello">
                </form>
                </div>
            </div>
        </div>


        <?php endforeach; ?>
    <?php else : ?>
        <p>Nessun prodotto disponibile</p>
    <?php endif; ?>
</div>


