<?php

$folder = "uploads/";

if(isset($_GET['delete'])){

    $fileToDelete = $folder . $_GET['delete'];

    if(file_exists($fileToDelete)){
        unlink($fileToDelete);
    }
}

$files = scandir($folder);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar File</title>

    <style>

    body{
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        min-height:100vh;
        padding:40px;
    }

    .container{
        max-width:900px;
        margin:auto;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        padding:30px;
        border-radius:20px;
        color:white;
    }

    h1{
        text-align:center;
        margin-bottom:30px;
    }

    .file-box{
        display:flex;
        justify-content:space-between;
        align-items:center;
        background:rgba(255,255,255,0.1);
        padding:15px;
        margin-top:15px;
        border-radius:10px;
    }

    .actions{
        display:flex;
        gap:10px;
    }

    .actions a{
        text-decoration:none;
        padding:8px 15px;
        border-radius:8px;
        font-weight:bold;
    }

    .lihat{
        background:white;
        color:#5b21b6;
    }

    .delete{
        background:#ef4444;
        color:white;
    }

    .back{
        display:inline-block;
        margin-top:20px;
        color:white;
        text-decoration:none;
        font-weight:bold;
    }

    </style>

</head>
<body>

<div class="container">

    <h1>Daftar File</h1>

    <?php

    foreach($files as $file){

        if($file != "." && $file != ".."){

            echo "
            <div class='file-box'>

                <span>$file</span>

                <div class='actions'>

                    <a class='lihat' href='uploads/$file' target='_blank'>
                        Lihat
                    </a>

                    <a 
                        class='delete'
                        href='?delete=$file'
                        onclick=\"return confirm('Hapus file ini?')\"
                    >
                        Delete
                    </a>

                </div>

            </div>
            ";
        }
    }

    ?>

    <a href="upload.php" class="back">
        ← Kembali ke Upload
    </a>

</div>

</body>
</html>