# pontus

[![PHP](https://img.shields.io/badge/php-%23777BB4.svg?&logo=php&logoColor=white)](https://www.php.net)
[![License: CC0-1.0](https://img.shields.io/badge/License-CC0_1.0-lightgrey.svg)](http://creativecommons.org/publicdomain/zero/1.0/)
[![minify.yaml](https://git.pontusmail.org/aidan/pontus/actions/workflows/minify.yaml/badge.svg)](https://git.pontusmail.org/aidan/pontus/actions?workflow=minify.yaml)

[![a proud member of the orange team of 512KB club](https://512kb.club/assets/images/orange-team.svg)](https://512kb.club)

A website for my online self

## How to self-host

There are two self-hosted options, depending on your situation. For my purposes, I opt to use the script, so I can keep code up-to-date with my repo. However, you may prefer to host the static code, and not use the script.

### Using Docker

You may use Docker with the provided `Dockerfile` and `docker-compose.yml` to get started easily!

To use `pontus` with Docker:

```shell
docker compose up -d --build
```

The image will build, then a server will be started at http://localhost:2280.

The image uses PHP 8.4, Apache, and Bun and will set everything up for you, including minification.

### Using PHP and a web server

You may also opt to copy the src/ folder to another location, such as /var/www/html for use with web servers like Apache.

Keep in mind that PHP is required!

## Serve custom files

If you would like to host your own files, simply place them in `./src/archives/files`, keeping a similar directory structure.

You may have to update `./src/includes/sidebar.php` to include your new directories, and create any pages in `./src/archives` to properly display any custom directories.

You can customize the file browser if you wish in `./src/includes/file-browser.php`
