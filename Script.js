// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", function() {
    // Get the contact form element
    var contactForm = document.getElementById("contact-form");
  
    // Add a submit event listener to the form
    contactForm.addEventListener("submit", function(event) {
      // Prevent the form from submitting
      event.preventDefault();
  
      // Validate the form inputs
      if (validateForm()) {
        // If the form is valid, submit it
        contactForm.submit();
      }
    });
  
    // Function to validate the form inputs
    function validateForm() {
      var nameInput = document.getElementById("name");
      var emailInput = document.getElementById("email");
      var messageInput = document.getElementById("message");
  
      // Check if the name is empty
      if (nameInput.value.trim() === "") {
        alert("Please enter your name.");
        nameInput.focus();
        return false;
      }
  
      // Check if the email is empty or not valid
      if (emailInput.value.trim() === "") {
        alert("Please enter your email address.");
        emailInput.focus();
        return false;
      } else if (!isValidEmail(emailInput.value.trim())) {
        alert("Please enter a valid email address.");
        emailInput.focus();
        return false;
      }
  
      // Check if the message is empty
      if (messageInput.value.trim() === "") {
        alert("Please enter your message.");
        messageInput.focus();
        return false;
      }
  
      return true;
    }
  
    // Function to validate email format using a regular expression
    function isValidEmail(email) {
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });
  