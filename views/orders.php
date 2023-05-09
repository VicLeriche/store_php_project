<main class="mt-5">
    <div class="container">
        <h3>Mes commandes</h3>

        <div class="mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">nom du produit</th>
                    <th scope="col">prix</th>
                    <th scope="col">date de l'achat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pur->getAllPurchases() as $p){ ?>
                        <tr>
                            <th scope="row">
                                <img src="<?=BASE_URL_IMAGE.$p->image?>" width="70" height="60" alt="">
                            </th>
                            <td><?=$p->name?></td>
                            <td><?=$p->price?> €</td>
                            <td><?=$p->order_date?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>