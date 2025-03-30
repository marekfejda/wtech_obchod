const input = document.getElementById('productPhotos');
const previewContainer = document.getElementById('previewContainer');
let selectedFiles = [
    { _id: crypto.randomUUID(), url: 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/IPhone_X_vector.svg/800px-IPhone_X_vector.svg.png' },
    { _id: crypto.randomUUID(), url: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Billie_Eilish_at_Icebox.png/1046px-Billie_Eilish_at_Icebox.png' }
];

function createPreview(file) {
    const id = crypto.randomUUID();
    file._id = id;

    const reader = new FileReader();
    reader.onload = function (e) {
        const wrapper = document.createElement('div');
        wrapper.classList.add('position-relative');
        wrapper.style.width = '80px';
        wrapper.style.height = '80px';

        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('rounded');
        img.style.height = '100%';
        img.style.width = '100%';
        img.style.objectFit = 'contain';

        const removeBtn = document.createElement('button');
        removeBtn.innerText = 'x';
        removeBtn.className = 'btn btn-sm btn-danger';
        removeBtn.style.position = 'absolute';
        removeBtn.style.top = '4px';
        removeBtn.style.right = '4px';
        removeBtn.style.padding = '2px 6px';
        removeBtn.style.fontSize = '0.6rem';
        removeBtn.style.lineHeight = '1';
        removeBtn.style.zIndex = '1';

        removeBtn.onclick = () => {
            selectedFiles = selectedFiles.filter(f => f._id !== id);
            wrapper.remove();
        };

        wrapper.appendChild(img);
        wrapper.appendChild(removeBtn);
        previewContainer.appendChild(wrapper);
    };
    reader.readAsDataURL(file);
}

input.addEventListener('change', () => {
    const files = Array.from(input.files);
    files.forEach(file => {
        selectedFiles.push(file);
        createPreview(file);
    });
    // Clear the input value to allow re-uploading the same file
    input.value = '';
});

function loadExistingImages(file) {
    const wrapper = document.createElement('div');
    wrapper.classList.add('position-relative');
    wrapper.style.width = '80px';
    wrapper.style.height = '80px';

    const img = document.createElement('img');
    img.src = file.url;
    img.classList.add('rounded');
    img.style.height = '100%';
    img.style.width = '100%';
    img.style.objectFit = 'cover';

    const removeBtn = document.createElement('button');
    removeBtn.innerText = 'x';
    removeBtn.className = 'btn btn-sm btn-danger';
    removeBtn.style.position = 'absolute';
    removeBtn.style.top = '4px';
    removeBtn.style.right = '4px';
    removeBtn.style.padding = '2px 6px';
    removeBtn.style.fontSize = '0.6rem';
    removeBtn.style.lineHeight = '1';
    removeBtn.style.zIndex = '1';

    removeBtn.onclick = () => {
        selectedFiles = selectedFiles.filter(f => f._id !== file._id);
        wrapper.remove();
    };

    wrapper.appendChild(img);
    wrapper.appendChild(removeBtn);
    previewContainer.appendChild(wrapper);
}

// Simulated load (replace later with real image URLs)
document.addEventListener("DOMContentLoaded", () => {
	// Simulated DB values:
    selectedFiles.forEach(file => {
        loadExistingImages(file);
    });
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