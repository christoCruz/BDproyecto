/*==============================================================*/
/* DBMS name:      ORACLE Version 11g                           */
/* Created on:     09/06/2021 11:26:52 PM                       */
/*==============================================================*/


alter table AULAS_GRUPOS
   drop constraint FK_AULAS_GR_AULAS_GRU_GRUPOS;

alter table AULAS_GRUPOS
   drop constraint FK_AULAS_GR_AULAS_GRU_AULAS;

alter table CARRERA
   drop constraint FK_CARRERA_DEPTO_CAR_DEPARTAM;

alter table CARRERA_MATERIA
   drop constraint FK_CARRERA__CARRERA_M_MATERIAS;

alter table CARRERA_MATERIA
   drop constraint FK_CARRERA__CARRERA_M_CARRERA;

alter table COORDINADOR
   drop constraint FK_COORDINA_CARRERA_C_CARRERA;

alter table COORDINADOR
   drop constraint FK_COORDINA_COORDINAD_USUARIO;

alter table COORDINADOR
   drop constraint FK_COORDINA_DOCENTE_C_DOCENTE;

alter table COPIAGRUPO
   drop constraint FK_COPIAGRU_GRUPOS_CO_GRUPOS;

alter table DOCENTE
   drop constraint FK_DOCENTE_USUARIO_D_USUARIO;

alter table DOCENTE_DEPTO
   drop constraint FK_DOCENTE__DOCENTE_D_DEPARTAM;

alter table DOCENTE_DEPTO
   drop constraint FK_DOCENTE__DOCENTE_D_DOCENTE;

alter table ESTUDIANTES
   drop constraint FK_ESTUDIAN_CARRERA_E_CARRERA;

alter table ESTUDIANTES
   drop constraint FK_ESTUDIAN_ESTUDIANT_PREINSCR;

alter table ESTUDIANTES
   drop constraint FK_ESTUDIAN_HORASSOCI_HORAS_SO;

alter table ESTUDIANTES
   drop constraint FK_ESTUDIAN_INSCRIPCI_INSCRIPC;

alter table ESTUDIANTES
   drop constraint FK_ESTUDIAN_USUARIO_E_USUARIO;

alter table GRUPOS
   drop constraint FK_GRUPOS_GRUPOS_CO_COORDINA;

alter table GRUPOS
   drop constraint FK_GRUPOS_MATERIAS__MATERIAS;

alter table HORARIOS_GRUPOS
   drop constraint FK_HORARIOS_GRUPOS_HO_GRUPOS;

alter table HORASSOCIALES_DOCENTE
   drop constraint FK_HORASSOC_HORASSOCI_DOCENTE;

alter table HORASSOCIALES_DOCENTE
   drop constraint FK_HORASSOC_HORASSOCI_HORAS_SO;

alter table INSCRIPCION
   drop constraint FK_INSCRIPC_GRUPOS_IN_GRUPOS;

alter table MATERIAS
   drop constraint FK_MATERIAS_MATERIAS__PREINSCR;

alter table PLAN_ESTUDIO
   drop constraint FK_PLAN_EST_HISTO_PLA_HISTORIA;

alter table PLAN_ESTUDIO
   drop constraint FK_PLAN_EST_PLAN_ESTU_CARRERA;

alter table REGISTRO_ESTUDIANTE
   drop constraint FK_REGISTRO_INSCRIPCI_INSCRIPC;

alter table REPORTECHOQUE
   drop constraint FK_REPORTEC_DOCENTE_R_DOCENTE;

alter table REPORTECHOQUE
   drop constraint FK_REPORTEC_ESTUDIANT_ESTUDIAN;

drop table AULAS cascade constraints;

drop index AULAS_GRUPOS_FK;

drop index AULAS_GRUPOS2_FK;

drop table AULAS_GRUPOS cascade constraints;

drop index DEPTO_CARRERA_FK;

drop table CARRERA cascade constraints;

drop index CARRERA_MATERIA_FK;

drop index CARRERA_MATERIA2_FK;

drop table CARRERA_MATERIA cascade constraints;

drop index DOCENTE_COORDINADOR_FK;

drop index COORDINADOR_USUARIO_FK;

