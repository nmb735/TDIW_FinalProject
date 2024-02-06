/*document.addEventListener("DOMContentLoaded", function () {
  function updateBadge() {
      const sbIconBadge = document.getElementById("sb-badge-home-page");
      const badgeValue = parseInt(sbIconBadge.innerHTML, 10);
      console.log("Update Value FUnction Started");

      if (badgeValue > 0) {
        console.log("Don't show");
          sbIconBadge.classList.remove("not-active-sb-badge-home-page");
          sbIconBadge.classList.add("active-sb-badge-home-page");
          console.log("ENd");
      } else {
        console.log("Show");
          sbIconBadge.classList.remove("active-sb-badge-home-page");
          sbIconBadge.classList.add("not-active-sb-badge-home-page");
          console.log("ENd");
      }
      console.log("End Function");
  }
  function updateBadgeValue(newValue){
    document.getElementById("sb-badge-home-page").innerHTML = newValue;
    updateBadge();
  }
  updateBadge();
});*/

function showCustomPopup(message, type) {
  const popupContainer = document.getElementById('custom-popup-container');
  const popup = document.getElementById('custom-popup');
  const className = type === 'success' ? 'success-popup' : (type === 'info' ? 'info-popup' : 'error-popup');

  popup.className = `custom-popup ${className}`;
  popup.innerHTML = message;

  const closeBtn = document.createElement('span');
  closeBtn.innerHTML = '&times;';
  closeBtn.classList.add('close-btn');
  closeBtn.onclick = function () {
      popupContainer.style.display = 'none';
  };
  popup.appendChild(closeBtn);

  popupContainer.style.display = 'block';
}

function addedToCart(){
  const message = 'Item added to cart successfully!';
  showCustomPopup(message, 'success');
  return true;
}

function fetchData(category_id) {
  fetch("../controller/product_list.php?category=" + category_id)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((html) => {
      document.getElementById("product_list").innerHTML = html;
    })
    .catch((error) => {
      console.log(
        "There was a problem with the fetch operation:",
        error.message
      );
    });
}

function fetchProductData(reference) {
  console.log(reference);

  fetch("../controller/product_detail.php?reference=" + reference)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((html) => {
      document.getElementById("product_list").innerHTML = html;
    })
    .catch((error) => {
      console.log(
        "There was a problem with the fetch operation:",
        error.message
      );
    });
}

function fetchEmptyCart() {
  fetch("../controller/emptyCart.php")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((html1) => {
      document.getElementById("id-shopping-cart-container").innerHTML = html1;
    })
    .catch((error) => {
      console.log(
        "There was a problem with the fetch operation:",
        error.message
      );
    });  
}

function deleteProduct(product_id) {
  console.log("deleted product (js1): " + product_id)
  fetch("../controller/removeFromCart.php?product_id=" + product_id)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((html) => {
      console.log(html)
      document.getElementById("id-shopping-cart-container").innerHTML = html;
    })
    .catch((error) => {
      console.log(
        "There was a problem with the fetch operation:",
        error.message
      );
    });
}

//No funciona, elimina les barres entre el domini i el recurs por la cara
function logOut() {
  fetch("../controller/log_out.php")
  .then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    return response.text();
  })
  .then((html) => {
    // Change the URL to the desired destination
    window.location.href = "http://tdiw-d3.deic-docencia.uab.cat/index.php";
  })
  .catch((error) => {
    console.log(
      "There was a problem with the fetch operation:",
      error.message
    );
  }); 
}

function fetchProductInfo() {
  const quantity = document.querySelector(".quantity-input").value;
  console.log("Quantity: " + quantity);
  const priceString = document.getElementById("product-price-pd").innerText;
  const price = parseInt(priceString, 10);
  console.log("Price: " + price);
  const referenceElement = document.querySelector("h2.headers-home-page.h2-pd");
  const reference = referenceElement ? referenceElement.getAttribute("id") : "";
  console.log("Reference: " + reference);
  const selectedSize =
    document.querySelector(".selected-size")?.innerText || "";
  console.log("Size: " + selectedSize);
  if(selectedSize == ""){
    showCustomPopup("Please select a size.", 'info');
    return false;
  }
  else{
    fetch(
      "../controller/addToCart.php?quantity=" +
        quantity +
        "&price=" +
        price +
        "&reference=" +
        reference +
        "&selectedSize=" +
        selectedSize
    )
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((html) => {
        document.getElementById("cart-list").innerHTML = html;
        showCustomPopup("Item added to cart!", "success");
      })
      .catch((error) => {
        console.log(
          "There was a problem with the fetch operation:",
          error.message
        );
      });
    fetch("../controller/quantity.php")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((html) => {
        document.getElementById("sb-badge-home-page").innerHTML = html;
        updateBadge();
      })
      .catch((error) => {
        console.log(
          "There was a problem with the fetch operation:",
          error.message
        );
      });
  }
}

