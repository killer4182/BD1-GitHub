# Pasos para Ejecutar el Proyecto Laravel (con Oracle)

Una vez que hayas clonado el repositorio del proyecto Laravel, ejecutar los siguientes comandos en la terminal:

1.  **Instalar las Dependencias de Composer:**
    Abrir la terminal en la raíz del directorio del proyecto y ejecutar:
    ```bash
    composer install
    ```
    Este comando descargará todas las librerías PHP necesarias especificadas en el archivo `composer.json` al directorio `vendor`.

2.  **Copiar y Configurar el Archivo de Entorno:**
    * Copiar el archivo `.env.example` a un nuevo archivo llamado `.env`, **El siguiente comando es solo para Linux o Mac**:
        ```bash
        cp .env.example .env
        ```
        (En Windows, usar `copy .env.example .env`).
    * Abrir el archivo `.env` y para configurar nuestras variables de entorno debemos generar una llave:
        * `APP_KEY`: Generar una nueva clave de la aplicación:
            ```bash
            php artisan key:generate
            ```
        * `DB_CONNECTION=oracle`
        * `DB_HOST=localhost` 
        * `DB_PORT=1521` (o el puerto de su servidor Oracle)
        * `DB_DATABASE=xe` (o el SID de su base de datos Oracle)
        * `DB_USERNAME=su_usuario_oracle`
        * `DB_PASSWORD=su_contraseña_oracle`
        * Cualquier otra configuración específica del entorno.

3.  **Generar la Clave de la Aplicación:**
    Si no lo ha hecho en el paso anterior:
    ```bash
    php artisan key:generate
    ```

4.  **Ejecutar las Migraciones:**
    Para crear el esquema de la base de datos Oracle:
    ```bash
    php artisan migrate --database=oracle
    ```
    Este comando ejecutará todos los archivos de migración en el directorio `database/migrations` en la conexión `oracle`.

5.  **Sembrar la Base de Datos (Opcional):**
    Si el proyecto tiene seeders para poblar la base de datos con datos iniciales:
    ```bash
    php artisan db:seed --database=oracle
    ```

6.  **Instalar los Activos del Frontend (Opcional para la version actual del proyecto):**
    Si el proyecto utiliza frameworks de frontend (Vue.js, React, etc.) o preprocesadores de CSS (Sass):
    ```bash
    npm install  # O yarn install
    npm run dev  # O yarn run dev (para desarrollo)
    npm run build # O yarn run build (para producción)
    ```

7.  **Configurar el Servidor Web(Si no tenes instalado PHP):**
    Configurar su servidor web local (Apache, Nginx, o el servidor de desarrollo de Laravel) para que apunte al directorio `public` del proyecto como la raíz del documento.

8.  **Iniciar el Servidor de Desarrollo (Para realizar pruebas):**
    Para desarrollo local:
    ```bash
    php artisan serve
    ```
    Esto iniciará un servidor, usualmente en `http://localhost:8000`.

**Importante:** Asegurarse de que la extensión `oci8` de PHP esté instalada y habilitada en su entorno local para poder conectar con la base de datos Oracle. También debe tener el Oracle Instant Client instalado y configurado correctamente si es necesario.

¡Espero que esto sea útil para tu amigo! ¡Saludos desde Honduras!