drop index CARRERA_COORDINADOR_FK;

drop table COORDINADOR cascade constraints;

drop index GRUPOS_COPIAGRUPO_FK;

drop table COPIAGRUPO cascade constraints;

drop table DEPARTAMENTO cascade constraints;

drop index USUARIO_DOCENTE_FK;

drop table DOCENTE cascade constraints;

drop index DOCENTE_DEPTO_FK;

drop index DOCENTE_DEPTO2_FK;

drop table DOCENTE_DEPTO cascade constraints;

drop index USUARIO_ESTUDIANTE_FK;

drop index INSCRIPCION_ESTUDIANTE_FK;

drop index CARRERA_ESTUDIANTE_FK;

drop index HORASSOCIALES_ESTUDIANTE_FK;

drop index ESTUDIANTE_PREINSCRIP_FK;

drop table ESTUDIANTES cascade constraints;

drop index MATERIAS_GRUPOS_FK;

drop index GRUPOS_COORDINADOR_FK;

drop table GRUPOS cascade constraints;

drop table HISTORIAL_PLANIFICACION cascade constraints;

drop index GRUPOS_HORARIOS_FK;

drop table HORARIOS_GRUPOS cascade constraints;

drop index HORASSOCIALES_DOCENTE_FK;

drop index HORASSOCIALES_DOCENTE2_FK;

drop table HORASSOCIALES_DOCENTE cascade constraints;

drop table HORAS_SOCIALES cascade constraints;

drop index GRUPOS_INSCRIPCION_FK;

drop table INSCRIPCION cascade constraints;

drop index MATERIAS_PREINSCRIP_FK;

drop table MATERIAS cascade constraints;

drop index HISTO_PLAN_ESTUDIO_FK;

drop index PLAN_ESTUDIO_FK;

drop table PLAN_ESTUDIO cascade constraints;

drop table PREINSCRIPCION cascade constraints;

drop index INSCRIPCION_RESGISTRO_FK;

drop table REGISTRO_ESTUDIANTE cascade constraints;

drop index ESTUDIANTE_REPORTE_FK;

drop index DOCENTE_REPORTE_FK;

drop table REPORTECHOQUE cascade constraints;

drop table USUARIO cascade constraints;

/*==============================================================*/
/* Table: AULAS                                                 */
/*==============================================================*/
create table AULAS 
(
   IDAULA               INTEGER              not null,
   NUMAULA              VARCHAR2(15)         not null,
   FOTOAULA             VARCHAR2(50),
   constraint PK_AULAS primary key (IDAULA)
);

/*==============================================================*/
/* Table: AULAS_GRUPOS                                          */
/*==============================================================*/
create table AULAS_GRUPOS 
(
   IDGRUPOS             INTEGER              not null,
   IDAULA               INTEGER              not null,
   constraint PK_AULAS_GRUPOS primary key (IDGRUPOS, IDAULA)
);

/*==============================================================*/
/* Index: AULAS_GRUPOS2_FK                                      */
/*==============================================================*/
create index AULAS_GRUPOS2_FK on AULAS_GRUPOS (
   IDAULA ASC
);

/*==============================================================*/
/* Index: AULAS_GRUPOS_FK                                       */
/*==============================================================*/
create index AULAS_GRUPOS_FK on AULAS_GRUPOS (
   IDGRUPOS ASC
);

/*==============================================================*/
/* Table: CARRERA                                               */
/*==============================================================*/
create table CARRERA 
(
   IDCARRERA            INTEGER              not null,
   IDDEPTO              INTEGER              not null,
   CODCARRERA           VARCHAR2(20)         not null,
   MATERIAS             INTEGER              not null,
   constraint PK_CARRERA primary key (IDCARRERA)
);

/*==============================================================*/
/* Index: DEPTO_CARRERA_FK                                      */
/*==============================================================*/
create index DEPTO_CARRERA_FK on CARRERA (
   IDDEPTO ASC
);

/*==============================================================*/
/* Table: CARRERA_MATERIA                                       */
/*==============================================================*/
create table CARRERA_MATERIA 
(
   IDMATERIA            INTEGER              not null,
   IDCARRERA            INTEGER              not null,
   constraint PK_CARRERA_MATERIA primary key (IDMATERIA, IDCARRERA)
);

