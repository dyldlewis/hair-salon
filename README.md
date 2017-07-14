

# Hair Salon App

#### Allows user to add Stylists and Clients for a hair salon

#### By Dylan Lewis

## Description

The user can add stylists, and then for each stylist they can add a list of clients. They also update the stylists name, delete the stylists, and delete the clients.

## Specs
1. The user can add a stylist and the program will save the stylist to the database.
  -input: Nancy
  -output: Nancy
2. The user can add clients to their stylists and the program will save them to the database.
  -input: Karen
  -output: Karen -> Nancy
3. The user can view clients sorted by their stylist.
4. The user can update and delete stylists.

## Mysql commands used:
* CREATE DATABASE hair_salon;
* USE hair_salon;
* CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR (255));
* USE hair_salon;
* ALTER TABLE clients ADD stylist_id int;
* DROP DATABASE hair_salon_test;

## Prerequisites
* Both php and composer are required for this app, if you do not yet have them installed you can follow this tutorial here:
Mac - https://www.learnhowtoprogram.com/php/getting-started-with-php/installing-composer-and-configuration-for-mac
Pc - https://www.learnhowtoprogram.com/php/getting-started-with-php/installing-composer-and-configuration-for-windows
* If you do not have a local server set up, you'll need to install MAMP as well https://www.learnhowtoprogram.com/php/getting-started-with-php/installing-php

## Setup/Installation Requirements


* Locate repository on github https://github.com/dyldlewis/hair_salon
* Copy the link to the github repository
* Open terminal on your computer
* In terminal do the following:
  * Enter your desktop using 'cd desktop'
  * type 'git clone (repository url)'
  * type 'cd hair_salon' to access the new directory
  * type 'composer install' to acquire the necessary dependencies
  * Next, open MAMP
    * Click preferences>Web Server and click the folder icon next to "document root"
    * Navigate to hair_salon's web folder and hit select
    * Start your MAMP Server
  * Next, open your web browser and enter the url http://localhost:8888/phpMyAdmin/
    * Click on the "Import" tab and click choose file
    * Select the zip file in the hair_salon folder and click go
    * (Optional) repeat for the test zip file in order to pass tests correctly
* visit localhost:8888 and view the application!


## Known Bugs

There are no known bugs.

## Support and contact details

For support email Dylan at dyldlewis@gmail.com.

## Technologies Used

HTML/CSS, PHP, Silex, Composer, MAMP, PHPUnit, MySql, Apache

### License

MIT

Copyright (c) 2016 **Dylan Lewis**
