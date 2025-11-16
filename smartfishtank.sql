-- SAFE & CLEAN VERSION
CREATE TABLE `record` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `board` VARCHAR(50) NOT NULL,
    `suhu` FLOAT NOT NULL CHECK (`suhu` >= 0 AND `suhu` <= 100),
    `status_baca_suhu` ENUM('Success', 'Fail') NOT NULL DEFAULT 'Success',
    `lampu` ENUM('ON', 'OFF') NOT NULL DEFAULT 'OFF',
    `heater` ENUM('ON', 'OFF') NOT NULL DEFAULT 'OFF',
    `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX (`board`),
    INDEX (`timestamp`)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_unicode_ci;