/*==============================================================*/
/* Index: CARRERA_MATERIA2_FK                                   */
/*==============================================================*/
create index CARRERA_MATERIA2_FK on CARRERA_MATERIA (
   IDCARRERA ASC
);

/*==============================================================*/
/* Index: CARRERA_MATERIA_FK                                    */
/*==============================================================*/
create index CARRERA_MATERIA_FK on CARRERA_MATERIA (
   IDMATERIA ASC
);

/*==============================================================*/
/* Table: COORDINADOR                                           */
/*==============================================================*/
create table COORDINADOR 
(
   IDCOORDINADOR        CHAR(10)             not null,
   IDDOCENTE            INTEGER              not null,
   IDUSUARIO            INTEGER              not null,
   IDCARRERA            INTEGER              not null,
   constraint PK_COORDINADOR primary key (IDCOORDINADOR)
);

/*==============================================================*/
/* Index: CARRERA_COORDINADOR_FK                                */
/*==============================================================*/
create index CARRERA_COORDINADOR_FK on COORDINADOR (
   IDCARRERA ASC
);

/*==============================================================*/
/* Index: COORDINADOR_USUARIO_FK                                */
/*==============================================================*/
create index COORDINADOR_USUARIO_FK on COORDINADOR (
   IDUSUARIO ASC
);

/*==============================================================*/
/* Index: DOCENTE_COORDINADOR_FK                                */
/*==============================================================*/
create index DOCENTE_COORDINADOR_FK on COORDINADOR (
   IDDOCENTE ASC
);

/*==============================================================*/
/* Table: COPIAGRUPO                                            */
/*==============================================================*/
create table COPIAGRUPO 
(
   IDCOPIAGRUPO         INTEGER              not null,
   IDGRUPOS             INTEGER              not null,
   COP_CANTICUPOS       INTEGER              not null,
   FECHAMODIGRUPO       DATE                 not null,
   COP_NUMGRUPO         INTEGER              not null,
   constraint PK_COPIAGRUPO primary key (IDCOPIAGRUPO)
);

/*==============================================================*/
/* Index: GRUPOS_COPIAGRUPO_FK                                  */
/*==============================================================*/
create index GRUPOS_COPIAGRUPO_FK on COPIAGRUPO (
   IDGRUPOS ASC
);

/*==============================================================*/
/* Table: DEPARTAMENTO                                          */
/*==============================================================*/
create table DEPARTAMENTO 
(
   IDDEPTO              INTEGER              not null,
   NOMBREDEPTO          VARCHAR2(50)         not null,
   constraint PK_DEPARTAMENTO primary key (IDDEPTO)
);

/*==============================================================*/
/* Table: DOCENTE                                               */
/*==============================================================*/
create table DOCENTE 
(
   IDDOCENTE            INTEGER              not null,
   IDUSUARIO            INTEGER              not null,
   NOMDOCENTE           VARCHAR2(25)         not null,
   APEDOCENTE           VARCHAR2(25)         not null,
   PROFDOCENTE          VARCHAR2(25)         not null,
   ESTDOCENTE           INTEGER              not null,
   TIPOCONTRATO         VARCHAR2(25)         not null,
   INGREDOCENTE         DATE                 not null,
   constraint PK_DOCENTE primary key (IDDOCENTE)
);

/*==============================================================*/
/* Index: USUARIO_DOCENTE_FK                                    */
/*==============================================================*/
create index USUARIO_DOCENTE_FK on DOCENTE (
   IDUSUARIO ASC
);

/*==============================================================*/
/* Table: DOCENTE_DEPTO                                         */
/*==============================================================*/
create table DOCENTE_DEPTO 
(
   IDDEPTO              INTEGER              not null,
   IDDOCENTE            INTEGER              not null,
   constraint PK_DOCENTE_DEPTO primary key (IDDEPTO, IDDOCENTE)
);

/*==============================================================*/
/* Index: DOCENTE_DEPTO2_FK                                     */
/*==============================================================*/
create index DOCENTE_DEPTO2_FK on DOCENTE_DEPTO (
   IDDOCENTE ASC
);

