<!DOCTYPE html>
<html>

<head>
    <title>Smart Light Management</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <style>
        /* Add CSS styles for notification popups */
        .notification-popup {
            background-color: #f2f2f2;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
        }

        /* Style header and footer */
        #header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        #footer {
            background-color: #333;
            color: white;
            padding: 5;
            text-align: center;
        }

        #footer ul {
            list-style-type: none;
            padding: 0;
        }

        #footer ul li {
            display: inline;
            margin-right: 10px;
        }

        #footer ul li a {
            color: white; /* Make navigation links white */
            text-decoration: none; /* Remove underline */
        }

        #notification-container {
            text-align: center;
            margin-top: 20px;
        }

        #notification-container .notification-popup {
            background-color: #f2f2f2;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            display: inline-block;
        }

        #footer-marquee {
            font-size: 24px;
            color: green;
        }

        img {
            display: block;
            margin: 0 auto;
            max-width: 57%; /* Adjust the width as needed */
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0.5, 0.5, 0.5, 0.5);
        }

        #main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        #info-container {
            flex: 1;
            padding: 20px;
            text-align: left;
        }

        #weather-container {
            flex: 1;
            padding: 20px;
            text-align: left;
        }
    </style>
</head>

<body style="background-image: url('colors.jpg'); background-size: 100% 100%; background-repeat: no-repeat; background-attachment: fixed; background-position: center;">

<div id="footer">
    <h1 style="font-size: 24px; margin-bottom: 10px;">Street Light Management</h1>
        <ul>
            <li><a href="http://localhost/smart_light/information%20table/table.php" target="frame">Check Status</a></li>
            <li><a href="http://localhost/smart_light/log_In%20page/index.html" target="frame">Login</a></li>
            <li><a href="http://localhost/smart_light/Next%20page/Placement_portal_management-main/Placement_portal_management-main/about.html" target="frame">About</a></li>
            <li><a href="http://localhost/smart_light/Next%20page/Placement_portal_management-main/Placement_portal_management-main/contact.html" target="frame">Contact us</a></li>
        </ul>
    </div>
</div>
    <div id="main-container">
        <div id="info-container">
            <h2>About Our College</h2>
            <!-- Add content about your college here -->
            <p>Indian Institute of Technology (IIT) Ropar was established in 2008 as one of the eight IITs that was set up by the MHRD and the Government of India. IIT Punjab, through its 11 departments, offers UG, PG, and PhD courses to students across Engineering, Science, and various other streams. IIT Ropar has also been ranked 22nd by NIRF 2023 for Engineering. Moreover, the institute has also been ranked 20th in University (Technical) category by The Week 2023. In QS World University Rankings 2024, the IIT Ropar is ranked 90th in Southeast Asia.</p>
            <a href="https://www.iitrpr.ac.in">https://www.iitrpr.ac.in</a>
        </div>

        <img src="img-Smart-Street-Light.jpg" alt="Description of your image">

        <div id="weather-container">
            <h2>Today's Weather</h2>
            <!-- Add weather information here -->
            <p>Insert today's weather information here...</p>
        </div>
    </div>

    <div id="notification-container">
        <!-- Notifications will be dynamically added here -->
    </div>

    <div id="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #e0d2d2; text-align: center;">
        <marquee direction="right" id="footer-marquee">GO GREEN !! SAVE ENERGY !! | Inactive Lights:
            <?php
            error_reporting(0);
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "sensorinformation";
    
            $conn = mysqli_connect($hostname, $username, $password, $database);
    
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
    
            // Fetch data for inactive lights
            $inactive_query = "SELECT * FROM dht11 WHERE status = 0";
            $inactive_result = mysqli_query($conn, $inactive_query);
    
            if (mysqli_num_rows($inactive_result) > 0) {
                $inactiveLights = "";
                while ($row = mysqli_fetch_assoc($inactive_result)) {
                    $id = $row['id'];
                    $landmark = $row['Landmark'];
                    // Concatenate the ID and Landmark
                    $inactiveLights .= "ID: $id, Landmark: $landmark | ";
                }
                echo $inactiveLights; // Print the concatenated string
            }
    
            mysqli_close($conn);
            ?>
        </marquee>
    </div>
</body>

</html>
