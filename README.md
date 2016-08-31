# Talented Europe: Web application

Talented Europe is a platform that connects top european students, validated by insitutions with businesses, allowing them to stablish a work relationship.

The web application will serve two fronts. First allow students register, institutions validate and companies to search. And second, serve as an API for the iOS/Android applications.

## Installing

Installing it in a few simple steps:

- Setup your webserver to be able serve the site, for example using our [Provisioner](https://github.com/TalentedEurope/Provisioner)
- Clone the repository
- Run *bash first-deploy.sh*
- Copy */.env.example* to */.env*  and set up it's settings
- Run *php artisan key:generate* if you haven't set up a key on .env
- Run *php artisan migrate*

## Official Documentation

Documentation for the entire project (including the mobile applications) can be found in the [documentation repository](https://github.com/TalentedEurope/te-docs).

## Requirements.

The site is based on Laravel 5.2 so on the php side it's recommended:

- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- Imagemagick PHP Extension

By default while laravel allows us to use other data backends, the production site will run on Mysql 5.7/Mariadb 10.1 and Redis 3.0.

## Security Vulnerabilities

If you discover a security vulnerability within Talented Europe, please send an e-mail to Carlos Sosa or Pol Cámara at dev@talentedeurope.org. All security vulnerabilities will be promptly addressed.

## License

The Talented Europe project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
