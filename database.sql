CREATE DATABASE IF NOT EXISTS PAGESBOOK 
    WITH
    OWNER = root
    ENCODING = 'UTF8'
    CONECTION LIMIT = 100 ;

CREATE TABLE IF NOT EXISTS public."Ubicasion"(
    "ID" SERIAL PRIMARY KEY,
    "Nombre" varchar(255) NOT NULL,
    CONSTRAINT "Ubicasion_pkey" PRIMARY KEY ("ID"),
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."Ubicasion"
    OWNER TO root;


CREATE TABLE IF NOT EXISTS public."Enlaces"(
    "UUID" uuid NOT NULL,
    "Orden" SERIAL NOT NULL,
    "Nombre" VARCHAR(255) NOT NULL,
    "Etiqueta" VARCHAR(255) NOT NULL,
    "Ubicasion" integer,
    "Link" TEXT NOT NULL,
    CONSTRAINT "PK_Enlaces" PRIMARY KEY ("UUID","Orden"),
    CONSTRAINT "FK_Ubicasion" FOREIGN KEY ("Ubicasion")
        REFERENCES public."Ubicasion" ("ID") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."Enlaces"
    OWNER TO root;

-- fALTA IMPLEMENTAR LA TABLE PARA SU USO EN LA BD  
CREATE TABLE IF NOT EXISTS public."Etiquetas"(
    "UUID" uuid DEFAULT uuid_generate_v4 (),
    "Nombre" VARCHAR(255) NOT NULL,
    CONSTRAINT "PK_Etiquetas" PRIMARY KEY ("UUID")
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."Etiquetas"
    OWNER TO root;
