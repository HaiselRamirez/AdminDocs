CREATE DATABASE IF NOT EXISTS AdminDocs;

DROP TABLE IF EXISTS `AdminDocs`.`roles`;
CREATE TABLE `AdminDocs`.`roles`(
	rol_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	rol_name  VARCHAR(50) NOT NULL UNIQUE,
	rol_desc VARCHAR(255) NULL,
	rol_estado BOOLEAN NOT NULL DEFAULT 1,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`semestre`;
CREATE TABLE `AdminDocs`.`semestre`(
	sem_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	sem_code  VARCHAR(10) NOT NULL UNIQUE,
	sem_desc VARCHAR(255) NULL,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`facultad`;
CREATE TABLE `AdminDocs`.`facultad`(
	fac_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fac_code  VARCHAR(150) NOT NULL UNIQUE,
	fac_desc VARCHAR(255) NOT NULL,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`escuela`;
CREATE TABLE `AdminDocs`.`escuela`(
	esc_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	esc_code  VARCHAR(150) NOT NULL UNIQUE,
	esc_desc VARCHAR(255) NOT NULL,
	esc_fac_id INT NOT NULL,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`carrera`;
CREATE TABLE `AdminDocs`.`carrera`(
	car_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	car_code  VARCHAR(150) NOT NULL UNIQUE,
	car_desc VARCHAR(255) NOT NULL,
	car_esc_id INT NOT NULL,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`campus`;
CREATE TABLE `AdminDocs`.`campus` (
 	cam_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 	cam_codigo VARCHAR(10) NOT NULL UNIQUE,
 	cam_nombre VARCHAR(150) NOT NULL,
 	cam_desc VARCHAR(255) NULL,
 	cam_estado BOOLEAN NOT NULL DEFAULT 1,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`edificio`;
CREATE TABLE `AdminDocs`.`edificio`(
	edif_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	edif_code VARCHAR(6) NOT NULL,
	edif_nombre VARCHAR(255) NOT NULL,
	edif_cam_id INT NOT NULL,
	edif_direccion TEXT NULL,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`aula`;
CREATE TABLE `AdminDocs`.`aula`(
	aula_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	aula_code VARCHAR(25) NOT NULL,
	aula_desc VARCHAR(255) NOT NULL,
	aula_capacidad INT NOT NULL,
	aula_edif_id INT NOT NULL,
	aula_estado BOOLEAN NOT NULL DEFAULT 1,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`usuario`;
CREATE TABLE `AdminDocs`.`usuario`(
	usr_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usr_usuario  VARCHAR(20) NOT NULL UNIQUE,
	usr_clave VARCHAR(255) NOT NULL,
	usr_nombre VARCHAR(100) NOT NULL,
	usr_email VARCHAR(200) NULL,
	usr_cedula VARCHAR(20) NULL,
	usr_rol_id INT NOT NULL,
	usr_cam_id INT NOT NULL,
	usr_foto VARCHAR(25) NULL,
	usr_estado BOOLEAN NOT NULL DEFAULT 1,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`evaluador`;
CREATE TABLE `AdminDocs`.`evaluador`(
	eva_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	eva_nombre VARCHAR(100) NOT NULL,
	eva_email VARCHAR(200) NULL,
	eva_telefono VARCHAR(20) NULL,
	eva_cedula VARCHAR(20) NULL,
	eva_tanda VARCHAR(20) NOT NULL,
	eva_sexo CHAR NOT NULL,
	eva_cam_id INT NOT NULL,
	eva_foto VARCHAR(25) NULL,
	eva_estado BOOLEAN NOT NULL DEFAULT 1,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;

DROP TABLE IF EXISTS `AdminDocs`.`grupo`;
CREATE TABLE `AdminDocs`.`grupo`(
	gru_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	gru_code VARCHAR(25) NOT NULL,
	gru_numero INT NOT NULL,
	gru_sem_id INT NOT NULL,
	gru_cam_id INT NOT NULL,
	gru_eva_id INT NOT NULL,
	gru_cantidad INT NOT NULL,
	gru_aula_id INT NOT NULL,
	grup_fecha_ex DATE NOT NULL,
	grup_hora_ex TIME NOT NULL,
	gru_estado BOOLEAN NOT NULL DEFAULT 1,
	gru_user_id INT NOT NULL,
 	creado DATETIME NOT NULL DEFAULT current_timestamp(),
 	editado DATETIME NULL
)ENGINE = InnoDB;


DROP TABLE IF EXISTS `AdminDocs`.`estudiante`;
CREATE TABLE `AdminDocs`.`estudiante`(
	matricula VARCHAR(9) NOT NULL PRIMARY KEY,
	rne VARCHAR(13) NULL,
	nombre VARCHAR(100) NOT NULL,
	apellidos VARCHAR(100) NOT NULL,
	cedula VARCHAR(11) NULL,
	carrera INT NOT NULL,
	campus INT NOT NULL,
	semestre INT NOT NULL,
	promedio DECIMAL(6,2) NULL,
	decision INT NULL,
	grupo INT NULL,
	documentos BOOLEAN DEFAULT 0,
	examen BOOLEAN DEFAULT 0,
	fecha_cargado DATETIME DEFAULT current_timestamp()
)ENGINE = InnoDB;