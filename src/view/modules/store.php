<div id="store">

<!-- Filtrer l'affichage des produits  ---------------------------------------->

<form method="post" action="/search">

  <h4>Rechercher</h4>
  <input type="text" name="search" placeholder="Rechercher un produit" />

  <h4>Catégorie</h4>
  <?php foreach ($params["categories"] as $c) { ?>
    <input type="checkbox" name="category" value="<?= $c["name"] ?>" />
    <?= $c["name"] ?>
    <br/>
  <?php } ?>

  <h4>Prix</h4>
  <input type="radio" name="order" value="croissant"/> Croissant <br />
  <input type="radio" name="order" value="decroissant"/> Décroissant <br />

  <div><input type="submit" value="Appliquer" /></div>

</form>

<!-- Affichage des produits --------------------------------------------------->

<div class="products">

<!-- TODO: Afficher la liste des produits ici -->
    <?php
    foreach ($params["products"] as $p) {
        echo "
    <div class='card'>
        <p class='card-image'>
            <img src='/public/images/$p[image]'>
        </p>
        <p class='card-category'>$p[namecat]</p>
        <p class='card-title'>
            <a href='/store/$p[id]'>
                $p[name]
            </a>
        </p>
        <p class='card-price'>
            $p[price] €
        </p>
        

</div>";
    }?>
</div>
</div>