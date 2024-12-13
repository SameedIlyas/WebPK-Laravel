// Show/Hide Details
document.getElementById('showDetailsBtn')?.addEventListener('click', () => {
    const detailsSection = document.getElementById('detailsSection');
    if (detailsSection) {
        detailsSection.style.display = 'block';
    }
});
document.getElementById('hideDetailsBtn')?.addEventListener('click', () => {
    const detailsSection = document.getElementById('detailsSection');
    if (detailsSection) {
        detailsSection.style.display = 'none';
    }
});


// Background color change
let isCream = false; // Tracks the current background color

const changeBgBtn = document.getElementById('changeBgBtn');
if (changeBgBtn) {
    changeBgBtn.addEventListener('click', () => {
        if (isCream) {
            document.body.style.backgroundColor = 'white'; // Dark gray or black
        } else {
            document.body.style.backgroundColor = '#F5F5DC'; // Cream
        }
        isCream = !isCream; // Toggle the state
    });
}

// Change Text Style
const changeTextStyleBtn = document.getElementById('changeTextStyleBtn');
if (changeTextStyleBtn) {
    changeTextStyleBtn.addEventListener('click', () => {
        const text = document.getElementById('dynamicText');
        if (text) {
            text.style.fontStyle = 'italic';
            text.style.color = 'red';
        }
    });
}

const resetTextStyleBtn = document.getElementById('resetTextStyleBtn');
if (resetTextStyleBtn) {
    resetTextStyleBtn.addEventListener('click', () => {
        const text = document.getElementById('dynamicText');
        if (text) {
            text.style.fontStyle = 'normal';
            text.style.color = 'black';
        }
    });
}

// Form Validation
const contactForm = document.getElementById('contactForm');
if (contactForm) {
    contactForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const name = document.getElementById('name')?.value.trim();
        const email = document.getElementById('email')?.value.trim();
        const phone = document.getElementById('phone')?.value.trim();
        const errors = [];
        const successSection = document.getElementById('success');
        const errorSection = document.getElementById('errors');

        // Clear previous messages
        errorSection.innerHTML = '';
        successSection.innerHTML = '';

        if (!name) errors.push('Name is required');

        if (!email || !/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/.test(email)) {
            errors.push('A valid email address is required.');
        }

        if (!/^\d{10,}$/.test(phone)) {
            errors.push('Phone number must be at least 10 digits long and contain only numbers.');
        }

        if (errors.length > 0) {
            errorSection.innerHTML = errors.map(err => `<p>${err}</p>`).join('');
        } else {
            successSection.innerHTML = '<p>Form submitted successfully!</p>';
            contactForm.reset();
        }
    });
}

// Toggle Menu
document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.toggle-button');
    const navbarLinks = document.querySelector('.navbar-links');

    if (toggleButton && navbarLinks) {
        toggleButton.addEventListener('click', () => {
            navbarLinks.classList.toggle('active');
        });
    } else {
        console.error('Toggle button or navbar links not found!');
    }
});

// Toggle Details Section Visibility
const detailsSection = document.getElementById('detailsSection');
if (detailsSection) {
    const showDetailsBtn = document.getElementById('showDetailsBtn');
    const hideDetailsBtn = document.getElementById('hideDetailsBtn');

    if (showDetailsBtn) {
        showDetailsBtn.addEventListener('click', () => {
            detailsSection.classList.remove('hidden');
        });
    }

    if (hideDetailsBtn) {
        hideDetailsBtn.addEventListener('click', () => {
            detailsSection.classList.add('hidden');
        });
    }
}