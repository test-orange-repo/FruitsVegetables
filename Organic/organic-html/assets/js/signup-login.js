let container = document.getElementById("container");

toggle = () => {
  container.classList.toggle("sign-in");
  container.classList.toggle("sign-up");
};

setTimeout(() => {
  container.classList.add("sign-in");
}, 200);

// Handle regular expression
let signupForm = document.getElementById("signupForm");
let submitBtn = document.getElementById("signupBtn");

let regexName = /^[A-Za-z]+$/;
let regexUsername = /^[A-Za-z0-9_]+$/;
let regexEmail =
  /^[A-Za-z0-9._%+-]+@(?:[A-Za-z0-9-]+\.)+(?:com|net|org|edu|ru|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)$/i;
let regexPassword = /^(?=.*[a-z])(?=.*[A-Z])[\w!@#$%^&*()-+=<>?]{8,}$/;
let regexPhoneNumber = /^\d{3}-\d{3}-\d{4}$/;





let errorMessage;

submitBtn.onclick = () => {

    let first_name = document.getElementById("fname").value;
    let last_name = document.getElementById("lname").value;
    let username = document.getElementById("uname").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confPassword").value;
    let phone = document.getElementById("phone").value;

    if (!regexName.test(first_name) || !regexName.test(last_name)) {
        preventSubmittion();
        errorMessage = "Name must only contain letters";
    } 
    
    else if (!regexUsername.test(username)) {
        preventSubmittion();
        errorMessage = "Username should not contain any symbols";
    } 
    
    else if (!regexEmail.test(email)) {
        preventSubmittion();
        errorMessage = "Email is invalid";
    } 
    
    else if (!regexPassword.test(password)) {
        preventSubmittion();
        errorMessage = "Password must be at least 8 letters, and have a Capital letter and a small one";
    }

    else if (password !== confirmPassword) {
        preventSubmittion();
        errorMessage = "Passwords not matched";
    }
    
    else if (!regexPhoneNumber.test(phone)) {
        preventSubmittion();
        errorMessage = "Password must be at least 8 letters, and have a Capital letter and as small one";
    }
    else {
        console.log("YES");
    }
}

function preventSubmittion() {
  signupForm.addEventListener("submit", (e) => {
    e.preventDefault();
    swal({
        title: "Signup Failed",
        text: errorMessage,
        icon: "warning",
        dangerMode: true,
    })
  });
}
