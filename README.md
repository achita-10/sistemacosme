## Pasos para ejecutar el sistema

### Clonar el repositorio de git
- Clonar el proyecto con el comando git clone https://github.com/achita-10/sistemacosme.git

### Crear el archivo .env
- El archivo .env nos permite alamacenar las variables de entorno y definir datos como nombre, usuario y contraseña que tendra la base de datos, para crearlo usar el siguiente comando en la raiz del proyecto: 
- cp .env.example .env

### Ejecutar los siguientes comandos en la raiz del proyecto 
- Para instalar composer: composer install
- Para instalar el gestor de paquetes: npm install

## Configurar la Base de Datos

### Crear la BD
- crear la bd definida en el archivo .env en el gestor de base de datos, se recomienda phpmyadmin

### Crear las tablas
- Con el siguiente comando se van a crear las tablas de la bd: php artisan migrate

### Crear usuario administrador
- Ejecutando el siguiente comando en la raiz del proyecto: php artisan db:seed
- El cual define por defecto como correo: admin@gmail.com y contraseña: Administrador

### Generar key
- El último paso es crear la key con el comando: php artisan key:generate 

### Despliegue del sistema
- Finalmente ejecutar el sistemas con: php artisan serve

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
#

<p align="center"><img src="/art/logo.svg" alt="Logo Laravel Breeze"></p>

<p align="center">
    <a href="https://packagist.org/packages/laravel/breeze">
        <img src="https://img.shields.io/packagist/dt/laravel/breeze" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/breeze">
        <img src="https://img.shields.io/packagist/v/laravel/breeze" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/breeze">
        <img src="https://img.shields.io/packagist/l/laravel/breeze" alt="License">
    </a>
</p>

## Introduction

Breeze provides a minimal and simple starting point for building a Laravel application with authentication. Styled with Tailwind, Breeze publishes authentication controllers and views to your application that can be easily customized based on your own application's needs.

Laravel Breeze is powered by Blade and Tailwind. If you're looking for a more robust Laravel starter kit that includes two factor authentication, Livewire / Inertia support, and more, check out [Laravel Jetstream](https://jetstream.laravel.com).

Getting started couldn't be easier:

```bash
laravel new my-app

cd my-app

composer require laravel/breeze --dev

php artisan breeze:install
```

## Contributing

Thank you for considering contributing to Breeze! You can read the contribution guide [here](.github/CONTRIBUTING.md).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

Please review [our security policy](https://github.com/laravel/breeze/security/policy) on how to report security vulnerabilities.

## License

Laravel Breeze is open-sourced software licensed under the [MIT license](LICENSE.md).

# laravel-yajra-datatables

[Laravel 7|8 Datatables Example: Use Yajra Datatables in Laravel](https://www.positronx.io/laravel-datatables-example/)
