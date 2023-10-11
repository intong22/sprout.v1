<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
        }

        /* Chat Window Styles */
        .chat-window {
            width: 200%;
            background-color: #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
        }
/* Style for the chat area */
.chat-area {
  flex-grow: 1; /* Allow the chat area to expand and fill available space */
  background-color: #fff; /* Set the background color */
  overflow-y: scroll; /* Enable vertical scrolling when needed */
  padding: 50px;
}

/* Style for individual chat messages */
.message {
  margin-bottom: 10px;
  background-color: #f0f0f0;
  padding: 10px;
  border-radius: 5px;
  max-width: 80%; /* Limit message width to 80% of the chat area */
}

/* Style for incoming messages */
.incoming-message {
  background-color: #e6e6e6; 
  text-align: left; /* Align incoming messages to the left */
}

/* Style for outgoing messages */
.outgoing-message {
  background-color: #007bff;
  text-align: right; /* Align outgoing messages to the right */
  color: #fff; /* Change text color for outgoing messages */
}

/* Style for the timestamp of messages */
.message-timestamp {
  font-size: 12px;
  color: #777;
  margin-top: 5px;
}

/* Style for user list on the left side (if applicable) */
.user-list {
  width: 20%; /* Adjust the width as needed */
  background-color: #f0f0f0;
  border-right: 1px solid #ccc;
  padding: 20px;
  overflow-y: auto;
}

/* Style for individual user items in the user list */
.user {
  padding: 10px;
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


    </style>
</head>

<body>
<div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
       <i class='bx bx-menu' id="btn" ></i>
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
       
    </div>
    <ul class="nav-list">
      <li>
        <a href="user_homepage.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="user_profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">USER PROFILE</span>
     </li>
     <li>
       <a href="user_encyclopedia.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">ENCYCLOPEDIA</span>
     </li>
     <li>
       <a href="user_forum.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
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
       <a href="user_favorite.php">
       <i class='bx bx-book-bookmark' ></i>
         <span class="links_name">Favorites</span>
       </a>
       <span class="tooltip">Favorites</span>
     </li>
     <li>
       <a href="user_like.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
 <li>
       <a href="user_settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">SETTINGS</span>
     </li>
     <li class="profile">
         <div class="profile-details">
         <div class="profile-image-container" onclick="toggleUploadButton()">
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
             <input type="file" id="upload-photo" accept="image/*" style="display: none;">
        </div>
        <!-- Button to trigger file input -->
        <label for="upload-photo" id="upload-button" class="upload-button">
            <i class="bx bx-camera"></i> Upload Profile
        </label>
            <div class="name_job">
              <div class="name"><?php echo $fname." ".$lname; ?></div>
              <div class="job"><?php echo $status; ?></div>
            </div>
        </div>
		   <a href="../backend/session_end.php">
         <i class='bx bx-log-out' id="log_out" ></i>
		 </a>
		   <span class="tooltip">LOGOUT</span>
     </li>
    </ul>
  </div>
  
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
    <header>
        <h1>Messages</h1>
    </header>
    <div class="container">
       
        <div class="user-list">
            <div class="user" id="user1">User 1</div>
            <div class="user" id="user2">User 2</div>
        
        </div>
       
        <div class="chat-area">
            <div class="chat-header">
                <h2>Chat with <span id="selected-user-name">User 1</span></h2>
            </div>
            <div class="chat-messages" id="chat-messages">
               
            </div>
            <div class="user-input">
                <input type="text" id="message-input" placeholder="Type your message...">
                <button id="send-button">Send</button>
            </div>
        </div>
        
    </div>

    <script>
        function sendMessage() {
            const messageInput = document.getElementById('message-input');
            const message = messageInput.value.trim();
            if (message !== '') {
                const chatMessages = document.querySelector('.chat-messages');
                const messageElement = document.createElement('div');
                messageElement.classList.add('message');

               
                const now = new Date();
                const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                // Append the message and timestamp to the chat
                messageElement.innerHTML = `<p>${message}</p><span class="time">${timeString}</span>`;
                chatMessages.appendChild(messageElement);

                messageInput.value = '';
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        }

        // Event listener
        document.getElementById('send-button').addEventListener('click', sendMessage);
        document.getElementById('message-input').addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault();
                sendMessage();
            }
        });
        
    </script>
</body>

</html>
