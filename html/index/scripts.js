document.addEventListener("DOMContentLoaded", function () {
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
        event.stopPropagation(); // Prevents event bubbling
    });

    // Function to restore layout when clicking outside the search area
    document.addEventListener("click", function (event) {
        if (!searchForm.contains(event.target) && !searchToggle.contains(event.target)) {
            // Only reset if screen width is below 576px
            if (window.innerWidth < 576) {
                restoreDefaultLayout();
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
    }

    // Prevent closing when clicking inside the search bar
    searchForm.addEventListener("click", function (event) {
        event.stopPropagation();
    });
});