# two-factor-enforce

A simple WordPress plugin that ensures that;

1. only certain second factors are available to the users
2. everyone has at least one second factor enabled. If the user hasn't set up a second factor, the "email" method will be used

All real functionality is implemented in the _Two Factor_ -plugin, which is you also must install.

https://wordpress.org/plugins/two-factor/

The users will be able to manage their two factor preferences in their profile.

https://$SITE/wp-admin/profile.php

The permitted methods are:

- Email (PIN by email)
- TOTP -time based codes (Google Authenticator et. al)
- FIDO U2F -security key

