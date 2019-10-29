# Craft demo site

This repo contains all of the templates, front-end resources, and a MySQL database backup for “Happy Lager”, a Craft demo site.

You can find out more about Craft at [craftcms.com](https://craftcms.com/).

## Features

Happy Lager takes advantage of several Craft features:

#### Sections

The content in Happy Lager is managed from the following [sections](https://docs.craftcms.com/v3/sections-and-entries.html#sections):

* Four “Single” sections:
  - Homepage
  - About
  - Services Index
  - Work Index
* Two “Channel” sections:
  - News
  - Work
* Two “Structure” sections:
  - Locations
  - Services

#### Entry Types

The News section has two [entry types](https://docs.craftcms.com/v3/sections-and-entries.html#entry-types):

* **Article** – used to store news articles
* **Link** – used to store links to articles on other websites

#### Matrix Fields

This site has the following [Matrix fields](https://docs.craftcms.com/v3/matrix-fields.html):

* **Article Body** – used to store the varying content of the About page and News, Services, and Work entries.
* **Contact Methods** – used to store Locations’ various contact methods.
* **Services Body** – used to store information about the Services.
* **Testimonials** – used to store the Homepage testimonials.

#### Relations

This site has the following [relational fields](https://docs.craftcms.com/v3/relations.html#terminology):

* **Services Performed** _(Entries)_ – used to relate Work entries to the relevant Services entries.
* **Client Logos** _(Assets)_ – used to related the Homepage to the logos that should be displayed in the “Our Best Drinking Buddies” section.
* **Featured Image** _(Assets)_ – used to relate a featured image to News, Work, Services, and Locations entries.
* **Featured Thumb** _(Assets)_ – used to relate a featured thumbnail to Work entries.
* **Hero Image** _(Assets)_ – used to relate a hero image to the Homepage.
* **Service Icon** _(Assets)_ – used to relate an icon to Services entries.
* There are additional Assets fields within the “Article Body” and “Service Body” Matrix fields.

#### Assets

This site has the following [asset volumes](https://docs.craftcms.com/v3/assets.html):

* **Site Assets** – used to store all miscellaneous site imagery.
* **Company Logos** – used to store the company logos that are displayed on the Homepage.
* **Service Icons** – used to store Services’ icons.


## Installation

You can check out Happy Lager online from [demo.craftcms.com](https://demo.craftcms.com/).

If you want to install the site locally, follow these instructions:

1. Download/clone the repo on your computer:

   ```bash
   git clone https://github.com/webmenedzser/demo.git happylager.test
   ```

2. Copy the `.env.example` file at the root of the project to `.env`. If you want to change the credentials for your `happy_lager_database` Docker container, generate new values for `DB_USER`, `DB_PASSWORD`, and `DB_ROOT_PASSWORD` variables. (If you’re on a Mac, you may need to type <kbd>Command</kbd> + <kbd>Shift</kbd> + <kbd>.</kbd> in Finder to show hidden files.)

3. Look into `.docker/Dockerfile_php` and change 1000 to your [UID and GID](https://kb.iu.edu/d/adwf). 

4. Start the containers: 

   ```bash
   cd happylager.test
   docker-compose up -d
   ```

5. Run `composer install` inside the `php` container:

   ```bash
   docker-compose exec php composer install
   ```
6. Point your browser at `http://happylager.localhost:3000` (or the URL you set in `.env` for `DEFAULT_SITE_URL` - make sure to change the port here, too). You should see the Happy Lager homepage.

> If you set your UID and GID in step 3, permissions should be fine.  

> Docker Compose and the database container will automatically create a database and import `happylager.sql` into it (`docker-compose.yml` lines 66-67.). 

> `.localhost` domains should always resolve to your local machine - at least on Linux. Please, test this and let me know if this doesn't work the same way on Mac. 

## Logging in

The Craft Control Panel is located at `http://happylager.localhost:3000/admin`. You can log in with the following credentials:

* Username: `admin`
* Password: `password`

