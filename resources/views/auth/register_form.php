<div class="display_details">
   Register
</div>

<form method="post" id="registerForm" enctype="multipart/form-data" class="input_panel center_all_in_one_direction">
    <label>First Name</label>
    <input type="text" id="input_fname" name="register_firstname" class="firstname_textfield" required>
    <label>Last Name</label>
    <input type="text" id="input_lname" name="register_lastname" class="lastname_textfield" required>
    <label class="cite_id_lbl">Cite Id</label>
    <input type="text" id="input_citeid" name="register_citeid" class="citeid_textfield" required>
    <label>Password</label>
    <input type="password" id="input_password" name="register_password" class="username_textfield" required>
    <label class="label_confirmpass">Confirm Password</label>
    <input type="password" id="input_retypepassword" name="register_ReTypePassword" class="username_textfield" required>
    <label class="upload_img_label">Profile Picture</label>
    <input class="img_upload" id="input_image" type="file" accept=".jpg, .jpeg, .png" name="profile" class="image_upload" required>
    <button type="submit" class="submit_button">Submit</button>
</form>
<div id="responseMessageRegister"></div>
<script src="public/js/xml/register.js"></script>
<div class="guide_panel">
  <label2>You already have an account? <a href="?search=login">Go Login</a></label2>
</div>