/*==============================================================*/
/* Index: DOCENTE_DEPTO_FK                                      */
/*==============================================================*/
create index DOCENTE_DEPTO_FK on DOCENTE_DEPTO (
   IDDEPTO ASC
);

/*==============================================================*/
/* Table: ESTUDIANTES                                           */
/*==============================================================*/
create table ESTUDIANTES 
(
   IDESTUDIANTE         INTEGER              not null,
   IDPREINSCRIPCION     INTEGER              not null,
   IDHORASSOCIALES      INTEGER              not null,
   IDCARRERA            INTEGER              not null,
   IDINCRIPCION         INTEGER              not null,
   IDUSUARIO            INTEGER              not null,
   NOMESTUDIANTE        VARCHAR2(25)         not null,
   APELESTUDIANTE       VARCHAR2(25)         not null,
   CARNETESTU           VARCHAR2(15)         not null,
   CORREOESTU           VARCHAR2(40)         not null,
   TELESTUDIANTE        INTEGER              not null,
   constraint PK_ESTUDIANTES primary key (IDESTUDIANTE)
);

/*==============================================================*/
/* Index: ESTUDIANTE_PREINSCRIP_FK                              */
/*==============================================================*/
create index ESTUDIANTE_PREINSCRIP_FK on ESTUDIANTES (
   IDPREINSCRIPCION ASC
);

/*==============================================================*/
/* Index: HORASSOCIALES_ESTUDIANTE_FK                           */
/*==============================================================*/
create index HORASSOCIALES_ESTUDIANTE_FK on ESTUDIANTES (
   IDHORASSOCIALES ASC
);

/*==============================================================*/
/* Index: CARRERA_ESTUDIANTE_FK                                 */
/*==============================================================*/
create index CARRERA_ESTUDIANTE_FK on ESTUDIANTES (
   IDCARRERA ASC
);

/*==============================================================*/
/* Index: INSCRIPCION_ESTUDIANTE_FK                             */
/*==============================================================*/
create index INSCRIPCION_ESTUDIANTE_FK on ESTUDIANTES (
   IDINCRIPCION ASC
);

/*==============================================================*/
/* Index: USUARIO_ESTUDIANTE_FK                                 */
/*==============================================================*/
create index USUARIO_ESTUDIANTE_FK on ESTUDIANTES (
   IDUSUARIO ASC
);

/*==============================================================*/
/* Table: GRUPOS                                                */
/*==============================================================*/
create table GRUPOS 
(
   IDGRUPOS             INTEGER              not null,
   IDMATERIA            INTEGER              not null,
   IDCOORDINADOR        CHAR(10)             not null,
   CANTCUPOS            INTEGER              not null,
   FECHACREACION        DATE                 not null,
   NUMGRUPO             INTEGER              not null,
   constraint PK_GRUPOS primary key (IDGRUPOS)
);

/*==============================================================*/
/* Index: GRUPOS_COORDINADOR_FK                                 */
/*==============================================================*/
create index GRUPOS_COORDINADOR_FK on GRUPOS (
   IDCOORDINADOR ASC
);

/*==============================================================*/
/* Index: MATERIAS_GRUPOS_FK                                    */
/*==============================================================*/
create index MATERIAS_GRUPOS_FK on GRUPOS (
   IDMATERIA ASC
);

/*==============================================================*/
/* Table: HISTORIAL_PLANIFICACION                               */
/*==============================================================*/
create table HISTORIAL_PLANIFICACION 
(
   IDHISOTIAL_PLAN      INTEGER              not null,
   CICLO                INTEGER              not null,
   ANIO                 DATE                 not null,
   constraint PK_HISTORIAL_PLANIFICACION primary key (IDHISOTIAL_PLAN)
);

/*==============================================================*/
/* Table: HORARIOS_GRUPOS                                       */
/*==============================================================*/
create table HORARIOS_GRUPOS 
(
   IDHORARIO_GRU        CHAR(10)             not null,
   IDGRUPOS             INTEGER              not null,
   DIAHORARIO           CHAR(10)             not null,
   HORASHORARIO         CHAR(10)             not null,
   constraint PK_HORARIOS_GRUPOS primary key (IDHORARIO_GRU)
);

