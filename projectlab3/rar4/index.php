<form action="upload.php" method="post" enctype="multipart/form-data" id="uploadForm">
    <label for="image">Оберіть зображення:</label>
    <input type="file" name="image" id="image" accept="image/*" onchange="previewImage()">
    <div id="imagePreview" class="preview"></div>
    <br>
    <input type="submit" value="Завантажити">
</form>
