CREATE TABLE aplicaciones (
    apli_id SERIAL PRIMARY KEY,
    apli_nombre VARCHAR(70) NOT NULL,
    apli_fecha DATETIME YEAR TO DAY,
    apli_situacion varchar (20)
);

ALTER TABLE aplicaciones
MODIFY (apli_situacion char(1) DEFAULT '1');




CREATE TABLE problemas (
    prob_id Serial Primary Key,
    prob_apli_id INTEGER NOT NULL,
    prob_descripcion VARCHAR (40) NOT NULL,
    prob_estado VARCHAR (20) CHECK (prob_estado IN ( 'CERRADO', 'ABIERTO')),
    prob_fecha DATETIME YEAR TO DAY,
    prob_situacion char (1) DEFAULT '1',
    FOREIGN KEY (prob_apli_id) REFERENCES aplicaciones(apli_id)
);

CREATE TABLE oficiales (
    offi_id serial primary key,
    offi_grado VARCHAR (50),
    offi_arma VARCHAR (50),
    offi_nombre VARCHAR (30),
    offi_apellido VARCHAR (30),
    offi_situacion CHAR (1) DEFAULT '1'
);

CREATE TABLE asignacion_oficiales(
    asigoff_id serial primary key,
    asigoff_apli_id INTEGER NOT NULL,
    asigoff_offi_id INTEGER NOT NULL,
    FOREIGN KEY (asigoff_apli_id) REFERENCES aplicaciones (apli_id),
    FOREIGN KEY (asigoff_offi_id) REFERENCES oficiales (offi_id)
);