CREATE TABLE user_tab (
    user_id INT PRIMARY KEY AUTO_INCREMENT,  -- Unique user ID
    username VARCHAR(50) NOT NULL UNIQUE,    -- Login name
    email VARCHAR(100) NOT NULL UNIQUE,      -- Email address
    password_hash VARCHAR(255) NOT NULL,     -- Encrypted password
    first_name VARCHAR(50),                  -- Optional: First name
    last_name VARCHAR(50),                   -- Optional: Last name
    is_active BOOLEAN DEFAULT TRUE,          -- Account status
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- When the user registered
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