function updateUserName() {
  const newUserName = document.getElementById("new-user-name").value;
  console.log(newUserName);

  const nameRegex = /^[A-Za-z\s]+$/;

  if (!newUserName.match(nameRegex)) {
    showCustomPopup("ERROR 1 : Username should contain only letters and spaces.", 'error');
    return false;
  } else {
    console.log("fetch start");
    fetch("../controller/changeUserName.php?username=" + newUserName)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((html) => {
        console.log("html generated");
        document.getElementById("current-user-name").innerHTML = html;
      })
      .catch((error) => {
        console.log(
          "There was a problem with the fetch operation:",
          error.message
        );
      });
  }
}

function updateEmail() {
  const newEmail = document.getElementById("new-email").value;
  console.log(newEmail);

  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  if (!newEmail.match(emailRegex)) {
    showCustomPopup("ERROR 2 : Please enter a valid email address.", 'error');
    return false;
  } else {
    console.log("fetch start");
    fetch("../controller/changeEmail.php?email=" + newEmail)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((html) => {
        console.log("html generated");
        document.getElementById("current-email").innerHTML = html;
      })
      .catch((error) => {
        console.log(
          "There was a problem with the fetch operation:",
          error.message
        );
      });
  }
}

function updateAddress() {
  const newAddress = document.getElementById("new-address").value;
  console.log(newAddress);

  if (newAddress.length > 30) {
    showCustomPopup("ERROR 4 : Address should contain up to 30 characters.", 'error');
    return false;
  } else {
    console.log("fetch start");
    fetch("../controller/changeAddress.php?address=" + newAddress)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((html) => {
        console.log("html generated");
        document.getElementById("current-address").innerHTML = html;
      })
      .catch((error) => {
        console.log(
          "There was a problem with the fetch operation:",
          error.message
        );
      });
  }
}

function updateCity() {
  const newCity = document.getElementById("new-city").value;
  console.log(newCity);
  if (newCity.length > 30) {
    showCustomPopup("ERROR 5 : City should contain up to 30 characters.", 'error');
    return false;
  } else {
    console.log("fetch start");
    fetch("../controller/changeCity.php?city=" + newCity)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((html) => {
        console.log("html generated");
        document.getElementById("current-city").innerHTML = html;
      })
      .catch((error) => {
        console.log(
          "There was a problem with the fetch operation:",
          error.message
        );
      });
  }
}

function updateZipCode() {
  const newZipCode = document.getElementById("new-zip-code").value;
  console.log(newZipCode);

  const postalCodeRegex = /^\d{5}$/;

  if (!newZipCode.match(postalCodeRegex)) {
    showCustomPopup("ERROR 6 : Postal code should contain 5 digits.", 'error');
    return false;
  } else {
    console.log("fetch start");
    fetch("../controller/changeZipCode.php?zip_code=" + newZipCode)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((html) => {
        console.log("html generated");
        document.getElementById("current-zip-code").innerHTML = html;
      })
      .catch((error) => {
        console.log(
          "There was a problem with the fetch operation:",
          error.message
        );
      });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const hamburguer = document.querySelector(".hamburguer");
  const navMenu = document.querySelector(".nav-menu");

  hamburguer.addEventListener("click", () => {
    hamburguer.classList.toggle("active");
    navMenu.classList.toggle("active");
  });

  document.querySelectorAll(".category-button").forEach((button) => {
    button.addEventListener("click", () => {
      hamburguer.classList.remove("active");
      navMenu.classList.remove("active");
    });
  });
});

function toggleMenu() {
  var userMenu = document.getElementById("user-menu");
  userMenu.classList.toggle("active");
}

document.addEventListener("click", function (event) {
  var userIcon = document.getElementById("user-icon");
  var userMenu = document.getElementById("user-menu");

  if (!userIcon.contains(event.target) && !userMenu.contains(event.target)) {
    userMenu.classList.remove("active");
  }
});

document
  .getElementById("user-menu")
  .addEventListener("click", function (event) {
    event.stopPropagation();
  });

