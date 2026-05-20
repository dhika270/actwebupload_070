<?php

$folder = "uploads/";

if (!file_exists($folder)) {
    mkdir($folder, 0777, true);
}

if (isset($_POST["upload"]) && isset($_FILES["fileToUpload"])) {

    $target_file = $folder . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $pesan = "File berhasil diupload!";
    } else {
        $pesan = "Upload gagal!";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>

    <style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        min-height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        padding:20px;
    }

    .container{
        width:500px;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        padding:30px;
        border-radius:20px;
        color:white;
        box-shadow:0 8px 30px rgba(0,0,0,0.2);
    }

    h1{
        text-align:center;
        margin-bottom:25px;
    }

    form{
        display:flex;
        flex-direction:column;
        gap:15px;
    }

    .drop-area{
        border:2px dashed rgba(255,255,255,0.5);
        border-radius:15px;
        padding:40px;
        text-align:center;
    }

    .choose-btn{
        display:inline-block;
        margin-top:15px;
        background:white;
        color:#5b21b6;
        padding:10px 20px;
        border-radius:10px;
        cursor:pointer;
        font-weight:bold;
    }

    button{
        background:white;
        color:#5b21b6;
        border:none;
        padding:12px;
        border-radius:10px;
        font-weight:bold;
        cursor:pointer;
    }

    .message{
        margin-top:20px;
        background:rgba(34,197,94,0.2);
        padding:15px;
        border-radius:10px;
    }

    a{
        display:block;
        margin-top:20px;
        text-align:center;
        color:white;
        text-decoration:none;
        font-weight:bold;
    }

    </style>

</head>
<body>

<div class="container">

    <h1>Upload File</h1>

    <form method="post" enctype="multipart/form-data">

    <div class="drop-area">

        <p>Drag & Drop File</p>

        <label for="fileInput" class="choose-btn">
            Pilih File
        </label>

    </div>

    <input 
    type="file"
    name="fileToUpload"
    id="fileInput"
    hidden
    required
>

<p id="fileName" style="margin-top:10px; text-align:center;">
    Belum ada file dipilih
</p>

    <button type="submit" name="upload">
        Upload
    </button>

</form>

    <?php
    if(isset($pesan)){
        echo "<div class='message'>$pesan</div>";
    }
    ?>

    <a href="lihatfile.php">
        Lihat Semua File
    </a>

</div>
<script>

const fileInput = document.getElementById("fileInput");
const dropArea = document.querySelector(".drop-area");
const fileName = document.getElementById("fileName");

fileInput.addEventListener("change", function(){

    const oldPreview = document.getElementById("previewImage");

    if(oldPreview){
        oldPreview.remove();
    }

    if(this.files && this.files[0]){

        fileName.innerText = "File dipilih: " + this.files[0].name;

        const img = document.createElement("img");

        img.id = "previewImage";

        img.src = URL.createObjectURL(this.files[0]);

        img.style.width = "180px";
        img.style.marginTop = "20px";
        img.style.borderRadius = "15px";
        img.style.objectFit = "cover";

        dropArea.appendChild(img);

    }else{

        fileName.innerText = "Belum ada file dipilih";

    }

});

</script>
</body>
</html>