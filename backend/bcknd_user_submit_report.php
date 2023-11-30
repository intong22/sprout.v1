<?php

    include "connection.php";

    //report post
    if(isset($_GET["post_id"]))
    {
        $post_id = $_GET["post_id"];

        if(isset($_POST["btnReport"]))
        {
            $complaint_details = mysqli_real_escape_string($con, $_POST["description"]);
            $complaint_image = null;

            //check if image is added
            if(isset($_FILES["addReportPhotos"]) && $_FILES["addReportPhotos"]["error"] == 0) 
            {
                $complaint_image = addslashes(file_get_contents($_FILES["addReportPhotos"]["tmp_name"]));
            }

            $reportQuery = "INSERT INTO
                                complaints(post_id, complaints_details, complaints_image)
                            VALUES
                                (".$post_id.", '".$complaint_details."', '".$complaint_image."' )";

            mysqli_query($con, $reportQuery);

            echo"<script>
                    alert('Your report has been submitted.');
                    window.location.href = 'user_forum.php';
                </script>";
        }
    }
?>