/*==============================================================*/
/* Index: GRUPOS_HORARIOS_FK                                    */
/*==============================================================*/
create index GRUPOS_HORARIOS_FK on HORARIOS_GRUPOS (
   IDGRUPOS ASC
);

/*==============================================================*/
/* Table: HORASSOCIALES_DOCENTE                                 */
/*==============================================================*/
create table HORASSOCIALES_DOCENTE 
(
   IDDOCENTE            INTEGER              not null,
   IDHORASSOCIALES      INTEGER              not null,
   constraint PK_HORASSOCIALES_DOCENTE primary key (IDDOCENTE, IDHORASSOCIALES)
);

/*==============================================================*/
/* Index: HORASSOCIALES_DOCENTE2_FK                             */
/*==============================================================*/
create index HORASSOCIALES_DOCENTE2_FK on HORASSOCIALES_DOCENTE (
   IDHORASSOCIALES ASC
);

/*==============================================================*/
/* Index: HORASSOCIALES_DOCENTE_FK                              */
/*==============================================================*/
create index HORASSOCIALES_DOCENTE_FK on HORASSOCIALES_DOCENTE (
   IDDOCENTE ASC
);

/*==============================================================*/
/* Table: HORAS_SOCIALES                                        */
/*==============================================================*/
create table HORAS_SOCIALES 
(
   IDHORASSOCIALES      INTEGER              not null,
   NOMPROYECTO          VARCHAR2(100)        not null,
   DURACIONPROYEC       VARCHAR2(30)         not null,
   ESTADOPROYECTO       VARCHAR2(1)          not null,
   ANTEPROYECTO         VARCHAR2(50)         not null,
   ESTADOANTEPROYECTO   VARCHAR2(1)          not null,
   FECHASOCIALES        DATE                 not null,
   COMENTARIOPRO        VARCHAR2(200),
   constraint PK_HORAS_SOCIALES primary key (IDHORASSOCIALES)
);

/*==============================================================*/
/* Table: INSCRIPCION                                           */
/*==============================================================*/
create table INSCRIPCION 
(
   IDINCRIPCION         INTEGER              not null,
   IDGRUPOS             INTEGER              not null,
   FECHAINSCRIP         DATE                 not null,
   constraint PK_INSCRIPCION primary key (IDINCRIPCION)
);

/*==============================================================*/
/* Index: GRUPOS_INSCRIPCION_FK                                 */
/*==============================================================*/
create index GRUPOS_INSCRIPCION_FK on INSCRIPCION (
   IDGRUPOS ASC
);

/*==============================================================*/
/* Table: MATERIAS                                              */
/*==============================================================*/
create table MATERIAS 
(
   IDMATERIA            INTEGER              not null,
   IDPREINSCRIPCION     INTEGER              not null,
   CODMATERIA           VARCHAR2(20)         not null,
   NIVELMATERIA         VARCHAR2(30)         not null,
   NOMMATERIA           VARCHAR2(50)         not null,
   REQUISITO            VARCHAR2(50)         not null,
   constraint PK_MATERIAS primary key (IDMATERIA)
);

/*==============================================================*/
/* Index: MATERIAS_PREINSCRIP_FK                                */
/*==============================================================*/
create index MATERIAS_PREINSCRIP_FK on MATERIAS (
   IDPREINSCRIPCION ASC
);

/*==============================================================*/
/* Table: PLAN_ESTUDIO                                          */
/*==============================================================*/
create table PLAN_ESTUDIO 
(
   IDPLAN               INTEGER              not null,
   IDCARRERA            INTEGER              not null,
   IDHISOTIAL_PLAN      INTEGER              not null,
   DURACIONPLAN         VARCHAR2(20)         not null,
   DESCRIPCIONPLAN      VARCHAR2(200)        not null,
   constraint PK_PLAN_ESTUDIO primary key (IDPLAN)
);

/*==============================================================*/
/* Index: PLAN_ESTUDIO_FK                                       */
/*==============================================================*/
create index PLAN_ESTUDIO_FK on PLAN_ESTUDIO (
   IDCARRERA ASC
);

