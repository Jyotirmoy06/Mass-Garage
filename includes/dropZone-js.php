 <script>
        $(document).ready(function() {
            const dropZone = $('#dropZone');
            const fileInput = $('#fileInput');
            const preview = $('#preview');

            // Prevent default drag-and-drop behavior for the entire document
            $(document).on('dragover drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });

            // Hold a reference to all files
            let allFiles = [];

            // Handle drag and drop events
            dropZone.on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropZone.addClass('hover');
            });

            dropZone.on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropZone.removeClass('hover');
            });

            dropZone.on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropZone.removeClass('hover');

                const files = Array.from(e.originalEvent.dataTransfer.files);
                handleFiles(files);
            });

            // Trigger file input when clicking on drop zone
            dropZone.on('click', function() {
                fileInput.click();
            });

            // Handle file input change
            fileInput.on('change', function() {
                const files = Array.from(fileInput[0].files);
                handleFiles(files);
            });

            // Handle files and show previews
            function handleFiles(files) {
                files.forEach(file => {
                    allFiles.push(file);

                    const previewItem = document.createElement('div');
                    previewItem.classList.add('preview-item');
                    previewItem.setAttribute('data-filename', file.name);

                    const fileName = document.createElement('div');
                    fileName.classList.add('file-name');
                    fileName.textContent = file.name;
                    previewItem.appendChild(fileName);

                    const removeBtn = document.createElement('button');
                    removeBtn.classList.add('remove-btn');
                    removeBtn.innerText = 'x';
                    removeBtn.onclick = function() {
                        const index = allFiles.indexOf(file);
                        if (index > -1) {
                            allFiles.splice(index, 1);
                        }
                        previewItem.remove();
                        updateFileInput();
                    };

                    previewItem.appendChild(removeBtn);
                    preview.append(previewItem);
                });

                updateFileInput();
            }

            // Update the file input with the current files
            function updateFileInput() {
                const dataTransfer = new DataTransfer();
                allFiles.forEach(file => dataTransfer.items.add(file));
                fileInput[0].files = dataTransfer.files;
            }
        });
    </script>