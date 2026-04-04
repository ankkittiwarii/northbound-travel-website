<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Featured Activities</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">   
    <link rel="stylesheet" href="../assets/css/activities.css">
</head>

<body>
    
<?php include "../includes/navbar.php"; ?>

<section class="activities-section">
    <div class="section-header">
        <span class="category-label">ADVENTURE AWAITS</span>
        <h2 class="section-title">Featured Activities</h2>
        <p class="section-subtitle">Dive into the thrill of the North with our handpicked adventures.</p>
    </div>

    <div class="activities-grid">
        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/riverrafting.jpg" alt="River Rafting in Rishikesh">
            </div>
            <div class="card-content">
                <h3 class="card-title">River Rafting in Rishikesh</h3>
                <p class="card-description">Navigate through thrilling rapids on the sacred Ganga river.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Beginner to Advanced</span>
                    <span><strong>Duration:</strong> 3-4 hours</span>
                    <span><strong>Location:</strong> Rishikesh, Uttarakhand</span>
                    <span><strong>Safety Tips:</strong> Wear life jackets, follow guide instructions.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/skiing.jpg" alt="Skiing in Gulmarg">
            </div>
            <div class="card-content">
                <h3 class="card-title">Skiing in Gulmarg</h3>
                <p class="card-description">Glide through pristine snow slopes in Asia's finest skiing destination.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Beginner to Advanced</span>
                    <span><strong>Duration:</strong> 3-4 hours per session</span>
                    <span><strong>Location:</strong> Gulmarg, Kashmir</span>
                    <span><strong>Safety Tips:</strong> Take lessons from certified instructors.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/jakhootemple.jpg" alt="Jakhoo Temple Trek in Shimla">
            </div>
            <div class="card-content">
                <h3 class="card-title">Jakhoo Temple Trek in Shimla</h3>
                <p class="card-description">Trek to Shimla's highest point and visit the famous Hanuman Temple.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Moderate</span>
                    <span><strong>Duration:</strong> 2-3 hours</span>
                    <span><strong>Location:</strong> Jakhoo Hill, Shimla</span>
                    <span><strong>Safety Tips:</strong> Start early morning, carry water.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/triundtrek.jfif" alt="Triund Trek in Dharamshala">
            </div>
            <div class="card-content">
                <h3 class="card-title">Triund Trek in Dharamshala</h3>
                <p class="card-description">Experience breathtaking Himalayan views on this popular trek near McLeodGanj.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Moderate</span>
                    <span><strong>Duration:</strong> 4-6 hours (one-way)</span>
                    <span><strong>Location:</strong> McLeodGanj, Dharamshala</span>
                    <span><strong>Safety Tips:</strong> Start early, carry water, wear proper footwear.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/lehladakh.jfif" alt="Mountain Biking in Leh-Ladakh">
            </div>
            <div class="card-content">
                <h3 class="card-title">Mountain Biking in Leh-Ladakh</h3>
                <p class="card-description">Ride through high-altitude passes and barren, rugged mountain terrains.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Advanced</span>
                    <span><strong>Duration:</strong> Half-Day or Full-Day</span>
                    <span><strong>Location:</strong> Khardung La, Leh-Ladakh</span>
                    <span><strong>Safety Tips:</strong> Acclimatize properly, wear a helmet and protective gear.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/paragliding.jfif" alt="Paragliding in Manali">
            </div>
            <div class="card-content">
                <h3 class="card-title">Paragliding in Manali</h3>
                <p class="card-description">Soar high above the Solang Valley and take in panoramic views of snow-capped peaks.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Beginner</span>
                    <span><strong>Duration:</strong> 15-20 minutes</span>
                    <span><strong>Location:</strong> Solang Valley, Manali</span>
                    <span><strong>Safety Tips:</strong> Fly only with certified tandem pilots.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/kheerganga.jpg" alt="Kheerganga Trek in Kasol">
            </div>
            <div class="card-content">
                <h3 class="card-title">Kheerganga Trek in Kasol</h3>
                <p class="card-description">Trek through the Parvati Valley and relax in natural hot water springs at the summit.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Moderate</span>
                    <span><strong>Duration:</strong> 5-7 hours</span>
                    <span><strong>Location:</strong> Parvati Valley, Kasol</span>
                    <span><strong>Safety Tips:</strong> Stay on the marked trail, carry a basic first-aid kit.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/snowboaring.jpg" alt="Snowboarding in Kufri">
            </div>
            <div class="card-content">
                <h3 class="card-title">Snowboarding in Kufri</h3>
                <p class="card-description">Enjoy winter sports and slide down the snowy slopes of Mahasu Peak.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Beginner to Moderate</span>
                    <span><strong>Duration:</strong> 1-2 hours</span>
                    <span><strong>Location:</strong> Mahasu Peak, Kufri</span>
                    <span><strong>Safety Tips:</strong> Wear proper snow gear, start on gentle slopes.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/caveexp.jpg" alt="Cave Exploration in Dehradun">
            </div>
            <div class="card-content">
                <h3 class="card-title">Cave Exploration in Dehradun</h3>
                <p class="card-description">Wade through the knee-deep waters of Robber's Cave in a narrow, natural gorge.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Easy</span>
                    <span><strong>Duration:</strong> 1-2 hours</span>
                    <span><strong>Location:</strong> Robber's Cave, Dehradun</span>
                    <span><strong>Safety Tips:</strong> Wear water-resistant shoes, watch for slippery rocks.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/heritagewalk.jpg" alt="Heritage Walk in Amritsar">
            </div>
            <div class="card-content">
                <h3 class="card-title">Heritage Walk in Amritsar</h3>
                <p class="card-description">Immerse yourself in the rich history and spirituality surrounding the Golden Temple Complex.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Easy</span>
                    <span><strong>Duration:</strong> 2-3 hours</span>
                    <span><strong>Location:</strong> Golden Temple Area, Amritsar</span>
                    <span><strong>Safety Tips:</strong> Dress modestly, cover your head, and stay hydrated.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/naturewalk.jpg" alt="Nature Walk in Mussoorie">
            </div>
            <div class="card-content">
                <h3 class="card-title">Nature Walk in Mussoorie</h3>
                <p class="card-description">Take a serene walk along Camel's Back Road for stunning sunset views of the Himalayas.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Easy</span>
                    <span><strong>Duration:</strong> 1-2 hours</span>
                    <span><strong>Location:</strong> Camel's Back Road, Mussoorie</span>
                    <span><strong>Safety Tips:</strong> Watch out for monkeys, stick to the main paved road.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/boating.jpg" alt="Boating in Nainital">
            </div>
            <div class="card-content">
                <h3 class="card-title">Boating in Nainital</h3>
                <p class="card-description">Enjoy a peaceful rowboat or pedal boat ride on the iconic eye-shaped Naini Lake.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Easy</span>
                    <span><strong>Duration:</strong> 30-60 minutes</span>
                    <span><strong>Location:</strong> Naini Lake, Nainital</span>
                    <span><strong>Safety Tips:</strong> Always wear a life jacket, do not stand up in the boat.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/stargazing.jpg" alt="Stargazing in Spiti">
            </div>
            <div class="card-content">
                <h3 class="card-title">Stargazing in Spiti</h3>
                <p class="card-description">Witness the Milky Way in all its glory from the high-altitude, pollution-free skies.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Easy</span>
                    <span><strong>Duration:</strong> Overnight</span>
                    <span><strong>Location:</strong> Kibber Village, Spiti</span>
                    <span><strong>Safety Tips:</strong> Temperatures drop drastically, wear heavy thermal layers.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/skiingauli.webp" alt="Skiing in Auli">
            </div>
            <div class="card-content">
                <h3 class="card-title">Skiing in Auli</h3>
                <p class="card-description">Carve through the powder on some of India's longest and finest skiing slopes.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Moderate to Advanced</span>
                    <span><strong>Duration:</strong> Half-Day or Full-Day</span>
                    <span><strong>Location:</strong> Auli Ski Resort, Uttarakhand</span>
                    <span><strong>Safety Tips:</strong> Use UV protection sunglasses, follow designated routes.</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img-wrapper">
                <img src="../assets/images/camelsafari.jpg" alt="Camel Safari in Jaisalmer">
            </div>
            <div class="card-content">
                <h3 class="card-title">Camel Safari in Jaisalmer</h3>
                <p class="card-description">Experience the magic of the Thar Desert under starlit skies.</p>
                <div class="card-details">
                    <span><strong>Difficulty:</strong> Beginner</span>
                    <span><strong>Duration:</strong> 2 hours to Overnight</span>
                    <span><strong>Location:</strong> Jaisalmer, Rajasthan</span>
                    <span><strong>Safety Tips:</strong> Stay hydrated, wear sun protection, follow instructions.</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="../assets/js/loginCheck.js"></script>
</body>
</html>