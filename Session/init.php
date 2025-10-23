<?php

//check if table exists, if not create it
function initialize_users_table($conn)
{
    $table_check_query = "SHOW TABLES LIKE 'users'";
    $result = $conn->query($table_check_query);

    if ($result->num_rows == 0) {
        // Table does not exist, create it
        $create_table_query = "CREATE TABLE users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            phone VARCHAR(15) NOT NULL,
            address VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        if ($conn->query($create_table_query) === TRUE) {
            echo "Table 'users' created successfully.";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
}
