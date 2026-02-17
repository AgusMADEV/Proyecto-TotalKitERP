# ⚽ TotalKit ERP - Sistema de Gestión de Camisetas de Fútbol

Sistema completo de gestión (ERP) para tienda online de camisetas de fútbol con búsqueda avanzada, gestión de inventario, clientes y pedidos.

## 📋 Características

- 🔐 **Sistema de autenticación** seguro
- 📊 **Dashboard** con estadísticas y gráficos en tiempo real
- 🔍 **Búsqueda avanzada** de productos con filtros múltiples
- 📦 **Gestión de inventario** completa
- 👥 **Gestión de clientes** y direcciones
- 🛒 **Sistema de pedidos** con seguimiento
- ⭐ **Reseñas de productos**
- 🎨 **Interfaz moderna** y responsive
- 📱 **Compatible con móviles** y tablets

## 🚀 Instalación

### Requisitos Previos

- **XAMPP** (o cualquier servidor con PHP y MySQL)
- **PHP** 7.0 o superior
- **MySQL** 5.7 o superior
- Navegador web moderno

### Pasos de Instalación

1. **Clona el repositorio**
   ```bash
   git clone https://github.com/tu-usuario/Proyecto-TotalKitERP.git
   cd Proyecto-TotalKitERP
   ```

2. **Configura la base de datos**
   
   a. Abre phpMyAdmin (http://localhost/phpmyadmin)
   
   b. Importa el archivo `base_datos.sql` para crear la estructura
   
   c. Crea un usuario MySQL:
   ```sql
   CREATE USER 'totalkit'@'localhost' IDENTIFIED BY 'totalkit';
   GRANT ALL PRIVILEGES ON tienda_camisetas.* TO 'totalkit'@'localhost';
   FLUSH PRIVILEGES;
   ```

3. **Configura las credenciales**
   
   a. Copia el archivo de ejemplo:
   ```bash
   cp config_example.php config.php
   ```
   
   b. Edita `config.php` con tus credenciales:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'tienda_camisetas');
   define('DB_USER', 'totalkit');        // Tu usuario MySQL
   define('DB_PASS', 'totalkit');        // Tu contraseña MySQL
   
   define('LOGIN_USUARIO', 'admin');     // Usuario del ERP
   define('LOGIN_PASSWORD', 'admin123'); // Contraseña del ERP
   ```

4. **Inicia el servidor**
   
   - Si usas XAMPP, coloca el proyecto en `htdocs/`
   - Accede a: http://localhost/Proyecto-TotalKitERP/

## 🔑 Acceso al Sistema

**Credenciales por defecto:**
- Usuario: `admin`
- Contraseña: `admin123`

> **⚠️ Importante:** Cambia estas credenciales en `config.php` antes de usar en producción.

## 📁 Estructura del Proyecto

```
Proyecto-TotalKitERP/
├── config.php              # Configuración (NO subir a GitHub)
├── config_example.php      # Plantilla de configuración
├── index.php              # Página principal del ERP
├── buscar_productos.php   # API de búsqueda
├── buscador.js           # JavaScript del buscador
├── estilos.css           # Estilos CSS
├── base_datos.sql        # Estructura de la base de datos
├── .gitignore            # Archivos excluidos de Git
├── README.md             # Este archivo
└── BUSQUEDA_README.md    # Documentación del sistema de búsqueda
```

## 🎯 Módulos del Sistema

### Dashboard
- Estadísticas generales
- Gráficos de productos y pedidos
- Productos destacados
- Resumen de métricas clave

### Buscador de Productos
- Búsqueda en tiempo real
- Filtros por: equipo, liga, marca, temporada, tipo, talla, precio
- Vista en cuadrícula o lista
- Ordenamiento múltiple
- Paginación

### Gestión de Tablas
Acceso directo a todas las tablas:
- Productos
- Equipos
- Marcas
- Clientes
- Pedidos
- Ligas
- Temporadas
- Y más...

## 🛠️ Tecnologías Utilizadas

- **Backend:** PHP 7+
- **Base de datos:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
- **Estilos:** CSS personalizado con variables
- **Fuentes:** Google Fonts (Inter)

## 📚 Documentación Adicional

- [Sistema de Búsqueda](BUSQUEDA_README.md) - Documentación detallada del buscador

## 🔒 Seguridad

- ✅ Protección contra SQL Injection
- ✅ Validación de sesiones
- ✅ Sanitización de entradas
- ✅ Configuración separada del código
- ⚠️ Cambia las credenciales por defecto
- ⚠️ Usa HTTPS en producción
- ⚠️ No subas `config.php` a repositorios públicos

## 🤝 Contribuir

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📝 Notas de Versión

**v1.0.0** - 18 de febrero de 2026
- Lanzamiento inicial
- Sistema completo de gestión
- Búsqueda avanzada de productos
- Dashboard con gráficos
- Sistema de autenticación

## 📄 Licencia

Este proyecto es de código abierto para fines educativos.

## 👨‍💻 Autor

Desarrollado para la gestión de tiendas de camisetas de fútbol.

## 🐛 Reportar Problemas

Si encuentras algún bug o tienes sugerencias, abre un issue en GitHub.

---

⚽ **TotalKit ERP** - *Tu sistema de gestión para camisetas de fútbol*
