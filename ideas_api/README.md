# `Laravel Ideas API`

    - Create an ideas
    - Get all ideas
    - Delete an idea
    - Update ideas status

## `Data in Idea`

    - title
    - description
    - completed [
        0 = not
        1 = yes
    ]

## `Adding your Database`

- Go to Your `.env` file. if doesn't exist create one and copy the content of .env.example there.

- Replace valid data at these places.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

- Make sure sql is up and running at the same port.

- Save and restart project, you are good to go.

## `Adding your Ideas Model`

[See Available Column Types](https://laravel.com/docs/8.x/migrations#available-column-types)

1. Create a Modal

```bash
php artisan make:model IdeasModel --migration
```

2. Go the migration files and add your fields.

3. make migration

```bash
php artisan migrate
```

## Add a controller

```bash
php artisan make:controller IdeasController --api
```

Creates a controller with CRUD routes

## Adding Data

1. Go to model and add fillables.
2. Use ORM.


    `Note` :  Add casts to convert values 
    
    Ex :  protected $casts = [ 'completed' => 'boolean' ];