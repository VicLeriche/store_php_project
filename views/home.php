<main>
  <div class="position-relative text-white overflow-hidden p-3 p-md-5 mb-4 text-center">
    <div class="col-md-6 p-lg-6 mx-auto my-5 shop-now">
      <h1 class="fw-normal text-uppercase">New blanks just dropped</h1>
      <p class="lead py-4">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
      <a class="btn btn-theme mt-3 text-uppercase" href="#shop">shop now</a>
    </div>
    <div class="overlay position-absolute"></div>
    <div class="bg-overlay position-absolute">
      <img src="./assets/img/collection.jpg" alt="">
    </div>
  </div>

  <div class="row">
    <?php if($products && count($products)){ ?>
        <?php foreach($products as $product){ ?>
            <div class="col-md-4 col-lg-4 col-12 article position-relative mb-4">
                <div class="article-img">
                    <img src="<?=BASE_URL_IMAGE.$product->image?>" alt="">
                </div>
                <div class="article-overlay position-absolute d-flex flex-column justify-content-center align-items-center p-5 text-white">
                    <p class="article-title mb-3"><?=$product->name?></p>
                    <p class="article-desc"><?=$product->desc?></p>
                    <div class="cta d-flex justify-content-between align-items-center w-100 mt-5">
                        <p class="article-price"><?=$product->price?> €</p>
                        <a class="btn btn-theme" href="javascript:void(0)" onclick="add_in_cart(<?=$product->id?>)"><i class="fa-solid fa-plus"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        <?php } } else{ ?>
        <h4 class='text-center'>Aucun artcile disponible</h4>
    <?php } ?>
  </div>
</main>