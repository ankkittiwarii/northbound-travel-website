<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Premium Hotels</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/hotels.css">
</head>
<body>

<?php include "../includes/navbar.php"; ?>

<section class="hotels-section">
    <div class="section-header">
        <span class="category-label">ACCOMMODATIONS</span>
        <h2 class="main-title">Stays Across the Himalayas & Beyond</h2>
    </div>

    <div class="booking-bar">
        <div class="booking-input">
            <label>Stay Duration</label>
            <select id="days-filter" name="days">
                <option value="1">1 Night</option>
                <option value="2" selected>2 Nights</option>
                <option value="3">3 Nights</option>
                <option value="5">5+ Nights</option>
            </select>
        </div>

        <div class="booking-input">
            <label>Check-in</label>
            <input type="date" id="checkin">
        </div>

        <div class="booking-input">
            <label>Check-out</label>
            <input type="date" id="checkout" readonly title="Calculated automatically based on duration">
        </div>

        <div class="booking-input">
            <label>Guests</label>
            <select id="guests">
                <option value="1">1 Guest</option>
                <option value="2" selected>2 Guests</option>
                <option value="3">3 Guests</option>
                <option value="4">4 Guests</option>
            </select>
        </div>

        <button class="search-btn">Check Prices</button>
    </div>

    <div class="destination-nav-wrapper">
        <div class="destination-nav">
            <a href="#leh" class="nav-pill">Leh Ladakh</a>
            <a href="#gulmarg" class="nav-pill">Gulmarg</a>
            <a href="#rishikesh" class="nav-pill">Rishikesh</a>
            <a href="#dharamshala" class="nav-pill">Dharamshala</a>
            <a href="#manali" class="nav-pill">Manali</a>
            <a href="#shimla" class="nav-pill">Shimla</a>
            <a href="#kasol" class="nav-pill">Kasol</a>
            <a href="#kufri" class="nav-pill">Kufri</a>
            <a href="#dehradun" class="nav-pill">Dehradun</a>
            <a href="#amritsar" class="nav-pill">Amritsar</a>
            <a href="#mussoorie" class="nav-pill">Mussoorie</a>
            <a href="#nainital" class="nav-pill">Nainital</a>
            <a href="#spiti" class="nav-pill">Spiti</a>
            <a href="#auli" class="nav-pill">Auli</a>
            <a href="#jaisalmer" class="nav-pill">Jaisalmer</a>
        </div>
    </div>

    <div id="leh" class="location-section">
        <h3 class="location-title">Top Picks in Leh Ladakh</h3>
        <div class="hotels-grid">
            <div class="hotel-card luxury">
                <div class="card-img-wrapper"><img src="../assets/images/leh.webp" alt="The Grand Dragon Ladakh"></div>
                <div class="card-content">
                    <h3 class="hotel-name">The Grand Dragon (Leh)</h3>
                    <p class="hotel-desc">Refined 5-Star hotel with airy rooms, suites, some with mountain views.</p>
                    <div class="hotel-details">
                        <p><strong>Rating:</strong> ★★★★★ (4.5/5)</p>
                        <p class="price-display"><strong>Total (2 nights):</strong> ₹21,299</p>
                    </div>
                </div>
            </div>
            <div class="hotel-card luxury">
                <div class="card-img-wrapper"><img src="../assets/images/Dolkhar.jpg" alt="Dolkhar Resort"></div>
                <div class="card-content">
                    <h3 class="hotel-name">Dolkhar Resort (Leh)</h3>
                    <p class="hotel-desc">Beautiful Boutique luxury resort with traditional Ladakhi architecture and great views.</p>
                    <div class="hotel-details">
                        <p><strong>Rating:</strong> ★★★★★ (4.8/5)</p>
                        <p class="price-display"><strong>Total (2 nights):</strong> ₹27,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="section-divider">

    <div id="gulmarg" class="location-section">
        <h3 class="location-title">Top Picks in Gulmarg</h3>
        <div class="hotels-grid">
            <div class="hotel-card luxury">
                <div class="card-img-wrapper"><img src="../assets/images/khyber.jpg" alt="The Khyber Himalayan Resort & Spa"></div>
                <div class="card-content">
                    <h3 class="hotel-name">The Khyber Resort (Gulmarg)</h3>
                    <p class="hotel-desc">Upscale ski-in/ski-out hotel with dining & views of the Himalayas.</p>
                    <div class="hotel-details">
                        <p><strong>Rating:</strong> ★★★★★ (4.6/5)</p>
                        <p class="price-display"><strong>Total (2 nights):</strong> ₹66,324</p>
                    </div>
                </div>
            </div>
            <div class="hotel-card luxury">
                <div class="card-img-wrapper"><img src="../assets/images/heeven.jpg" alt="Heeven Retreat Gulmarg"></div>
                <div class="card-content">
                    <h3 class="hotel-name">Hotel Heeven Retreat (Gulmarg)</h3>
                    <p class="hotel-desc">Experience luxury accommodation at Heeven Retreat featuring breathtaking snowy mountain views.</p>
                    <div class="hotel-details">
                        <p><strong>Rating:</strong> ★★★★★ (4.9/5)</p>
                        <p class="price-display"><strong>Total (2 nights):</strong> ₹18,500</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="section-divider">

    <div id="rishikesh" class="location-section">
        <h3 class="location-title">Top Picks in Rishikesh</h3>
        <div class="hotels-grid">
            <div class="hotel-card luxury">
                <div class="card-img-wrapper"><img src="../assets/images/aloha.jpg" alt="Aloha on the Ganges Rishikesh"></div>
                <div class="card-content">
                    <h3 class="hotel-name">Aloha on the Ganges (Rishikesh)</h3>
                    <p class="hotel-desc">A beautiful, serene resort located right on the banks of the Ganges, offering a perfect blend of nature and comfort.</p>
                    <div class="hotel-details">
                        <p><strong>Rating:</strong> ★★★★☆ (4.4/5)</p>
                        <p class="price-display"><strong>Total (2 nights):</strong> ₹12,500</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="../assets/js/loginCheck.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkinInput = document.getElementById('checkin');
    const checkoutInput = document.getElementById('checkout');
    const filterDropdown = document.getElementById('days-filter');
    const searchBtn = document.querySelector('.search-btn');
    const hotelCards = document.querySelectorAll('.hotel-card');
    const hotelGrid = document.querySelector('.location-section'); // Scroll target

    // 1. Calculate and store base price (per night) on page load
    hotelCards.forEach(card => {
        const priceParagraph = card.querySelector('.price-display'); 
        if(priceParagraph) {
            let text = priceParagraph.innerText;
            let priceParts = text.split(':'); 
            if(priceParts.length > 1) {
                let priceString = priceParts[1].replace(/[^0-9]/g, ''); 
                let totalForTwoNights = parseInt(priceString);
                if(!isNaN(totalForTwoNights)) {
                    let pricePerNight = totalForTwoNights / 2; // Assuming default text is 2 nights
                    priceParagraph.setAttribute('data-per-night', pricePerNight);
                }
            }
        }
    });

    // 2. Automatically set Check-out Date based on Check-in + Days selected
    function updateCheckoutDate() {
        if (checkinInput.value) {
            let checkinDate = new Date(checkinInput.value);
            let nights = parseInt(filterDropdown.value); 

            checkinDate.setDate(checkinDate.getDate() + nights);

            let year = checkinDate.getFullYear();
            let month = String(checkinDate.getMonth() + 1).padStart(2, '0');
            let day = String(checkinDate.getDate()).padStart(2, '0');

            checkoutInput.value = `${year}-${month}-${day}`;
        }
    }

    checkinInput.addEventListener('change', updateCheckoutDate);
    filterDropdown.addEventListener('change', updateCheckoutDate);

    // 3. Update Prices on Click
    searchBtn.addEventListener('click', function() {
        if (!checkinInput.value) {
            alert("Please select a Check-in date to view accurate prices.");
            return;
        }

        let selectedNights = parseInt(filterDropdown.value);

        hotelCards.forEach(card => {
            const priceParagraph = card.querySelector('.price-display');
            if(priceParagraph) {
                let perNight = priceParagraph.getAttribute('data-per-night');
                if(perNight) {
                    let newTotal = perNight * selectedNights;
                    let formattedPrice = newTotal.toLocaleString('en-IN');
                    let nightText = selectedNights === 1 ? 'night' : 'nights';
                    
                    priceParagraph.innerHTML = `<strong>Total (${selectedNights} ${nightText}):</strong> ₹${formattedPrice}`;
                    
                    // Add a small highlight animation class
                    priceParagraph.classList.add('price-updated');
                    setTimeout(() => priceParagraph.classList.remove('price-updated'), 500);
                }
            }
        });

        // Smooth scroll to the first hotel section
        hotelGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});
</script>
</body>
</html>