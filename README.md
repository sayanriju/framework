Obullo: PHP5 Framework
=========================

The goal of Obullo is keep the framework maintainable, portable, easy and minimal. 

## Features

- Modular Programming (Modules, SubModules and SubFolders)
- Simple HMVC (Hierarchical Model View Controller)
- Validation in Model (VM) instead of using a complex structure such as ORM
- Task Management and CLI Support
- Advanced Debugging and Error Notifiers
- UTF8 Libraries
- SSL Support, Ajax Support
- Nginx HTTP Server Support
- Lightweight and Easy to Use, Orginally based CodeIgniter
- Well documented, It focuses on simplicity and best maintainability.


## Installation

- Open archive to your `/htdocs` folder.
- Check your php.ini, `short_open_tag = ` should be `On`, `display_errors = ` should be `On`..
- Check your phpinfo(); `PDO` and `Pdo_yourdriver` (pdo_mysql, pdo_pgsql ..) must be installed on your host.
- Open your browser and run Obullo e.g. `http://localhost/obullo`
- Captcha module use the GD library, give the 777 permissions to `/modules/captcha/public/images/` folder.
- You can change the configuration from `application/config/config.php` file. Set your application base url.
- You can change the routes from `application/config/routes.php` file.
  
  
## Quick Start
go `http://obullo.com/user_guide/en/1.0.1/getting-started.html`.

  
## Credits

- Ersin Guvenc &lt;eguvenc at gmail.com&gt;
- CJ Lazell &lt;cjlazell at googlemail.com&gt;


# LICENSE AGREEMENT

Copyright (c) 2009 - 2011 http://obullo.com
All rights reserved.

This license is a legal agreement between you and Obullo.com for the use
of Obullo Software (the "Software").  By obtaining the Software you
agree to comply with the terms and conditions of this license.

PERMITTED USE
-------------

You are permitted to use, copy, modify, and distribute the Software and its
documentation, with or without modification, for any purpose, provided that
the following conditions are met:

1. A copy of this license agreement must be included with the distribution.

2. Redistributions of source code must retain the above copyright notice in
   all source code files.

3. Redistributions in binary form must reproduce the above copyright notice
   in the documentation and/or other materials provided with the distribution.

4. Any files that have been modified must carry notices stating the nature
   of the change and the names of those who changed them.

5. Products derived from the Software must include an acknowledgment that
   they are derived from Obullo in their documentation and/or other
   materials provided with the distribution.

6. Products derived from the Software may not be called "Obullo",
   nor may "Obullo" appear in their name, without prior written
   permission from Ersin Guvenc.


INDEMNITY
---------

You agree to indemnify and hold harmless the authors of the Software and
any contributors for any direct, indirect, incidental, or consequential
third-party claims, actions or suits, as well as any related expenses,
liabilities, damages, settlements or fees arising from your use or misuse
of the Software, or a violation of any terms of this license.

DISCLAIMER OF WARRANTY
----------------------

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.

LIMITATIONS OF LIABILITY
YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.

NOTES
--------
This Product Derived From CodeIgniter Software.

