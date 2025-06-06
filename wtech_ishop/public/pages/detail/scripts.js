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


// header logic
let logo = document.getElementById("logo");
let searchForm = document.getElementById("searchForm");
let searchButton = document.getElementById("searchButton");
let searchToggle = document.getElementById("searchToggle");
let searchInput = document.getElementById("searchInput");
let sideBarBut = document.getElementById("sideBarBut");
let sidebarMenu = document.getElementById("sidebarMenu");

// Function to toggle search bar on mobile
searchToggle.addEventListener("click", function (event) {
    logo.classList.add("d-none"); // Hide logo
    searchForm.classList.remove("d-none"); // Show search bar
    searchButton.classList.remove("d-none"); // Show blue search button on mobile
    searchToggle.classList.add("d-none"); // Hide search icon
    searchInput.focus(); // Auto-focus input when opened
    event.stopPropagation(); // Prevents this click from triggering document listener
});

// Function to toggle side bar on mobile
sideBarBut.addEventListener("click", function (event) {
    sidebarMenu.classList.toggle("show");
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

    // Close sidebar if open and clicked outside
    if (
        sidebarMenu.classList.contains("show") &&
        !sidebarMenu.contains(event.target) &&
        !sideBarBut.contains(event.target)
    ) {
        sidebarMenu.classList.remove("show");
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
    sidebarMenu.classList.remove("show"); // Hide sidebar menu if open
};