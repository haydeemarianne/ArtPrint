# ArtPrint 🎨

## 💡 Descripción

ArtPrint consiste en un marketplace de talleres y cursos de manualidades, en el que podrás conectar con instructores especializados en diversas técnicas de arte y manualidades tanto en presencial como online u híbrido.

Este repositorio incluye la parte del backend de la aplicación, donde está desarrollada la API con todas las funcionalidades necesarias para que instructores publiquen sus talleres, los usuarios se inscriban, etc.

[Repositorio del frontend](https://github.com/Akalchi/marketplaceArtPrint)

## ❓ Requerimientos de instalación

Para poder probar este proyecto en local necesitarás:

1. XAMPP (o cualquier otro servidor local que soporte PHP y MySQL)

2. Terminal del Sistema Operativo

3. Instalar Composer

4. Instalar NPM via Node.js

5. Xdebug (para poder ver el test coverage)

6. Postman (o cualquier otra plataforma para usar la API, como Insomnia)

## 💻 Instalación

1. Clonar el repositorio:
```
    git clone https://github.com/haydeemarianne/ArtPrint.git
```

2. Instalar las dependencias de Composer:
```
    composer install
```

3. Instalar las dependencias de NPM:
```
    npm install
```

4. Crear un archivo '.env' tomando de ejemplo el archivo '.env.example' y modificar las líneas:
    - DB_CONNECTION=mysql
    - DB_DATABASE=marketplace

5. Crear una base de datos en MySQL vacías (aquí hemos usado *phpMyAdmin*)
![Create database in phpMyAdmin](./public/docs/createDatabase.png)

6. Generar todas las tablas y valores falsos:
```
    php artisan migrate:fresh --seed
```

7. Correr NPM:
```
    npm run dev
```

8. Correr Laravel (en otra terminal):
```
    php artisan serve
```

Con todo esto será posible usar la API del proyecto con la URL que nos genere este último comando:

## 📚 Diagrama de la base de datos

Este es el diagrama de la base de datos para este proyecto. Tenemos cinco tablas, **Companies**, **Categories**, **Locations**, **Experiences** y **Cart**, con sus respectivas relaciones.

![Database diagram](./public/docs/databaseDiagram.png)

## 🔍 API Endpoints

-------
-------

## 🛠️ Tecnologías y Herramientas del backend

<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='PHP' src='https://img.shields.io/badge/PHP-100000?style=for-the-badge&logo=PHP&logoColor=white&labelColor=777BB4&color=777BB4'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='Laravel' src='https://img.shields.io/badge/Laravel-100000?style=for-the-badge&logo=Laravel&logoColor=white&labelColor=FF2D20&color=FF2D20'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='MySQL' src='https://img.shields.io/badge/MySQL-100000?style=for-the-badge&logo=MySQL&logoColor=white&labelColor=4479A1&color=4479A1'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='JSON Web Tokens' src='https://img.shields.io/badge/JSON_Web Token-100000?style=for-the-badge&logo=JSON Web Tokens&logoColor=white&labelColor=black&color=black'/></a>

<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='GitHub' src='https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=GitHub&logoColor=white&labelColor=181717&color=181717'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='phpMyAdmin' src='https://img.shields.io/badge/phpMyAdmin-100000?style=for-the-badge&logo=phpMyAdmin&logoColor=white&labelColor=6C78AF&color=6C78AF'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='Postman' src='https://img.shields.io/badge/Postman-100000?style=for-the-badge&logo=Postman&logoColor=white&labelColor=FF6C37&color=FF6C37'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='XAMPP' src='https://img.shields.io/badge/XAMPP-100000?style=for-the-badge&logo=XAMPP&logoColor=white&labelColor=FB7A24&color=FB7A24'/></a>

## 👨🏻‍💻 Team

Este proyecto ha sido desarrollado para la Hackathon 2025 de Factoría F5 por parte de:

- [Stefano Emanuel Micciche](https://github.com/StefanoMicciche)
- [José Manuel Barreiro Álvarez](https://github.com/jomabal98)
- [Ariana Martín Martínez](https://github.com/ArianaMartinMartinez)
- [Marianne Cedeño Rojas](https://github.com/haydeemarianne)
- [Eva Sisalli Guzmán](https://github.com/miskybox)
- [Alejandra Fernández Viña](https://github.com/Akalchi)
- [Mariona Cuyàs Paulano](https://github.com/cuyass)
- [Thais Intxaurtieta](https://github.com/intxaurtietadev)