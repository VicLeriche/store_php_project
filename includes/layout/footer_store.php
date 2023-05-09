    
    <script>
        const checkCart = localStorage.getItem("cart");
        if(!checkCart){
            localStorage.setItem("cart", "[]");
        }
        const articles = <?=json_encode($products ?? []); ?>
    </script>   
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>  
    <script src="assets/js/main.js"></script>  
  </body>
</html>
