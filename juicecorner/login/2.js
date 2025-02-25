document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();


  let isValid = true;

   const email = document.getElementById("email");
   const password = document.getElementById("password");
  

  const emailError = document.getElementById("email-error");
  const passwordError = document.getElementById("password-error");
  


    [ emailError,
      passwordError,
    ].forEach((error) => {
      error.style.display = "none";
    });

      if (email.value.trim() === "") {
        emailError.textContent = "Required.";
        emailError.style.display = "block";
        isValid = false;
      } else if (!/\S+@\S+\.\S+/.test(email.value)) {
        emailError.textContent = "Please enter a valid email address.";
        emailError.style.display = "block";
        isValid = false;
      }
  
    
      if (password.value.trim() === "") {
        passwordError.textContent = "Required.";
        passwordError.style.display = "block";
        isValid = false;
  }
   
    
})