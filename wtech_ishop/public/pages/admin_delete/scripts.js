document.getElementById("confirmDeleteBtn").addEventListener("click", function () {
    // Blur any currently focused element to avoid aria-hidden conflict
    if (document.activeElement) {
        document.activeElement.blur();
    }

    // Create and show notification
    const container = document.getElementById("notificationContainer");
    const message = document.createElement("div");
    message.className = "alert alert-success shadow position-absolute start-50 translate-middle-x";
    message.style.top = `${container.childElementCount * 20}px`;
    message.classList.add("toast-message");
    message.textContent = "Produkt bol úspešne odstránený.";
    container.appendChild(message);

    // Auto-remove and reflow positions
    setTimeout(() => {
        message.remove();

        // Recalculate positions of remaining notifications
        const toasts = container.querySelectorAll(".toast-message");
        toasts.forEach((toast, index) => {
            toast.style.top = `${index * 20}px`;
        });
    }, 3000);

    // Hide modal
    const modal = bootstrap.Modal.getInstance(document.getElementById("confirmDeleteModal"));
    modal.hide();
});


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