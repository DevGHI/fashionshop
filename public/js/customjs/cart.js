

 var expiryDate = new Date();
 expiryDate.setMonth(expiryDate.getMonth() + 1);
show_count();
function add_to_cart(id){
    event.preventDefault();
    var arr=JSON.parse(CookieUtil.get("cart"));
    		// console.log(arr);
    if (arr==null) {
        console.log("new arr");
        arr=[];
        arr.push(id);
         CookieUtil.set("cart",JSON.stringify(arr),expiryDate,'/');
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Add To Cart Succes!.',
            showConfirmButton: false,
            timer: 1500
        })

    }
    else{
        console.log('old arr');
        if(arr.includes(id)===false){    				
            arr.push(id);   			
             CookieUtil.set("cart",JSON.stringify(arr),expiryDate,'/');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Add To Cart Succes!.',
                showConfirmButton: false,
                timer: 1500
            })
        }
        else{
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Already Add.',
                showConfirmButton: false,
                timer: 1500
            })
        }
    }
    show_count();
}


function show_count(){

    var cart_count2=document.querySelector('.cart_count2')
    var cart_count=document.querySelector('.cart_count')
    var arr=JSON.parse(CookieUtil.get("cart"));
    cart_count.innerHTML=arr.length;
    cart_count2.innerHTML=arr.length;
}


function show_cart(){
    var cart_item=document.getElementById('cart_item');
    var products=CookieUtil.get('cart');
    axios.post(domain+"api/cart_detail",{
        'products':products
    })
    .then(res=>{
        console.log(res);
        var arr=res.data;
        var total=0;
        cart_item.innerHTML='';
        arr.forEach(product => {
            total+=parseInt(product['price']);
            // console.log(product['price']);
            cart_item.innerHTML+=`
                <div class="single-cart-item">
                    <a href="product/${product['id']}" class="product-image">
                        <img src="${product['photo'][0]['photo_url']}" class="cart-thumb" style="height:300px;object-fit:cover">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove" onclick="delete_cart(${product['id']})"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">${product['subcategory']['name']}</span>
                            <h6>${product['name']}</h6>
                            <p class="price">${product['price']} MMK</p>
                        </div>
                    </a>
                </div>
            `;
        });
       
        document.getElementById('subtotal').innerHTML=total+' MMK'; 
        document.getElementById('total').innerHTML=total+' MMK';
    })
    .catch(err=>{
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'System Error',
            showConfirmButton: false,
            timer: 1500
        }) 
    })
}



function delete_cart(id){
    event.preventDefault();
    // alert(id);
console.log('hello');
 var arr = JSON.parse(CookieUtil.get("cart"));
     removeElement(arr, id);
   CookieUtil.set("cart",JSON.stringify(arr),expiryDate,'/');
    show_cart();
    show_count();

}
function removeElement(array, elem) {
    var index = array.indexOf(elem);
    if (index > -1) {
        array.splice(index, 1);
    }
}

function calculate_bill(){

}