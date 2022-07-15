<?php
if (isset($_POST['submit']) && empty($_FILES['my_audio'])){
    // connection to the database
    include 'db_conn.php';

    // var_dump(empty($_FILES['my_audio']));
    // print_r($_FILES);

    $audio_name = $_FILES['my_audio']['name'];
    $tmp_name = $_FILES['my_audio']['tmp_name'];
    $error = $_FILES['my_audio']['error'];
    // print_r($_FILES);

    if ($error === 0 ) {
        // get the audio extension
        $audio_ext = pathinfo($audio_name,PATHINFO_EXTENSION);
        // audio extension lowercase
        $audio_ext_final = strtolower($audio_ext);
        // print_r($audio_ex);

        // extension allowed
        $allowed_exts = array("mp3","m4a","ogg","3gp","wav");

        // if extension allowed then ...
        if (in_array($audio_ext_final,$allowed_exts)) {

            $new_audio_name = uniqid("audio-",true). '.' .$audio_ext_final;

            $audio_upload_path = 'upload/'.$new_audio_name;

            move_uploaded_file($tmp_name,$audio_upload_path);

            // Now insert the audio file into database
            $sql = "INSERT INTO audio(audio_url)VALUES('$new_audio_name')";

            mysqli_query($conn,$sql);

            header("Location:view.php");

        }else{
                $err = "You can't upload files of this type";
                header("Location:index.php?erro={$err}");
        }

    }


}else{
    //redirect to index.php
    header("Location:index.php");


}