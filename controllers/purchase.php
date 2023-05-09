<?php 

include("init.php");

$cart = json_decode($_COOKIE['purchase'], true);

for ($i=0; $i < count($cart); $i++) { 
    for ($j=0; $j < $cart[$i]['quantity']  ; $j++) { 
        $dataForm = array(
			'use_id' => $_SESSION['usr_id'],
			'prod_id' => $cart[$i]['id']
		);
        $pur->createPurchases($dataForm);
    }
}
unset($_COOKIE);
?>
<script type="text/javascript">
    localStorage.clear();
    alert("Merci d'avoir passé la commande")
    location.href='../';
</script>
<?php 
include("close.php");

?>