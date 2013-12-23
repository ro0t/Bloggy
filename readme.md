## Bloggy

Bloggy is a web application that aims for simplicity, it's built on Laravel's PHP Framework (4.0). Bloggy is for developers and by developers.

What does it include?
* Two tables, blog & user
* Simple front end functional blog layout
* "Live" Blog editing tools

How's the TODO List coming?
* We need an admin interface for user control & selection of themes
* Themes
* Settings table
* Better installer

## How to install?
Since it's **still in development**, you will have to compose yourself into the matrix of bloggy, using [composer](http://getcomposer.org/) and do some tweaks to install it and get it up and running.

First you download the project, and with a command line tool you navigate to the projects root folder and run the composer command:

    composer update
    
Configure the app/config/database.php file with your database information, and point your browser to

    http://<yourhost>/install
    
This will install Bloggy and setup your database for you, once finished the website is functional - however you need to create yourself an account to login with, insert the following code snippet into app/routes.php

    // Welcome to the ghetto
    Route::get('create/{user}/{pass}', function($user, $pass) { User::create(array('username' => $user, 'password' => Hash::make($pass)); return 'Done.'; });
    
Next point your browser to

    http://<yourhost>/create/<yourusername>/<yourpassword>
    
Voilah, you have created your account \o/ now point your browser to **/login** and login with your credentials.
You're not done yet though, since we dont want nasty people coming to our blog and creating accounts, you'll have to remove the previous route created and preferably the **install** route as well *(although users cannot install two times, only when the database supplied in database.php does not exist)*

Open app/routes.php again and

    // Remove
    Route::get('install', function()........
    // Remove
    Route::get('create/........
    
Now you can login, write, edit and delete posts :o)

## Documentation

Todo, the project is not nearly ready to be released yet so... figure it out!

### Contributing To Laravel
**All issues and pull requests should be filed on the [ro0t/Bloggy](http://github.com/ro0t/Bloggy) repository.**

### License
The Bloggy platform is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
