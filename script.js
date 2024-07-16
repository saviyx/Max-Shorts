function myMenuFunction() {
  var i = document.getElementById("navMenu");

  if (i.className === "nav-menu") {
    i.className += " responsive";
  } else {
    i.className = "nav-menu";
  }
}

var a = document.getElementById("loginBtn");
var b = document.getElementById("registerBtn");
var x = document.getElementById("login");
var y = document.getElementById("register");

function login() {
  x.style.left = "4px";
  y.style.right = "-520px";
  a.className += " white-btn";
  b.className = "btn";
  x.style.opacity = 1;
  y.style.opacity = 0;
}

function register() {
  x.style.left = "-510px";
  y.style.right = "5px";
  a.className = "btn";
  b.className += " white-btn";
  x.style.opacity = 0;
  y.style.opacity = 1;
}

function adminlogin() {
  window.location = "adminlogin.php";
}

function loginA() {
  window.location = "login.php";
}

function user() {
  window.location = "user.php";
}

function home() {
  window.location = "home.php";
}

function cart() {
  window.location = "cart.php";
}

function shop() {
  window.location = "shop.php";
}

function order() {
  window.location = "orders.php";
}

function about() {
  window.location = "aboutUs.php";
}

function contact() {
  window.open("https://wa.me/+94761575788");
}

function dash() {
  window.location = "adminHome.php";
}

function userM() {
  window.location = "userManage.php";
}

function productM() {
  window.location = "productManage.php";
}
function onOrder() {
  window.location = "ordersOn.php";
}
function history() {
  window.location = "history.php";
}
function admMessage() {
  window.location = "admMessage.php";
}

function addproduct() {
  window.location = "addProduct.php";
}

function signin() {
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");

  var form = new FormData();
  form.append("e", email.value);
  form.append("p", password.value);
  form.append("r", rememberme.checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "success") {
        window.location = "home.php";
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("POST", "signInProcess.php", true);
  request.send(form);
}

var forgotPasswordModal;

function forgotPassword() {
  var email = document.getElementById("email2");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var text = request.responseText;

      if (text == "Success") {
        Swal.fire({
          title: "Sent",
          text: "Verification code has sent successfully. Please check your Email.",
          icon: "sucess",
        }).then((result) => {
          if (result.isConfirmed) {
            var modal = document.getElementById("fpmodal");
            forgotPasswordModal = new bootstrap.Modal(modal);
            forgotPasswordModal.show();
          }
        });
      } else {
        Swal.fire({
          title: "Done",
          text: text,
          icon: "sucess",
        });
      }
    }
  };

  request.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
  request.send();
}

function showPassword1() {
  var textfield = document.getElementById("np");
  var button = document.getElementById("npb");

  if (textfield.type == "password") {
    textfield.type = "text";
    button.innerHTML = "Hide";
  } else {
    textfield.type = "password";
    button.innerHTML = "Show";
  }
}

function showPassword2() {
  var textfield = document.getElementById("rnp");
  var button = document.getElementById("rnpb");

  if (textfield.type == "password") {
    textfield.type = "text";
    button.innerHTML = "Hide";
  } else {
    textfield.type = "password";
    button.innerHTML = "Show";
  }
}

