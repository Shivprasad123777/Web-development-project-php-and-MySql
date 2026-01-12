// Handle Contact Form
if(document.getElementById('contactForm')) {
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert("Thank you! Your message has been sent successfully. 🚀");
        this.reset();
    });
}

// Handle Star Rating Logic
const stars = document.querySelectorAll('.star');
stars.forEach(star => {
    star.addEventListener('click', function() {
        let val = this.getAttribute('data-value');
        alert("You rated us " + val + " stars! Thank you.");
    });
});

// Handle Feedback Form
if(document.getElementById('feedbackForm')) {
    document.getElementById('feedbackForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert("Feedback received! We appreciate your input.");
        this.reset();
    });
}