function toggleShoppingCart() {
  var sb = document.getElementById("shopping-cart-menu");
  sb.classList.toggle("active");
}

document.addEventListener("click", function (event) {
  var userIcon = document.getElementById("sb-icon-img");
  var userMenu = document.getElementById("shopping-cart-menu");

  if (!userIcon.contains(event.target) && !userMenu.contains(event.target)) {
    userMenu.classList.remove("active");
  }
});

document
  .getElementById("shopping-cart-menu")
  .addEventListener("click", function (event) {
    event.stopPropagation();
  });

function validateForm() {
  const username = document.forms["registerForm"]["newUserName"].value;
  const email = document.forms["registerForm"]["newUserEmail"].value;
  const password = document.forms["registerForm"]["newUserPassword"].value;
  const address = document.forms["registerForm"]["newUserAddress"].value;
  const city = document.forms["registerForm"]["newUserCity"].value;
  const postalCode = document.forms["registerForm"]["newUserPostalCode"].value;

  // Regular expressions for validation
  const nameRegex = /^[A-Za-z\s]+$/;
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  const passwordRegex = /^[A-Za-z0-9]+$/;
  const postalCodeRegex = /^\d{5}$/;

  if (!username.match(nameRegex)) {
    console.log(username + ' incorrect!');
    showCustomPopup("ERROR 1 : Username should contain only letters and spaces.", 'error');
    return false;
  }

  if (!email.match(emailRegex)) {
    console.log(email + ' incorrect!');
    showCustomPopup("ERROR 2 : Please enter a valid email address.", 'error');
    return false;
  }

  if (!password.match(passwordRegex)) {
    console.log(password + ' incorrect!');
    showCustomPopup("ERROR 3 : Password should be alphanumeric.", 'error');
    return false;
    
  }

  if (address.length > 30) {
    console.log(address + ' incorrect!');
    showCustomPopup("ERROR 4 : Address should contain up to 30 characters.", 'error');
    return false;
  }

  if (city.length > 30) {
    console.log(city + ' incorrect!');
    showCustomPopup("ERROR 5 : City should contain up to 30 characters.", 'error');
    return false;
  }

  if (!postalCode.match(postalCodeRegex)) {
    console.log(postalCode + ' incorrect!');
    showCustomPopup("ERROR 6 : Postal code should contain 5 digits.", 'error');
    return false;
  }

  return true;
}

function validateFormLogIn() {
  const email = document.forms["logInForm"]["email"].value;
  const password = document.forms["logInForm"]["password"].value;

  // Regular expressions for validation
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  const passwordRegex = /^[A-Za-z0-9]+$/;

  if (!email.match(emailRegex)) {
    showCustomPopup("ERROR 1 : Please enter a valid email address.", 'error');
    return false;
  }

  if (!password.match(passwordRegex)) {
    showCustomPopup("ERROR 2 : Password should be alphanumeric.", 'error');
    return false;
  }

  return true;
}

function selectSize(element) {
  const sizes = document.querySelectorAll(".size");
  sizes.forEach((size) => size.classList.remove("selected-size"));
  element.classList.add("selected-size");
}

function incrementQuantity() {
  const quantityInput = document.querySelector(".quantity-input");
  quantityInput.value = parseInt(quantityInput.value) + 1;
}

function decrementQuantity() {
  const quantityInput = document.querySelector(".quantity-input");
  if (parseInt(quantityInput.value) > 1) {
    quantityInput.value = parseInt(quantityInput.value) - 1;
  }
}

function fetchUpdatedProducts(inputElement) {
  const productId = inputElement.dataset.productid;
  console.log(productId);
  id = "update-product-quantity-" + productId;
  const newQuantity = document.getElementById(id).value;
  console.log("Product ID: " + productId);
  console.log("New Quantity: " + newQuantity);

  if(newQuantity >= 1){
      fetch(
        '../controller/updateQuantity.php?productId=' + productId + '&quantity=' + newQuantity
    )
    .then((response) => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.text();
    })
    .then((html) => {
        console.log(html);
        document.getElementById("id-shopping-cart-container").innerHTML = html;
        showCustomPopup("Quantity updated correctly", "info");
    })
    .catch((error) => {
        console.log(
            "There was a problem with the fetch operation:",
            error.message
        );
    });

  }
else{
  showCustomPopup("Please insert a number equal or larger to 1", "error");
}

}

