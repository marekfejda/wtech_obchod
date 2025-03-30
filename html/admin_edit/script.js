const newPhotosInput = document.getElementById('newPhotos');
const newPreviewContainer = document.getElementById('newPreviewContainer');
const existingImagesContainer = document.getElementById('existingImages');

let newSelectedFiles = [];
let existingImages = [];

function createImagePreview(src, container, onRemove) {
	const wrapper = document.createElement('div');
	wrapper.classList.add('position-relative');
	wrapper.style.width = '80px';
	wrapper.style.height = '80px';

	const img = document.createElement('img');
	img.src = src;
	img.classList.add('rounded');
	img.style.width = '100%';
	img.style.height = '100%';
	img.style.objectFit = 'cover';

	const removeBtn = document.createElement('button');
	removeBtn.innerText = 'X';
	removeBtn.className = 'btn btn-sm btn-danger';
	removeBtn.style.position = 'absolute';
	removeBtn.style.top = '4px';
	removeBtn.style.right = '4px';
	removeBtn.style.padding = '2px 6px';
	removeBtn.style.fontSize = '0.6rem';
	removeBtn.style.borderRadius = '4px';
	removeBtn.style.lineHeight = '1';
	removeBtn.style.zIndex = '10';

	removeBtn.onclick = () => {
		onRemove(wrapper);
	};

	wrapper.appendChild(img);
	wrapper.appendChild(removeBtn);
	container.appendChild(wrapper);
}

function addNewPreviews(files) {
	files.forEach(file => {
		const id = crypto.randomUUID();
		file._id = id;
		const reader = new FileReader();
		reader.onload = function (e) {
			createImagePreview(e.target.result, newPreviewContainer, (wrapper) => {
				newSelectedFiles = newSelectedFiles.filter(f => f._id !== id);
				wrapper.remove();
			});
		};
		reader.readAsDataURL(file);
	});
}

newPhotosInput.addEventListener('change', () => {
	const files = Array.from(newPhotosInput.files);
	newSelectedFiles.push(...files);
	addNewPreviews(files);
	newPhotosInput.value = '';
});

function loadExistingImages() {
	// Clear only once
	existingImagesContainer.innerHTML = '';
	existingImages.forEach((src, index) => {
		const id = `existing-${index}-${Date.now()}`;
		createImagePreview(src, existingImagesContainer, (wrapper) => {
			existingImages = existingImages.filter((_, i) => i !== index);
			wrapper.remove();
		});
	});
}

// Simulated load (replace later with real image URLs)
document.addEventListener("DOMContentLoaded", () => {
	// Simulated DB values:
	existingImages = [];
	loadExistingImages();
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