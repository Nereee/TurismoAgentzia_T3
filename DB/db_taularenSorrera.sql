CREATE DATABASE IF NOT EXISTS db_bidaia_Gestorea
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE db_bidaia_Gestorea;

# Master Taulak
CREATE TABLE IATA (
    AIREPORTUA varchar(4) NOT NULL,
    HIRIA varchar(50),
    PRIMARY KEY (AIREPORTUA)
);

CREATE TABLE HERRIALDEAK (
    KODEA varchar(4),
    HELMUGA varchar(50),
    PRIMARY KEY (KODEA)
);

CREATE TABLE BIDAIA_MOTAK (
    KODEA varchar(3),
    DESKRIBAPENA varchar(500),
    PRIMARY KEY (KODEA)
);

CREATE TABLE AIRELINEAK (
    AIRELINEA_KODEA varchar(5),
    HERRIALDE_IZENA varchar(500),
    HERRIALDE_KODEA varchar(3),
    PRIMARY KEY (AIRELINEA_KODEA)
);

CREATE TABLE AGENTZIA_MOTAK (
    KODEA varchar(3),
    DESKRIBAPENA varchar(50),
    PRIMARY KEY (KODEA)
);

CREATE TABLE LOGELA_MOTAK (
    KODEA varchar(4),
    DESKRIBAPENA varchar(50),
    PRIMARY KEY (KODEA)
);

# Taula Tranzakzionalak
CREATE TABLE LANG_KOPURUA (
    Kodea varchar(5),
    Deskribapena varchar(250),
    PRIMARY KEY (Kodea)
);

CREATE TABLE AGENTZIA (
    KODEA INT AUTO_INCREMENT,
    Langile_Kopuru_Kodea varchar (5),
    LOGOA LONGTEXT,
    MARKAREN_KOLOREA VARCHAR(250),
    izena varchar (50),
    agentzia_m_kodea varchar(3),
    pasahitza varchar(255),
    PRIMARY KEY (KODEA)
);

alter table agentzia add FOREIGN KEY (Langile_Kopuru_Kodea) REFERENCES LANG_KOPURUA(KODEA);
alter table agentzia add FOREIGN KEY (agentzia_m_kodea) REFERENCES AGENTZIA_MOTAK(KODEA);


CREATE TABLE BIDAIA (
    KODEA INT AUTO_INCREMENT,
    Bidaiaren_izena varchar(250),
    Deskribapena varchar(250),
    Ez_barne varchar (250),
    bidai_hasiera DATE,
    bidai_amaiera DATE,
    Herrialde_kodea varchar(4),
    Bidaia_m_kodea varchar(3),
    Agentzia_kodea INT,
    PRIMARY KEY (KODEA)
);

alter table bidaia add FOREIGN KEY (Herrialde_kodea) REFERENCES HERRIALDEAK(KODEA);
alter table bidaia add FOREIGN KEY (Bidaia_m_kodea) REFERENCES BIDAIA_MOTAK(KODEA);
alter table bidaia add FOREIGN KEY (Agentzia_kodea) REFERENCES AGENTZIA(KODEA) on delete cascade on update cascade;

# Zerbitzu Taula
CREATE TABLE ZERBITZUAK (
    Kodea INT AUTO_INCREMENT,
    Izena varchar (30),
    Bidaiaren_kodea INT,
    PRIMARY KEY (Kodea)
);

alter table zerbitzuak add  FOREIGN KEY (Bidaiaren_kodea) REFERENCES BIDAIA(KODEA) on delete cascade on update cascade;

CREATE TABLE OSTATUA (
    Zerbitzu_kodea INT,
    Prezioa decimal(6,2),
    Sarrera_eguna DATE,
    Irtera_eguna DATE,
    hiria varchar(50),
    izena varchar(50),
    logela_m_kodea varchar(4),
    PRIMARY KEY (Zerbitzu_kodea)
);

alter table ostatua add FOREIGN KEY (Zerbitzu_kodea) REFERENCES ZERBITZUAK(Kodea) on delete cascade on update cascade;
alter table ostatua add FOREIGN KEY (logela_m_kodea) REFERENCES LOGELA_MOTAK(KODEA);

CREATE TABLE BESTE_BATZUK (
    Zerbitzu_kodea INT,
    Egun DATE,
    Deskribapena varchar(50),
    Prezioa decimal(6,2),
    PRIMARY KEY (Zerbitzu_kodea)
);

alter table beste_batzuk add FOREIGN KEY (Zerbitzu_kodea) REFERENCES ZERBITZUAK(KODEA) on delete cascade on update cascade;

CREATE TABLE Hegaldia (
	Zerbitzu_kodea INT,
    Hegaldi_kodea varchar(5),
	Irteera_data DATE,
    Irteera_ordutegia TIME,
    Bidaiaren_iraupena TIME,
	Prezioa decimal(6,2),
    Jatorrizko_aireportua varchar(50),
    Helmugako_aireportua varchar(50),
    AIRELINEA_KODEA varchar(5),
    PRIMARY KEY (Zerbitzu_kodea)
);

alter table hegaldia add FOREIGN KEY (Zerbitzu_kodea) REFERENCES ZERBITZUAK(KODEA) on delete cascade on update cascade;
alter table hegaldia add FOREIGN KEY (Jatorrizko_aireportua) REFERENCES IATA(AIREPORTUA);
alter table hegaldia add FOREIGN KEY (Helmugako_aireportua) REFERENCES IATA(AIREPORTUA);
alter table hegaldia add FOREIGN KEY (AIRELINEA_KODEA) REFERENCES AIRELINEAK(AIRELINEA_KODEA);

CREATE TABLE Joan_eta_etorri (
	Zerbitzu_kodea INT,
	Hegaldi_kodea_etorri varchar(3),
	Itzulera_ordua TIME,
	Etorria_eguna DATE,
    bueltako_iraupena TIME,
    Jatorrizko_aireportua varchar(50),
    Helmugako_aireportua varchar(50),
    Bueltako_AIRELINEA_KODEA varchar(5),
    PRIMARY KEY (Zerbitzu_kodea)
);

alter table joan_eta_etorri add FOREIGN KEY (Zerbitzu_kodea) REFERENCES ZERBITZUAK(KODEA) on delete cascade on update cascade;
alter table joan_eta_etorri add FOREIGN KEY (Jatorrizko_aireportua) REFERENCES IATA(AIREPORTUA);
alter table joan_eta_etorri add FOREIGN KEY (Helmugako_aireportua) REFERENCES IATA(AIREPORTUA);
alter table joan_eta_etorri add FOREIGN KEY (Bueltako_AIRELINEA_KODEA) references AIRELINEAK(AIRELINEA_KODEA);