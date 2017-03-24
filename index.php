<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Forms</title>
      <link rel="stylesheet" href="style.css" >
   </head>
   <body>
      <?php
         $fName = "";
         $fNameError = "";

         $uName = "";
         $uNameError = "";

         $uEmail = "";
         $uEmailError = "";

         $uGender = "";
         $uGenderError = "";

         $uCars = "";
         $uCarsError = "";

         $uHobbies = array();
         $uHobbiesError="";

         $uPassword="";
         $uPasswordError="";

         $confirmPassword="";
         $confirmPasswordError="";

         $uConfirm="";



         if ($_POST['uSignUp']) {

         if ($_POST['fName']) {
         $fName = $_POST['fName'];
         }
         else {
         $fNameError = "Name is Required!";
         }

         if ($_POST['uName']) {
         $uName = $_POST['uName'];
         if(strlen($uName)<8){
         $uNameError = "Minimum 8 Characters Required";
         $uName = "";
         }
         }
         else{
         $uNameError = "Username Required";
         }


         if ($_POST['uEmail']) {
         $uEmail = $_POST['uEmail'];
         }
         else {
         $uEmailError = "Email is Required!";
         }

         if ($_POST['uGender']) {
         $uGender = $_POST['uGender'];
         }
         else {
         $uGenderError = "Gender is Required!";
         }
         if ($_POST['uPassword']) {
         $uPassword = $_POST['uPassword'];
         if(strlen($uPassword)>=8){
         if ($_POST['confirmPassword']) {
         $confirmPassword = $_POST['confirmPassword'];
         if ($_POST["uPassword"] == $_POST["confirmPassword"]) {
         $uConfirm = "Sign up successful!";
         }
         else {
         $uConfirm = "Sign up failed!";

         }
         }
         else {
         $confirmPasswordError = "Retype the password!";

         }
         }
         else{
         $uPasswordError= "Password should be atleast 8 characters!";
         }
         }
         else {
         $uPasswordError = "Password is Required!";
         }


         if($_POST['uHobbies']){
         $uHobbies = $_POST['uHobbies'];
         $nHobbies = count($uHobbies);
         if($nHobbies<2){
         $uHobbiesError = "Select 2 or more!";
         }
         }
         else{
         $uHobbiesError = "Select 2 or more!";
         }


         if($_POST['formCars'])
         {
         $uCars = $_POST['formCars'];
         }
         else{
         $uCarsError="Didn't select any cars!\n";
         }
         }

         for($i=0; $i < $nHobbies; $i++)
         {
         $hobby .= $uHobbies[$i].', ';
         }

         ?>
      <strong>
         <form method="post">
            <br><br><br>
            <h1>User Registeration</h1>
            <hr>
            <br>
            Name:
            <input type="text" name="fName" value="<?=$fName?>" id="fname">
            <span class="error"><?php echo $fNameError; ?></span>
            <br>
            <br>
            User Name:
            <input type="text" name="uName" value="<?=$uName?>" id="uname">
            <span class="error"><?php echo $uNameError; ?></span>
            <br>
            <br>
            Email:
            <input type="email" name="uEmail" value="<?=$uEmail?>" id="email">
            <span class="error"><?php echo $uEmailError; ?></span>
            <br>
            <br>
            Gender:
            <input type="radio" name="uGender" value="Male" id="mG"
               <?
                  if($uGender=='Male')
                  echo "checked";
                  ?>>
            Male
            <input type="radio" name="uGender" value="Female" id="fG"
               <?
                  if($uGender=='Female')
                  echo "checked";
                  ?>>
            Female
            <span class="error"><?php echo $uGenderError; ?></span>
            <br>
            <br>
            Password:
            <input type="password" name="uPassword" value="<?=$uPassword?>" id="pass">
            <span class="error"><?php echo $uPasswordError; ?></span>
            <br>
            <br>
            Re-type Password:
            <input type="password" name="confirmPassword" value="<?=$confirmPassword?>" id="rPass">
            <span class="error"><?php echo $confirmPasswordError; ?></span>
            <br>
            <br>
            Hobbies:
            <input type="checkbox" name="uHobbies[]" value="Baseball" id="baseball"
               <?
                  if (in_array("Baseball", $uHobbies)) {
                  echo "checked";
                  }
                  ?> >
            Baseball
            <input type="checkbox" name="uHobbies[]" value="Texting" id="texting"
               <?
                  if (in_array("Texting", $uHobbies)) {
                  echo "checked";
                  } ?>>
            Texting
            <input type="checkbox" name="uHobbies[]" value="Cricket" id="cricket"
               <?
                  if (in_array("Cricket", $uHobbies)) {
                  echo "checked";
                  }
                  ?>>
            Cricket
            <input type="checkbox" name="uHobbies[]" value="Swimming" id="swimming"<?
               if (in_array("Swimming", $uHobbies)) {
               echo "checked";
               } ?>>
            Swimming
            <input type="checkbox" name="uHobbies[]" value="Hiking" id="hiking"<?
               if (in_array("Hiking", $uHobbies)) {
               echo "checked";
               } ?>>
            Hiking
            <span class="error"><?php echo $uHobbiesError; ?></span>
            <br>
            <br>
            Favourite cars:
            <span class="error"><?php echo $uCarsError; ?></span>
            <br>
            <select multiple="multiple" name="formCars" id="cars">
               <option value="Audi">Audi</option>
               <option value="BMW">BMW</option>
               <option value="Buggati">Buggati</option>
               <option value="Nissan">Nissan</option>
               <option value="Ford">Ford</option>
               <option value="lamborghini">Lamborghini</option>
            </select>
            <br>
            <br>
            <input type="submit" name="uSignUp" value="Sign Up" id="signup">
         </form>
      </strong>
      <?php
         if($_SERVER['REQUEST_METHOD']=="POST"){
         if(!empty($fName) && !empty($uEmail)&& !empty($uName)&& !empty($uGender)&& !empty($uPassword)&&!empty($hobby)&& !empty($uCars)){

         echo"<table border=1 style='background-color:	#DB7093; margin-bottom:10px; text-align: center; margin: 0 auto; padding: 0px;'>
         <tr><td>Name:</td>
         <td>".$fName."</td></tr>

         <tr><td>Email:</td>
         <td>".$uEmail."</td></tr>

         <tr><td>UserName:</td>
         <td>".$uName."</td></tr>

         <tr><td>Gender</td>
         <td>".$uGender."</td></tr>

         <tr><td>Hobbies</td>
         <td>".$hobby."</td></tr>

         <tr><td>Car Brand</td>
         <td>".$uCars."</td></tr>
         </tr><br><br></table>";
         }
         }
         ?>
   </body>
</html>
