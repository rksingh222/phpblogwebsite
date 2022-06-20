 <!-- getting a warning when i tried counting $error which was null since on isset($_POST['register-btn'] only array $errors is created in Blog/app/controllers/user.php -->

 <?php if (count((is_countable($errors)?$errors:[])) > 0): ?>
 <div class="msg success error">
     <?php foreach ($errors as $error): ?>
     <li><?php echo $error; ?></li>
     <?php endforeach; ?>
 </div>
 <?php endif; ?>