let orderid;
if(localStorage.getItem("orderid")==null){
  !localStorage.setItem("orderid",0)
  orderid=0;
}
else{
  orderid = JSON.parse(localStorage.getItem("orderid"));
}
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
    orderid++;
    localStorage.setItem("orderid",orderid);
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
    orderIdElement.textContent = `Order ID: ${orderid}`; // Set the new order ID
    itemsElement.textContent = `Items: ${concatenatedNames}`; // Set the new item name
}
updateOrder();
function setHiddenFormValues() {
    let concatenatedNames = "";
    for (let i = 0; i < cart.length; i++) {
  if (i > 0) {
    concatenatedNames += ", "; 
  }
  concatenatedNames += cart[i].numberOfUnits+'x'+cart[i].name;
}
    document.getElementById("hiddenField1").value = orderid; // Set hidden field value
    document.getElementById("hiddenField2").value = userId; 
    document.getElementById("hiddenField3").value = new Date().toISOString();
    document.getElementById("hiddenField4").value = concatenatedNames; 
    cartItemsEl.innerHTML = "";
    cart=[];
    updateCart();
}

document.querySelector('.submitButton').addEventListener("click", function() {
    setHiddenFormValues(); // Function to set hidden field values
    document.querySelector('#hiddenForm').submit(); // Submit the form by ID
});