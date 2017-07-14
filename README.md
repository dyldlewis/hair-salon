## SPECS
1. The user can add a stylist and the program will save the stylist to the database.
  -input: Nancy
  -output: Nancy
2. The user can add clients to their stylists and the program will save them to the database.
  -input: Karen
  -output: Karen -> Nancy
3. The user can view clients sorted by their stylist.
4. The user can update and delete stylists.

Mysql commands used:
> CREATE DATABASE hair_salon;
> USE hair_salon;
> CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR (255));
> USE hair_salon;

> ALTER TABLE client ADD stylist_id int;
> DROP DATABASE hair_salon_test;
