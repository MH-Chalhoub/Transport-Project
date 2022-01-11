/*==============================================================*/
/* DBMS name:      SAP SQL Anywhere 16                          */
/* Created on:     03-Jan-19 04:12:34                           */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_BUS_A1_PROGRAMM') then
    alter table BUS
       delete foreign key FK_BUS_A1_PROGRAMM
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_BUS_POSSEDE2_CHAUFEUR') then
    alter table BUS
       delete foreign key FK_BUS_POSSEDE2_CHAUFEUR
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_CHAUFEUR_POSSEDE_BUS') then
    alter table CHAUFEUR
       delete foreign key FK_CHAUFEUR_POSSEDE_BUS
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ETUDIANT_A_PROGRAMM') then
    alter table ETUDIANT
       delete foreign key FK_ETUDIANT_A_PROGRAMM
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ETUDIANT_COMTIENT_BUS') then
    alter table ETUDIANT
       delete foreign key FK_ETUDIANT_COMTIENT_BUS
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_JOURE_COMPOSE_PROGRAMM') then
    alter table JOURE
       delete foreign key FK_JOURE_COMPOSE_PROGRAMM
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_LOCATION_PREND_DES_BUS') then
    alter table LOCATION
       delete foreign key FK_LOCATION_PREND_DES_BUS
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PROGRAMM_A2_ETUDIANT') then
    alter table PROGRAMMEE
       delete foreign key FK_PROGRAMM_A2_ETUDIANT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PROGRAMM_A3_BUS') then
    alter table PROGRAMMEE
       delete foreign key FK_PROGRAMM_A3_BUS
end if;

drop index if exists BUS.A1_FK;

drop index if exists BUS.POSSEDE2_FK;

drop index if exists BUS.BUS_PK;

drop table if exists BUS;

drop index if exists CHAUFEUR.POSSEDE_FK;

drop index if exists CHAUFEUR.CHAUFEUR_PK;

drop table if exists CHAUFEUR;

drop index if exists ETUDIANT.COMTIENT_FK;

drop index if exists ETUDIANT.A_FK;

drop index if exists ETUDIANT.ETUDIANT_PK;

drop table if exists ETUDIANT;

drop index if exists JOURE.COMPOSE_FK;

drop index if exists JOURE.JOURE_PK;

drop table if exists JOURE;

drop index if exists LOCATION.PREND_DES_ETUDIANT_DE_FK;

drop index if exists LOCATION.LOCATION_PK;

drop table if exists LOCATION;

drop index if exists PROGRAMMEE.A3_FK;

drop index if exists PROGRAMMEE.A2_FK;

drop index if exists PROGRAMMEE.PROGRAMMEE_PK;

drop table if exists PROGRAMMEE;

/*==============================================================*/
/* Table: BUS                                                   */
/*==============================================================*/
create table BUS 
(
   NUMERO_DU_VEHICULE   integer                        not null,
   USERC                varchar(20)                    null,
   IDP                  integer                        null,
   CAPICITE             integer                        not null,
   MODEL                varchar(50)                    null,
   constraint PK_BUS primary key clustered (NUMERO_DU_VEHICULE)
);

/*==============================================================*/
/* Index: BUS_PK                                                */
/*==============================================================*/
create unique clustered index BUS_PK on BUS (
NUMERO_DU_VEHICULE ASC
);

/*==============================================================*/
/* Index: POSSEDE2_FK                                           */
/*==============================================================*/
create index POSSEDE2_FK on BUS (
USERC ASC
);

/*==============================================================*/
/* Index: A1_FK                                                 */
/*==============================================================*/
create index A1_FK on BUS (
IDP ASC
);

/*==============================================================*/
/* Table: CHAUFEUR                                              */
/*==============================================================*/
create table CHAUFEUR 
(
   USERC                varchar(20)                    not null,
   NUMERO_DU_VEHICULE   integer                        null,
   PRENOMC              varchar(20)                    not null,
   NOMC                 varchar(20)                    not null,
   TELEPHONEC           varchar(50)                    not null,
   PASSWORDC            varchar(50)                    not null,
   MODE_DE_PAYEMENT     smallint                       not null,
   constraint PK_CHAUFEUR primary key clustered (USERC)
);

/*==============================================================*/
/* Index: CHAUFEUR_PK                                           */
/*==============================================================*/
create unique clustered index CHAUFEUR_PK on CHAUFEUR (
USERC ASC
);

/*==============================================================*/
/* Index: POSSEDE_FK                                            */
/*==============================================================*/
create index POSSEDE_FK on CHAUFEUR (
NUMERO_DU_VEHICULE ASC
);

/*==============================================================*/
/* Table: ETUDIANT                                              */
/*==============================================================*/
create table ETUDIANT 
(
   USERE                varchar(20)                    not null,
   IDP                  integer                        null,
   NUMERO_DU_VEHICULE   integer                        not null,
   PRENOME              varchar(20)                    not null,
   NOME                 varchar(20)                    not null,
   LOCATIONE            varchar(50)                    not null,
   TELEPHONEE           varchar(50)                    not null,
   MONTANTAPAYEE        integer                        not null,
   PASSWORDE            varchar(50)                    not null,
   constraint PK_ETUDIANT primary key clustered (USERE)
);

