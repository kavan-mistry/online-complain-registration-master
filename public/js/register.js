
function validateForm() {
    // Get the values of all form fields
    var firstName = document.forms["reg-form"]["name"].value;
    var email = document.forms["reg-form"]["email"].value;
    var mob = document.forms["reg-form"]["mob"].value;
    var passward = document.forms["reg-form"]["passward"].value;
    var passward_confirmation = document.forms["reg-form"]["passward_confirmation"].value;
    
    // Check if any of the fields are empty
    if (firstName == "") {
      document.getElementById("firstNameError").innerHTML = "Please enter your name.";
      return false; // prevent the form from being submitted
    } else {
      document.getElementById("firstNameError").innerHTML = "";
    }
    
    
    if (email == "") {
      document.getElementById("emailError").innerHTML = "Please enter your email address.";
      return false; // prevent the form from being submitted
    } else {
      document.getElementById("emailError").innerHTML = "";
    }

    if (mob == "") {
        document.getElementById("numError").innerHTML = "Please enter your mobile number.";
        return false; // prevent the form from being submitted
      } else {
        document.getElementById("numError").innerHTML = "";
      }
    
      if (passward == "") {
        document.getElementById("passError").innerHTML = "Please enter your passward.";
        return false; // prevent the form from being submitted
      } else {
        document.getElementById("passError").innerHTML = "";
      }

      if (passward_confirmation != passward) {
        document.getElementById("conpassError").innerHTML = "canform Passward did not match.";
        return false; // prevent the form from being submitted
      } else {
        document.getElementById("conpassError").innerHTML = "";
      }

    // If all fields are filled in, allow the form to be submitted
    return true;
  }


var typed = new Typed('#element', {
    strings: ["A small complaint today can prevent a big problem tomorrow.",
        "Don't let a small problem turn into a big one. Speak up and complain online.",
        "The power of online complaints lies in the collective voice of consumers.",
        "Your online complaint can make a big difference. Don't hesitate to speak out.",
        "A single online complaint can be the catalyst for change. Be heard!",
        "Every complaint counts. Your feedback can improve the quality of products and services.",
        "Online complaints are a way to hold companies accountable for their actions.",
        "Silence is acceptance. Speak up with your online complaint.",
        "Your online complaint is a tool for change. Use it wisely.",
        "Don't underestimate the power of your online complaint. It can create a ripple effect of change."],
    typeSpeed: 30,
    backSpeed: 10,
    loop: true
});

