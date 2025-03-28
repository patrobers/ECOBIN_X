<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOBIN - AI-Powered Smart Waste System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: #fff;
            padding-top: 60px;
        }
        .navbar {
            background-color: #1a1a1a;
            color: white;
            padding: 10px 15px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand {
            font-size: 1.2rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: 20px;
            cursor: pointer;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 15px;
        }
        .navbar a:hover { color: #f1c40f; }

        /* Home Section with Background Video */
        .home-section {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .home-section video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .welcome-message {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 2rem;
            color: #fff;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.7);
            padding: 15px 30px;
            border-radius: 10px;
        }
        .welcome-message i {
            font-size: 2.5rem;
            color: #f1c40f;
            margin-right: 10px;
        }
        .sub-message {
            font-size: 1.2rem;
            margin-top: 5px;
            color: #f1c40f;
        }
        .bin-status-section {
        background-color: #002341;
        padding: 40px;
        text-align: center;
    }

    /* Bin Status Cards */
    .card {
        border-radius: 15px;
        box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        background: linear-gradient(to bottom right, #ffffff, #f1f1f1);
        color: #333;
        padding: 20px;
        text-align: center;
        border: none;
    }

    /* Hover Effect */
    .card:hover {
        transform: scale(1.05);
        box-shadow: 6px 6px 20px rgba(0, 0, 0, 0.3);
    }

    /* Badge Colors */
    .badge-danger {
        background-color: #e74c3c !important;
        color: #fff;
        font-size: 1rem;
        padding: 5px 10px;
        border-radius: 10px;
    }

    .badge-success {
        background-color: #2ecc71 !important;
        color: #fff;
        font-size: 1rem;
        padding: 5px 10px;
        border-radius: 10px;
    }

    /* Bin Level Progress Bar */
    .progress {
        background-color: #ddd;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-bar {
        background: linear-gradient(to right, #28a745, #218838);
        font-size: 1.2rem;
    }
    .footer {
            background-color: #222; 
            color: #bbb;
            padding: 40px 0;
        }
        .footer a {
            color: #bbb;
            text-decoration: none;
        }
        .footer a:hover {
            color: #4CAF50;
        }
        .map-container {
        background: #1e3c72; /* Dark blue gradient */
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    /* Styling the Google Map */
    #map {
        width: 100%;
        height: 400px;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
    }
    #voice-btn {
    background: linear-gradient(135deg, #4CAF50, #2E7D32);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 15px 25px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    transition: all 0.3s;
}

#voice-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0,0,0,0.3);
}

#voice-btn:active {
    background: #2E7D32;
    transform: scale(0.98);
}

#voice-btn i {
    margin-right: 8px;
}
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="navbar-brand" id="ecobin-logo">
        <i class="fas fa-recycle"></i> ECOBIN
    </div>
    <div class="navbar-links">
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="about.php"><i class="fas fa-trash-alt"></i> About</a>
        <a href="contact.php"><i class="fas fa-exclamation-circle"></i> Grievances</a>
        <a href="abt.php"><i class="fas fa-phone"></i> Contact us </a>
        <a href="admin.php"><i class="fas fa-user-shield"></i> Admin Panel</a>
    </div>
</div>

<!-- Home Section with Video -->
<div class="home-section">
    <video autoplay loop muted>
        <source src="xgreen.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="welcome-message">
        <i class="fas fa-recycle"></i> Welcome to ECOBIN
        <div class="sub-message">AI-Powered Smart Waste System</div>
    </div>
</div>
<!-- Bin Status Section -->
<div class="container mt-5">
    <h2 class="text-center">Bin Status</h2>
    <div class="row" id="bin-status">
        <!-- Dynamic bin status content will be inserted here -->
    </div>
    
    <!-- Bin Level Indicator -->
    <div class="mt-4 text-center">
        <h4>Overall Bin Levels</h4>
        <div class="progress" style="height: 30px;">
            <div id="overall-bin-level" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
        </div>
    </div>
</div>

<!-- Google Map Section -->
<div class="container mt-5 map-container">
    <h2 class="text-center">Find the Nearest Smart Bin</h2>
    <div id="map"></div>
</div>

<script>
    // Define bin locations with random waste levels (for testing)
    const bins = [
        { name: "Kisii Campus Library", location: "Kisii Campus", waste_level: Math.floor(Math.random() * 100) },
        { name: "Kisii Campus ICT Block", location: "Kisii Campus", waste_level: Math.floor(Math.random() * 100) },
        { name: "Kisii Campus Lab", location: "Kisii Campus", waste_level: Math.floor(Math.random() * 100) },
        { name: "Kisii Polytechnic", location: "Kisii", waste_level: Math.floor(Math.random() * 100) },
        { name: "Kisii School", location: "Kisii", waste_level: Math.floor(Math.random() * 100) },
        { name: "Gusii Stadium", location: "Kisii", waste_level: Math.floor(Math.random() * 100) }
    ];

    function displayBinStatus() {
        let binHtml = '';
        let totalLevel = 0;

        bins.forEach(bin => {
            totalLevel += bin.waste_level;
            binHtml += `
                <div class="col-md-4">
                    <div class="card text-dark bg-light p-3 mb-3">
                        <h5>${bin.name}</h5>
                        <p><strong>Location:</strong> ${bin.location}</p>
                        <p><strong>Waste Level:</strong> ${bin.waste_level}%</p>
                        <p><strong>Status:</strong> 
                            <span class="badge ${bin.waste_level > 75 ? 'badge-danger' : 'badge-success'}">
                                ${bin.waste_level > 75 ? 'Full' : 'Available'}
                            </span>
                        </p>
                    </div>
                </div>
            `;
        });

        // Inject bin status HTML
        document.getElementById('bin-status').innerHTML = binHtml;

        // Calculate overall bin level
        let avgLevel = bins.length ? (totalLevel / bins.length).toFixed(2) : 0;
        let progressBar = document.getElementById('overall-bin-level');
        progressBar.style.width = avgLevel + '%';
        progressBar.setAttribute('aria-valuenow', avgLevel);
        progressBar.textContent = avgLevel + '%';
    }

    // Ensure function runs when page loads
    document.addEventListener("DOMContentLoaded", displayBinStatus);
</script>
<script>
    function initMap() {
    // Define default map location (centered around Kisii University)
    const kisiiUniversity = { lat: -0.6811, lng: 34.7679 };

    // Create a new map instance
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: kisiiUniversity,
    });

    // Define bin locations (exact placements)
    const binLocations = [
        { name: "Kisii University Library", lat: -0.6815, lng: 34.7658 },
        { name: "Kisii University ICT Block", lat: -0.6802, lng: 34.7687 },
        { name: "Kisii University Lab", lat: -0.6829, lng: 34.7663 },
        { name: "Kisii Polytechnic", lat: -0.6885, lng: 34.7708 },
        { name: "Kisii School", lat: -0.6753, lng: 34.7608 },
        { name: "Mailimbili SDA", lat: -0.6781, lng: 34.7595 }
    ];

    // Add markers for bins (red)
    binLocations.forEach(bin => {
        new google.maps.Marker({
            position: { lat: bin.lat, lng: bin.lng },
            map: map,
            title: bin.name,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
            }
        });
    });

    // Get user's current location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                // Add blue marker for user's location
                new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: "Your Location",
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                    }
                });

                // Center map on user's location
                map.setCenter(userLocation);
            },
            () => {
                console.error("Error: The Geolocation service failed.");
            }
        );
    } else {
        console.error("Error: Your browser doesn't support geolocation.");
    }
}

