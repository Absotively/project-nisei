# Project NISEI Site
The Project NISEI site has been built in [Laravel](https://laravel.com/) 5.5 and the core project code was generated using [QuickAdminPanel](https://quickadminpanel.com/).

To set the site up in a dev environment you will need a full LAMP stack set up, if you don't already have this available I'd recommend using [Scotch Box](https://box.scotch.io/), a Vagrant box which should come with everything you need already installed (although any other setup should work fine as long as you can run Laravel). Scotch Box comes with it's own set up instructions to get everything in place (VirtualBox, Vagrant, Scotch itself). Once this stack is fully set up and Vagrant is booted, you should be able to view the scotch box landing page at your local scotch box ip (default: http://192.168.33.10).

This project is built on top of scotch so to get in sync you can:
`git remote rm origin`
`git remote add origin [[this repo]]`
`git fetch`
`git pull origin master`

From there you can ssh into Vagrant with ```vagrant ssh``` and navigate to ```/var/www/``` which is the web root of the server and reflects the contents of your project folder on your machine. The site is now installed but must be configured to run.

* Set up .env (as a copy of .env.example) with your local environment details, including database logins that are included in the Scotch Box docs
* run `composer install` (this will install a lot of stuff, especially if you haven't got many php packages in cache)
* run `php artisan key:generate`
* run `php artisan vendor:publish` and select all
* run `php artisan migrate` to populate the databases with tables
* run `php artisan db:seed` to populate the default user and roles

At this point the site should be functional (although missing styles on the front end). You can proceed to /admin and login with the default user, admin@admin.com - password to access the back end of the site. To acquire styles and js you can then.

* run `npm install`
* run `npm run build:sass`
* run `npm run build:js`

If you have issues with node-sass at this point, those can potentially be resolved by running `npm install --unsafe-perm -g node-sass`. Any issues beyond that can be debugged as a group in Slack.

Once everything is up and running, pull requests can be made to the main repo (on a feature branch) and deployed to live once reviewed.

## Docker instructions
Ensure that you have docker and docker compose installed

Start containers with 

`docker-compose up`

`composer install` can be run using the following command

* `docker run --rm -v $(pwd):/app composer install --ignore-platform-reqs --no-scripts` (MacOS/Linux)
* `docker run --rm -v %cd%:/app composer install --ignore-platform-reqs --no-scripts` (Windows)

The commands below `composer install` can be run by prefixing the command with `docker-compose run app `.  This will execute the command in the app container.

Site will be available at http://localhost:8081.
