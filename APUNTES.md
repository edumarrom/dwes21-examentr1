# Creación de proyecto laravel
`composer create-project laravel/laravel dwes21-examentr1`
probamos con la orden `serve` de que funciona correctamente.

***

# Puesta a punto

## Instalar composer
`composer install`

## Instalar node
`npm install`

## Arranca node en modo desarrollo
`npm run dev`

## Instalación de tailwind vía npm
`npm install -D postcss@latest`
`npm install -D autoprefixer@latest`
`npm install tailwindcss@latest`

## Incluye tailwindcss en Laravel Mix
`/webpack.mix.js`
```js
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),  // Esta línea
    ]);
```

## Configura el path de tus plantillas
```js
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",  ],
```

## Añade las directivas tailwind
`/resources/css/app.css`
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

## Ejecuta `npm run watch(?)`
> No me fio un pelo de este paso

## Incluye tailwind en la cabecera
```html
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
```

> [TailwindCSS Table template](https://larainfo.com/blogs/tailwind-css-simple-table-example)

# Generando la primera vista

## Creación de layout (componente)
`/resources/views/componentes/layout.blade.php`

## Creacción de una vista que haga uso del layout
`/resources/views/home.blade.php`

```php
<x-layout>
    Hola Mundo!
</x-layout>
```

## Asignando una ruta a la nueva vista
`/routes/web.php`

# Gestión de PostgreSQL

## Creación de base de datos
`sudo -u postgres createdb dwes21-tr1`

## Creación de usuario
`sudo -u postgres createuser -P dwes21`

## Probar funcionamiento
`psql -h localhost -U dwes21 -d dwes21-tr1`

> `\d` Nos dirá si hay contenido dentro de la base datos.

# Configurar Laravel para trabajar con bases de datos PostgreSQL

## Configurar fichero `.env`
El puerto de PSQL es "5432".

# Migraciones de Laravel
## Revisar estado de las migraciones
Con el comando `php artisan migrate:status`

## Crear una migración
`php artisan make:migration create_NOMBRETABLA_table`

>`php artisan make:migration create_aeropuertos_table`

> Si no se acaban de deducir estos detalles, podemos usar las opciones --create y --table.

## Generar las tablas de la migración
`artisan migrate`

`--step`, hará que cada migración se consideré un lote independiente. Útil para hacer *rollbacks*.

> Aparentemente, las migraciones se ejecutan por orden de fecha ascendente. La fecha siempre podemos verla en el propio nombre del fichero.

## Preparar la migración

### Sintáxis
`BLUEPRINT->TIPO_DE_DATO('NOMBRE_COLUMNA');`

```php
public function up()
    {
        Schema::create('aeropuertos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('denominacion');
            $table->timestamps();
        });
    }
```

## Agregar datos a la base de datos
Este paso lo haremos como con cualquier tabla en PostgreSQL. Como hay muchas formas en mi caso entraré por línea de comandos en mi base de datos y lanzaré esta orden:

```sql
INSERT INTO
    aeropuertos (codigo, denominacion)
VALUES
    ('SVQ', 'Sevilla'),
    ('MAD', 'Madrid'),
    ('BCN', 'Barcelona');
```

## Cargar un fichero SQL
`psql -h localhost -U dwes21 -d dwes21-tr1 < codigo.sql`
> También puede ser código SQL directamente, accediendo simplemente.

# Controladores

## Generar un controlador
`artisan make:controller NOMBRE_CONTROLADOR`

> `$ php artisan make:controller AeropuertosController`

## Modifica un controlador
> Recuerda, necesitarás usar `Illuminate\Support\Facades\DB`.


## Definir ruta de ejecución
`Route::get('/aeropuertos', [AeropuertosController::class, 'index']);`

> Debes especificar la dependencia: use App\Http\Controllers\AeropuertosController;
