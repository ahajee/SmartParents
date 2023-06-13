<?php
// Retrieve the search keyword from the URL parameter
$keyword = $_GET['keyword'];

// Perform your search query using the $keyword and fetch the results

// Display the search results
if (count($results) > 0) {
    foreach ($results as $result) {
        $topic = $result['topic'];
        $message = $result['message'];
        $username = $result['username'];

        echo "<h2>Topic: $topic</h2>";
        echo "<p>Message: $message</p>";
        echo "<p>Posted by: $username</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No results found.</p>";
}
?>
