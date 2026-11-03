# DocentesAlumnos

Aplicación web de gestión de usuarios con roles **docente/administrador** y **alumno**, desarrollada con **Laravel 13**, **MariaDB** y **PHP 8.4**.

## 📋 Descripción

El sistema permite:

- Registro de alumnos con foto de perfil obligatoria.
- Login/logout con Laravel Breeze (Blade + TailwindCSS).
- El **docente/administrador** puede ver el listado completo de usuarios y el detalle de cada uno.
- El **alumno** solo puede ver y editar su propio perfil.
- El teléfono se enlaza automáticamente a WhatsApp usando un prefijo configurable en `.env`.
- El enlace a red profesional (LinkedIn/GitHub) abre en pestaña nueva.
- La foto de perfil se muestra en el perfil y en el listado del admin.

## 🧰 Stack técnico

| Componente | Versión |
| :--- | :--- |
| Framework | Laravel 13 |
| PHP | 8.4.27 |
| Base de datos | MariaDB 10.11 |
| Frontend | Blade + TailwindCSS (Breeze 2.4) |
| Build | Vite 8 |
| Servidor de desarrollo | `php artisan serve` |

> **Diferencias respecto al PDF original:** el proyecto se implementó con Laravel 13 y MariaDB nativo (en lugar de Laravel 12 y MySQL), y con PHP 8.4 (en lugar de 8.3), según lo solicitado en la adaptación de la tarea.

## ✅ Requisitos previos

- PHP 8.4 con extensiones: `cli`, `fpm`, `common`, `mysql`, `xml`, `curl`, `mbstring`, `zip`, `gd`, `bcmath`, `intl`, `tokenizer`, `fileinfo`, `ctype`, `dom`
- Composer 2.7+
- Node.js 18+ y npm
- MariaDB 10.11+
- Git

## 🚀 Instalación

### 1. Clonar el repositorio

git clone hhttps://github.com/SixtoServian/app_de_alumnos.git




Campo           Valor
Email           admin@example.com
Password        password
Nombre          Docente Administrador
Rol	Admin       (is_admin = true)
Teléfono        null
LinkedIn        https://www.linkedin.com/in/admin
Foto            null (sin foto)

Está definido en database/seeders/AdminUserSeeder.php en la línea:
'password' => 'password', // el cast 'hashed' del modelo lo hashea

estructura

app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/UserController.php     # listado + detalle (admin)
│   │   ├── Auth/RegisteredUserController.php  # registro con foto
│   │   └── ProfileController.php        # perfil propio (show/edit/update/destroy)
│   ├── Middleware/EnsureUserIsAdmin.php
│   └── Requests/
│       ├── Auth/StoreUserRequest.php    # validación del registro
│       └── ProfileUpdateRequest.php     # validación de edición de perfil
├── Models/User.php                      # fillable, casts y accessors (photoUrl, whatsappUrl)
└── Policies/UserPolicy.php

database/
├── migrations/..._create_users_table.php  # is_admin, phone, professional_url, photo_path
└── seeders/
    ├── AdminUserSeeder.php
    └── DatabaseSeeder.php

resources/views/
├── admin/users/{index,show}.blade.php
├── auth/register.blade.php              # con enctype multipart y foto obligatoria
├── layouts/navigation.blade.php         # links admin y perfil
└── profile/{show,edit}.blade.php