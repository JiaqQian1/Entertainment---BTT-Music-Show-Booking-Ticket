document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.querySelector("#login");
  const createAccountForm = document.querySelector("#createAccount");
  const resetPasswordForm = document.querySelector("#resetPassword");

  createAccountForm.classList.add("form--hidden");
  resetPasswordForm.classList.add("form--hidden");

  document.querySelector("#linkCreateAccount").addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.add("form--hidden");
    resetPasswordForm.classList.add("form--hidden");
    createAccountForm.classList.remove("form--hidden");
  });

  document.querySelector("#linkLogin").addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.remove("form--hidden");
    createAccountForm.classList.add("form--hidden");
    resetPasswordForm.classList.add("form--hidden");
  });

  document.querySelector("#linkResetPassword").addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.add("form--hidden");
    createAccountForm.classList.add("form--hidden");
    resetPasswordForm.classList.remove("form--hidden");
  });

  document.querySelector("#linkLoginFormReseT").addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.remove("form--hidden");
    createAccountForm.classList.add("form--hidden");
    resetPasswordForm.classList.add("form--hidden");
  });

  document.querySelector("#linkLogin").addEventListener("click", e => {
    e.preventDefault();
    loginForm.classList.remove("form--hidden");
    createAccountForm.classList.add("form--hidden");
  });

  resetPasswordForm.addEventListener("submit", e => {
    e.preventDefault();
   
    loginForm.classList.remove("form--hidden");
    createAccountForm.classList.add("form--hidden");
    resetPasswordForm.classList.add("form--hidden");
    setFormMessage(loginForm, "success", "Password reset successful. You can now log in.");
  });

  loginForm.addEventListener("submit", e => {
    e.preventDefault();
    setFormMessage(loginForm, "error", "Invalid username/password combination");
  });

  document.querySelectorAll(".form_input").forEach(inputElement => {
    inputElement.addEventListener("blur", e => {
      if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10) {
        setInputError(inputElement, "Username must be at least 10 characters in length");
      }
    });

    inputElement.addEventListener("input", e => {
      clearInputError(inputElement);
    });
  });
});
