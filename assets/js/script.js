const $cartLink = document.querySelector(".cart");
const $cart = document.querySelector("#cart");
const $card = document.querySelector("#card");
const $shop = document.querySelector("#shop");
const $count_articles_cart = document.querySelector("#count-articles-cart");

if($cartLink){
    $cartLink.addEventListener('click', (e)=>{
        e.preventDefault();
        $cart.classList.toggle('show');
    })
}

function add_in_cart(id){
    const cart = JSON.parse(localStorage.getItem("cart"));
    const found = cart.find(item => item.id == id);

    if(found){
        cart.map(item=>{
            if(item.id == found.id){
                item.quantity += 1;
            }
        })
    } else {
        cart.push({
            id,
            quantity: 1
        })
    }
    
    localStorage.setItem("cart", JSON.stringify(cart));
    createCookie("purchase", JSON.stringify(cart), '10');
    init_cart();
}

function delete_artcile_in_cart(id){
    const cart = JSON.parse(localStorage.getItem("cart"));
    const new_cart = cart.filter(item => item.id != id)
    
    init_cart();
    localStorage.setItem("cart", JSON.stringify(new_cart));
    createCookie("purchase", JSON.stringify(new_cart), '10');

}

function init_cart(){
    const cart = JSON.parse(localStorage.getItem("cart"));
    let count = 0;

    cart.map(item=>{
        count += item.quantity
    })

    display_notification(count);
    display_artciles_in_cart(cart);
}

function display_notification(count) {
    if(count){
        $count_articles_cart.innerHTML = `
            <span>${count}</span>
        `
    } else {
        $count_articles_cart.innerHTML = ""
    }
}

function display_artciles_in_cart(cart) {
    if(!cart.length){
        display_empty()
    } else {
        let total_price = 0;
        let artciles_html = '';
        cart.map(item => {
            const article = articles.find(element => element.id == item.id);
            total_price += article.price * item.quantity;
            artciles_html += `
                <div class="d-flex border-bottom pb-2 mb-2">
                    <div class="col-2 illustration">
                        <img class="img" src="assets/img/articles/${article.image}" alt="">
                    </div>
                    <div class="col-8 px-2">${article.name}</div>
                    <div class="col-2 text-center d-flex flex-column">
                        <strong>${article.price}€</strong>
                        <a href="javascript:void(0)" onclick="delete_artcile_in_cart(${item.id})" class="text-danger"> <i class="fa fa-trash"></i></a>
                        <strong>X${item.quantity}</strong>
                    </div>
                </div>
            `
        })    
    
        $card.innerHTML = `
            <div class="card-body pb-5 mb-3">${artciles_html}</div>
            <div class="card-footer position-absolute d-flex justify-content-between align-items-center">
                <div class="mt-3">
                    <a class="btn btn-primary" onclick="return confirm('Confirmez-vous la validation la commande ?');" href="?p=purchase">Passer à l'achat</a>
                </div>
                <div>
                    <p>Prix total</p>
                    <h5 class="price">${total_price}€</h5>   
                </div>
            </div>
        `
    }
}


function display_empty(){
    $card.innerHTML = `
        <p class="text-center pt-3"><em>Vous n'avez pas d'articles dans le panier</em></p>
    `
}

function createCookie(name, value, days) {
    let expires;
      
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

init_cart();
