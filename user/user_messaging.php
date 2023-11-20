<?php
  // error_reporting(0);
  include "../backend/bcknd_user_messaging.php";
  include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_messaging.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <title>Messages</title>
</head>

<body>
<div class="sidebar">
      <div class="logo-details">
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <i class='bx bx-menu' id="btn" > </i>         
      <div class="logo_name">Sprout</div>  
      </div>
      <ul class="nav-list">
    <li>
      <a href="user_homepage.php">
        <i class='bx bx-home' ></i>
        <span class="links_name">Home</span>
      </a>
      <span class="tooltip">HOME</span>
      </li>
    <li>
    <a href="user_encyclopedia.php">
      <i class='bx bx-book-open' ></i>
        <span class="links_name">Encyclopedia</span>
    </a>
      <span class="tooltip">ENCYCLOPEDIA</span>
    </li>
    <li>
    <a href="user_forum.php">
      <i class='bx bx-chat' ></i>
      <span class="links_name">Community Forum</span>
    </a>
    <span class="tooltip">COMMUNITY FORUM</span>
    </li>
    <li>
    <a href="user_marketplace.php">
      <i class='bx bx-folder' ></i>
      <span class="links_name">Marketplace</span>
    </a>
      <span class="tooltip">MARKETPLACE</span>
    </li>
    <li>
    <a href="user_bookmark.php">
      <i class='bx bx-book-bookmark' ></i>
      <span class="links_name">Bookmark</span>
    </a>
      <span class="tooltip">BOOKMARK</span>
    </li>
    <li>
    <a href="user_like.php">
      <i class='bx bxs-cart-add' ></i>
        <span class="links_name">Cart</span>
    </a>
      <span class="tooltip">CART</span>
    </li>
    <li>
    <a href="user_profile.php">
    <i class='bx bx-user' ></i>
      <span class="links_name">User</span>
    </a>
    <span class="tooltip">USER PROFILE</span>
    </li>
    <li>
    <a href="user_subscription.php">
    <i class='bx bx-dollar' ></i>
      <span class="links_name">Subscription</span>
    </a>
    <span class="tooltip">SUBSCRIPTION</span>
    </li>
     <li class="profile">
         <div class="profile-details">
            <?php 
                if($flag == true)
                {
                  echo $image; 
                }
                else
                {
                  echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' />";   
                } 
            ?> 
            <div class="name_job">
              <div class="name"><?php echo $fname." ".$lname; ?></div>
              <div class="job"><?php echo $status; ?></div>
            </div>
		   <a href="../backend/session_end.php">
         <i class='bx bx-log-out' id="log_out" ></i>
		 </a>
		   <span class="tooltip">LOGOUT</span>
     </li>
    </ul>
  </div>
  <script src="../js/homepage.js"></script>	
  <section class="home-section">
  
        <header>
        <h1>Messages</h1>
        </header>
        <div class="container">
          
            <div class="chat-card">
            
                <div class="user-list">
                  <h4>My chats</h4>

                  <!-- list of chats from sidebar go here -->
                    <?php 
                        chats();
                    ?>
            <?php
                if(empty($seller_name) || empty($sale_image) || empty($item_name) || empty($item_price) )
                {
                  $seller_name = "";
                  $sale_image = "";
                  $item_name = "";
                  $item_price = "";
                }

                if(!isset($_POST["btnSellerChat"]))
                {
                  echo"
                  </div>
                   <div class='chat-area'>
                    <div class='chat-messages' id='chat-messages' style='font-size:20px'>
                      <div class='product-card'>
                          </h4>No conversation selected.</h4>
                      </div>
                      <br>
                  </div>";
                }
                else
                {
                  $plant_sale_id = $_POST["btnSellerChat"];
                  $message_id = $_POST["message_id"];

                  // echo "plant_sale_id: ".$plant_sale_id."<br>";
                  // echo "message_id: ".$message_id."<br>";

                  echo"</div>
                    <div class='chat-area'>
                          <div class='chat-header'>
                              <h3><span id='selected-user-name'>Seller: ".$seller_name."</span></h3>
                          </div>

                          <div class='chat-messages' id='chat-messages' style='font-size:20px'>
                          
                          <a href='user_see_plant.php?plant_sale_id=".$plant_sale_id."' style='text-decoration: none;'>
                            <div class='product-card'>
                              ".$sale_image."
                                <div class='product-name'>".$item_name."</div>
                                <div class='product-price'>".$item_price."</div>
                            </div>
                          </a>

                            <br>
                            
                          <div class='chat-content' id='chat-content'>";
                      
                        $chatHtml = chatBubble($plant_sale_id, $message_id);
                        // chat data here
                        if(!empty($chatHtml))
                        {
                          echo $chatHtml;
                        }
                    
                  echo"</div>
                    </div>";
                  
                  echo"
                      <br>
            
                        <form method='POST' enctype='multipart/form-data' id='messageForm'>
                          <div class='user-input'>
                            <input type='text' name='message_details' id='message-input' placeholder='Type your message...'>
                      
                            <input type='file' name='message_photo[]' accept='.png, .jpg, .jpeg' hidden id='file-input'>
                      
                            <label for='file-input' class='file-label'><box-icon name='image-add'></box-icon></label>
                      
                            <button type='button' name='btnMessage' id='send-button'
                              style='border: none; background-color: transparent;' value=".$message_id."><box-icon name='send'></box-icon></button>
                              <input type='hidden' id='plant_sale_id' value='".$plant_sale_id."' name='plant_sale_id'>

                      
                          </div>
                          </form>

                        <img id='image-preview' style='max-width: 100%; display: none;'>";
                }
            ?>
            
            </div>
            </div>
           
        </div>
    </section>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    $(document).on('click', '#send-button', function() {
        var message = $('#message-input').val();
        var image = $('#file-input')[0].files[0];  // Get the first selected file
        var message_id = $(this).val();  // Get the value from the button

        var formData = new FormData();
        formData.append('btnMessage', message_id);
        formData.append('plant_sale_id', $('#plant_sale_id').val()); // Add plant_sale_id
        formData.append('message_details', message);
        formData.append('message_photo', image);

        $.ajax({
            url: '../backend/bcknd_user_messaging.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Handle the response from the server
                console.log(response);

                // Assuming the server returns the chat HTML
                var chatHtml = $(response).find('#chat-content').html();
                $('#chat-content').html(chatHtml);

                // Update other elements that need to be refreshed
                $('#selected-user-name').html($(response).find('#selected-user-name').html());
                // Include other elements as needed

                // Clear input fields
                $('#message-input').val('');
                $('#file-input').val('');

                // Clear image preview
                $('#image-preview').attr('src', '').css('display', 'none');
            },
            error: function(xhr, status, error) {
                // Handle errors, if any
                console.error(xhr.responseText);
            }
        });
    });
});

