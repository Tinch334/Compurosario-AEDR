## Segmentation
The footer and header are now segmented and can be included in any page. To do so include the following file:
>``<script src="/TRES/scripts/csi.js" defer></script>``

Then add the components like so: ``<div data-include="<path-to-file>.html"></div>``

## UserHandling/login.php
This file verifies a user given a username and password. It can return 5 things:
 - **0** - An unexpected error ocurred, the arguments somehow weren't passed to the file
 - **-1** - The username doesn't exist
 - **-2** - The account isn't verified
 - **-3** - The password is incorrect
 - **1** - Login successful

 ## How to host locally

- Change credentials in data.php

-