/*==============================================================*/
/* Index: HISTO_PLAN_ESTUDIO_FK                                 */
/*==============================================================*/
create index HISTO_PLAN_ESTUDIO_FK on PLAN_ESTUDIO (
   IDHISOTIAL_PLAN ASC
);

/*==============================================================*/
/* Table: PREINSCRIPCION                                        */
/*==============================================================*/
create table PREINSCRIPCION 
(
   IDPREINSCRIPCION     INTEGER              not null,
   FECHAPREINCRIPCION   DATE                 not null,
   constraint PK_PREINSCRIPCION primary key (IDPREINSCRIPCION)
);

/*==============================================================*/
/* Table: REGISTRO_ESTUDIANTE                                   */
/*==============================================================*/
create table REGISTRO_ESTUDIANTE 
(
   IDREGISTROESTU       INTEGER              not null,
   IDINCRIPCION         INTEGER              not null,
   FECHAREGIESTU        DATE                 not null,
   ESTADOMATERIA        VARCHAR2(1)          not null,
   NOTAMATERIA          FLOAT(2)             not null,
   constraint PK_REGISTRO_ESTUDIANTE primary key (IDREGISTROESTU)
);

/*==============================================================*/
/* Index: INSCRIPCION_RESGISTRO_FK                              */
/*==============================================================*/
create index INSCRIPCION_RESGISTRO_FK on REGISTRO_ESTUDIANTE (
   IDINCRIPCION ASC
);

/*==============================================================*/
/* Table: REPORTECHOQUE                                         */
/*==============================================================*/
create table REPORTECHOQUE 
(
   IDCHOQUE             INTEGER              not null,
   IDDOCENTE            INTEGER              not null,
   IDESTUDIANTE         INTEGER              not null,
   FECHACHOQUE          DATE                 not null,
   COMENTARIOCHOQUE     VARCHAR2(100)        not null,
   constraint PK_REPORTECHOQUE primary key (IDCHOQUE)
);

/*==============================================================*/
/* Index: DOCENTE_REPORTE_FK                                    */
/*==============================================================*/
create index DOCENTE_REPORTE_FK on REPORTECHOQUE (
   IDDOCENTE ASC
);

/*==============================================================*/
/* Index: ESTUDIANTE_REPORTE_FK                                 */
/*==============================================================*/
create index ESTUDIANTE_REPORTE_FK on REPORTECHOQUE (
   IDESTUDIANTE ASC
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO 
(
   IDUSUARIO            INTEGER              not null,
   USUARIO              VARCHAR2(25)         not null,
   PASSWORD             VARCHAR2(25)         not null,
   TIPOUSUAIRO          VARCHAR2(15)         not null,
   ESTADOUSUARIO        VARCHAR2(1)          not null,
   constraint PK_USUARIO primary key (IDUSUARIO)
);

alter table AULAS_GRUPOS
   add constraint FK_AULAS_GR_AULAS_GRU_GRUPOS foreign key (IDGRUPOS)
      references GRUPOS (IDGRUPOS);

alter table AULAS_GRUPOS
   add constraint FK_AULAS_GR_AULAS_GRU_AULAS foreign key (IDAULA)
      references AULAS (IDAULA);

alter table CARRERA
   add constraint FK_CARRERA_DEPTO_CAR_DEPARTAM foreign key (IDDEPTO)
      references DEPARTAMENTO (IDDEPTO);

alter table CARRERA_MATERIA
   add constraint FK_CARRERA__CARRERA_M_MATERIAS foreign key (IDMATERIA)
      references MATERIAS (IDMATERIA);

alter table CARRERA_MATERIA
   add constraint FK_CARRERA__CARRERA_M_CARRERA foreign key (IDCARRERA)
      references CARRERA (IDCARRERA);

alter table COORDINADOR
   add constraint FK_COORDINA_CARRERA_C_CARRERA foreign key (IDCARRERA)
      references CARRERA (IDCARRERA);

alter table COORDINADOR
   add constraint FK_COORDINA_COORDINAD_USUARIO foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO);

alter table COORDINADOR
   add constraint FK_COORDINA_DOCENTE_C_DOCENTE foreign key (IDDOCENTE)
      references DOCENTE (IDDOCENTE);