</script>

<!-- Load Google Maps API -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqNSrWu4Cjx3B6Pe1k930dCkoPbuUPC-w&callback=initMap"></script>
<!-- Footer Section -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Logo and About -->
            <div class="col-md-4">
    <h2 style="font-family: cursive;">
        <i class="fas fa-recycle text-success"></i> Ecobin
    </h2>
    <p>EcoBin is a smart waste management system that leverages AI and IoT to optimize waste disposal, promote recycling, and enhance environmental sustainability.</p>
    <a href="#" class="text-success">Our Team</a>
</div>


            <!-- Contact Info -->
            <div class="col-md-4">
                <h5 class="fw-bold">Contact</h5>
                <p><i class="fas fa-map-marker-alt"></i> Kisii Campus, Kisii, Kenya</p>
                <p><i class="fas fa-phone"></i> Phone: +254 798597545</p>
                <p><i class="fas fa-envelope"></i> Email: <a href="spatrobersk@gmail.com">spatrobersk@gmail.con</a></p>
                <p><i class="fab fa-skype"></i> Skype: you_online</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5 class="fw-bold">Links</h5>
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Grievances</a></li>
                        <li><a href="abt.php">Contact Us</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a href="#">Plans & Pricing</a></li>
                        <li><a href="#">Affiliates</a></li>
                        <li><a href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4" style="border-top: 1px solid #444; padding-top: 20px;">
            <p style="color: #bbb; font-size: small; font-family: cursive;">
                &copy; 2025 ECOBIN. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>
