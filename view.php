<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>View</title>

</head>

<body>
    <a href="index.php">Upload</a>
    <div class="play_audio">
        <?php
              include "db_conn.php";

            $sql="SELECT * FROM audio ORDER BY id DESC";
            $res=mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) >0) {
                while($audio=mysqli_fetch_assoc($res)) {
                    ?>
        <audio src="uplaod/<?= $audio['audio_url']?>" controls></audio>

        <?php
                }

            }

            else {
                echo "<h1>Empty</h1>";
            }

            ?>
    </div>
</body>

</html>