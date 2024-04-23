function smoothScroll(target) {
    const element = document.querySelector(target);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}
function openPopup() {
    if (cart.length!=0){
    var popup = document.getElementById('popup');
    popup.style.display = 'flex'; // Show the pop-up
  }}
  
  // Function to close the pop-up
  function closePopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'none'; // Hide the pop-up
  }
  
  // Add event listener to the open button
  document.getElementById('openPopup').addEventListener('click', openPopup);
  
  // Add event listeners to the buttons inside the pop-up
  document.getElementById('confirmOrder').addEventListener('click', function() {
    closePopup();
    cartItemsEl.innerHTML = "";
    cart=[];
    updateCart();
    alert("Order Confirmed!"); // Example action
  });
  
  document.getElementById('cancelOrder').addEventListener('click', closePopup);
  
//test json to alert
function updateOrder() {
    updateCart();
    let concatenatedNames = "";
    for (let i = 0; i < cart.length; i++) {
  if (i > 0) {
    concatenatedNames += ", "; 
  }
  concatenatedNames += cart[i].numberOfUnits+'x'+cart[i].name;
}
    const orderIdElement = document.getElementById("orderid");
    const itemsElement = document.getElementById("items");

    // Update the content
    orderIdElement.textContent = 'Order ID: 13 '; // Set the new order ID
    itemsElement.textContent = `Items: ${concatenatedNames}`; // Set the new item name
}
updateOrder();