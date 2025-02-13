SELECT KODEA, DESKRIBAPENA FROM bidaia_motak;

#Herrialdeak berreskuratzeko sql

SELECT KODEA, HELMUGA FROM herrialdeak;

#izena eta pashitza artu

SELECT izena, pasahitza FROM agentzia WHERE izena = '$erabiltzailea' and pasahitza = '$pasahitza';

#zerbitzu kodea eta izena jaso 

SELECT Kodea , Izena FROM zerbitzuak;

#Aireportua jaso

SELECT AIREPORTUA, HIRIA FROM iata;

#Airelinea jaso

SELECT AIRELINEA_KODEA, AIRELINEA_IZENA FROM airelineak;

#Logela motak artu 

SELECT KODEA , DESKRIBAPENA FROM logela_motak;


# Agentzia baten bidaiak erakusteko kontsulta



# Agentzia / Bidaia baten zerbitzuak erakusteko kontsultak

# Agentziak sortzeko kontsultak

INSERT INTO agentzia (Langile_Kopuru_Kodea, LOGOA , MARKAREN_KOLOREA , izena , agentzia_m_kodea , pasahitza) VALUES (:langilekop, :logoa , :kolorea , :izena , :agentziamota , :pasahitza);

# Bidaiak sortzeko kontsultak

INSERT INTO bidaia (Bidaiaren_izena, Deskribapena, bidai_hasiera, bidai_amaiera, Herrialde_kodea, Bidaia_m_kodea) 
VALUES (:izena, :deskribapena, :hasiera_data, :amaiera_data, :herrialdeak, :bidaimota);


# Zerbitzuak sortzeko kontsultak

INSERT INTO zerbitzuak (Bidaiaren_kodea, Izena) VALUES (:kodea, :izen)

# Datuak manipulatzeko kontsultak (agentzia, bidaia, zerbitzuak...)

#hegoaldia txertatu 

INSERT INTO hegaldia (Zerbitzu_kodea, Irteera_data, Irteera_ordutegia, Bidaiaren_iraupena, Prezioa, Jatorrizko_aireportua, Helmugako_aireportua, AIRELINEA_KODEA) 
VALUES (:bidai_mota, :irtera, :ordua, :iraupena, :prezioa, :aireportua1, :aireportua2, :airelinea);

#ostatua txertatu
INSERT INTO ostatua (Zerbitzu_kodea, Prezioa, Sarrera_eguna, Irtera_eguna, hiria, izena, logela_m_kodea ) 
VALUES (:bidai_mota, :prezioa, :sarreraeguna, :irtera, :hiria, :izena, :logela);

#beste_batzuk txertatu
INSERT INTO beste_batzuk(Zerbitzu_kodea , Egun , Deskribapena , Prezioa) 
VALUES (:bidai_mota , :eguna , :deskribapena , :prezioa  );



###############################################
#Analisirako kontsultak (kontsulta konplexuak)#
###############################################


#1 
SELECT Herrialde_kodea, COUNT(*) AS cantidad_viajes 
FROM tu_tabla 
GROUP BY Herrialde_kodea;


#2
SELECT am.DESKRIBAPENA AS Tipo_Agencia, COUNT(a.KODEA) AS Cantidad_Agencias 
FROM agentzia a JOIN agentzia_motak am ON a.agentzia_m_kodea = am.KODEA 
GROUP BY am.DESKRIBAPENA
ORDER BY Cantidad_Agencias DESC;



#3
SELECT izena FROM agentzia 
WHERE Langile_Kopuru_Kodea = "L1";



#4

SELECT AVG(Prezioa) AS Precio_Promedio 
FROM hegaldia;

#5
SELECT Prezioa 
From hegaldia
where Prezioa > 100 
Order by Prezioa ASC;
