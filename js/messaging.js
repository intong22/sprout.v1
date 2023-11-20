// $(document).ready(function () {
//     $('#send-button').on('click', function () {
//         var message = $('#message-input').val();
//         var image = $('#file-input')[0].files[0];  // Get the first selected file
//         var message_id = $(this).val();  // Get the value from the button

//         var formData = new FormData();
//         formData.append('message_details', message);
//         formData.append('message_photo', image);
//         formData.append('btnMessage', message_id);

//         $.ajax({
//             url: '../backend/bcknd_user_messaging.php',
//             type: 'POST',
//             data: formData,
//             contentType: false,
//             processData: false,
//             success: function (response) {
//                 // Handle the response from the server
//                 console.log(response);
//                 // console.log("Ajax response:", response);

//                 // Assuming the server returns the chat HTML
//                 $('#chat-messages').html(response);

//                 // Clear input fields
//                 $('#message-input').val('');
//                 $('#file-input').val('');
//             },
//             error: function (xhr, status, error) {
//                 // Handle errors, if any
//                 console.error(xhr.responseText);
//             }
//         });
//     });
// });

// // Preview image on file input change
// document.getElementById("file-input").addEventListener("change", function (event) {
//     const fileInput = event.target;
//     const imagePreview = document.getElementById("image-preview");

//     if (fileInput.files && fileInput.files[0]) {
//         const reader = new FileReader();

//         reader.onload = function (e) {
//             imagePreview.src = e.target.result;
//             imagePreview.style.display = "block";
//         };

//         reader.readAsDataURL(fileInput.files[0]);
//     }
// });