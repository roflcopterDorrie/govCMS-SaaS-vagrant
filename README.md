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
