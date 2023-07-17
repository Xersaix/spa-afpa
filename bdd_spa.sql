#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: color
#------------------------------------------------------------

CREATE TABLE color(
        id_color Int  Auto_increment  NOT NULL ,
        color    Varchar (50)
	,CONSTRAINT color_PK PRIMARY KEY (id_color)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: species
#------------------------------------------------------------

CREATE TABLE species(
        id_species Int  Auto_increment  NOT NULL ,
        name       Varchar (50)
	,CONSTRAINT species_PK PRIMARY KEY (id_species)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: race
#------------------------------------------------------------

CREATE TABLE race(
        id_race    Int  Auto_increment  NOT NULL ,
        name       Varchar (50) ,
        id_species Int NOT NULL
	,CONSTRAINT race_PK PRIMARY KEY (id_race)

	,CONSTRAINT race_species_FK FOREIGN KEY (id_species) REFERENCES species(id_species)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: animal
#------------------------------------------------------------

CREATE TABLE animal(
        id_animal  Int  Auto_increment  NOT NULL ,
        name       Varchar (50) ,
        age        Int ,
        gender     Varchar (50) ,
        weight     Int ,
        tatoo      Bool ,
        chip       Bool ,
        id_color   Int NOT NULL ,
        id_race    Int NOT NULL ,
        id_species Int NOT NULL
	,CONSTRAINT animal_PK PRIMARY KEY (id_animal)

	,CONSTRAINT animal_color_FK FOREIGN KEY (id_color) REFERENCES color(id_color)
	,CONSTRAINT animal_race0_FK FOREIGN KEY (id_race) REFERENCES race(id_race)
	,CONSTRAINT animal_species1_FK FOREIGN KEY (id_species) REFERENCES species(id_species)
)ENGINE=InnoDB;

