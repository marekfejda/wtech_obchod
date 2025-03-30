document.addEventListener("DOMContentLoaded", function () {
    let logo = document.getElementById("logo");
    let searchForm = document.getElementById("searchForm");
    let searchButton = document.getElementById("searchButton");
    let searchToggle = document.getElementById("searchToggle");
    let searchInput = document.getElementById("searchInput");

    // Function to toggle search bar on mobile
    searchToggle.addEventListener("click", function (event) {
        logo.classList.add("d-none");
        searchForm.classList.remove("d-none");
        searchButton.classList.remove("d-none");
        searchToggle.classList.add("d-none");
        searchInput.focus();
        event.stopPropagation();
    });

    // Function to restore layout when clicking outside the search area
    document.addEventListener("click", function (event) {
        if (!searchForm.contains(event.target) && !searchToggle.contains(event.target)) {
            if (window.innerWidth < 500) {
                restoreDefaultLayout();
            }
        }
    });

    // Function to restore default layout on resize above 500px
    window.addEventListener("resize", function () {
        if (window.innerWidth >= 500) {
            restoreDefaultLayout();
        }
    });

    // Function to reset everything to default layout
    function restoreDefaultLayout() {
        logo.classList.remove("d-none");
        searchForm.classList.add("d-none");
        searchButton.classList.add("d-none");
        searchToggle.classList.remove("d-none");
    }

    // Prevent closing when clicking inside the search bar
    searchForm.addEventListener("click", function (event) {
        event.stopPropagation();
    });
});