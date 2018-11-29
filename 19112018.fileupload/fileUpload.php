<html>
<head></head>
<body>
<?php
if(isset($_FILES['image'])){
    $file = $_FILES['image'];
    $fileName = time().$file['name'];
    $fileType = $file['type'];
    $allowedTypes = ['image/png','image/jpeg'];
    if(in_array($fileType,$allowedTypes)){
        if($file['size'] < 1024 * 100){
            $tempLocation = $file['tmp_name'];
            if(!file_exists("uploadss")){
                mkdir("uploadss");
            }
            $uploaded = move_uploaded_file($tempLocation,"uploadss/".$fileName);
            if($uploaded){
                echo "Success";
            }else{
                echo $fileName;
                echo $tempLocation;
                echo "Error";
            }            
        }else{
            echo "Very Large File";
        }
    }else{
        echo "Invalid File Type";
    }

}
echo date("d m Y h:i:s:v");
?>
    <form method="POST" enctype="multipart/form-data">
       <input type="file" name="image">
       <input type="submit" value="Upload">
    </form>
</body>
</html>