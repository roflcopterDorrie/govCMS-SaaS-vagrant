# Department of Health SaaS container

## Description

This is a container that Department of Health is using to implement Acquia Site Factory site in local developing evironment.

## Dependency

wget is used for downloading backup from Amazon S3.
This tool is designed for Mac and Linux environments. 

## Usage

1. ```git clone``` this repo from github
2. Run ```composer install```
3. Copy ```sitefactory.default.yml``` to ```sitefactory.yml``` with you site factory details
4. Run ```composer download```
5. Run ```vagrant up```
6. Run ```composer import```
7. Visit ```http://govCMS-SaaS-vagrant.local``` to see the site running locally

## Import database

Run ```composer importdb``` to pull the live database and files and import locally

## Clear cache

Run ```composer cc``` to clear local cache.  
Run ```composer ccsite``` to clear site factory cache.

# Developer tips

The project is based on beetbox, so you can override
[beetbox config](https://github.com/beetboxvm/beetbox/blob/master/.beetbox/config.yml) in .beetbox/config.yml

To test your `sitefactory.yml` try `composer config-test`, which should list the available sites and try to connect to
the site configured in your sitefactory.yml.

Available custom composer scripts can be seen by running
`composer list | grep Custom`.

Any of the [Site Factory CLI commands](https://github.com/rujiali/acquia-site-factory-cli#usage) can be run here
by running `./vendor/bin/AcquiaSiteFactoryCli` instead of `./bin/AcquiaSiteFactoryCli`.
