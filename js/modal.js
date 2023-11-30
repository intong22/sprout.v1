// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on the button, open the modal
// btn.onclick = function() {
//   modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }

// Function to handle modal opening and closing
function handleModal(postId) {
  // Get the corresponding modal for this button
  var modal = document.getElementById("myModal");

  // Get the <span> element that closes the modal
  var span = modal.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  document.getElementById("myBtn" + postId).onclick = function () {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}

// Get all buttons with the class 'reportBtn'
var reportButtons = document.querySelectorAll('.reportBtn');

// Iterate over each button and call the function to handle modal
reportButtons.forEach(function (button) {
  // Extract post ID from the button's ID
  var postId = button.id.replace('myBtn', '');

  // Call the function to handle modal for this button
  handleModal(postId);
});
