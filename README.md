# ArtPrint
Marketplace de talleres y manualidades
# Marketplace - Proyecto Monolítico con Laravel, React y Tailwind CSS

Este es un proyecto monolítico diseñado con **Laravel 12**, **React**, y **Tailwind CSS**, siguiendo buenas prácticas para modularidad y arquitectura limpia. Este archivo contiene todas las instrucciones necesarias para clonar, instalar y configurar el proyecto en tu máquina.

---

## **Requisitos previos**
Antes de comenzar, asegúrate de tener instalados los siguientes componentes:
- **PHP** (>= 8.2)
- **Composer** (administrador de dependencias de PHP)
- **Node.js** (LTS recomendado) y **npm**
- **Git** (para clonar el repositorio)
- Un servidor de bases de datos como **MySQL**

---

## **Instalación del proyecto**

Sigue los pasos a continuación para clonar, instalar y configurar el proyecto:

### **1. Clonar el repositorio**
Clona este repositorio ejecutando el siguiente comando en tu terminal:

git clone https://github.com/haydeemarianne/mi-proyecto-marketplace.git

### **2. Cambia al directorio del proyecto en tu local:**

cd mi-proyecto-marketplace

### **3. Instala las dependencias de PHP:**

composer install

### **4. edita  el archivo .env:**

cp .env.example .env

### **5. Genera la llave de la aplicación:**

php artisan key:generate

### **6. Configura tu base de datos:**

DB_CONNECTION=mysql
DB_HOST=tu_host
DB_PORT=3306
DB_DATABASE=tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

### **7. Ejecuta las migraciones de la base de datos:**
php artisan migrate

### **8.  Instala las dependencias de Node js:**
npm install

### **9.  Compila los assets del frontend:**
npm run dev

### **10.  Inicia el servidor de desarrollo::**
çphp artisan serve










