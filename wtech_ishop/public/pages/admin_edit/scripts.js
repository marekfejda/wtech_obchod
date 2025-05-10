const input = document.getElementById('productPhotos');
const previewContainer = document.getElementById('previewContainer');
// start with the server‐side images
let selectedFiles = Array.isArray(window.initialFiles)
  ? window.initialFiles.slice()  // copy them in
  : [];

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

const form = document.getElementById('editProductForm');
form.addEventListener('submit', e => {
    const dt = new DataTransfer();
    selectedFiles.filter(f => f instanceof File).forEach(f => dt.items.add(f));
    input.files = dt.files;
});

function loadExistingImages(file) {
    const wrapper = document.createElement('div');
    wrapper.classList.add('position-relative');
    wrapper.style.width = '80px';
    wrapper.style.height = '80px';

    const img = document.createElement('img');
    img.src = file.src;
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

    const keep = document.createElement('input');
    keep.type = 'hidden';
    keep.name = 'keep_images[]';
    keep.value = file.uid;
    wrapper.appendChild(keep);

    previewContainer.appendChild(wrapper);
}

document.addEventListener("DOMContentLoaded", () => {
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




//validate inputs
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('addProductForm');
    form.addEventListener('submit', function (e) {
        // grab values
        const name = document.getElementById('name').value.trim();
        const short_description = document.getElementById('short_description').value.trim();
        const description = document.getElementById('description').value.trim();
        const category = document.getElementById('category_id').value;
        const color = document.getElementById('color_id').value;
        const brand = document.getElementById('brand_id').value;
        const price = document.getElementById('price').value.trim();
        const stock = document.getElementById('stockQuantity').value.trim();

        let errorMsg = '';
        if (!name) errorMsg += 'Meno produktu je povinné.\n';
        if (!short_description) errorMsg += 'Titulný popis je povinný.\n';
        if (!description) errorMsg += 'Popis je povinný.\n';
        if (!category) errorMsg += 'Kategória je povinná.\n';
        if (!color) errorMsg += 'Farba je povinná.\n';
        if (!brand) errorMsg += 'Značka je povinná.\n';
        if (!price) errorMsg += 'Cena je povinná.\n';
        if (!stock) errorMsg += 'Počet kusov je povinný.\n';
        if (price <= 0) errorMsg += 'Cena nesmie byť záporná.\n';
        if (stock <= 0) errorMsg += 'Počet ks nesmie byť záporný.\n';

        if (errorMsg) {
            alert(errorMsg);
            e.preventDefault();
        }
    });
});