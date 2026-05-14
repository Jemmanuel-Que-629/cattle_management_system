CREATE TABLE breeds (
    breed_id INT PRIMARY KEY AUTO_INCREMENT,
    breed_name VARCHAR(100) NOT NULL UNIQUE,
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cattle (
    cattle_id INT PRIMARY KEY AUTO_INCREMENT,
    
    cattle_code VARCHAR(50) UNIQUE NOT NULL,
    
    breed_id INT NOT NULL,
    
    gender ENUM('Male', 'Female') NOT NULL,
    
    birth_date DATE NULL,
    
    weight DECIMAL(10,2) NULL,
    
    status ENUM(
        'Active',
        'Pregnant',
        'Sick',
        'Quarantined',
        'Sold',
        'Dead'
    ) DEFAULT 'Active',
    
    acquisition_type ENUM(
        'Purchased',
        'Born'
    ) NOT NULL,
    
    acquisition_date DATE NOT NULL,
    
    notes TEXT NULL,
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,
    
    archived TINYINT(1) DEFAULT 0,

    FOREIGN KEY (breed_id) REFERENCES breeds(breed_id)
);


CREATE TABLE cattle_health_records (
    health_record_id INT PRIMARY KEY AUTO_INCREMENT,
    
    cattle_id INT NOT NULL,
    
    record_type ENUM(
        'Vaccination',
        'Treatment',
        'Checkup',
        'Deworming',
        'Injury'
    ) NOT NULL,
    
    description TEXT NULL,
    
    medication VARCHAR(255) NULL,
    
    record_date DATE NOT NULL,
    
    next_schedule DATE NULL,
    
    veterinarian VARCHAR(255) NULL,
    
    created_by INT NOT NULL,
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (cattle_id) REFERENCES cattle(cattle_id),
    FOREIGN KEY (created_by) REFERENCES users(user_id)
);

CREATE TABLE breeding_records (
    breeding_id INT PRIMARY KEY AUTO_INCREMENT,
    
    female_cattle_id INT NOT NULL,
    male_cattle_id INT NULL,
    
    breeding_date DATE NOT NULL,
    
    expected_birth_date DATE NULL,
    
    actual_birth_date DATE NULL,
    
    status ENUM(
        'Pending',
        'Pregnant',
        'Successful',
        'Failed'
    ) DEFAULT 'Pending',
    
    notes TEXT NULL,

    FOREIGN KEY (female_cattle_id) REFERENCES cattle(cattle_id),
    FOREIGN KEY (male_cattle_id) REFERENCES cattle(cattle_id)
);

CREATE TABLE cattle_weight_logs (
    weight_log_id INT PRIMARY KEY AUTO_INCREMENT,
    
    cattle_id INT NOT NULL,
    
    weight DECIMAL(10,2) NOT NULL,
    
    recorded_at DATE NOT NULL,
    
    created_by INT NOT NULL,

    FOREIGN KEY (cattle_id) REFERENCES cattle(cattle_id),
    FOREIGN KEY (created_by) REFERENCES users(user_id)
);

CREATE TABLE feed_inventory (
    feed_id INT PRIMARY KEY AUTO_INCREMENT,
    
    feed_name VARCHAR(255) NOT NULL,
    
    quantity DECIMAL(10,2) NOT NULL,
    
    unit VARCHAR(50) NOT NULL,
    
    minimum_stock DECIMAL(10,2) DEFAULT 0,
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE feed_usage_logs (
    usage_id INT PRIMARY KEY AUTO_INCREMENT,
    
    feed_id INT NOT NULL,
    
    cattle_id INT NULL,
    
    quantity_used DECIMAL(10,2) NOT NULL,
    
    usage_date DATE NOT NULL,
    
    created_by INT NOT NULL,

    FOREIGN KEY (feed_id) REFERENCES feed_inventory(feed_id),
    FOREIGN KEY (cattle_id) REFERENCES cattle(cattle_id),
    FOREIGN KEY (created_by) REFERENCES users(user_id)
);


CREATE TABLE cattle_sales (
    sale_id INT PRIMARY KEY AUTO_INCREMENT,
    
    cattle_id INT NOT NULL,
    
    buyer_name VARCHAR(255) NOT NULL,
    
    sale_price DECIMAL(12,2) NOT NULL,
    
    sale_date DATE NOT NULL,
    
    remarks TEXT NULL,

    FOREIGN KEY (cattle_id) REFERENCES cattle(cattle_id)
);

CREATE TABLE cattle_mortality (
    mortality_id INT PRIMARY KEY AUTO_INCREMENT,
    
    cattle_id INT NOT NULL,
    
    death_date DATE NOT NULL,
    
    cause_of_death TEXT NULL,
    
    reported_by INT NOT NULL,

    FOREIGN KEY (cattle_id) REFERENCES cattle(cattle_id),
    FOREIGN KEY (reported_by) REFERENCES users(user_id)
);
