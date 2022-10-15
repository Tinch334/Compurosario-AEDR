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


### 1- Clone the repo (from git bash)

> `git clone https://github.com/Tinch334/Compurosario-AEDR/`

### 2- Change its root dir name

> `mv Compurosario-AEDR/ TRES/`

### 3- Change credentials
In **data.php**:

> `$db_user='root';`
> 
> `$db_pass='root';`

## 4- Change redirect registration URL

In **register.php**

From:

> `$verificationLink = "<a href='https://www.agssoft.ar/TRES/UserHandling/verify-email.php?key=".$_POST['email']."&token=".$token."'>Hace click para verificar tu cuenta</a>";
`

To:

> `$verificationLink = "<a href='https://www.agssoft.ar/TRES/UserHandling/verify-email.php?key=".$_POST['email']."&token=".$token."'>Hace click para verificar tu cuenta</a>";
`
