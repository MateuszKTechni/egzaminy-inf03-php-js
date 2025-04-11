CREATE TABLE RodzajObiektu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(255)
);

CREATE TABLE ObiektSportowy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(255),
    adres VARCHAR(255),
    rodzajObiektu INT,
    godzinyOtwarcia VARCHAR(255),
    obrazek VARCHAR(255),
    FOREIGN KEY (rodzajObiektu) REFERENCES RodzajObiektu(id)
);

CREATE TABLE Uzytkownik (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(255),
    nazwisko VARCHAR(255),
    email VARCHAR(255),
    haslo VARCHAR(255)
);

CREATE TABLE Rezerwacja (
    id INT AUTO_INCREMENT PRIMARY KEY,
    czasRozpoczecia DATETIME,
    czasZakonczenia DATETIME,
    obiektSportowy INT,
    uzytkownik INT,
    FOREIGN KEY (obiektSportowy) REFERENCES ObiektSportowy(id),
    FOREIGN KEY (uzytkownik) REFERENCES Uzytkownik(id)
);


INSERT INTO RodzajObiektu (nazwa) VALUES ("Stadion narodowy");
INSERT INTO RodzajObiektu (nazwa) VALUES ("Stadion");
INSERT INTO RodzajObiektu (nazwa) VALUES ("Orlik");
INSERT INTO RodzajObiektu (nazwa) VALUES ("Hala sportowa");


INSERT INTO ObiektSportowy (nazwa, adres, rodzajObiektu, godzinyOtwarcia, obrazek) VALUES ("Stadion Łazienkowski", "ul. Łazienkowska 3, Warszawa", 2, "8:00-20:00", "stadion.jpeg");
INSERT INTO ObiektSportowy (nazwa, adres, rodzajObiektu, godzinyOtwarcia, obrazek) VALUES ("Camp Nou", "Camp Nou, C. d'Arístides Maillol, 12, 08028 Barcelona, Hiszpania", 2, "7:00-22:00", "camp.jpeg");
INSERT INTO ObiektSportowy (nazwa, adres, rodzajObiektu, godzinyOtwarcia, obrazek) VALUES ("PGE Narodowy", "al. Księcia Józefa Poniatowskiego 1, 03-901 Warszawa", 1, "8:00-20:00", "pge.jpeg");
INSERT INTO ObiektSportowy (nazwa, adres, rodzajObiektu, godzinyOtwarcia, obrazek) VALUES ("Arena Lublin", "Stadionowa 1, 20-405 Lublin", 1, "8:00-20:00", "arena.jpeg");
INSERT INTO ObiektSportowy (nazwa, adres, rodzajObiektu, godzinyOtwarcia, obrazek) VALUES ("Orlik 2012", "ul. Radzyńska 20A, Lublin", 3, "7:00-23:00", "orlik.jpeg");
INSERT INTO ObiektSportowy (nazwa, adres, rodzajObiektu, godzinyOtwarcia, obrazek) VALUES ("Hala MOSiR im. Zdzisława Niedzieli", "Aleje Zygmuntowskie 4, 20-101 Lublin", 4, "10:00-20:00", "mosir.jpeg");

INSERT INTO Uzytkownik (imie, nazwisko, email, haslo) VALUES ("Jan", "Kowalski", "jankowalski@gmail.com", "25f9e794323b453885f5181f1b624d0b");
INSERT INTO Uzytkownik (imie, nazwisko, email, haslo) VALUES ("Anna", "Nowak", "annanowak@gmail.com", "1a1dc91c907325c69271ddf0c944bc72");

INSERT INTO Rezerwacja (czasRozpoczecia, czasZakonczenia, obiektSportowy, uzytkownik) VALUES ("2023-04-10 15:00:00", "2023-04-10 18:30:00", 1, 1);
INSERT INTO Rezerwacja (czasRozpoczecia, czasZakonczenia, obiektSportowy, uzytkownik) VALUES ("2023-04-17 10:00:00", "2023-04-17 13:00:00", 1, 2);
INSERT INTO Rezerwacja (czasRozpoczecia, czasZakonczenia, obiektSportowy, uzytkownik) VALUES ("2023-03-25 10:00:00", "2023-03-25 13:00:00", 5, 1);
INSERT INTO Rezerwacja (czasRozpoczecia, czasZakonczenia, obiektSportowy, uzytkownik) VALUES ("2023-03-25 14:00:00", "2023-03-25 17:00:00", 5, 2);
INSERT INTO Rezerwacja (czasRozpoczecia, czasZakonczenia, obiektSportowy, uzytkownik) VALUES ("2023-03-31 9:00:00", "2021-03-31 16:00:00", 5, 2);
INSERT INTO Rezerwacja (czasRozpoczecia, czasZakonczenia, obiektSportowy, uzytkownik) VALUES ("2023-03-31 18:00:00", "2021-04-01 21:00:00", 5, 2);