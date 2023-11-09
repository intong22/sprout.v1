<?php
  include "../backend/session_logged_in.php";
  include "../backend/bcknd_user_messaging.php";
  include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <title>Messages</title>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #1E5631;
            color: #fff;
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            
        }

        /* Chat Window Styles */
        .chat-window {
            width: auto;
            background-color: #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Style for chat cards */
        .chat-card {
            display: flex;
            width:100%;
            margin: auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Chat Area Styles */
        .chat-area {
            flex-grow: 1;
            width:auto;
            background-color: #fff;
            overflow-y: scroll;
            padding: 70px;
        }

        /* User Card Styles */
        .user-card {
            
            padding: 10px;
           
            cursor: pointer;
            border-bottom: 1px solid #ccc;
        }

        .user-card:hover {
            background-color: #ddd;
        }

        /* Message Styles */
        .message {
            font-size: 16px;
            margin-bottom: 10px;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            max-width: 100%;
        }

        .outgoing-message {
           font-size: 12px;
            background-color: #1E5631;
            text-align: right;
            color: #fff;
            align-self: flex-end; /* Align outgoing messages to the right */
        }

        /* Style for incoming messages on the left */
        .incoming-message {
            background-color: #e6e6e6;
            text-align: left;
            align-self: flex-start; /* Align incoming messages to the left */
        }
        .message-timestamp {
            font-size: 8px;
            color: #777;
            margin-top: 2px;
        }

/* Style for user list on the left side (if applicable) */
.user-list {
  width:auto;
  background-color: #f0f0f0;
  border-right: 1px solid #ccc;
  padding: 20px;
  overflow-y: auto;
}

/* Style for individual user items in the user list */
.user {
  padding: 5px;
  border-radius: 10px;
  cursor: pointer;
  border-bottom: 1px solid #ccc;
}

.user:hover {
  background-color: #ddd;
}

/* Style for the selected user in the user list */
.user.selected {
  background-color: #007bff;
  color: #fff;
}
.user-input {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            background-color: #f0f0f0;
            border-top: 1px solid #ccc;
            margin-bottom:0px;
                  }

        /* Style for the message input field */
        #message-input {
            flex-grow: 1;
            padding: 10px;
            border: none;
        }

        /* Style for the send button */
        #send-button {
            padding: 5px 10px;
            background-color: #1E5631;
            color: #fff;
            border: none;
            cursor: pointer;
            align-items:bottom;
        }
        .product-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin: 10px;
            max-width: 200px;
        }
       .card{
        padding:5px;
        background-color:#1E5631;
        max-width:200px;
        border-radius: 10px;
        margin: auto;
        color:white;
        text-align: right;
    
       
       }
       .cards{
        padding:5px;
        background-color:orange;
        margin-right: 0px;
        max-width:200px;
        border-radius: 10px;
        color:white;
        margin: left;
        text-align: left;
       }


        .product-image {
            max-width: 100%;
            height: auto;
        }

        .product-name {
            font-size: 16px;
            margin-top: 10px;
        }

        .product-price {
            font-size: 18px;
            color: #007bff;
            margin-top: 5px;
        }

        /* Style the label that acts as the icon */
    .file-label {
        cursor: pointer;
        display: inline-block;
        position: relative;
        padding: 10px;
    }

    /* Style the icon within the label */
    .file-label box-icon {
        font-size: 24px; /* Adjust the size as needed */
        color: #fff; /* Icon color */
    }

    /* Hide the default file input button */
    #file-input {
        display: none;
    }

    </style>
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
                  echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";   
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
                <form method="GET" action="#">
                     <input name="searchInput" class="search-input" type="text" placeholder="Search...">
                     <button name="btnSearch" class="search-button" type="submit">Search</button>
               </form><br><br>

                  <!-- list of chats from sidebar go here -->
                    <?php chats(); ?>
                  <!-- <div class="user-card" id="user1">Hello</div> -->
                    
                </div>

            <?php
                if(empty($seller_name) || empty($sale_image) || empty($item_name) || empty($item_price) )
                {
                  $seller_name = "";
                  $sale_image = "";
                  $item_name = "";
                  $item_price = "";
                }
            ?>

            <div class='chat-area'>
                
                    <div class='chat-header'>
                        <h3><span id='selected-user-name'><?php echo $seller_name ?></span></h3>
                    </div>

                    <div class='chat-messages' id='chat-messages' style='font-size:20px'>
                    
                      <div class='product-card'>
                        <?php echo $sale_image ?>
                          <div class='product-name'><?php echo $item_name ?></div>
                          <div class='product-price'><?php echo $item_price ?></div>
                      </div>
                      <br>
                
                <!-- chat data here -->
                <?php //chatBubble(); ?>
            
              </div>
            
              <br>
            
              <form method='POST' enctype='multipart/form-data'>
                <div class='user-input'>
                  <input type='text' name='message_details' id='message-input' placeholder='Type your message...'>
            
                  <input type='file' name='message_photo[]' accept='.png, .jpg, .jpeg' hidden id='file-input'>
            
                  <label for='file-input' class='file-label'><box-icon name='image-add'></box-icon></label>
            
                  <button type='submit' name='btnMessage' id='send-button'
                    style='border: none; background-color: transparent;'><box-icon name='send'></box-icon></button>
            
                </div>
              </form>
            
              <img id='image-preview' style='max-width: 100%; display: none;'>
            
            </div>
            </div>
           
        </div>
    </section>

    <script>

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

    //     function sendMessage() {
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
        // });
        
    // </script>
</body>

</html>
