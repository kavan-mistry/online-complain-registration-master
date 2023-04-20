function validateForm() {
    // Get the values of all form fields

    var email = document.forms["log-form"]["email"].value;
    var password = document.forms["log-form"]["password"].value;


    // Check if any of the fields are empty

    if (email == "") {
        document.getElementById("emailError").innerHTML = "Please enter your email address.";
        return false; // prevent the form from being submitted
    } else {
        document.getElementById("emailError").innerHTML = "";
    }

    if (password == "") {
        document.getElementById("passError").innerHTML = "Please enter your password.";
        return false; // prevent the form from being submitted
    } else {
        document.getElementById("passError").innerHTML = "";
    }

    // If all fields are filled in, allow the form to be submitted
    return true;
}

// const togglePassword = document.querySelector("#togglePassword");
// const password = document.querySelector("#password");

// togglePassword.addEventListener("click", function () {
//   // toggle the type attribute
//   const type = password.getAttribute("type") === "password" ? "text" : "password";
//   password.setAttribute("type", type);
  
//   // toggle the icon
//   this.classList.toggle("bi-eye");
// });

// prevent form submit
// const form = document.querySelector("form");
// form.addEventListener('submit', function (e) {
//   e.preventDefault();
// });