const stars = document.querySelectorAll('.fa-star');
const averageRating = document.getElementById('average-rating');
const totalRatings = document.getElementById('total-ratings');

stars.forEach(star => {
    star.addEventListener('click', () => {
        const rating = parseInt(star.getAttribute('data-rating'));
        // Simulate sending the rating to the server for storage and recalculation of the average.
        // In a real application, you would send this data to your server via an API.
        // Here, we're just updating the UI to simulate the change.
        updateRating(rating);

        // Remove the 'rated' class from all stars and add it only to the clicked star.
        stars.forEach(s => s.classList.remove('rated'));
        star.classList.add('rated');
    });
});

function updateRating(newRating) {
    // In a real application, send the newRating to the server via an API.
    // Here, we're simulating the update of the average rating and total ratings.
    const currentAverageRating = parseFloat(averageRating.innerText);
    const currentTotalRatings = parseInt(totalRatings.innerText);

    const newTotalRatings = currentTotalRatings + 1;
    const newAverageRating = ((currentAverageRating * currentTotalRatings) + newRating) / newTotalRatings;

    averageRating.innerText = newAverageRating.toFixed(1);
    totalRatings.innerText = newTotalRatings;
}

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