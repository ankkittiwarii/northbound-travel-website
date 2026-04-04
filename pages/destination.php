<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Destinations</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/destination.css">
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="destination-section">
    <div class="section-header">
        <h2>Explore Popular Destinations</h2>
        <p>Explore the rugged beauty, serene valleys, and cultural heritage of Northern India.</p>
    </div>

    <div id="destinations-container" class="destinations-grid"></div>
</section>

<script src="../assets/js/loginCheck.js"></script>
<script>
// 🔥 DESTINATION DATA
const destinationsData = [
    {
        id: 1, title: "Gulmarg", image: "../assets/images/gulmarg.jpg",
        description: "Experience Gulmarg, a snowy paradise for thrill-seekers and nature lovers alike.",
        attractions: "Skiing, Gondola Rides, Snowboarding.", bestTime: "December to March",
        mapLink: "https://maps.google.com/?q=Gulmarg"
    },
    {
        id: 2, title: "Leh-Ladakh", image: "../assets/images/ladakh.jpg",
        description: "Explore the rugged beauty of Leh-Ladakh, a haven for adventure enthusiasts and bikers.",
        attractions: "Pangong Lake, Nubra Valley, Magnetic Hill.", bestTime: "May to September",
        mapLink: "https://maps.google.com/?q=Leh+Ladakh"
    },
    {
        id: 3, title: "Rishikesh", image: "../assets/images/devbhumi.jpg",
        description: "The yoga capital of the world and a hub for spiritual seekers and river rafting enthusiasts.",
        attractions: "Laxman Jhula, Ram Jhula, Ganga Aarti, River Rafting.", bestTime: "September to November",
        mapLink: "https://maps.google.com/?q=Rishikesh"
    },
    {
        id: 4, title: "Dharamshala", image: "../assets/images/dharamshala.jpg",
        description: "Discover serenity in Dharamshala, home to the Dalai Lama and vibrant Tibetan culture.",
        attractions: "McLeodGanj, Bhagsu Waterfall, Triund Trek.", bestTime: "March to June",
        mapLink: "https://maps.google.com/?q=Dharamshala"
    },
    {
        id: 5, title: "Manali", image: "../assets/images/manali.avif",
        description: "The perfect blend of snow, adventure, and breathtaking Himalayan landscapes.",
        attractions: "Solang Valley, Rohtang Pass, Hidimba Temple.", bestTime: "October to February",
        mapLink: "https://maps.google.com/?q=Manali"
    },
    {
        id: 6, title: "Shimla", image: "../assets/images/shimla.avif",
        description: "A poetry of the hills, written in snow and sun-kissed peaks.",
        attractions: "Mall Road, Jakhoo Temple, The Ridge.", bestTime: "March to June",
        mapLink: "https://maps.google.com/?q=Shimla"
    },
    {
        id: 7, title: "Kasol", image: "../assets/images/kasol.avif",
        description: "Nestled in the Parvati Valley, this 'Mini Israel of India' is a haven for backpackers.",
        attractions: "Parvati River, Kheerganga Trek, Tosh Village.", bestTime: "October to June",
        mapLink: "https://maps.google.com/?q=Kasol"
    },
    {
        id: 8, title: "Kufri", image: "../assets/images/kufri.avif",
        description: "A charming hill station known for its snow-covered peaks and skiing slopes.",
        attractions: "Mahasu Peak, Skiing, Himalayan Nature Park.", bestTime: "November to March",
        mapLink: "https://maps.google.com/?q=Kufri"
    },
    {
        id: 9, title: "Dehradun", image: "../assets/images/dehradun.jpg",
        description: "The picturesque capital of Uttarakhand, nestled in the Doon Valley.",
        attractions: "Robber's Cave, Forest Research Institute.", bestTime: "March to June",
        mapLink: "https://maps.google.com/?q=Dehradun"
    },
    {
        id: 10, title: "Amritsar", image: "../assets/images/amritsar.avif",
        description: "The spiritual and cultural heart of Punjab, home to the serene Golden Temple.",
        attractions: "Golden Temple, Jallianwala Bagh, Wagah Border.", bestTime: "October to March",
        mapLink: "https://maps.google.com/?q=Amritsar"
    },
    {
        id: 11, title: "Mussoorie", image: "../assets/images/mussoorie.avif",
        description: "The 'Queen of the Hills' offering colonial charm and misty mountain walks.",
        attractions: "Kempty Falls, Camel's Back Road, Gun Hill.", bestTime: "March to June",
        mapLink: "https://maps.google.com/?q=Mussoorie"
    },
    {
        id: 12, title: "Nainital", image: "../assets/images/nainital.avif",
        description: "A picturesque hill station built around a stunning, mango-shaped lake.",
        attractions: "Naini Lake, Snow View Point, Mall Road.", bestTime: "March to June",
        mapLink: "https://maps.google.com/?q=Nainital"
    },
    {
        id: 13, title: "Spiti", image: "../assets/images/spiti.avif",
        description: "A cold desert mountain valley offering raw, rugged landscapes and monasteries.",
        attractions: "Key Monastery, Chandratal Lake, Kunzum Pass.", bestTime: "May to October",
        mapLink: "https://maps.google.com/?q=Spiti"
    },
    {
        id: 14, title: "Auli", image: "../assets/images/auli.jpg",
        description: "A premium ski resort destination offering panoramic views of the Nanda Devi Peaks.",
        attractions: "Auli Ropeway, Skiing, Trekking.", bestTime: "December to March",
        mapLink: "https://maps.google.com/?q=Auli"
    },
    {
        id: 15, title: "Jaisalmer", image: "../assets/images/jaisalmer.jpg",
        description: "Known as the 'Golden City', offering magnificent yellow sandstone architecture.",
        attractions: "Jaisalmer Fort, Sam Sand Dunes, Gadisar Lake.", bestTime: "October to March",
        mapLink: "https://maps.google.com/?q=Jaisalmer"
    }
];

function loadDestinations() {
    const container = document.getElementById('destinations-container');
    container.innerHTML = '';

    destinationsData.forEach((dest, index) => {
        // Added an image wrapper for the hover zoom effect and rel="noopener" for security
        const cardHTML = `
        <div class="card" style="animation-delay: ${index * 0.05}s">
            <div class="card-img-wrapper">
                <img src="${dest.image}" alt="${dest.title}" class="card-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">${dest.title}</h3>
                <p class="card-desc">${dest.description}</p>
                <div class="card-details">
                    <span><strong>Key Attractions: </strong>${dest.attractions}</span>
                    <span><strong>Best Time to Visit: </strong>${dest.bestTime}</span>
                </div>
                <a href="${dest.mapLink}" class="card-btn" target="_blank" rel="noopener noreferrer">View on Map</a>
            </div>
        </div> 
        `; 
        container.innerHTML += cardHTML;
    });
}

document.addEventListener('DOMContentLoaded', loadDestinations);
</script>

</body>
</html>