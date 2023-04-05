const fileInput = document.getElementById('fileInput');
const preview = document.getElementById('preview');

fileInput.addEventListener('change', () => {
  preview.innerHTML = '';

  for (const file of fileInput.files) {
    const reader = new FileReader();

    reader.onload = () => {
      const previewItem = document.createElement('div');
      previewItem.classList.add('preview-item');

      const img = document.createElement('img');
      img.src = reader.result;
      previewItem.appendChild(img);

      const deleteBtn = document.createElement('button');
      deleteBtn.classList.add('delete-btn');
      deleteBtn.innerHTML = 'x';
      deleteBtn.addEventListener('click', () => {
        previewItem.remove();

        const newFiles = Array.from(fileInput.files).filter(f => f !== file);
        const dt = new DataTransfer();
        for (const newFile of newFiles) {
          dt.items.add(newFile);
        }
        fileInput.files = dt.files;
      });
      previewItem.appendChild(deleteBtn);

      preview.appendChild(previewItem);
    };

    reader.readAsDataURL(file);
  }
});

preview.addEventListener('click', (event) => {
  if (event.target.classList.contains('delete-btn')) {
    const previewItem = event.target.parentNode;
    const fileUrl = previewItem.querySelector('img').src;

    previewItem.remove();

    const fileName = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
    const newFiles = Array.from(fileInput.files).filter(f => f.name !== fileName);

    const dt = new DataTransfer();
    for (const newFile of newFiles) {
      dt.items.add(newFile);
    }
    fileInput.files = dt.files;
  }
});
