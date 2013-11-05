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
maat varchar(100),
kielet varchar(100),
kayttaja integer not null,
foreign key(kayttaja) references kayttaja
);

create table henkilo(
idtunnus serial primary key,
nimi varchar(100),
ohjaus integer,
roolitus integer,
foreign key(ohjaus) references ohjaus,
foreign key(roolitus) references roolitus
);

create table roolitus (
idtunnus serial primary key,
elokuva integer,
nayttelija integer,
foreign key(elokuva) references elokuva,
foreign key(nayttelija) references henkilo
);

create table ohjaus(
idtunnus serial primary key,
elokuva integer,
ohjaaja integer,
foreign key(elokuva) references elokuva,
foreign key(ohjaaja) references henkilo
);
