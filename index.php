<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png","gif");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      while(file_exists("img/".$_FILES['image']['name'])) {
         echo "Filename exists on server. Adding entropy...";
         $_FILES['image']['name']=implode("",explode('.',$_FILES['image']['name'])[0].mt_rand(0, 9));
      } //this does not work at the moment and will cause the application to hang
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"img/".$file_name);
         echo "Success! <a href=\"img/".$_FILES['image']['name']."\">".$_FILES['image']['name']."</a>";
      }else{
         print_r($errors);
      }
   }
?>
<html>
    <head>
        <title>r/place Community Hosting</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
    </head>
   <body>
      <h1>
        Upload to Community Hosting
     </h1>
     <p>
       Only .jpeg, .jpg, .png, and .gif allowed. File must be 2MB or less (1024kb = 1mb).
     </p>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit" value="Upload"/>
      </form>
      <a href="img">View All Public Images</a>
      <p>All the same rules as STEM Place apply.</p>
     <footer>
      <em>
       Courtesy of <a href="https://www.huntingtonpost.org/">Huntington Post</a><br/>
        Want to join the placeMemes Project?
       </em>
     </footer>
   </body>
</html>
