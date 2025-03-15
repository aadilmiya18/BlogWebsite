<form action="requests.php" method="POST" enctype="multipart/form-data">
    <div style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;margin-top: 50px;">
        <textarea name="content" placeholder="What's on your mind?"
            style="width: 100%; height: 100px; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 15px;"
            maxlength="250" required></textarea>


        <div style="margin-bottom: 15px;">
            <label for="imageUpload" style="display: block; font-weight: bold;">Add photo</label>
            <input name="userUploadedImage" type="file" id="imageUpload"
                style="width: 100%; padding: 10px; background-color: #f1f1f1; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style=" margin-top: 10px; text-align: right;">
            <button type="sumbit" name="createPost"
                style="padding: 10px 20px; background-color: #0078FF; color: white; border: none; border-radius: 5px;">
                Post
            </button>
        </div>
    </div>
</form>