function updateChat() {
        // Get plant_sale_id and message_id
        var plant_sale_id = $('#plant_sale_id').val();
        var message_id = <?php echo json_encode($message_id); ?>;

        // Use AJAX to fetch updates
        $.ajax({
            url: '../backend/bcknd_user_messaging.php',
            type: 'POST',
            data: {
                action: 'updateChat',
                plant_sale_id: plant_sale_id,
                message_id: message_id
            },
            success: function(response) {
                // Update the chat area with the new messages
                $('#chat-content').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    setInterval(updateChat, 100);

// Preview image on file input change
document.getElementById("file-input").addEventListener("change", function (event) {
    const fileInput = event.target;
    const imagePreview = document.getElementById("image-preview");

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
});

updateChat();
</script>

</body>

</html>

<!-- //     function sendMessage() {
    //         const messageInput = document.getElementById('message-input');
    //         const message = messageInput.value.trim();
    //         if (message !== '') {
    //             const chatMessages = document.querySelector('.chat-messages');
    //             const messageElement = document.createElement('div');
    //             messageElement.classList.add('message', 'outgoing-message'); // Use outgoing-message class

    //             const now = new Date();
    //             const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    //             // Append the message and timestamp to the chat
    //             messageElement.innerHTML = `<p>${message}</p><span class="time">${timeString}</span>`;
    //             chatMessages.appendChild(messageElement);

    //             messageInput.value = '';
    //             chatMessages.scrollTop = chatMessages.scrollHeight;
    //         }
    //     }

        // Event listener
        // document.getElementById('send-button').addEventListener('click', sendMessage);
        // document.getElementById('message-input').addEventListener('keydown', (event) => {
        //     if (event.key === 'Enter') {
        //         event.preventDefault();
        //         sendMessage();
        //     }
        // }); -->