<script>
// Initialize speech recognition
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recognition = new SpeechRecognition();
recognition.continuous = false;
recognition.lang = 'en-US';
recognition.interimResults = false;

// Bin data with coordinates and status
const binLocations = [
    { 
        name: "Kisii University Library", 
        location: "Near main entrance", 
        lat: -0.6815, 
        lng: 34.7658,
        waste_level: Math.floor(Math.random() * 100)
    },
    // ... other bins
];

// Function to speak text
function speak(text) {
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.rate = 0.9;
    utterance.pitch = 1;
    window.speechSynthesis.speak(utterance);
}

// Find nearest bin with status
function findAndAnnounceNearestBin(userLat, userLng) {
    let nearestBin = null;
    let shortestDistance = Infinity;

    // Calculate distances
    binLocations.forEach(bin => {
        const distance = Math.sqrt(
            Math.pow(bin.lat - userLat, 2) + 
            Math.pow(bin.lng - userLng, 2)
        );
        
        if (distance < shortestDistance) {
            shortestDistance = distance;
            nearestBin = bin;
        }
    });

    if (nearestBin) {
        const status = nearestBin.waste_level > 75 ? "full" : "available";
        const distanceText = shortestDistance < 0.001 ? "very close to you" : 
                           `about ${Math.round(shortestDistance * 100000)} meters away`;
        
        const message = `The nearest bin is at ${nearestBin.name}, ${nearestBin.location}. 
                        It is currently ${status} with ${nearestBin.waste_level}% capacity. 
                        It's ${distanceText}. Would you like directions?`;
        
        speak(message);
        
        // Store for possible directions
        window.lastFoundBin = nearestBin;
    } else {
        speak("I couldn't find any nearby bins.");
    }
}

// Handle voice commands
recognition.onresult = (event) => {
    const command = event.results[0][0].transcript.toLowerCase();
    
    if (command.includes("nearest bin") || command.includes("find bin")) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    findAndAnnounceNearestBin(
                        position.coords.latitude,
                        position.coords.longitude
                    );
                },
                () => speak("Please enable location services to find nearby bins.")
            );
        } else {
            speak("Your browser doesn't support location services.");
        }
    } 
    else if (command.includes("directions") && window.lastFoundBin) {
        const url = `https://www.google.com/maps/dir/?api=1&destination=${
            window.lastFoundBin.lat},${window.lastFoundBin.lng}&travelmode=walking`;
        window.open(url, "_blank");
        speak("Opening directions in a new tab.");
    }
    else {
        speak("You can say 'Find nearest bin' or 'Get directions'.");
    }
};

// Error handling
recognition.onerror = (event) => {
    console.error("Speech recognition error", event.error);
    speak("Sorry, I didn't catch that. Please try again.");
};

// Voice assistant button
function setupVoiceAssistant() {
    const voiceBtn = document.createElement('button');
    voiceBtn.innerHTML = '<i class="fas fa-microphone"></i> Voice Assistant';
    voiceBtn.id = 'voice-btn';
    voiceBtn.style.position = 'fixed';
    voiceBtn.style.bottom = '20px';
    voiceBtn.style.right = '20px';
    voiceBtn.style.zIndex = '1000';
    
    voiceBtn.addEventListener('click', () => {
        if (!window.speechSynthesis) {
            alert("Speech synthesis not supported in your browser");
            return;
        }
        speak("How can I help? Say 'Find nearest bin' or 'Get directions'.");
        recognition.start();
    });
    
    document.body.appendChild(voiceBtn);
}

// Initialize when DOM loads
document.addEventListener('DOMContentLoaded', () => {
    if ('speechSynthesis' in window && SpeechRecognition) {
        setupVoiceAssistant();
    } else {
        console.warn("Speech features not supported");
    }
});
if (!('webkitSpeechRecognition' in window) && !('speechRecognition' in window)) {
    const voiceBtn = document.getElementById('voice-btn');
    if (voiceBtn) {
        voiceBtn.disabled = true;
        voiceBtn.title = "Voice commands not supported in your browser";
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
