# Load Images from Production
A simple plugin solution for loading images remotely in staging/development without having to copy hundreds or thousands of images to your local development environment.

- Download the Zip File by clicking the Green CODE button at the top right, and choosing Download ZIP

- Extract this to the `/wp-content/plugins` folder in your WordPress installation i.e. `/wp-content/plugins/load-images-from-production/`

- Next configure `wp-config.php` with the following constants:

```
<?php
// Configure these in your wp-config.php file…

define( 'LIFP_PRODUCTION_HOST', 'www.mycoolsite.com' );
define( 'LIFP_PRODUCTION_SCHEME', 'https' ); // Optional.

```

- And finally, go to the local WordPress admin and activate the **Load Images From Production** plugin