function resetPassword() {
  var email = document.getElementById("email2");
  var newPassword = document.getElementById("np");
  var retypePassword = document.getElementById("rnp");
  var verification = document.getElementById("vcode");

  var form = new FormData();
  form.append("e", email.value);
  form.append("n", newPassword.value);
  form.append("r", retypePassword.value);
  form.append("v", verification.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        Swal.fire({
          title: "Update",
          text: "Password updated successfully.",
          icon: "sucess",
        }).then((result) => {
          if (result.isConfirmed) {
            forgotPasswordModal.hide();
          }
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("POST", "resetPasswordProcess.php", true);
  request.send(form);
}

function signup() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("f", fname.value);
  form.append("l", lname.value);
  form.append("e", email.value);
  form.append("p", password.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "success") {
        Swal.fire({
          title: "Done",
          text: "Registration Successfull",
          icon: "sucess",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "login.php";
          }
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("POST", "signupProcess.php", true);
  request.send(form);
}

function adminVerification() {
  var email = document.getElementById("e");

  var form = new FormData();
  form.append("e", email.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "Success") {
        Swal.fire({
          title: "Send",
          text: "Please take a look at your email to find the VERIFICATION CODE.",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            var adminVerificationModal =
              document.getElementById("verificationModal");
            av = new bootstrap.Modal(adminVerificationModal);
            av.show();
          }
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("POST", "adminVerificationProcess.php", true);
  request.send(form);
}

function verify() {
  var code = document.getElementById("vcode");

  var form = new FormData();
  form.append("c", code.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        av.hide();
        window.location = "userManage.php";
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("POST", "verificationProcess.php", true);
  request.send(form);
}

function addProductImg() {
  var img = document.getElementById("productimage");

  img.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);

    document.getElementById("img").src = url;
  };
}

function addProduct() {

  
  var category = document.getElementById("category");
  var colour = document.getElementById("colour");
  var type = document.getElementById("type");
  var size = document.getElementById("size");
  var qty = document.getElementById("qty");
  var price = document.getElementById("price");
  var dillevery = document.getElementById("dillevery");
  var image = document.getElementById("productimage");

  var form = new FormData();

  form.append("cat", category.value);
  form.append("co", colour.value);
  form.append("ty", type.value);
  form.append("s", size.value);
  form.append("qty", qty.value);
  form.append("price", price.value);
  form.append("de", dillevery.value);
  form.append("i", image.files[0]);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "Saved") {
        Swal.fire({
          title: "Product Aded",
          text: "Product Added successfully",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      } else if (response == "You have not selected any image.") {
        Swal.fire({
          title: "warning",
          text: "You have not selected any image.",
          icon: "warning",
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("POST", "addProductProcess.php", true);
  request.send(form);
}

function basicSearch(x) {
  var txt = document.getElementById("basic_search_txt");

  var form = new FormData();
  form.append("t", txt.value);
  form.append("page", x);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      document.getElementById("basicSearchResult").innerHTML = response;
    }
  };

  request.open("POST", "basicSearchProcess.php", true);
  request.send(form);
}

function addToCart(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      Swal.fire({
        title: "Done",
        text: response,
        icon: "sucess",
      });
    }
  };

  request.open("GET", "addToCartProcess.php?id=" + id, true);
  request.send();
}

function changeQTY(id) {
  var qty = document.getElementById("qty_num").value;

  if (qty < 0) {
    Swal.fire({
      title: "warning",
      text: "Not a Valid Quantity",
      icon: "warning",
    });
    window.location = "cart.php";
  } else {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if ((request.status == 200) & (request.readyState == 4)) {
        var response = request.responseText;
        if (response == "Updated") {
          window.location.reload();
        } else {
          Swal.fire({
            title: "warning",
            text: response,
            icon: "warning",
          });
        }
      }
    };

    request.open(
      "GET",
      "cartQtyUpdateProcess.php?qty=" + qty + "&id=" + id,
      true
    );
    request.send();
  }
}

function deleteFromCart(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "Removed") {
        Swal.fire({
          title: "Deleted",
          text: "Product removed from Cart.",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("GET", "deleteFromCartProcess.php?id=" + id, true);
  request.send();
}

function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var pcode = document.getElementById("pcode");

  var form = new FormData();

  form.append("f", fname.value);
  form.append("l", lname.value);
  form.append("m", mobile.value);
  form.append("l1", line1.value);
  form.append("l2", line2.value);
  form.append("pc", pcode.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "Updated") {
        Swal.fire({
          title: "Done",
          text: "Your Profile is Updated",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      } else {
        Swal.fire({
          title: "Invalid",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("POST", "updateProfileProcess.php", true);
  request.send(form);
}

function signout() {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        window.location = "login.php";
      }
    }
  };

  request.open("GET", "signOutProcess.php", true);
  request.send();
}

function check_value(qty) {
  var input = document.getElementById("qty_num");

  if (input.value <= 0) {
    Swal.fire({
      title: "Warning",
      text: "Quantity must be 01 or more.",
      icon: "warning",
    });
    input.value = 1;
  } else if (input.value > qty) {
    Swal.fire({
      title: "Warning",
      text: "Insufficient Quantity.",
      icon: "warning",
    });
    input.value = qty;
  }
}

function qty_inc(qty) {
  var input = document.getElementById("qty_input");

  if (input.value < qty) {
    var newValue = parseInt(input.value) + 1;
    input.value = newValue;
  } else {
    Swal.fire({
      title: "Warning",
      text: "Maximum quantity has achieved.",
      icon: "warning",
    });
    input.value = qty;
  }
}

function qty_dec() {
  var input = document.getElementById("qty_input");

  if (input.value > 1) {
    var newValue = parseInt(input.value) - 1;
    input.value = newValue;
  } else {
    Swal.fire({
      title: "Warning",
      text: "Minimum quantity has achieved.",
      icon: "warning",
    });
    input.value = 1;
  }
}

function payNow(id) {
  var qty = document.getElementById("qty_num").value;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      var obj = JSON.parse(response);
      console.log(obj);
      var mail = obj["umail"];
      var amount = obj["amount"];

      if (response == 1) {
        Swal.fire({
          title: "Please Login",
          text: "You need to be logged in to proceed with the payment.",
          icon: "info",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "login.php";
          }
        });
      } else if (response == 2) {
        Swal.fire({
          title: "Update Profile",
          text: "Please update your profile before making a purchase.",
          icon: "info",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "user.php";
          }
        });
      } else {
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);

          Swal.fire({
            title: "Payment Completed",
            text: "Payment completed. OrderID: " + orderId,
            icon: "success",
          }).then((result) => {
            if (result.isConfirmed) {
              saveInvoice(orderId, id, mail, amount, qty);
            }
          });
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          Swal.fire({
            title: "Payment Dismissed",
            text: "The payment window was closed. Please try again.",
            icon: "warning",
          });
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          Swal.fire({
            title: "Payment Error",
            text: "An error occurred during the payment process: " + error,
            icon: "error",
          });
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: obj["mid"], // Replace your Merchant ID
          return_url: "http://localhost/max/product.php?id=" + id, // Important
          cancel_url: "http://localhost/max/product.php?id=" + id, // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: amount + ".00",
          currency: "LKR",
          hash: obj["hash"], // *Replace with generated hash retrieved from backend
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          city: "Kurunegala",
          phone: obj["mobile"],
          address: obj["address"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        payhere.startPayment(payment);
      }
    }
  };

  request.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
  request.send();
}

function payNow2(p) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      var obj = JSON.parse(response);
      console.log(obj);
      var mail = obj["umail"];
      var amount = obj["amount"];

      if (response == 1) {
        Swal.fire({
          title: "Please Login",
          text: "You need to be logged in to proceed with the payment.",
          icon: "info",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "login.php";
          }
        });
      } else if (response == 2) {
        Swal.fire({
          title: "Update Profile",
          text: "Please update your profile before making a purchase.",
          icon: "info",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "user.php";
          }
        });
      } else {
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);
          Swal.fire({
            title: "Payment Completed",
            text: "Payment completed. OrderID: " + orderId,
            icon: "success",
          }).then((result) => {
            if (result.isConfirmed) {
              saveInvoice2(orderId, mail);
            }
          });
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          Swal.fire({
            title: "Payment Dismissed",
            text: "The payment window was closed. Please try again.",
            icon: "warning",
          });
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          Swal.fire({
            title: "Payment Error",
            text: "An error occurred during the payment process: " + error,
            icon: "error",
          });
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: obj["mid"], // Replace your Merchant ID
          return_url: "http://localhost/max/cart.php", // Important
          cancel_url: "http://localhost/max/cart.php", // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: amount + ".00",
          currency: "LKR",
          hash: obj["hash"], // *Replace with generated hash retrieved from backend
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          city: "Kurunegala",
          phone: obj["mobile"],
          address: obj["address"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        payhere.startPayment(payment);
      }
    }
  };

  request.open("GET", "buyNowProcess2.php?p=" + p, true);
  request.send();
}

