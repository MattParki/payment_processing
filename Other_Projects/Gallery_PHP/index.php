
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title></title>
    
</head>
    
<body>

<h2>Signup</h2>

<container>
<div>
<form action="signup.inc.php" method="POST" enctype="multipart/form-data">
   
    <input type="text" name="first" placeholder="Firstname">
    <br>
    <input type="text" name="last" placeholder="Lastname">
    <br>
    <input type="text" name="email" placeholder="E-mail">
    <br>
    <input type="text" name="uid" placeholder="Username">
    <br>
    <input type="password" name="pwd" placeholder="Password">
    <br>
    <button type="submit" name="submit">Sign up</button>

    </form>
    </div>
</container>

<container>
<div class="gallery-upload">
<form action="gallery-upload.inc.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="filename" placeholder="File name...">
            <br>
            <input type="text" name="filetitle" placeholder="Image title...">
            <br>
            <input type="text" name="filedesc" placeholder="Image description...">
            <br>
            <input type="file" name="file" placeholder="File Name...">
            <button type="submit" name="submit">UPLOAD</button>
    <br>
    
    </form>

</div>
</container>

<main>
  <section class="gallery-links">
    <div class="wrapper">
      <h2>Gallery</h2>

      <div class="gallery-container">

      <?php
          include_once "dbh.inc.php";


          $sql = "SELECT * FROM gallery ORDER BY orderGallery Desc;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo"SQL statment failed!";
          } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<a href="#">
                <div style="background-image: url('.$row["imgFullNameGallery"].');"></div>
                <h3>'.$row["titleGallery"].'</h3>
                <p>'.$row["descGallery"].'</p>
              </a>';
              }
          }
      ?>

      </div>
        

    </div>
  </section>
</main>

</body>
</html>

