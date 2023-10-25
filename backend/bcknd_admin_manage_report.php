<?php
    include "connection.php";

    $counter = 0;
    //reports table display
    function reports()
    {
        include "connection.php";

        //query to get reports

        // $getReports = "SELECT
        //                     complaints.complaints_id, complaints.complaints_details,
        //                     post_information.post_id, post_information.post_description,
        //                     post_images_comments.post_image,
        //                     user_account.account_firstname, user_account.account_lastname
        //                 FROM
        //                     complaints
        //                 INNER JOIN
        //                     post_information ON complaints.post_id = post_information.post_id
        //                 LEFT JOIN
        //                     post_images_comments ON post_images_comments.post_id = post_information.post_id
        //                 INNER JOIN
        //                     user_account ON post_information.account_id = user_account.account_id";
                            
        $getReports = "SELECT
                            complaints.complaints_id, complaints.complaints_details,
                            post_information.post_id, post_information.post_description,
                            (
                                SELECT post_image
                                FROM post_images_comments
                                WHERE post_images_comments.post_id = post_information.post_id
                                LIMIT 1
                            ) AS post_image,
                                user_account.account_firstname, user_account.account_lastname
                            FROM complaints
                            INNER JOIN post_information ON complaints.post_id = post_information.post_id
                            INNER JOIN user_account ON post_information.account_id = user_account.account_id";

       $exec = mysqli_query($con, $getReports);

       if(mysqli_num_rows($exec) > 0)
       {
            reportsTable($exec);
       }
       else
       {
            echo"<center><h3>No reports available.</h3></center>";
       }
    }
    
    //table
    function reportsTable($exec)
    {
        include "connection.php";

        global $counter;
        echo '<table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reported Post</th>
                        <th>Posted By</th>
                        <th>Post Image</th>
                        <th>Report Reason</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
        while($populate = mysqli_fetch_assoc($exec))
        {
            echo'<tr>
                        <td>'.$populate["complaints_id"].'</td>
                        <td>'.$populate["post_description"].'</td>
                        <td>'.$populate["account_firstname"].' '.$populate["account_lastname"].'</td>
                        <td>';
                if (!empty($populate["post_image"])) 
                {
                    //echo '<img src="data:image/jpeg;base64,' . base64_encode($populate["post_image"]) . '">';
                    $plant_image = "SELECT
                            post_image
                        FROM
                            post_images_comments
                        WHERE
                            post_id = '".$populate["post_id"]."' ";

                    $img = mysqli_query($con, $plant_image);

                    if(mysqli_num_rows($img) > 0)
                    {
                        echo"<div class='card-info'>
                                <div class='slideshow-container'>";
                        while($image = mysqli_fetch_assoc($img))
                        {
                            $counter++;
                            echo"<div class='mySlides fade'>
                                    <img src='data:image/jpeg;base64,".base64_encode($image["post_image"])."' alt='Plant image' style='width:50%'
                                </div>
                                    <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
                                    <a class='next' onclick='plusSlides(1)'>&#10095;</a>
                                </div>
                                <br>";
                        }
                        echo"<div style='text-align:center'>";
                        for($i = 0; $i < $counter; $i++)
                        {
                            echo"<span class='dot' onclick='currentSlide(".$i.")'></span>";
                        }
                        echo"</div>
                            </div>";
                    }
                }
                else
                {
                    echo"No image posted.";
                }
            echo'   </td>         
                    <td>'.$populate["complaints_details"].'</td>
                        <td>           
                            <a href="#" class="btn btn-danger">Take Action</a>
                        </td>
                    </tr>';
        }
        echo'          
                </tbody>
            </table>';
    }

    //search for report
    function search()
    {
        include "connection.php";

        if(isset($_POST["btnSearch"]))
        {
            // echo"<center><h1>CLICKED!<h1></center>";
            $search_input = $_POST["searchInput"];

            $searchQuery = "SELECT
                                complaints.complaints_id, complaints.complaints_details,
                                post_information.post_id, post_information.post_description, 
                                (
                                    SELECT post_image
                                    FROM post_images_comments
                                    WHERE post_images_comments.post_id = post_information.post_id
                                    LIMIT 1
                                ) AS post_image,
                                    user_account.account_firstname, user_account.account_lastname
                            FROM complaints
                            INNER JOIN post_information ON complaints.post_id = post_information.post_id
                            INNER JOIN user_account ON post_information.account_id = user_account.account_id
                            WHERE
                                account_firstname LIKE '%$search_input%' 
                            OR
                                account_lastname LIKE '%$search_input%'
                            OR
                                post_description LIKE '%$search_input%'
                            OR
                                complaints_details LIKE '%$search_input%' ";
            
            $exec = mysqli_query($con, $searchQuery);

            if(mysqli_num_rows($exec) > 0)
            {
                reportsTable($exec);
            }
        }
    }
?>

<script>
    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>