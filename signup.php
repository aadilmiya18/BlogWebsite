<form action="requests.php" method="post" enctype="multipart/form-data">
    <div class="input-boxes">
    
        <div style="margin-bottom: 15px;">
            <label for="userphoto" style="display: block; font-weight: bold;">Add photo</label>
            <input name="userUploadedImage" type="file" id="userphoto"
                style="width: 100%; padding: 10px; background-color: #f1f1f1; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div class="input-box">
            <i class="fas fa-user"></i>
            <input name="username" type="text" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
            <i class="fas fa-mars"></i>
            <input name="usergender" type="text" placeholder="Enter your gender" required>
        </div>
        <div class="input-box">
            <i class="fas fa-home"></i>
            <input name="useraddress" type="text" placeholder="Enter your address" required>
        </div>
        <div class="input-box">
            <i class="fas fa-envelope"></i>
            <input name="useremail" type="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
            <i class="fas fa-lock"></i>
            <input name="userpassword" type="password" placeholder="Enter your password" required>
        </div>
        <div class="button input-box">
            <input type="submit" name="signup" value="Sign Up">
        </div>
        <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
    </div>
</form>