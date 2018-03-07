# pruebalaravel
Repositorio de Laravel para ABM (Personas - Provincias)
# Server
Wamp64
# Configurar el entorno
APP_NAME=Laravel <br>
APP_ENV=local <br>
APP_KEY=base64:XefcWCMNlZQvHWYuYPujH4yTCJWg5sJHvmtID4qeK9M= <br>
APP_DEBUG=true <br>
APP_URL=http://localhost <br>

LOG_CHANNEL=stack <br>

DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1 <br>
DB_PORT=3306 <br>
DB_DATABASE=prueba <br>
DB_USERNAME=root <br>
DB_PASSWORD= <br>
BROADCAST_DRIVER=log <br>
CACHE_DRIVER=file <br>
SESSION_DRIVER=file <br>
SESSION_LIFETIME=120 <br>
QUEUE_DRIVER=sync <br>

REDIS_HOST=127.0.0.1 <br>
REDIS_PASSWORD=null <br>
REDIS_PORT=6379 <br>

MAIL_DRIVER=smtp <br>
MAIL_HOST=smtp.mailtrap.io <br>
MAIL_PORT=2525 <br>
MAIL_USERNAME=null <br>
MAIL_PASSWORD=null <br>
MAIL_ENCRYPTION=null <br>

PUSHER_APP_ID= <br>
PUSHER_APP_KEY= <br>
PUSHER_APP_SECRET= <br>
PUSHER_APP_CLUSTER=mt1 <br>

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}" <br>
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}" <br>
# Instalacion
En la carpeta del Proyecto Ejecutar en linea de comandos composer install
# MySQL
Crear una base de datos con el nombre de prueba con cotejamiento utf8_unicode_ci
# Ejecutar en linea de comandos
 php artisan migrate <br>
 php artisan db:seed <br>
 php artisan storage:link <br>