alter table COPIAGRUPO
   add constraint FK_COPIAGRU_GRUPOS_CO_GRUPOS foreign key (IDGRUPOS)
      references GRUPOS (IDGRUPOS);

alter table DOCENTE
   add constraint FK_DOCENTE_USUARIO_D_USUARIO foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO);

alter table DOCENTE_DEPTO
   add constraint FK_DOCENTE__DOCENTE_D_DEPARTAM foreign key (IDDEPTO)
      references DEPARTAMENTO (IDDEPTO);

alter table DOCENTE_DEPTO
   add constraint FK_DOCENTE__DOCENTE_D_DOCENTE foreign key (IDDOCENTE)
      references DOCENTE (IDDOCENTE);

alter table ESTUDIANTES
   add constraint FK_ESTUDIAN_CARRERA_E_CARRERA foreign key (IDCARRERA)
      references CARRERA (IDCARRERA);

alter table ESTUDIANTES
   add constraint FK_ESTUDIAN_ESTUDIANT_PREINSCR foreign key (IDPREINSCRIPCION)
      references PREINSCRIPCION (IDPREINSCRIPCION);

alter table ESTUDIANTES
   add constraint FK_ESTUDIAN_HORASSOCI_HORAS_SO foreign key (IDHORASSOCIALES)
      references HORAS_SOCIALES (IDHORASSOCIALES);

alter table ESTUDIANTES
   add constraint FK_ESTUDIAN_INSCRIPCI_INSCRIPC foreign key (IDINCRIPCION)
      references INSCRIPCION (IDINCRIPCION);

alter table ESTUDIANTES
   add constraint FK_ESTUDIAN_USUARIO_E_USUARIO foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO);

alter table GRUPOS
   add constraint FK_GRUPOS_GRUPOS_CO_COORDINA foreign key (IDCOORDINADOR)
      references COORDINADOR (IDCOORDINADOR);

alter table GRUPOS
   add constraint FK_GRUPOS_MATERIAS__MATERIAS foreign key (IDMATERIA)
      references MATERIAS (IDMATERIA);

alter table HORARIOS_GRUPOS
   add constraint FK_HORARIOS_GRUPOS_HO_GRUPOS foreign key (IDGRUPOS)
      references GRUPOS (IDGRUPOS);

alter table HORASSOCIALES_DOCENTE
   add constraint FK_HORASSOC_HORASSOCI_DOCENTE foreign key (IDDOCENTE)
      references DOCENTE (IDDOCENTE);

alter table HORASSOCIALES_DOCENTE
   add constraint FK_HORASSOC_HORASSOCI_HORAS_SO foreign key (IDHORASSOCIALES)
      references HORAS_SOCIALES (IDHORASSOCIALES);

alter table INSCRIPCION
   add constraint FK_INSCRIPC_GRUPOS_IN_GRUPOS foreign key (IDGRUPOS)
      references GRUPOS (IDGRUPOS);

alter table MATERIAS
   add constraint FK_MATERIAS_MATERIAS__PREINSCR foreign key (IDPREINSCRIPCION)
      references PREINSCRIPCION (IDPREINSCRIPCION);

alter table PLAN_ESTUDIO
   add constraint FK_PLAN_EST_HISTO_PLA_HISTORIA foreign key (IDHISOTIAL_PLAN)
      references HISTORIAL_PLANIFICACION (IDHISOTIAL_PLAN);

alter table PLAN_ESTUDIO
   add constraint FK_PLAN_EST_PLAN_ESTU_CARRERA foreign key (IDCARRERA)
      references CARRERA (IDCARRERA);

alter table REGISTRO_ESTUDIANTE
   add constraint FK_REGISTRO_INSCRIPCI_INSCRIPC foreign key (IDINCRIPCION)
      references INSCRIPCION (IDINCRIPCION);

alter table REPORTECHOQUE
   add constraint FK_REPORTEC_DOCENTE_R_DOCENTE foreign key (IDDOCENTE)
      references DOCENTE (IDDOCENTE);

alter table REPORTECHOQUE
   add constraint FK_REPORTEC_ESTUDIANT_ESTUDIAN foreign key (IDESTUDIANTE)
      references ESTUDIANTES (IDESTUDIANTE);

