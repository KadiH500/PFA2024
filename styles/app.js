// SELECT ELEMENTS
const productsEl = document.querySelector(".products1");
const productsEl2 = document.querySelector(".products2");
const productsEl3 = document.querySelector(".products3");
const productsEl4 = document.querySelector(".products4");
const cartItemsEl = document.querySelector(".cart-items");
const subtotalEl = document.querySelector(".subtotal");
const totalItemsInCartEl = document.querySelector(".total-items-in-cart");
// RENDER PRODUCTS
function renderProdcuts1() {
  products.forEach((product) => {
    if (product.instock!= 0) {
    productsEl.innerHTML += `
            <div class="item">
                <div class="item-container">
                    <div class="item-img">
                        <img src="${product.imgSrc}" alt="${product.name}">
                    </div>
                    <div class="desc">
                        <h2>${product.name}</h2>
                        <h2><small>$</small>${product.price}</h2>
                        <p>
                            ${product.description}
                        </p>
                    </div>
                    <div class="add-to-cart" onclick="addToCart(${product.id})">
                        <img src="./icons/bag-plus.png" alt="add to cart">
                    </div>
                </div>
            </div>
        `;
  }});
}
function renderProdcuts2() {
    products2.forEach((product) => {
      if (product.instock!= 0) {
      productsEl2.innerHTML += `
              <div class="item">
                  <div class="item-container">
                      <div class="item-img">
                          <img src="${product.imgSrc}" alt="${product.name}">
                      </div>
                      <div class="desc">
                          <h2>${product.name}</h2>
                          <h2><small>$</small>${product.price}</h2>
                          <p>
                              ${product.description}
                          </p>
                      </div>
                      <div class="add-to-cart" onclick="addToCart(${product.id})">
                          <img src="./icons/bag-plus.png" alt="add to cart">
                      </div>
                  </div>
              </div>
          `;
    }});
  }
  function renderProdcuts3() {
    products3.forEach((product) => {
      if (product.instock!= 0) {
      productsEl3.innerHTML += `
              <div class="item">
                  <div class="item-container">
                      <div class="item-img">
                          <img src="${product.imgSrc}" alt="${product.name}">
                      </div>
                      <div class="desc">
                          <h2>${product.name}</h2>
                          <h2><small>$</small>${product.price}</h2>
                          <p>
                              ${product.description}
                          </p>
                      </div>
                      <div class="add-to-cart" onclick="addToCart(${product.id})">
                          <img src="./icons/bag-plus.png" alt="add to cart">
                      </div>
                  </div>
              </div>
          `;
    }});
  }
  function renderProdcuts4() {
    products4.forEach((product) => {
      if (product.instock!= 0) {
      productsEl4.innerHTML += `
              <div class="item">
                  <div class="item-container">
                      <div class="item-img">
                          <img src="${product.imgSrc}" alt="${product.name}">
                      </div>
                      <div class="desc">
                          <h2>${product.name}</h2>
                          <h2><small>$</small>${product.price}</h2>
                          <p>
                              ${product.description}
                          </p>
                      </div>
                      <div class="add-to-cart" onclick="addToCart(${product.id})">
                          <img src="./icons/bag-plus.png" alt="add to cart">
                      </div>
                  </div>
              </div>
          `;
    }});
  }
//adds open class to panier
  function poof() 
  {var targetDiv = document.getElementById('panier');
  targetDiv.classList.toggle('open');
  }
// cart array
let cart;
if(localStorage.getItem("cart")==null){
  !localStorage.setItem("cart",[])
  cart=[];
}
else{
  cart = JSON.parse(localStorage.getItem("cart"));
}
updateCart();
// ADD TO CART
function addToCart(id) {
  // check if prodcut already exist in cart
  if (cart.some((item) => item.id === id)) {
    changeNumberOfUnits("plus", id);
  } else {
    const item = products.find((product) => product.id === id);

    cart.push({
      ...item,
      numberOfUnits: 1,
    });
  }

  updateCart();
}

// update cart
function updateCart() {
  renderCartItems();
  renderSubtotal();
  localStorage.setItem("cart",JSON.stringify(cart));

}

// calculate and render subtotal
function renderSubtotal() {
  let totalPrice = 0,
    totalItems = 0;

  cart.forEach((item) => {
    totalPrice += item.price * item.numberOfUnits;
    totalItems += item.numberOfUnits;
  });

  subtotalEl.innerHTML = `Subtotal (${totalItems} items): $${totalPrice.toFixed(2)}`;
  totalItemsInCartEl.innerHTML = totalItems;
}

// render cart items
function renderCartItems() {
  cartItemsEl.innerHTML = ""; // clear cart element
  cart.forEach((item) => {
    cartItemsEl.innerHTML += `
        <div class="cart-item">
            <div class="item-info" onclick="removeItemFromCart(${item.id})">
                <img src="${item.imgSrc}" alt="${item.name}">
                <h4>${item.name}</h4>
            </div>
            <div class="unit-price">
                <small>$</small>${item.price}
            </div>
            <div class="units">
                <div class="btn minus" onclick="changeNumberOfUnits('minus', ${item.id})">-</div>
                <div class="number">${item.numberOfUnits}</div>
                <div class="btn plus" onclick="changeNumberOfUnits('plus', ${item.id})">+</div>           
            </div>
        </div>
      `;
  });
}

// remove item from cart
function removeItemFromCart(id) {
  cart = cart.filter((item) => item.id !== id);

  updateCart();
}

// change number of units for an item
function changeNumberOfUnits(action, id) {
  cart = cart.map((item) => {
    let numberOfUnits = item.numberOfUnits;

    if (item.id === id) {
      if (action === "minus" && numberOfUnits > 1) {
        numberOfUnits--;
      } else if (action === "plus" && numberOfUnits < item.instock) {
        numberOfUnits++;
      }
    }

    return {
      ...item,
      numberOfUnits,
    };
  });

  updateCart();
}

  function fetchData() {
    fetch('./includes/fetch.php')
        .then(response => response.json()) // Parse the response as JSON
        .then(data => {
            // Example: Display product information
            const productList = document.getElementById('product-list');
            data.forEach(product => {
                const productElement = document.createElement('div');
                productElement.textContent = `${product.name} - ${product.price}`;
                productList.appendChild(productElement);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}

fetchData();
renderProdcuts4();
renderProdcuts1();
renderProdcuts2();
renderProdcuts3();