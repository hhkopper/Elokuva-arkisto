create table kayttaja(
idtunnus serial primary key, /* käyttäjän tunnus, jonka avulla erotetaan kayttajat toisistaan */
kayttajatunnus varchar(15) unique not null, /* kayttajatunnus, jonka käyttäjä antaa itselleen, kellään ei voi olla samanlaista*/
salasana varchar(15) not null /* käyttäjän salasana */
);

create table Elokuva(
idtunnus serial primary key,
nimi varchar(100) not null,
numero integer,
kesto integer,
ikaraja integer,
valmistusvuosi integer,
maat varchar(100)
);
