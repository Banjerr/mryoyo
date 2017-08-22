# WordPress On Docker

A simple stack for WordPress development

## What's Included

Official (and latest) images from

- WordPress (which also includes PHP/Apache)
- MySQL (community fork of MySQL)
- PHPMyAdmin

All that is required (after installing Docker) is to `cd` into the root of this project and run `docker-compose up` or `docker-compose up -d`. This will download the official images, if they aren't already on your local machine, start them up and link them all together. You should then be able to go through the typical WP install by hitting `http://localhost` or where ever your local machine points to. (be sure MAMP isn't running, since this utilizes port 80)

## Things to note

There will be four volumes created

- one for the database (so db data wont be lost if you run `docker-compose down` or exit the container)
- two for the source - we're not versioning WP core files since the latest core files come with the WP image, so we are just going to version the themes and the plugins directories.
- one volume for the `uploads` directory, so that we can easily persist/source control the images/files for the site.

## Importing an existing site

If this is the first time setting up an existing project it will be easiest to use PHPMyAdmin to import a MySQL dump. `http://localhost:22222` The temporary credentials are: un - `root` - pw - `password`. After this initial import, it will most likely be easiest to utilize the DB Migrate Pro plugin.
