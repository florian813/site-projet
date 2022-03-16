<div id='product'>
    <?php foreach ($params["product"] as $d) { ?>
    <div>
        <div class='product-images'>
            <img src='/public/images/<?= $d["image"] ?>' id='imageAgrandie'/>
            <div class='product-miniatures'>
                <div>
                    <img src='/public/images/<?= $d["image"] ?>' id='image1'/>
                </div>
                <div>
                    <img src='/public/images/<?= $d["image_alt1"] ?>' id='image2'/>
                </div>
                <div>
                    <img src='/public/images/<?= $d["image_alt2"] ?>' id='image3'/>
                </div>
                <div>
                    <img src='/public/images/<?= $d["image_alt3"] ?>' id='image4'/>
                </div>
            </div>
        </div>
        <div class='product-infos'>
            <p class='product-category'>
                <?= $d["namecat"] ?></p>
            <h1><?= $d["name"] ?></h1>
            <p class="product-price">
                <?= $d["price"] ?> €</p>
            <form method="post" action="/cart/add">
                <button type='button' id='moins'>-</button>
                <button type='button' id='quantité'>1</button>
                <button type='button' id='plus'>+</button>
                <input type='submit' id='ajouter' value='Ajouter au panier'/>
                <div class="box error" id="divMax" style="visibility:hidden;">
                    Quantité maximale autorisée !
                </div>
            </form>
        </div>
    </div>
    <div>
        <div class='product-spec'>
            <h2>Spécificités</h2>
            <?= $d["spec"] ?>
        </div>
        <?php } ?>
        <div class='product-comments'>
            <h2>Avis</h2>
            <?php foreach ($params["comments"] as $com) {?>
            <div class="product-comment">
                <p class="product-comment-author"><?= $com["firstname"] ?> <?= $com["lastname"] ?></p>
                <p>
                    <?= $com["content"] ?>
                </p>
            </div>
            <?php } ?>
            <?php if(isset($_SESSION["firstname"])){?>
            <form class="account-signin" method="post" action="/postComment">
            <input type="text" name="writecomment" placeholder="Rédiger un commentaire"/>
            </form><?php }?>
        </div>
    </div>
</div>

<script src='/public/scripts/product.js'></script>
