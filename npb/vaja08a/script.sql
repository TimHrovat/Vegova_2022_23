CONNECT 'C:\Users\Dijak\Downloads\TRGOVINA.FDB' user 'sysdba' password 'masterkey';

-- 1

-- a
set term !! ;
create procedure izpis1 (n integer) returns (vrstica char(80)) as
declare variable L_ime_izdelka char(20);
declare variable stevec integer default 1;
begin
  for select ime_izdelka from izdelek into :L_ime_izdelka
  do
  begin
    if (stevec = n) then
    begin
     vrstica = cast(n as char(3)) || '. izdelek= ' || L_ime_izdelka;
     suspend;
    end
    stevec = stevec + 1;
  end
end !!
set term ; !!

-- b
SHOW PROCEDURE;

Procedure Name                    Invalid Dependency, Type
================================= ======= =====================================
IZPIS1                                    IZDELEK, Table

-- c

SELECT * FROM IZPIS1(2);
SELECT * FROM IZPIS1(5);
SELECT * FROM IZPIS1(10);

-- d
IN 'C:\Program Files\Firebird\Firebird_3_0\UDF\ib_udf2.sql';
set term !! ;
create procedure izpis1 (n integer) returns (vrstica char(80)) as
declare variable L_ime_izdelka char(20);
declare variable stevec integer default 1;
begin
  for select ime_izdelka from izdelek into :L_ime_izdelka
  do
  begin
    if (stevec = n) then
    begin
     vrstica = trim(cast(n as char(3))) || '. izdelek= ' || L_ime_izdelka;
     suspend;
    end
    stevec = stevec + 1;
  end
end !!
set term ; !!

-- e
DROP PROCEDURE IZPIS1;

-- f
SELECT * FROM IZPIS1(2);
SELECT * FROM IZPIS1(5);
SELECT * FROM IZPIS1(10);

-- g
set term !! ;
create procedure izpis1 (n integer) returns (vrstica char(80)) as
declare variable L_ime_izdelka char(20);
declare variable stevec integer default 1;
begin
  for select ime_izdelka from izdelek into :L_ime_izdelka
  do
  begin
    if (stevec = n) then
    begin
     vrstica = trim(cast(n as char(3))) || '. izdelek= ' || upper(L_ime_izdelka);
     suspend;
    end
    stevec = stevec + 1;
  end
end !!
set term ; !!

-- h
DROP PROCEDURE IZPIS1;

-- i
SELECT * FROM IZPIS1(2);
SELECT * FROM IZPIS1(5);
SELECT * FROM IZPIS1(10);

-- j
set term !! ;
create procedure izpis1 (n integer) returns (vrstica char(80)) as
declare variable L_ime_izdelka char(20);
declare variable stevec integer default 1;
begin
  for select ime_izdelka from izdelek into :L_ime_izdelka
  do
  begin
    if (stevec = n) then
    begin
     vrstica = trim(cast(n as char(3))) || '. izdelek= ' || upper(L_ime_izdelka);
     suspend;
    end
    stevec = stevec + 1;
  end
  if (stevec <= n) then
  begin
    vrstica = 'Tega zapisa ni v tabeli';
    suspend;
  end
end !!
set term ; !!

-- k
DROP PROCEDURE IZPIS1;

-- 2
set term !! ;
create procedure izpis2 returns (podatki char(80)) as
declare variable ime_izdelka char(20);
declare variable cena float;
declare variable stevec integer default 1;
begin
  for select ime_izdelka, cena from izdelek into :ime_izdelka, :cena
  do
  begin
    podatki = trim(cast(stevec as char(3))) || '. ' || ime_izdelka || round(cena, 2);
    stevec = stevec + 1;
    suspend;
  end
end !!
set term ; !!

SELECT * FROM IZPIS2;

-- 3
set term !! ;
create procedure izpis3(ime_izdelka char(20), n float) returns (ime char(20), sprememba varchar(5)) as
declare variable cena float;
declare variable orig_cena float;
declare variable nova_cena float;
begin
  for select ime_izdelka, cena from izdelek into :ime, :cena
  do
  begin
    if (ime = ime_izdelka) then
    begin
      orig_cena = round(cena * 1.2, 2);
      nova_cena = round(cena * (1.2 + n), 2);
      sprememba = round(nova_cena - orig_cena, 2);
      suspend;
    end
  end
end !!
set term ; !!

SELECT * FROM IZPIS3('Jajčni liker', 0.02);

DROP PROCEDURE IZPIS3;

CREATE EXCEPTION DDV_SPREMEMBA 'To bo revolucija';

set term !! ;
create procedure izpis3(ime_izdelka char(20), n float) returns (ime char(20), sprememba varchar(5)) as
declare variable cena float;
declare variable orig_cena float;
declare variable nova_cena float;
begin
  if (n > 0.1) then
  begin
    exception DDV_SPREMEMBA;
  end
  for select ime_izdelka, cena from izdelek where ime_izdelka = :ime_izdelka into :ime, :cena
  do
  begin
      orig_cena = round(cena * 1.2, 2);
      nova_cena = round(cena * (1.2 + n), 2);
      sprememba = round(nova_cena - orig_cena, 2);
      suspend;
  end
when exception DDV_SPREMEMBA do
begin
  ime = 'To bo revolucija';
  sprememba = NULL;
  suspend;
end
end !!
set term ; !!

SELECT * FROM IZPIS3('Jajčni liker', 0.02);
SELECT * FROM IZPIS3('Jajčni liker', 0.2);

-- 4
set term !! ;
create procedure izpis4(n int, m int) returns (podatki varchar(80)) as
declare variable cena_n float;
declare variable cena_m float;
declare variable cena_temp float;
declare variable stevec integer default 1;
begin
  for select cena from izdelek into :cena_temp
  do
  begin
    if (stevec = n) then
    begin
     cena_n = cena_temp * 1.2;
    end
    if (stevec = m) then
    begin
     cena_m = cena_temp * 1.2;
    end
    stevec = stevec + 1;
  end
  if (cena_n > cena_m) then
  begin
    podatki = 'Prvi izdelek je drazji za ' || round(cena_n - cena_m, 2);
    suspend;
  end
  else if (cena_n < cena_m) then
  begin
    podatki = 'Drugi izdelek je drazji za ' || round(cena_m - cena_n, 2);
    suspend;
  end
  else
  begin
    podatki = 'Ceni sta enaki';
    suspend;
  end
end !!
set term ; !!

SELECT * FROM IZPIS4(1, 2);
SELECT * FROM IZPIS4(2, 1);
SELECT * FROM IZPIS4(1, 1);

