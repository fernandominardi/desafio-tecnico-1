# Desafío técnico #1 - REST API

Desafío técnico de creación de una API RESTful simple.

## Instrucciones

El proyecto está basado en _Laravel Sail_, por lo que la manera más conveniente de correr es haciendo uso de Docker (idealmente con la herramienta _Docker Desktop_).

Una vez los paquetes de terceros estén instalados con _Composer_ se puede proceder con las siguientes instrucciones.

1. Para levantar el proyecto correr el siguiente comando:

```
./vendor/bin/sail up -d
```

2. Luego, proceder a poblar la base de datos corriendo el comando:

```
./vendor/bin/sail artisan migrate:fresh --seed
```

3. Por defecto el API está disponible en `localhost:80`. Para realizar pruebas, se puede utilizar la colección Postman disponible en la raíz del proyecto:

```
desafio-tecnico-1.postman_collection.json
```
