CREATE DATABASE goals_manager_system;

USE goals_manager_system;

CREATE TABLE users(
    id INTEGER PRIMARY KEY AUTO_INCREMENT, 
    name_user VARCHAR(150) NOT NULL,
    email VARCHAR(90) NOT NULL, 
    pass VARCHAR(90) NOT NULL,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, 
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB;


CREATE TABLE goals(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,  
    desc_goal VARCHAR(120) NOT NULL,
    dead_line DATE NOT NULL, 
    status_goal ENUM('Pendente', 'Concluída', 'Cancelada') DEFAULT 'Pendente',
    user_id INT NOT NULL, 
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, 
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB;


ALTER TABLE goals ADD CONSTRAINT Fk_user_id FOREIGN KEY (user_id) REFERENCES users(id);