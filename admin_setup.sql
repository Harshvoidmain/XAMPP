USE icnte;

-- Create admin users table
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL
);

-- Create site updates table
CREATE TABLE IF NOT EXISTS site_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL,
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admin_users(id)
);

-- Create site brochures table
CREATE TABLE IF NOT EXISTS site_brochures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admin_users(id)
);

-- Insert a default admin user (username: admin, password: admin123)
-- Note: In production, you should change this default password immediately after setup
INSERT INTO admin_users (username, password, email)
VALUES ('admin', '123456', 'admin@example.com');

-- Insert some initial site updates (linked to admin user with ID 1)
INSERT INTO site_updates (text, link, created_by) VALUES 
('Download ICNTE-2025 Conference Brochure.', 'download/ICNTE_2025.pdf', 1),
('Conference is open for paper submission.', 'instructions.php', 1),
('Winners of IEI BLC-FCRIT excellence awards announced soon.', '#', 1),
('Important dates updated.', 'important_dates.php', 1),
('Early bird registration deadline approaching!', 'fees.php', 1),
('New keynote speaker announced for ICNTE-2025.', 'keynote_speakers.php', 1);

-- Create a directory structure for storing uploads
-- Note: This cannot be done in SQL directly, it needs to be done through PHP
-- The directories needed are:
-- - upload/
-- - upload/brochures/ 