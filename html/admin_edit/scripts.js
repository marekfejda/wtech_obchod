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