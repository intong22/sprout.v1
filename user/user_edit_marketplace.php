<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_edit_marketplace.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sale Details</title>

    <link rel="stylesheet" href="../css/admin_edit_encyclopedia.css">
    
    <!-- <link rel="stylesheet" type="text/css" href="../css/user_see_plant.css"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    

    <link rel="stylesheet" href="../css/swift.css">
    <script src="../js/swift.js"></script>

    
    <style>


    </style>
</head>
<body>
    <header style="padding:20px;">
       
    <a href="user_marketplace_profile.php"><i class='fas fa-arrow-left' style='font-size:36px; color:orange'></i></a>

       
    
    </header>
    <div class="container">
        <div class="card">
            <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="image-container"> 
                    <?php
                        displayImages();
                    ?>
                    <br><br>
                

                    <input type="file" name="add_images[]" class="upload-photo" class="fi fi-rr-picture" accept=".jpg, .png, .jpeg" multiple id="image-upload"><span class="tooltip" id="tooltip"><i class="fi fi-rr-picture"></i></span>
        </div>
        <div style="text-align:center;">
            <p><button type="submit" name="btnRemovePhoto" style="border:none;"> Remove photos </button></p>             
        </div>

                    <div class="plant-description">
                        <h2>Item name:</h2>
                            <input type="text" id="plant_name" name="plant_name" required value="<?php echo $plant_name; ?>"><br><br>
                        <h2>Description</h2>
                            <textarea id="description" name="description" rows="4" cols="50" required><?php echo $description; ?></textarea><br><br>
                        
                        <!-- CATEGORY -->
                        <h2>Category</h2>
                        <input type="checkbox" name="category[]" value="plant" <?php if(in_array("plant", $category)){ echo "checked"; } ?>/>Plant

                        <input type="checkbox" name="category[]" style="color: black;" value="soil" <?php if(in_array("soil", $category)){ echo "checked"; } ?>/>Soil

                        <input type="checkbox" name="category[]" value="seed" <?php if(in_array("seed", $category)){ echo "checked"; } ?>/>Seeds

                        <input type="checkbox" name="category[]" value="pot" <?php if(in_array("pot", $category)){ echo "checked"; } ?>/>Pots
                        
                        <input type="checkbox" name="category[]" value="tool" <?php if(in_array("tool", $category)){ echo "checked"; } ?>/>Tools

                        <input type="checkbox" name="category[]" value="decor" <?php if(in_array("decor", $category)){ echo "checked"; } ?>/>Decoration

                        <input type="checkbox" name="category[]" value="food" <?php if(in_array("food", $category)){ echo "checked"; } ?>/>Food

                        <h2>Price:</h2><br>
                            ₱ <input type="number" name="price" step=".01" required value="<?php echo $price; ?>"><br><br>    
                    </div>
                    <br><br>
                    <br><br>
                    <button type='submit' name='btnUpdate' class="buy" style="background:#1e5631;color:white;">Update</button>
            </form>
        </div>
    </div>

    

    <script src="../js/see_plant.js"></script>	

    <script>
        document.getElementById('image-upload').addEventListener('change', function () 
    {
        const fileInput = this;
        const tooltip = document.getElementById('tooltip');
        
        if (fileInput.files.length > 0) {
            tooltip.textContent = fileInput.files[0].name;
        } else {
            tooltip.textContent = 'Upload Photo';
        }
    });

    function validateForm() {
        // Get all checkboxes with the name "plant_type[]"
        var checkboxes = document.getElementsByName("category[]");

        // Check if at least one checkbox is checked
        var isChecked = false;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break;
            }
        }

        // Display an alert if no checkbox is checked
        if (!isChecked) {
            alert("Please select at least one category.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
    </script>


</body>
</html>