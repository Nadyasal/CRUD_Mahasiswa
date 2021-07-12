============================================================
   Database name:  uts_ppweb                                   
   DBMS name:      Sybase SQL Anywhere                       
   Created on:     22/04/2021  21:15                         
============================================================

============================================================
   Table: JENIS_KELAMIN                                      
 ============================================================
create table JENIS_KELAMIN
(
    ID_JK     char(1)               not null,
    NAMA_JK   varchar(15)           not null,
    primary key (ID_JK)
);

 ============================================================
   Table: MAHASISWA                                          
 ============================================================
create table MAHASISWA
(
    NIM       char(11)              not null,
    ID_JK     char(1)                       ,
    NAMA_MHS  varchar(100)          not null,
    primary key (NIM)
);

alter table MAHASISWA
    add foreign key FK_MAHASISW_BERIDENTI_JENIS_KE (ID_JK)
       references JENIS_KELAMIN (ID_JK) ;

