create table kayttaja(
idtunnus serial primary key, /* käyttäjän tunnus, jonka avulla erotetaan käyttäjät toisistaan */
kayttajatunnus varchar(15) unique not null, /* kayttajatunnus, jonka käyttäjä antaa itselleen, kellään ei voi olla samanlaista*/
salasana varchar(15) not null /* käyttäjän salasana */
);

create table elokuva(
idtunnus serial primary key,
nimi varchar(100) not null,
numero integer,
kesto integer,
ikaraja integer,
valmistusvuosi integer,
genre varchar(100),
maat varchar(100),
kielet varchar(100),
kayttaja integer not null,
foreign key(kayttaja) references kayttaja ON DELETE CASCADE
);

create table henkilo(
idtunnus serial primary key,
nimi varchar(100)
);

create table roolisuoritus (
idtunnus serial primary key,
elokuva integer,
nayttelija integer,
foreign key(elokuva) references elokuva ON DELETE CASCADE,
foreign key(nayttelija) references henkilo
);

create table ohjaus(
idtunnus serial primary key,
elokuva integer,
ohjaaja integer,
foreign key(elokuva) references elokuva ON DELETE CASCADE,
foreign key(ohjaaja) references henkilo
);
