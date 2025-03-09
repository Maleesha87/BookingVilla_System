document.addEventListener("DOMContentLoaded", function () {
    const roomType = document.getElementById("roomType");
    const roomPrice = document.getElementById("roomPrice");
    const checkin = document.getElementById("checkin");
    const checkout = document.getElementById("checkout");
    const totalPrice = document.getElementById("totalPrice");

    const roomPrices = {
        "Deluxe Suite": 200,
        "Standard Room": 100,
        "Family Suite": 150
    };

    
    roomPrice.value = `$${roomPrices[roomType.value]}`;

    
    roomType.addEventListener("change", function () {
        const selectedRoom = roomType.value;
        roomPrice.value = `$${roomPrices[selectedRoom]}`;
        calculateTotalPrice(); 
    });


    function calculateTotalPrice() {
        const pricePerDay = roomPrices[roomType.value];
        const checkinDate = new Date(checkin.value);
        const checkoutDate = new Date(checkout.value);

        if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
            const numNights = (checkoutDate - checkinDate) / (1000 * 60 * 60 * 24);
            const total = numNights * pricePerDay;
            totalPrice.value = `$${total.toFixed(2)}`;
        } else {
            totalPrice.value = "";
        }
    }

    checkin.addEventListener("change", calculateTotalPrice);
    checkout.addEventListener("change", calculateTotalPrice);

    roomType.dispatchEvent(new Event("change"));
});


$(document).ready(function() {
    const images = ["images/7.jpg", "images/3.jpg", "images/4.jpg"];
    let currentIndex = 0;
    const imageElement = $("#villaImage");

    setInterval(function() {
        currentIndex = (currentIndex + 1) % images.length;

        
        imageElement.fadeOut(500, function() {
            imageElement.attr("src", images[currentIndex]);
            imageElement.fadeIn(500);
        });
    }, 6000); 
});


document.querySelector('form').addEventListener('submit', function(event) {
    const emailInput = document.getElementById('email').value;
    if (!emailInput.endsWith('@gmail.com')) {
        alert("Please enter an email address ending with @gmail.com");
        event.preventDefault(); 
    }
});