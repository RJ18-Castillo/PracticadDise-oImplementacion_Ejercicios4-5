# Práctica: Diseño e Implementación - Ejercicios 4 y 5

Proyecto Laravel que reúne en un mismo repositorio los entregables de los Ejercicios 4 y 5.

- **Ejercicio 4:** Receta e Ingredientes (diagrama de clases, código, instancia y diagrama entidad-relación).
- **Ejercicio 5:** Individuo y Habitaciones (diagrama de clases).

---

## Estructura del repositorio

```
/
├── app/
│   └── Models/
│       ├── Receta.php
│       └── Ingrediente.php
├── database/
│   └── migrations/
│       ├── ..._create_recetas_table.php
│       ├── ..._create_ingredientes_table.php
│       └── ..._create_ingrediente_receta_table.php
├── routes/
│   └── web.php
├── docs/
│   ├── ejercicio4/
│   │   ├── diagrama-clases.png
│   │   └── diagrama-er.png
│   └── ejercicio5/
│       └── diagrama-clases.png
└── README.md
```

El resto de carpetas (`bootstrap/`, `config/`, `public/`, `resources/`, `storage/`, `tests/`) son la estructura estándar de Laravel y no fueron modificadas para estos ejercicios.

---

## Ejercicio 4: Receta e Ingredientes

**Escenario:** una receta tiene título, porciones e instrucciones y contiene de uno a muchos ingredientes. Por cada ingrediente de la receta se registra la cantidad y la unidad de medida.

| # | Punto del ejercicio | Ubicación |
|---|---------------------|-----------|
| 1 | Diagrama de clases | `docs/ejercicio4/diagrama-clases.png` |
| 2 | Código de las clases | Modelos: `app/Models/Receta.php` y `app/Models/Ingrediente.php`. Migraciones: `database/migrations/` (archivos `create_recetas_table`, `create_ingredientes_table` y `create_ingrediente_receta_table`) |
| 3 | Instanciar la clase Receta | Ruta `/receta` definida en `routes/web.php` (bloque `Ejercicio 4`) |
| 4 | Diagrama Entidad-Relación | `docs/ejercicio4/diagrama-er.png` |

**Modelo de datos:** la relación entre `Receta` e `Ingrediente` es de muchos a muchos. La cantidad y la unidad de medida se guardan en la tabla intermedia `ingrediente_receta` (columnas `cantidad` y `unidad_medida`), a la que se accede desde los modelos con `withPivot()`.

---

## Ejercicio 5: Individuo y Habitaciones

**Escenario:** un individuo tiene nombre y fecha de nacimiento, puede tener cónyuge e hijos, vive en una habitación (casa o apartamento) y puede ser propietario de varias propiedades. Cada habitación tiene dirección y está compuesta por cuartos con superficie y función.

| # | Punto del ejercicio | Ubicación |
|---|---------------------|-----------|
| 1 | Diagrama de clases | `docs/ejercicio5/diagrama-clases.png` |

**Clases del diagrama:** `Individuo`, `Habitacion` (abstracta), `Casa`, `Apartamento` y `Cuarto`.

---

## Cómo ejecutar el proyecto

Requisitos: PHP, Composer y un servidor MySQL.

1. Instalar dependencias:

   ```bash
   composer install
   ```

2. Crear el archivo de entorno y generar la clave:

   ```bash
   copy .env.example .env
   php artisan key:generate
   ```

3. Crear una base de datos vacía y configurarla en `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ejercicio4y5
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Ejecutar las migraciones:

   ```bash
   php artisan migrate
   ```

5. Levantar el servidor y abrir la ruta del Ejercicio 4:

   ```bash
   php artisan serve
   ```

   Visitar `http://127.0.0.1:8000/receta`. Cada visita crea una receta de ejemplo (Panqueques) con sus ingredientes y devuelve el resultado en JSON.
