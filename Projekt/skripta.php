<?php
include("header.php");

if(isset($_POST['naslov']) and $_REQUEST['method'] = 'POST'){
    $naslov = $_POST['naslov'];
    $sadrzaj = $_POST['sadrzaj'];
    $sazetak = $_POST['sazetak'];
    $kategorija = $_POST['kategorija'];
    if(isset($_POST['arhiv'])){
        $arhiv = $_POST['arhiv'];
    }

    $img_dir = "uploads/";
    $img_name = basename($_FILES['slika']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $stored_img_file = $img_dir . 'nekoime.' . $imageFileType;  /*DODATI ID CLANKA KAO IME SLIKE */

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        } else {
        move_uploaded_file($_FILES["slika"]["tmp_name"], $stored_img_file);
    }
}
?>

<div class="article-info"> 
    <p class="category"><?php 
            echo ucfirst($kategorija); 
        ?>
    </p> 
    <h1 class="title">
        <?php 
            echo $naslov; 
        ?>
    </h1> 
    <p>AUTOR:</p> 
    <p>OBJAVLJENO:</p> 
</div> 
<section class="article-image"> 
    <?php 
        echo "<img src='uploads/nekoime.png'"; 
    ?> 
</section> 
<section class="about"> 
    <p> 
        <?php 
            echo $sazetak; 
        ?> 
    </p> 

</section> 
<section class="sadrzaj"> 
    <p> 
        <?php 
            echo $sadrzaj; 
        ?> 
    </p> 
</section> 



<?php
include("footer.php")
?>