/*==============================================================*/
/* Index: ETUDIANT_PK                                           */
/*==============================================================*/
create unique clustered index ETUDIANT_PK on ETUDIANT (
USERE ASC
);

/*==============================================================*/
/* Index: A_FK                                                  */
/*==============================================================*/
create index A_FK on ETUDIANT (
IDP ASC
);

/*==============================================================*/
/* Index: COMTIENT_FK                                           */
/*==============================================================*/
create index COMTIENT_FK on ETUDIANT (
NUMERO_DU_VEHICULE ASC
);

/*==============================================================*/
/* Table: JOURE                                                 */
/*==============================================================*/
create table JOURE 
(
   IDJ                  integer                        not null,
   IDP                  integer                        not null,
   HEURE_DE_DEPART      time                           not null,
   HEURE_DE_RETOUR      time                           not null,
   HEURE_DE_RETOUR1     time                           null,
   constraint PK_JOURE primary key clustered (IDJ)
);

/*==============================================================*/
/* Index: JOURE_PK                                              */
/*==============================================================*/
create unique clustered index JOURE_PK on JOURE (
IDJ ASC
);

/*==============================================================*/
/* Index: COMPOSE_FK                                            */
/*==============================================================*/
create index COMPOSE_FK on JOURE (
IDP ASC
);

/*==============================================================*/
/* Table: LOCATION                                              */
/*==============================================================*/
create table LOCATION 
(
   NOML                 varchar(50)                    not null,
   NUMERO_DU_VEHICULE   integer                        not null,
   constraint PK_LOCATION primary key clustered (NOML)
);

/*==============================================================*/
/* Index: LOCATION_PK                                           */
/*==============================================================*/
create unique clustered index LOCATION_PK on LOCATION (
NOML ASC
);

/*==============================================================*/
/* Index: PREND_DES_ETUDIANT_DE_FK                              */
/*==============================================================*/
create index PREND_DES_ETUDIANT_DE_FK on LOCATION (
NUMERO_DU_VEHICULE ASC
);

/*==============================================================*/
/* Table: PROGRAMMEE                                            */
/*==============================================================*/
create table PROGRAMMEE 
(
   IDP                  integer                        not null,
   USERE                varchar(20)                    null,
   NUMERO_DU_VEHICULE   integer                        null,
   constraint PK_PROGRAMMEE primary key clustered (IDP)
);

/*==============================================================*/
/* Index: PROGRAMMEE_PK                                         */
/*==============================================================*/
create unique clustered index PROGRAMMEE_PK on PROGRAMMEE (
IDP ASC
);

/*==============================================================*/
/* Index: A2_FK                                                 */
/*==============================================================*/
create index A2_FK on PROGRAMMEE (
USERE ASC
);

/*==============================================================*/
/* Index: A3_FK                                                 */
/*==============================================================*/
create index A3_FK on PROGRAMMEE (
NUMERO_DU_VEHICULE ASC
);

alter table BUS
   add constraint FK_BUS_A1_PROGRAMM foreign key (IDP)
      references PROGRAMMEE (IDP)
      on update restrict
      on delete restrict;

alter table BUS
   add constraint FK_BUS_POSSEDE2_CHAUFEUR foreign key (USERC)
      references CHAUFEUR (USERC)
      on update restrict
      on delete restrict;

alter table CHAUFEUR
   add constraint FK_CHAUFEUR_POSSEDE_BUS foreign key (NUMERO_DU_VEHICULE)
      references BUS (NUMERO_DU_VEHICULE)
      on update restrict
      on delete restrict;

alter table ETUDIANT
   add constraint FK_ETUDIANT_A_PROGRAMM foreign key (IDP)
      references PROGRAMMEE (IDP)
      on update restrict
      on delete restrict;

alter table ETUDIANT
   add constraint FK_ETUDIANT_COMTIENT_BUS foreign key (NUMERO_DU_VEHICULE)
      references BUS (NUMERO_DU_VEHICULE)
      on update restrict
      on delete restrict;

alter table JOURE
   add constraint FK_JOURE_COMPOSE_PROGRAMM foreign key (IDP)
      references PROGRAMMEE (IDP)
      on update restrict
      on delete restrict;

alter table LOCATION
   add constraint FK_LOCATION_PREND_DES_BUS foreign key (NUMERO_DU_VEHICULE)
      references BUS (NUMERO_DU_VEHICULE)
      on update restrict
      on delete restrict;

alter table PROGRAMMEE
   add constraint FK_PROGRAMM_A2_ETUDIANT foreign key (USERE)
      references ETUDIANT (USERE)
      on update restrict
      on delete restrict;

alter table PROGRAMMEE
   add constraint FK_PROGRAMM_A3_BUS foreign key (NUMERO_DU_VEHICULE)
      references BUS (NUMERO_DU_VEHICULE)
      on update restrict
      on delete restrict;

