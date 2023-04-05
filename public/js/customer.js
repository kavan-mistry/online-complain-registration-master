
let table = new DataTable('#myTable', {
    // options
    // ordering: false,
    order: [[0, 'desc']],
    searching: false,
    // pagingType: 'first_last_numbers',
    columnDefs: [{
        "targets": 'no-sort',
        "orderable": false,
    }]
});


const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
  // toggle the type attribute
  const type = password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  
  // toggle the icon
  this.classList.toggle("bi-eye");
});


const togglePassword2 = document.querySelector("#togglePassword2");
const password2 = document.querySelector("#password2");

togglePassword2.addEventListener("click", function () {
  // toggle the type attribute
  const type = password2.getAttribute("type") === "password" ? "text" : "password";
  password2.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("bi-eye");
});




const password3 = document.querySelector("#password3");
const togglePassword3 = document.querySelector("#togglePassword3");

togglePassword3.addEventListener("click", function () {
  // toggle the type attribute
  const type = password3.getAttribute("type") === "password" ? "text" : "password";
  password3.setAttribute("type", type);
  
  // toggle the icon
  this.classList.toggle("bi-eye");
});


const password4 = document.querySelector("#password4");
const togglePassword4 = document.querySelector("#togglePassword4");

togglePassword4.addEventListener("click", function () {
  // toggle the type attribute
  const type = password4.getAttribute("type") === "password" ? "text" : "password";
  password4.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("bi-eye");
});
