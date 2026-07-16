# ForzaGym — Sistema de Gestión de Gimnasio

Proyecto CIS 245 (GP-1) — Innovation Corp
Construido con PHP + MySQL siguiendo la misma arquitectura mini-MVC del proyecto `bookshelf`
(Router / Database / Validator propios, controladores por acción, vistas separadas).

## Estructura del proyecto

```
forzagym/
├── Core/                   Clases del framework (Router, Database, Validator, functions)
├── config/config.php       Credenciales de conexión a MySQL
├── controller/
│   ├── auth/                login, authenticate, register, store, logout
│   ├── dashboard.php
│   ├── clients/              index, create, store, edit, update, destroy, show
│   ├── memberships/          index, create, store, edit, update, destroy, show
│   ├── classes/               index, create, store, edit, update, destroy, show
│   ├── trainers/              index, create, store, edit, update, destroy, show
│   └── payments/               index, create, store, edit, update, destroy, show
├── views/
│   ├── partials/             header, sidebar, footer
│   ├── auth/                  login.view.php, register.view.php
│   ├── dashboard.view.php
│   └── clients/ memberships/ classes/ trainers/ payments/   (index/create/edit/show .view.php)
├── database.sql             Esquema (8 tablas relacionadas) + datos de prueba
├── index.php                 Front controller
└── routes.php                 Definición de rutas
```

## Base de datos (8 tablas normalizadas)

- `users` — cuentas de staff (login/registro)
- `clients` — clientes del gimnasio
- `trainers` — entrenadores
- `membership_plans` — catálogo de planes (tabla de referencia)
- `memberships` — membresía de un cliente (FK a clients y membership_plans)
- `classes` — clases, cada una con un entrenador asignado (FK a trainers)
- `class_enrollments` — inscripciones cliente↔clase, muchos a muchos (FK a clients y classes)
- `payments` — pagos de un cliente, opcionalmente ligados a una membresía (FK a clients y memberships)

## Instalación (XAMPP / similar)

1. Copia la carpeta `forzagym` dentro de `htdocs`.
2. Crea la base de datos importando `database.sql` (phpMyAdmin → Importar, o `mysql -u root < database.sql`).
3. Revisa `config/config.php` si tu usuario/contraseña de MySQL son distintos a `root` / `` (vacío).
4. Abre `http://localhost/forzagym` en el navegador.

## Cuenta de prueba

```
Correo:      admin@forzagym.com
Contraseña:  demo1234
```

También puedes crear una cuenta nueva desde la pantalla de **Registro**.

## Si te sale "Not Found" de Apache (no el 404 de la app)

Esto pasa cuando Apache no está reescribiendo las URLs hacia `index.php`. El proyecto ya incluye
un archivo `.htaccess` en la raíz que hace esto, pero necesitas que XAMPP/Apache lo respete:

1. Abre `xampp/apache/conf/httpd.conf` y busca la línea:
   ```
   #LoadModule rewrite_module modules/mod_rewrite.so
   ```
   Quítale el `#` (debe quedar activo, sin comentar).

2. En el mismo archivo, busca el bloque `<Directory "C:/xampp/htdocs">` (o la ruta de tu `htdocs`)
   y asegúrate de que diga:
   ```
   AllowOverride All
   ```
   (si dice `AllowOverride None`, el `.htaccess` se ignora por completo).

3. Reinicia Apache desde el panel de XAMPP.

4. Confirma que el archivo `.htaccess` sí llegó a la carpeta `forzagym` (a veces algunos
   antivirus/zip lo ocultan por empezar con punto — en Windows, activa "mostrar archivos ocultos"
   en el Explorador para verificarlo).

## Notas

- Todas las contraseñas se guardan con `password_hash()` (bcrypt) y se verifican con `password_verify()`.
- Todas las rutas de la aplicación (excepto `/login` y `/register`) requieren sesión iniciada (`requireAuth()` en `Core/functions.php`).
- Los formularios de edición usan `_method=PATCH` y los de eliminación `_method=DELETE`, igual que en `bookshelf`.
- No se puede eliminar un entrenador que todavía tiene clases asignadas (se muestra una alerta en su lugar).
