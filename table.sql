CREATE TABLE Reservation (
    idReservation INT PRIMARY KEY,
    dateReservation DATE
);

CREATE TABLE Equipement (
    idEquipement INT PRIMARY KEY AUTO_INCREMENT,
    equipNom VARCHAR(50),
    equipQTT INT,
    equipPrix DECIMAL(10, 2)
);

CREATE TABLE Salle (
    idSalle INT PRIMARY KEY AUTO_INCREMENT,
    nomSalle VARCHAR(50)
);

CREATE TABLE Utilisateur (
    idUtilisateur INT PRIMARY KEY AUTO_INCREMENT,
    nomUser VARCHAR(50),
    prenomUser VARCHAR(50),
    numeroUser VARCHAR(20)
);

CREATE TABLE Reservation_Equipement (
    idReservation INT,
    idEquipement INT,
    FOREIGN KEY (idReservation) REFERENCES Reservation(idReservation),
    FOREIGN KEY (idEquipement) REFERENCES Equipement(idEquipement),
    PRIMARY KEY (idReservation, idEquipement)
);

CREATE TABLE Reservation_Salle (
    idReservation INT,
    idSalle INT,
    FOREIGN KEY (idReservation) REFERENCES Reservation(idReservation),
    FOREIGN KEY (idSalle) REFERENCES Salle(idSalle),
    PRIMARY KEY (idReservation, idSalle)
);

CREATE TABLE Reservation_Utilisateur (
    idReservation INT,
    idUtilisateur INT,
    FOREIGN KEY (idReservation) REFERENCES Reservation(idReservation),
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur),
    PRIMARY KEY (idReservation, idUtilisateur)
);
