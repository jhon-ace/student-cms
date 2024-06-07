
// Get the modal element
var modal = document.getElementById("modalShow");

// Get the link element to open the modal
var link = document.getElementById("openModal");

// Get the close button element
var closeButton = document.getElementById("closeModal");

// When the user clicks on the link, open the modal
link.onclick = function() {
modal.style.display = "flex";
}

// When the user clicks on the close button, close the modal
closeButton.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