function saveInvoice(orderId, id, mail, amount, qty) {
  var form = new FormData();
  form.append("o", orderId);
  form.append("i", id);
  form.append("m", mail);
  form.append("a", amount);
  form.append("q", qty);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "success") {
        window.location = "orders.php";
      } else {
        Swal.fire({
          title: response,
          icon: "error",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      }
    }
  };

  request.open("POST", "saveInvoiceProcess.php", true);
  request.send(form);
}

function saveInvoice2(orderId, mail) {
  var form = new FormData();
  form.append("o", orderId);
  form.append("m", mail);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "success") {
        window.location = "orders.php";
      } else {
        Swal.fire({
          title: response,
          icon: "error",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      }
    }
  };

  request.open("POST", "saveinvoice2.php", true);
  request.send(form);
}

function addC() {
  var modal = document.getElementById("cmodal");
  forgotPasswordModal = new bootstrap.Modal(modal);
  forgotPasswordModal.show();
}

function addCatogary(){

  var category = document.getElementById("category1");
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "Saved") {
        Swal.fire({
          title: "Aded",
          text: "Category Added successfully",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("GET", "newCatagory.php?category="+category.value, true);
  request.send();
}

function addColour(){
  var modal = document.getElementById("colourmodal");
  forgotPasswordModal = new bootstrap.Modal(modal);
  forgotPasswordModal.show();
}

function addColour1(){

  var colour = document.getElementById("colour1");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "Saved") {
        Swal.fire({
          title: "Aded",
          text: "Colour Added successfully",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("GET", "newColour.php?colour="+colour.value, true);
  request.send();

}

function addType(){
  var modal = document.getElementById("Typemodal");
  forgotPasswordModal = new bootstrap.Modal(modal);
  forgotPasswordModal.show();
}
function addType1(){

  var type = document.getElementById("type1");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "Saved") {
        Swal.fire({
          title: "Added",
          text: "Type Added successfully",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("GET", "newType.php?type="+type.value, true);
  request.send();

}


function addSize(){
  var modal = document.getElementById("Sizemodal");
  forgotPasswordModal = new bootstrap.Modal(modal);
  forgotPasswordModal.show();
}
function addSize1(){

  var size = document.getElementById("size1");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;

      if (response == "Saved") {
        Swal.fire({
          title: "Added",
          text: "Size Added successfully",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
      } else {
        Swal.fire({
          title: "warning",
          text: response,
          icon: "warning",
        });
      }
    }
  };

  request.open("GET", "newSize.php?size="+size.value, true);
  request.send();

}

function Admsignout() {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        window.location = "login.php";
      }
    }
  };

  request.open("GET", "AdmsignOutProcess.php", true);
  request.send();
}

function deactivate(email){

 

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        Swal.fire({
          title: "Deactivated",
          text: "User Deactivated",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
        
      }
    }
  };

  request.open("GET", "deactiveUser.php?email="+email, true);
  request.send();

}

function activate(email){

 

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        Swal.fire({
          title: "Activated",
          text: "User Activated",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
        
      }
    }
  };

  request.open("GET", "activeUser.php?email="+email, true);
  request.send();

}



function deactivateP(s_id){

 

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        Swal.fire({
          title: "Deactivated",
          text: "Product Deactivated",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
        
      }
    }
  };

  request.open("GET", "deactiveProduct.php?id="+s_id, true);
  request.send();

}

function activateP(s_id){

 

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        Swal.fire({
          title: "Activated",
          text: "Product Activated",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        });
        
      }
    }
  };

  request.open("GET", "activeProduct.php?id="+s_id, true);
  request.send();

}

