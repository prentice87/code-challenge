Code Challenge
========================

This simple Symfony application will help you determine which Hogwarts house is best suited for you based on the 
traits you pick.

It utilizes the Houses Endpoint of the Wizard World API
https://wizard-world-api.herokuapp.com/swagger/index.html

Requirements
------------

* PHP 8.1.0 or higher;
* PDO-SQLite PHP extension enabled;

Installation
------------
Clone the code from GitHub
```bash
$ git clone https://github.com/prentice87/code-challenge.git my_project
$ cd my_project/
$ composer install
```

Usage
-----
There's no need to configure anything before running the application. There are
2 different ways of running this application depending on your needs:

**Option 1.** Install ddev\
run ``ddev start``\
Project will then be available via http://code-challenge.ddev.site/

**Option 2.** Use a web server like Nginx or Apache to run the application\
Make sure to set the public folder as the document root.

**Option 3.** On your local machine, you can run this command to use the built-in PHP web server:

```bash
$ cd my_project/
$ php -S localhost:8000 -t public/
```