<?php
// database_functions.php

// Database connection
function getConnection() {
    $host = 'localhost';
    $user = 'root';
    $password = ''; 
    $database = 'pro_usermanagent';

    $conn = new mysqli($host, $user, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

// Get all events with details
function getAllEvents($conn) {
    $query = "SELECT 
        e.event_id,
        e.event_date,
        e.staff_service as declarant,
        ed.event_description,
        s.name as subcategory,
        ec.name as category,
        pt.title as principal_title
    FROM events e
    JOIN eventdetails ed ON e.event_id = ed.event_id
    JOIN subcategories s ON ed.subcategory_id = s.id
    JOIN eventcategories ec ON s.category_id = ec.id
    JOIN principal_title pt ON ec.principal_title_id = pt.id
    ORDER BY e.event_date DESC";
    
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get monthly events
function getMonthlyEvents($conn, $month, $year) {
    $query = "SELECT 
        e.event_id,
        e.event_date,
        e.staff_service as declarant,
        s.name as subcategory,
        ec.name as category,
        pt.title as principal_title
    FROM events e
    JOIN eventdetails ed ON e.event_id = ed.event_id
    JOIN subcategories s ON ed.subcategory_id = s.id
    JOIN eventcategories ec ON s.category_id = ec.id
    JOIN principal_title pt ON ec.principal_title_id = pt.id
    WHERE MONTH(e.event_date) = ? AND YEAR(e.event_date) = ?
    ORDER BY e.event_date DESC";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $month, $year);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}