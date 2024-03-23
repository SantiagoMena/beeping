# Beeping Prueba

## Requeriments
Requisitos para correr el proyecto:
    - Instalar composer [https://getcomposer.org/download/](https://getcomposer.org/download/)
    - Instalar docker [https://www.docker.com/](https://www.docker.com/)

## Copy `.env.example` to `.env`
Abrir la consola en el directorio raiz del proyecto y ejecutar:

    `cp .env.example .env`

## Add APP_KEY to `.env`
Agrega una key al archivo `.env`

    EJ: APP_KEY=base64:f+DkY8uLlgTERh6bgwXJlryZXkXyrbkzvONRJNtx8bM=

## Run Composer
Abrir la consola en el directorio raiz del proyecto y ejecutar:
    `composer install`
    
## Run sail container
Abrir la consola en el directorio raiz del proyecto y ejecutar:
    `./vendor/bin/sail up`
    
## Migrate & Seed Database
1. Abrir Container Shell

    `./vendor/bin/sail shell`

2. Correr Migraciones + Seed a la base de datos

    `php artisan migrate:fresh --seed --seeder=SystemSeeder`

## Redis queue
En `.env` asegurarse de tener:

`QUEUE_CONNECTION=redis`

## Start Horizon
1. Abrir Container Shell

   `./vendor/bin/sail shell`

2. Correr Horizon

   `php artisan horizon`

3. Probar Horizon

   [http://localhost/horizon](http://localhost/horizon)

## Start Schedule
1. Abrir Container Shell

   `./vendor/bin/sail shell`

2. Correr Cron
   - Iniciar cron localmente:
       `php artisan schedule:work`

    - Iniciar cron en producción
    `php artisan schedule:run`

## Ver Proyecto

   [http://localhost](http://localhost/)
