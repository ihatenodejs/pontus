# pontus
A website for my online self

[![License: CC0-1.0](https://img.shields.io/badge/License-CC0_1.0-lightgrey.svg)](http://creativecommons.org/publicdomain/zero/1.0/)

# How to self-host
There are two self-hosted options, depending on your situation. For my purposes, I opt to use the script, so I can keep code up-to-date with my repo. However, you may prefer to host the static code, and not use the script.

1. **Use self script**
The `self` script can help you establish a public/ folder, where code can be served to. At this time, it doesn't do anything but move the files over as of now. This script is only supported on Linux hosts.

To use the self script, you must do the following:

**a.**  Allow execution of self script

```shell
chmod +x self
```

**b.** Start server

```shell
./self start
```

You may also use `./self help` (this script does not provide therapy services) to view other available commands.

2. **Use the static files**

You may also opt to copy the src/ folder to another location, such as /var/www/html, so it can be served static with a web server such as Apache2 or NGINX.