# Department of Health SaaS container

## Description

This is a container that Department of Health is using to implement Acquia Site Factory (ACSF) site
in local developing environment.

It is designed to work with any govCMS SaaS site (see `sitefactory.default.yml`), and then allow
you to pull new improvements regularly.

## Dependency

* `composer` and `php`
* `vagrant` for running Beetbox VM
* `wget` is used for downloading backup from Amazon S3

This tool is designed for Mac and Linux environments. 

## Quick start

1. `git clone` this repo from github.
2. `composer install`.
4. `cp sitefactory.default.yml sitefactory.yml` and modify with your Site Factory details.
5. `composer acsf-test` to verify connection to ACSF.
6. `composer build-docroot` to set up the codebase.
7. `vagrant up` to build Beetbox VM.
8. `composer build-drupal` sets up the database on the newly minted VM.
9. `composer login` to login.

## Config

The `sitefactory.yml` will look something like:
```
username: joebloggs
apikey: abcdef123456abcdef123456abcdef123456
url: https://www.govcms.acsitefactory.com
site_id: 1234
theme_repo: https://github.com/my-organisation/repo-with-theme
```

# Working with your site

## Refresh database

Run `composer sync` to create a new remote backup, and import the files and database locally.

## Clear cache

Run `composer cc` to clear local cache.
Run `composer acsf-cc` to clear site factory cache.

## Other commands

Available custom composer scripts can be seen by running `composer list | grep Custom`.

# Developer topics

## Build strategy and theme development

The only things you can control in ACSF is configuration in the production site, and the 
theme in the repository. For these reason we:
 
* build the local site based on the ACSF download,
* clone the theme into `./theme-repo` and then link it to the codebase,
* make database changes remotely, then sync locally.

You can safely rebuild/remove the ./docroot directory without losing any work, including any
custom settings.php file (see next section).

## Work with any 


## Custom settings

The settings.php is based on settings.beetbox.php. You can also have a custom one that is
stored outside the `docroot`. Just create a settings.local.php in the root and modify any
configuration you need to.

## Beetbox domain

Beetbox by default will create the site based on the name of the directory. If you've cloned the repo into
a different directory the URL will be `{DIRECTORY}.local`.

The drush alias will always be @govCMS-SaaS-vagrant.local. 

The project is based on beetbox, so you can override
[beetbox config](https://github.com/beetboxvm/beetbox/blob/master/.beetbox/config.yml) in .beetbox/config.yml

## Drush launcher

If you are using global Drush launcher, you will need to set the path to Drush as the 
DrupalFinder component doesn't recognised this codebase as Drupal.

```
export DRUSH_LAUNCHER_FALLBACK=./vendor/bin/drush
```

## Site Factory CLI

Any of the [Site Factory CLI commands](https://github.com/rujiali/acquia-site-factory-cli#usage) can be run here
by running `./vendor/bin/AcquiaSiteFactoryCli` instead of `./bin/AcquiaSiteFactoryCli`.



