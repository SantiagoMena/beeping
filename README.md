# Beeping Prueba


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
