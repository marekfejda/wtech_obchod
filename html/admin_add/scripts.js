const input = document.getElementById('productPhotos');
const previewContainer = document.getElementById('previewContainer');
let selectedFiles = [];

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
        img.style.objectFit = 'cover';

        const removeBtn = document.createElement('button');
        removeBtn.innerText = 'x';
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
    input.value = '';
});