//header logic
let logo = document.getElementById("logo");
let searchForm = document.getElementById("searchForm");
let searchButton = document.getElementById("searchButton");
let searchToggle = document.getElementById("searchToggle");
let searchInput = document.getElementById("searchInput");

// Function to toggle search bar on mobile
searchToggle.addEventListener("click", function (event) {
    logo.classList.add("d-none"); // Hide logo
    searchForm.classList.remove("d-none"); // Show search bar
    searchButton.classList.remove("d-none"); // Show blue search button on mobile
    searchToggle.classList.add("d-none"); // Hide search icon
    searchInput.focus(); // Auto-focus input when opened
    event.stopPropagation(); // Prevents this click from triggering document listener
});

// Function to restore layout when clicking outside the search area
document.addEventListener("click", function (event) {
    if (!searchForm.contains(event.target) && !searchToggle.contains(event.target)) {
        // Only reset if screen width is below 576px
        if (window.innerWidth < 576) {
            restoreDefaultLayout(); // Restore default layout
        }
    }
});


// Function to restore default layout on resize above 576px 
window.addEventListener("resize", function () {
    if (window.innerWidth >= 576) {
        restoreDefaultLayout();
    }
});

// Function to reset everything to default layout 
function restoreDefaultLayout() {
    logo.classList.remove("d-none"); // Show logo
    searchForm.classList.add("d-none"); // Hide search bar
    searchButton.classList.add("d-none"); // Hide blue search button on mobile
    searchToggle.classList.remove("d-none"); // Show search icon
};

// Function to clean up the phone number input
document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.getElementById("phoneNumber");

    phoneInput.addEventListener("input", function (e) {
        let cleaned = phoneInput.value.replace(/\D/g, "");

        cleaned = cleaned.slice(0, 9);

        let out = "";
        for (let i = 0; i < cleaned.length; i++) {
            if (i % 3 == 0 && i != 0) {
                out += " ";
            }
            out += cleaned[i];
        }

        phoneInput.value = out;
    });
});