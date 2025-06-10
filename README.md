Invisalign Technical Task – Custom WordPress Theme

This repository contains a custom-built WordPress theme developed for the Invisalign Website, Made by Kaan Gulsel

Prerequisites
Make sure you have the following installed:

- (https://www.docker.com/products/docker-desktop/) 

## 🚀 Installation Instructions (Docker)

1. Clone the repository

git clone https://github.com/KayveliDevelopment/invisalign-technical-task.git
cd invisalign-technical-task

2. Configure environment
Copy the example environment file (.env.example to just .env) and adjust ports/passwords if needed

3. Start the containers
Start the docker containers by running:- docker-compose up

4. Access the site
WordPress Site: http://localhost:8000
phpMyAdmin: http://localhost:8080
MySQL user: wordpress (or match your .env)
MySQL password: wordpress (or match your .env)

The database is preloaded — no WordPress installation step is required.

Required Plugins (Pre-installed & Pre-activated)
These plugins are bundled inside the /plugins/ director, no manual installation is needed :-

Plugin	Purpose
ACF	
Manage custom field groups and templates
WPForms Lite	
Contact form integration

What’s Included
- Custom theme under theme/invisalign-dental
- Dynamic ACF fields (synced via acf-json)
- Contact form section using WPForms
- Responsive design: mobile and desktop
- Dockerized local dev setup
- Media, pages, and settings preloaded via db/init.sql

Notes
All Content is Dynamic
ACF field groups are version-controlled in acf-json/
All content and settings are loaded via wordpress.sql
Local media is committed under wp-content/uploads/

 Contact
For any technical questions regarding this theme, please contact kaan1998@hotmail.co.uk.
