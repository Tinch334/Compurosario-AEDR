## UserHandling/login.php
This file verifies a user given a username and password. It can return 5 things:
 - **0** - An unexpected error ocurred, the arguments somehow weren't passed to the file
 - **-1** - The username doesn't exist
 - **-2** - The account isn't verified
 - **-3** - The password is incorrect
 - **1** - Login successful