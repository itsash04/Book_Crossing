<?php 
    include 'dbConnection.php'; // Ensure this file includes mysqli connection setup

    // Define the SQL query
    $sql = "SELECT * FROM announcement";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    // Check if the query returned any results
    if ($result) {
        // Fetch and display results
        while ($rws = mysqli_fetch_array($result)) {
            echo "<h5>At " . htmlspecialchars($rws[2]) . " from administrator</h5>";
            echo "<p>" . htmlspecialchars($rws[3]) . "</p>";
        }
    } else {
        // Handle query failure
        echo "Error fetching announcements: " . mysqli_error($connection);
    }

    // Free result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($connection);
?>
