Después de instalar laravel, usando `composer create-project laravel/laravel XXX` probamos con la orden `serve`de que funciona correctamente.

# Gestión de PostgreSQL

## Creación de base de datos
`sudo -u postgres createdb prueba`
> Da un mensaje de error :
> could not change directory to "/home/[user]": Permiso denegado

## Creación de usuario
`sudo -u postgres createuser -P prueba`

## Probar funcionamiento
Mediante la siguiente orden nos conectaremos a la base de datos recien creada
`psql -h localhost -U prueba -d prueba`

`\d` Nos dirá si hay contenido dentro de la base datos.

# Configurar Laravel para trabajar con bases de datos PostgreSQL

## Configurar fichero .env
El puerto de PSQL es "5432".

## Revisar estado de las migraciones
Con el comando `php artisan migrate:status`

## Crear una migración

Con el comando `php artisan make:migration create_depart_table`

> Si no se acaban de deducir estos detalles, podemos usar las opciones --create y --table.

## `artisan migrate`

Este comando genera las tablas interpretadas a través de las migraciones de Laravel. Es interesante comentar que al usarlomigrará en un solo lote todas las migraciones que aún no hayan sido migradas. Por ello puede ser útil conocer el parámetro `--step`, que hará que cada migración se consideré un lote independiente. Esto es útil a la hora de querer hacer *rollbacks*

> Aparentemente, las migraciones se ejecutan por orden de fecha ascendente. La fecha siempre podemos verla en el propio nombre del fichero.

### `migrate:status`
Devuelve el estado de las migraciones, indicando las que han sido migradas y las que no, y el lote al que pertenecen. Si nunca se uso `migrate` no devolverá nada

### `rollback`
Permite revertir el último lote realizado. Dependiendo de los parámetros usados se puede especificar el n-ésimo lote que se quiera revertir.

### `reset`
Revierte todos las migraciones realizadas, quedando en un estado inicial.

### `refresh`
Realiza las funciones de `reset` y `migrate` en una sola orden.

## Agregar datos a la base de datos
Este paso lo haremos como con cualquier tabla en PostgreSQL. COmo hay muchas formas en mi caso entraré por línea de comandos en mi base de datos y lanzaré esta orden:

```sql
INSERT INTO
    depart (denominacion, localidad)
VALUES
    ('Contabilidad', 'Sanlucar'),
    ('Informática', 'Jerez'),
    ('Inglés', 'Londres'),
    ('Matemáticas', 'Trebujena'),
    ('Cibernética', 'Chipiona');
```

## Controladores
Ahora es momento de crear el controlador, una clase que manejará la lógica de nuestro programa.

### `artisan make:controller`
Generar el fichero controlador lo haremos mediante esta orden. Su sintaxis es:
`php artisan make:controller NOMBRE_CONTROLADOR`

#### Ejemplo
`php artisan make:controller DepartController`
