# Organizador de tareas escolares

Proyecto en CodeIgniter 4 (PHP) con MySQL.
Universidad Mariano Gálvez de Guatemala - Facultad de Ingeniería - Algoritmos.

## Descripción
Aplicación web para organizar tareas escolares. La profesora (administradora) gestiona usuarios y asigna tareas a los estudiantes. Cada estudiante ve solo sus tareas.

## Funcionalidades
- Registro, inicio y cierre de sesión
- Perfil: editar datos y cambiar contraseña
- Módulo de usuarios (solo administrador): crear, ver, editar, eliminar y paginación
- Tareas: crear, editar, eliminar, buscar y paginar (Newer/Older)
- Roles: administrador y estudiante

## Requisitos
- PHP 8.1 o superior
- MySQL / MariaDB
- Composer

## Instalación
1. Clonar el repositorio y entrar a la carpeta.
2. Instalar dependencias: `composer install`
3. Crear la base de datos: `mysql -u root -p -e "CREATE DATABASE organizador_tareas;"`
4. Importar las tablas: `mysql -u root -p organizador_tareas < database/organizador_tareas.sql`
5. Copiar `env` a `.env` y configurar la conexión a la base de datos.
6. Iniciar el servidor: `php spark serve`
7. Abrir http://localhost:8080

## Usuarios de prueba
| Rol | Correo | Contraseña |
|---|---|---|
| Administrador (profesor) | jsrepuestosservicios@gmail.com | Maestro2026 |
| Estudiante |lopezs@gmail.com | 123123123 |

## Autor
Nombre: Emanuel Lopez Sosa
