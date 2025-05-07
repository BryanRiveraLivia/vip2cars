````markdown
Sistema CRUD profesional para la gestión de vehículos y clientes. Construido con tecnologías modernas como Laravel 12, React + TypeScript, Inertia.js y Tailwind CSS. Este proyecto está diseñado con buenas prácticas de desarrollo web full stack, validaciones robustas y una interfaz visual moderna ideal para presentar en pruebas técnicas o entrevistas laborales.

---

## ✨ Características destacadas

- Backend robusto con Laravel 12
- Frontend moderno con React 18 + TypeScript
- SPA con Inertia.js
- Tailwind CSS para estilos elegantes y responsivos
- Validaciones completas en frontend y backend
- Código limpio y profesional
- Listado, creación, edición y eliminación de vehículos
- Archivo `.mysql` incluido para importar la base de datos manualmente

---

## 📦 Tecnologías utilizadas

- Laravel 12.x
- Inertia.js
- React 18.x
- TypeScript
- Tailwind CSS 3.x
- Vite
- Heroicons (iconografía)
- MySQL o MariaDB

---

## ⚙️ Requisitos

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- npm
- MySQL

---

## 🚀 Instalación y configuración

### 1. Clonar el repositorio

```bash
git clone https://github.com/tuusuario/vip2cars.git
cd vip2cars
```
````

### 2. Instalar dependencias PHP

```bash
composer install
```

### 3. Instalar dependencias JavaScript

```bash
npm install
```

### 4. Configurar entorno

```bash
cp .env.example .env
php artisan key:generate
```

Editar `.env` y configurar las credenciales de base de datos:

```
DB_DATABASE=vip2cars
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🛢️ Base de datos

Puedes elegir uno de estos dos métodos:

### ✅ Opción A: Ejecutar migraciones (recomendado)

```bash
php artisan migrate
```

### ✅ Opción B: Importar base de datos manualmente

En la raíz del proyecto encontrarás el archivo:

```
vip2cars_dump.mysql
```

Puedes importarlo con phpMyAdmin, MySQL CLI o cualquier cliente gráfico.

---

## 🖥️ Cómo ejecutar el proyecto

> Requiere **dos terminales activas**:

### Terminal 1 - Backend Laravel

```bash
php artisan serve
```

Abre: [http://localhost:8000](http://localhost:8000)

### Terminal 2 - Frontend Vite (React + Tailwind)

```bash
npm run dev
```

Esto servirá los assets en [http://localhost:5173](http://localhost:5173), pero la aplicación se accede desde [http://localhost:8000](http://localhost:8000) gracias a Inertia.js.

- Para poder visualizar el proyecto debes entrar ah:
  http://localhost:8000/vehicles

---

## ✅ Funcionalidades

- Listado de vehículos en tabla responsiva
- Creación, edición y eliminación con validaciones
- Validaciones:

    - Placa, marca, modelo: alfanuméricos
    - Año: 4 dígitos
    - Nombre y apellidos: solo letras
    - Documento: numérico entre 8 y 15 dígitos
    - Teléfono: entre 6 y 9 dígitos
    - Correo: formato email

- UI elegante con Tailwind CSS
- Formularios responsivos y accesibles

---

## 📚 Buenas prácticas aplicadas

- Código tipado con TypeScript
- Validaciones dobles (frontend y backend)
- Estructura de carpetas profesional
- Componentes reutilizables
- Diseño responsivo y accesible
- Uso de Heroicons para botones de acción

---

## 👨‍💻 Autor

**Desarrollado por:** Neill Bryan Rivera Livia

- GitHub: [https://github.com/tuusuario](https://github.com/BryanRiveraLivia/)
- LinkedIn: [https://linkedin.com/in/tuusuario](hhttps://www.linkedin.com/in/neill-bryan-rivera-livia/)
- Correo: [tu.email@ejemplo.com](bryan.riv09@live.com)

---

## 📬 ¿Consultas o propuestas?

He desarrollado esta prueba técnica para Vip2Cars, en caso deseen contactarme: bryan.riv09@live.com / +51991735527
