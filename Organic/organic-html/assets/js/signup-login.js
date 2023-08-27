let container = document.getElementById("container");

toggle = () => {
  container.classList.toggle("sign-in");
  container.classList.toggle("sign-up");
};


let signupForm = document.getElementById("signupForm");
let submitBtn = document.getElementById("signupBtn");

let regexName = /^[A-Za-z]+$/;
let regexUsername = /^[A-Za-z0-9_]+$/;
let regexEmail = /^[A-Za-z0-9._%+-]+@(?:[A-Za-z0-9-]+\.)+(?:com|net|org|edu|ru|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)$/i;
let regexPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
let regexPhoneNumber = /^(\+\d{1,3})?\d{10}$/;

// Handle form submission
function handleSubmit(e) {
  e.preventDefault();

  let first_name = document.getElementById("fname").value;
  let last_name = document.getElementById("lname").value;
  let username = document.getElementById("uname").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confPassword").value;
  let phone = document.getElementById("phone").value;

  checkInputs(first_name, last_name, username, email, password, confirmPassword, phone);
}

signupForm.addEventListener("submit", handleSubmit);

function checkInputs(first_name, last_name, username, email, password, confirmPassword, phone) {
  let errorMessage = '';

  if (!regexName.test(first_name) || !regexName.test(last_name)) {
    errorMessage = "Name must only contain letters";
  }
  else if (!regexUsername.test(username)) {
    errorMessage = "Username should not contain any symbols or spaces";
  }
  else if (!regexEmail.test(email)) {
    errorMessage = "Email is invalid";
  }
  else if (!regexPassword.test(password)) {
    errorMessage = "Password must be at least 8 characters, and have an uppercase letter, a lowercase letter, a digit, and a special character";
  }
  else if (password !== confirmPassword) {
    errorMessage = "Passwords not matched";
  }
  else if (!regexPhoneNumber.test(phone)) {
    errorMessage = "Phone invalid";
  }

  if (errorMessage !== '') {
    preventSubmittion(errorMessage);
  } else {
    signupForm.removeEventListener("submit", handleSubmit);
    signupForm.submit();
  }
}

function preventSubmittion(errorMessage) {
  if (errorMessage !== '') {
    swal({
      title: "Signup Failed",
      text: errorMessage,
      icon: "warning",
      dangerMode: true,
    });
  }
}

// Handle show password
let showicons = document.getElementsByClassName("eye-pass");
let passInputs = document.getElementsByClassName('password');

Array.from(showicons).forEach((icon, indx) => {
  icon.addEventListener('click', () => {
    if(passInputs[indx].type == "password") {
      passInputs[indx].type = "text";
    }
    else {
      passInputs[indx].type = "password";
    }
  });
});







