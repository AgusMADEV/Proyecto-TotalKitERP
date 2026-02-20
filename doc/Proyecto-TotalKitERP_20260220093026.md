# Reporte de proyecto

## Estructura del proyecto

```
C:\xampp\htdocs\GitHub\Proyecto-TotalKitERP
├── .gitignore
├── BUSQUEDA_README.md
├── README.md
├── base_datos.sql
├── buscador.js
├── buscar_productos.php
├── config.php
├── estilos.css
└── index.php
```

## Código (intercalado)

# Proyecto-TotalKitERP
**BUSQUEDA_README.md**
```markdown
# 🔍 Sistema de Búsqueda de Productos - TotalKit ERP

## Características Implementadas

### ✨ Funcionalidades Principales

#### 1. **Búsqueda Inteligente**
- Búsqueda en tiempo real con delay de 300ms
- Búsqueda por múltiples campos:
  - Nombre del producto
  - Descripción
  - Código de producto
  - Nombre del equipo
  - Nombre completo del equipo
  - Nombre de la marca
  - Nombre del jugador

#### 2. **Filtros Avanzados**
- **Por Equipo**: Filtra por equipo específico
- **Por Liga**: Filtra por competición
- **Por Marca**: Nike, Adidas, Puma, etc.
- **Por Temporada**: 2023/24, 2024/25, etc.
- **Por Tipo de Camiseta**: Titular, Suplente, Tercera, etc.
- **Por Talla**: XS, S, M, L, XL, XXL
- **Rango de Precio**: Mínimo y máximo
- **Tipo de Equipo**: 
  - Todos
  - Solo Clubes ⚽
  - Solo Selecciones Nacionales 🌍
- **Checkboxes especiales**:
  - Solo productos con stock disponible
  - Solo productos destacados

#### 3. **Ordenamiento Flexible**
Ordena los resultados por:
- Más recientes / Más antiguos
- Nombre (A-Z / Z-A)
- Equipo (A-Z)
- Precio (menor a mayor / mayor a menor)
- Mayor stock disponible

#### 4. **Vistas Personalizables**
- **Vista en Cuadrícula (Grid)**: Cards visuales con toda la información
- **Vista en Lista**: Formato horizontal ideal para comparar

#### 5. **Paginación Inteligente**
- Navegación por páginas
- Indicador de página actual
- Información de resultados mostrados
- Botones de Anterior/Siguiente

#### 6. **Estadísticas en Tiempo Real**
Muestra información agregada de los resultados:
- Total de productos encontrados
- Precio promedio
- Stock total disponible

#### 7. **Resaltado de Búsqueda**
- Los términos buscados se resaltan en los resultados
- Facilita identificar coincidencias rápidamente

### 🎨 Diseño Profesional

- **Interfaz moderna y limpia**: Diseño consistente con el resto del ERP
- **Responsive**: Funciona perfecto en móviles, tablets y desktop
- **Animaciones suaves**: Transiciones y efectos visuales profesionales
- **Indicadores de estado**: Badges para destacados, stock, tipo de equipo, etc.
- **Loading states**: Spinner animado durante las búsquedas
- **Estados vacíos**: Mensajes amigables cuando no hay resultados

### 🚀 Rendimiento

- **Consultas optimizadas**: JOINs eficientes con índices de base de datos
- **Búsqueda con delay**: Evita consultas innecesarias mientras se escribe
- **Paginación**: Solo carga los productos necesarios (12 por defecto)
- **Sanitización**: Todas las entradas están protegidas contra SQL injection

## 📁 Archivos Creados/Modificados

### Nuevos Archivos:
1. **buscar_productos.php** - API REST para búsqueda de productos
2. **buscador.js** - Lógica JavaScript del buscador (clase BuscadorProductos)

### Archivos Modificados:
1. **index.php** - Agregada vista de búsqueda en el menú
2. **estilos.css** - Estilos adicionales para el sistema de búsqueda

## 🔧 Cómo Usar

### Para Usuarios:

1. **Acceder al Buscador**
   - Inicia sesión en el ERP
   - Haz clic en "🔍 Buscar Productos" en el menú lateral

2. **Realizar una Búsqueda**
   - Escribe en el campo de búsqueda principal
   - O usa los filtros avanzados para búsquedas específicas
   - Los resultados se actualizan automáticamente

3. **Filtrar Resultados**
   - Despliega "⚙️ Filtros Avanzados"
   - Selecciona los criterios deseados
   - Combina múltiples filtros para búsquedas precisas

4. **Ordenar Resultados**
   - Usa el selector "Ordenar por" en la parte superior
   - Elige el criterio de ordenamiento deseado

5. **Cambiar Vista**
   - Haz clic en ▦ para vista de cuadrícula
   - Haz clic en ☰ para vista de lista

6. **Ver Detalles**
   - Haz clic en "👁️ Ver detalle" en cualquier producto
   - (Actualmente muestra un alert, se puede implementar modal completo)

### Para Desarrolladores:

#### API Endpoints:

**buscar_productos.php?accion=buscar**
```
Parámetros GET:
- q: texto de búsqueda
- equipo: id del equipo
- liga: id de la liga
- marca: id de la marca
- temporada: id de la temporada
- tipo: id del tipo de camiseta
- talla: id de la talla
- precio_min: precio mínimo
- precio_max: precio máximo
- solo_stock: 1 para solo con stock
- destacados: 1 para solo destacados
- es_seleccion: 0 (clubes), 1 (selecciones), vacío (todos)
- orden: campo de ordenamiento
- dir: ASC o DESC
- pagina: número de página
- por_pagina: resultados por página

Respuesta JSON:
{
  "success": true,
  "productos": [...],
  "total_resultados": 45,
  "total_paginas": 4,
  "pagina_actual": 1,
  "por_pagina": 12,
  "estadisticas": {
    "total": 45,
    "precio_promedio": 65.50,
    "precio_minimo": 29.99,
    "precio_maximo": 149.99,
    "stock_total": 234
  }
}
```

**buscar_productos.php?accion=filtros**
```
Devuelve opciones para todos los filtros:
- equipos
- ligas
- marcas
- temporadas
- tipos de camiseta
- tallas
- rango de precios
```

**buscar_productos.php?accion=autocompletar&q=texto**
```
Devuelve sugerencias de autocompletado
(Actualmente implementado pero no usado en el frontend)
```

#### Personalización:

**Cambiar número de productos por página:**
```javascript
// En buscador.js, línea ~15
this.por_pagina = 12; // Cambiar a la cantidad deseada
```

**Agregar nuevos campos de ordenamiento:**
```javascript
// En buscar_productos.php, línea ~324
$campos_orden_validos = [
    'p.nombre_producto',
    'p.precio',
    // Agregar nuevos campos aquí
];
```

**Personalizar colores:**
```css
/* En estilos.css, variables CSS */
:root {
    --color-primary: #16a34a; /* Color principal */
    --color-secondary: #eab308; /* Color secundario */
    /* Modificar según necesidades */
}
```

## 💡 Mejoras Futuras Sugeridas

1. **Modal de Detalles del Producto**
   - Implementar un modal completo con toda la información
   - Galería de imágenes
   - Reseñas de clientes
   - Botón para agregar al carrito

2. **Filtros Favoritos**
   - Guardar combinaciones de filtros frecuentes
   - Búsquedas guardadas

3. **Autocompletado Visual**
   - Mostrar sugerencias mientras se escribe
   - Previews de productos

4. **Exportación de Resultados**
   - Exportar a Excel/CSV
   - Generar PDF de catálogo

5. **Comparador de Productos**
   - Seleccionar múltiples productos
   - Vista de comparación lado a lado

6. **Analytics**
   - Búsquedas más frecuentes
   - Productos más vistos
   - Conversión de búsquedas

## 🐛 Resolución de Problemas

### El buscador no carga:
- Verifica que el archivo `buscador.js` esté en la raíz del proyecto
- Verifica que el archivo `buscar_productos.php` esté en la raíz del proyecto
- Revisa la consola del navegador para errores JavaScript

### Los filtros no funcionan:
- Verifica que haya datos en las tablas de referencia (equipos, marcas, etc.)
- Revisa la consola de red (Network) para ver errores en la API

### No aparecen resultados:
- Verifica que la tabla `productos` tenga datos
- Verifica que los productos tengan `activo = 1`
- Revisa que las relaciones de claves foráneas estén correctas

## 📊 Requisitos Técnicos

- PHP 7.0 o superior
- MySQL 5.7 o superior
- Navegador moderno con soporte para ES6+
- JavaScript habilitado

## 📝 Notas de Versión

**Versión 1.0.0** - 18 de febrero de 2026
- Implementación inicial del sistema de búsqueda
- Filtros avanzados completos
- Vistas de cuadrícula y lista
- Paginación funcional
- Estadísticas en tiempo real
- Diseño responsive completo

---

**Desarrollado para TotalKit ERP** ⚽
*Sistema profesional de gestión de camisetas de fútbol*

```
**README.md**
```markdown
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

```
**base_datos.sql**
```sql
-- =============================================
-- SISTEMA ERP - TIENDA ONLINE DE CAMISETAS DE FÚTBOL
-- Base de datos para gestión de camisetas de equipos y selecciones
-- =============================================

CREATE DATABASE IF NOT EXISTS tienda_camisetas 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE tienda_camisetas;

-- Eliminar tablas si existen (en orden inverso de dependencias)
DROP TABLE IF EXISTS articulos_pedido;
DROP TABLE IF EXISTS pedidos;
DROP TABLE IF EXISTS resenas_producto;
DROP TABLE IF EXISTS imagenes_producto;
DROP TABLE IF EXISTS productos;
DROP TABLE IF EXISTS equipos;
DROP TABLE IF EXISTS ligas;
DROP TABLE IF EXISTS marcas;
DROP TABLE IF EXISTS tipos_camiseta;
DROP TABLE IF EXISTS tallas;
DROP TABLE IF EXISTS temporadas;
DROP TABLE IF EXISTS metodos_pago;
DROP TABLE IF EXISTS metodos_envio;
DROP TABLE IF EXISTS direcciones;
DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS paises;
DROP TABLE IF EXISTS estados_pedido;

-- =============================================
-- TABLAS DE REFERENCIA
-- =============================================

-- Tabla de países
CREATE TABLE paises (
    id_pais INT PRIMARY KEY AUTO_INCREMENT,
    nombre_pais VARCHAR(100) NOT NULL UNIQUE,
    codigo_pais CHAR(2) NOT NULL UNIQUE
);

-- Estados de pedido
CREATE TABLE estados_pedido (
    id_estado INT PRIMARY KEY AUTO_INCREMENT,
    nombre_estado VARCHAR(50) NOT NULL UNIQUE,
    descripcion_estado VARCHAR(255)
);

-- Temporadas (2023/24, 2024/25, etc.)
CREATE TABLE temporadas (
    id_temporada INT PRIMARY KEY AUTO_INCREMENT,
    nombre_temporada VARCHAR(20) NOT NULL UNIQUE,
    ano_inicio INT NOT NULL,
    ano_fin INT NOT NULL,
    activo TINYINT(1) DEFAULT 1
);

-- Tallas disponibles
CREATE TABLE tallas (
    id_talla INT PRIMARY KEY AUTO_INCREMENT,
    nombre_talla VARCHAR(10) NOT NULL UNIQUE,
    orden INT DEFAULT 0
);

-- Tipos de camiseta (titular, suplente, tercera, etc.)
CREATE TABLE tipos_camiseta (
    id_tipo_camiseta INT PRIMARY KEY AUTO_INCREMENT,
    nombre_tipo VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255)
);

-- Ligas y competiciones
CREATE TABLE ligas (
    id_liga INT PRIMARY KEY AUTO_INCREMENT,
    nombre_liga VARCHAR(100) NOT NULL UNIQUE,
    id_pais INT,
    nivel VARCHAR(50),
    activo TINYINT(1) DEFAULT 1,
    FOREIGN KEY (id_pais) REFERENCES paises(id_pais)
);

-- =============================================
-- TABLAS DE PRODUCTOS
-- =============================================

-- Marcas de camisetas
CREATE TABLE marcas (
    id_marca INT PRIMARY KEY AUTO_INCREMENT,
    nombre_marca VARCHAR(100) NOT NULL UNIQUE,
    pais_origen VARCHAR(100),
    sitio_web VARCHAR(255),
    activo TINYINT(1) DEFAULT 1
);

-- Equipos de fútbol
CREATE TABLE equipos (
    id_equipo INT PRIMARY KEY AUTO_INCREMENT,
    nombre_equipo VARCHAR(100) NOT NULL UNIQUE,
    nombre_completo VARCHAR(200),
    id_liga INT,
    id_pais INT,
    fundacion INT,
    estadio VARCHAR(100),
    es_seleccion TINYINT(1) DEFAULT 0,
    activo TINYINT(1) DEFAULT 1,
    FOREIGN KEY (id_liga) REFERENCES ligas(id_liga),
    FOREIGN KEY (id_pais) REFERENCES paises(id_pais)
);

-- Productos (camisetas)
CREATE TABLE productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_producto VARCHAR(200) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    id_equipo INT NOT NULL,
    id_marca INT NOT NULL,
    id_temporada INT NOT NULL,
    id_tipo_camiseta INT NOT NULL,
    id_talla INT NOT NULL,
    
    -- Campos específicos para camisetas
    jugador VARCHAR(100) COMMENT 'Nombre del jugador (opcional)',
    numero_dorsal INT COMMENT 'Número de dorsal (opcional)',
    version_jugador TINYINT(1) DEFAULT 0 COMMENT 'Si es versión de jugador o aficionado',
    manga_corta TINYINT(1) DEFAULT 1,
    incluye_parches TINYINT(1) DEFAULT 0 COMMENT 'Parches de competiciones',
    
    -- Campos generales
    material VARCHAR(100) DEFAULT 'Poliéster',
    codigo_producto VARCHAR(50) UNIQUE,
    peso INT COMMENT 'Peso en gramos',
    fecha_lanzamiento DATE,
    destacado TINYINT(1) DEFAULT 0,
    activo TINYINT(1) DEFAULT 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo),
    FOREIGN KEY (id_marca) REFERENCES marcas(id_marca),
    FOREIGN KEY (id_temporada) REFERENCES temporadas(id_temporada),
    FOREIGN KEY (id_tipo_camiseta) REFERENCES tipos_camiseta(id_tipo_camiseta),
    FOREIGN KEY (id_talla) REFERENCES tallas(id_talla)
);

-- Imágenes de productos
CREATE TABLE imagenes_producto (
    id_imagen INT PRIMARY KEY AUTO_INCREMENT,
    id_producto INT NOT NULL,
    url_imagen VARCHAR(255) NOT NULL,
    es_principal TINYINT(1) DEFAULT 0,
    orden INT DEFAULT 0,
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE CASCADE
);

-- Reseñas de productos
CREATE TABLE resenas_producto (
    id_resena INT PRIMARY KEY AUTO_INCREMENT,
    id_producto INT NOT NULL,
    id_cliente INT,
    calificacion INT NOT NULL CHECK (calificacion BETWEEN 1 AND 5),
    titulo VARCHAR(200),
    comentario TEXT,
    fecha_resena TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    verificado TINYINT(1) DEFAULT 0,
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE CASCADE
);

-- =============================================
-- TABLAS DE CLIENTES
-- =============================================

-- Clientes
CREATE TABLE clientes (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telefono VARCHAR(20),
    equipo_favorito INT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    activo TINYINT(1) DEFAULT 1,
    FOREIGN KEY (equipo_favorito) REFERENCES equipos(id_equipo)
);

-- Direcciones de clientes
CREATE TABLE direcciones (
    id_direccion INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    direccion_linea1 VARCHAR(255) NOT NULL,
    direccion_linea2 VARCHAR(255),
    ciudad VARCHAR(100) NOT NULL,
    codigo_postal VARCHAR(20) NOT NULL,
    id_pais INT NOT NULL,
    es_principal TINYINT(1) DEFAULT 0,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY (id_pais) REFERENCES paises(id_pais)
);

-- =============================================
-- TABLAS DE PEDIDOS
-- =============================================

-- Métodos de envío
CREATE TABLE metodos_envio (
    id_metodo_envio INT PRIMARY KEY AUTO_INCREMENT,
    nombre_metodo VARCHAR(100) NOT NULL UNIQUE,
    costo DECIMAL(10,2) NOT NULL,
    dias_estimados INT,
    activo TINYINT(1) DEFAULT 1
);

-- Métodos de pago
CREATE TABLE metodos_pago (
    id_metodo_pago INT PRIMARY KEY AUTO_INCREMENT,
    nombre_metodo VARCHAR(100) NOT NULL UNIQUE,
    activo TINYINT(1) DEFAULT 1
);

-- Pedidos
CREATE TABLE pedidos (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    id_direccion INT NOT NULL,
    id_metodo_envio INT NOT NULL,
    id_metodo_pago INT NOT NULL,
    id_estado INT NOT NULL,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    subtotal DECIMAL(10,2) NOT NULL,
    costo_envio DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    notas TEXT,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (id_direccion) REFERENCES direcciones(id_direccion),
    FOREIGN KEY (id_metodo_envio) REFERENCES metodos_envio(id_metodo_envio),
    FOREIGN KEY (id_metodo_pago) REFERENCES metodos_pago(id_metodo_pago),
    FOREIGN KEY (id_estado) REFERENCES estados_pedido(id_estado)
);

-- Artículos del pedido
CREATE TABLE articulos_pedido (
    id_articulo_pedido INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

-- =============================================
-- DATOS INICIALES
-- =============================================

-- Países
INSERT INTO paises (nombre_pais, codigo_pais) VALUES
('España', 'ES'),
('Inglaterra', 'GB'),
('Italia', 'IT'),
('Alemania', 'DE'),
('Francia', 'FR'),
('Brasil', 'BR'),
('Argentina', 'AR'),
('Portugal', 'PT'),
('Países Bajos', 'NL'),
('Bélgica', 'BE');

-- Estados de pedido
INSERT INTO estados_pedido (nombre_estado, descripcion_estado) VALUES
('Pendiente', 'Pedido recibido, pendiente de procesar'),
('Procesando', 'Pedido en preparación'),
('Enviado', 'Pedido enviado al cliente'),
('Entregado', 'Pedido entregado'),
('Cancelado', 'Pedido cancelado');

-- Temporadas
INSERT INTO temporadas (nombre_temporada, ano_inicio, ano_fin, activo) VALUES
('2022/23', 2022, 2023, 0),
('2023/24', 2023, 2024, 0),
('2024/25', 2024, 2025, 1),
('2025/26', 2025, 2026, 1),
('2026/27', 2026, 2027, 0);

-- Tallas
INSERT INTO tallas (nombre_talla, orden) VALUES
('XS', 1),
('S', 2),
('M', 3),
('L', 4),
('XL', 5),
('XXL', 6);

-- Tipos de camiseta
INSERT INTO tipos_camiseta (nombre_tipo, descripcion) VALUES
('Primera Equipación', 'Camiseta titular del equipo'),
('Segunda Equipación', 'Camiseta suplente'),
('Tercera Equipación', 'Camiseta alternativa'),
('Portero', 'Camiseta de guardameta'),
('Edición Especial', 'Camisetas conmemorativas o especiales'),
('Entrenamiento', 'Camiseta de entrenamiento');

-- Ligas
INSERT INTO ligas (nombre_liga, id_pais, nivel, activo) VALUES
('LaLiga EA Sports', 1, 'Primera División', 1),
('Premier League', 2, 'Primera División', 1),
('Serie A', 3, 'Primera División', 1),
('Bundesliga', 4, 'Primera División', 1),
('Ligue 1', 5, 'Primera División', 1),
('UEFA Champions League', NULL, 'Competición Europea', 1),
('Copa del Mundo FIFA', NULL, 'Competición Internacional', 1);

-- Marcas
INSERT INTO marcas (nombre_marca, pais_origen, sitio_web, activo) VALUES
('Nike', 'Estados Unidos', 'www.nike.com', 1),
('Adidas', 'Alemania', 'www.adidas.com', 1),
('Puma', 'Alemania', 'www.puma.com', 1),
('New Balance', 'Estados Unidos', 'www.newbalance.com', 1),
('Umbro', 'Inglaterra', 'www.umbro.com', 1),
('Kappa', 'Italia', 'www.kappa.com', 1),
('Macron', 'Italia', 'www.macron.com', 1),
('Joma', 'España', 'www.joma-sport.com', 1);

-- Equipos
INSERT INTO equipos (nombre_equipo, nombre_completo, id_liga, id_pais, fundacion, estadio, es_seleccion, activo) VALUES
('Real Madrid', 'Real Madrid Club de Fútbol', 1, 1, 1902, 'Santiago Bernabéu', 0, 1),
('FC Barcelona', 'Fútbol Club Barcelona', 1, 1, 1899, 'Spotify Camp Nou', 0, 1),
('Atlético Madrid', 'Club Atlético de Madrid', 1, 1, 1903, 'Cívitas Metropolitano', 0, 1),
('Manchester United', 'Manchester United Football Club', 2, 2, 1878, 'Old Trafford', 0, 1),
('Liverpool FC', 'Liverpool Football Club', 2, 2, 1892, 'Anfield', 0, 1),
('Manchester City', 'Manchester City Football Club', 2, 2, 1880, 'Etihad Stadium', 0, 1),
('AC Milan', 'Associazione Calcio Milan', 3, 3, 1899, 'San Siro', 0, 1),
('Inter Milan', 'Football Club Internazionale Milano', 3, 3, 1908, 'San Siro', 0, 1),
('Juventus', 'Juventus Football Club', 3, 3, 1897, 'Allianz Stadium', 0, 1),
('Bayern München', 'Fußball-Club Bayern München', 4, 4, 1900, 'Allianz Arena', 0, 1),
('Borussia Dortmund', 'Ballspielverein Borussia 09 Dortmund', 4, 4, 1909, 'Signal Iduna Park', 0, 1),
('Paris Saint-Germain', 'Paris Saint-Germain Football Club', 5, 5, 1970, 'Parc des Princes', 0, 1),
('España', 'Selección Española de Fútbol', 7, 1, 1913, NULL, 1, 1),
('Brasil', 'Seleção Brasileira de Futebol', 7, 6, 1914, NULL, 1, 1),
('Argentina', 'Selección Argentina de Fútbol', 7, 7, 1893, NULL, 1, 1),
('Portugal', 'Seleção Portuguesa de Futebol', 7, 8, 1914, NULL, 1, 1);

-- Productos de ejemplo (camisetas)
INSERT INTO productos (nombre_producto, descripcion, precio, stock, id_equipo, id_marca, id_temporada, id_tipo_camiseta, id_talla, jugador, numero_dorsal, version_jugador, manga_corta, incluye_parches, material, codigo_producto, peso, fecha_lanzamiento, destacado, activo) VALUES
('Camiseta Real Madrid 2024/25 Titular', 'Camiseta oficial primera equipación Real Madrid temporada 2024/25', 89.99, 50, 1, 2, 4, 1, 3, NULL, NULL, 0, 1, 0, 'Poliéster reciclado', 'RM-2425-H-M', 180, '2024-07-01', 1, 1),
('Camiseta Real Madrid 2024/25 Bellingham #5', 'Camiseta oficial Real Madrid con nombre y número de Jude Bellingham', 119.99, 30, 1, 2, 4, 1, 3, 'BELLINGHAM', 5, 1, 1, 1, 'Poliéster reciclado', 'RM-2425-H-M-B5', 180, '2024-07-01', 1, 1),
('Camiseta FC Barcelona 2024/25 Titular', 'Camiseta oficial primera equipación FC Barcelona temporada 2024/25', 89.99, 45, 2, 1, 4, 1, 3, NULL, NULL, 0, 1, 0, 'Poliéster reciclado', 'FCB-2425-H-M', 175, '2024-07-01', 1, 1),
('Camiseta Barcelona 2024/25 Lewandowski #9', 'Camiseta oficial FC Barcelona con nombre y número de Robert Lewandowski', 119.99, 25, 2, 1, 4, 1, 3, 'LEWANDOWSKI', 9, 1, 1, 1, 'Poliéster reciclado', 'FCB-2425-H-M-L9', 175, '2024-07-01', 1, 1),
('Camiseta Manchester United 2024/25 Titular', 'Camiseta oficial primera equipación Manchester United', 84.99, 40, 4, 2, 4, 1, 3, NULL, NULL, 0, 1, 0, 'Poliéster Dri-FIT', 'MU-2425-H-M', 185, '2024-07-15', 1, 1),
('Camiseta Liverpool 2024/25 Titular', 'Camiseta oficial primera equipación Liverpool FC', 84.99, 38, 5, 1, 4, 1, 3, NULL, NULL, 0, 1, 0, 'Poliéster', 'LFC-2425-H-M', 180, '2024-07-01', 1, 1),
('Camiseta PSG 2024/25 Mbappé #7', 'Camiseta oficial PSG con nombre y número de Kylian Mbappé', 124.99, 20, 12, 1, 4, 1, 3, 'MBAPPÉ', 7, 1, 1, 1, 'Poliéster', 'PSG-2425-H-M-M7', 180, '2024-07-01', 1, 1),
('Camiseta Bayern München 2024/25 Titular', 'Camiseta oficial primera equipación Bayern München', 89.99, 35, 10, 2, 4, 1, 3, NULL, NULL, 0, 1, 0, 'Poliéster', 'BAY-2425-H-M', 182, '2024-07-10', 0, 1);

-- Más tallas para algunos productos populares
INSERT INTO productos (nombre_producto, descripcion, precio, stock, id_equipo, id_marca, id_temporada, id_tipo_camiseta, id_talla, jugador, numero_dorsal, version_jugador, manga_corta, incluye_parches, material, codigo_producto, peso, fecha_lanzamiento, destacado, activo) VALUES
('Camiseta Real Madrid 2024/25 Titular', 'Camiseta oficial primera equipación Real Madrid temporada 2024/25 - Talla S', 89.99, 45, 1, 2, 4, 1, 2, NULL, NULL, 0, 1, 0, 'Poliéster reciclado', 'RM-2425-H-S', 180, '2024-07-01', 1, 1),
('Camiseta Real Madrid 2024/25 Titular', 'Camiseta oficial primera equipación Real Madrid temporada 2024/25 - Talla L', 89.99, 55, 1, 2, 4, 1, 4, NULL, NULL, 0, 1, 0, 'Poliéster reciclado', 'RM-2425-H-L', 180, '2024-07-01', 1, 1),
('Camiseta FC Barcelona 2024/25 Titular', 'Camiseta oficial primera equipación FC Barcelona temporada 2024/25 - Talla S', 89.99, 40, 2, 1, 4, 1, 2, NULL, NULL, 0, 1, 0, 'Poliéster reciclado', 'FCB-2425-H-S', 175, '2024-07-01', 1, 1),
('Camiseta FC Barcelona 2024/25 Titular', 'Camiseta oficial primera equipación FC Barcelona temporada 2024/25 - Talla L', 89.99, 50, 2, 1, 4, 1, 4, NULL, NULL, 0, 1, 0, 'Poliéster reciclado', 'FCB-2425-H-L', 175, '2024-07-01', 1, 1);

-- Segundas equipaciones
INSERT INTO productos (nombre_producto, descripcion, precio, stock, id_equipo, id_marca, id_temporada, id_tipo_camiseta, id_talla, jugador, numero_dorsal, version_jugador, manga_corta, incluye_parches, material, codigo_producto, peso, fecha_lanzamiento, destacado, activo) VALUES
('Camiseta Real Madrid 2024/25 Segunda', 'Camiseta oficial segunda equipación Real Madrid', 89.99, 30, 1, 2, 4, 2, 3, NULL, NULL, 0, 1, 0, 'Poliéster reciclado', 'RM-2425-A-M', 180, '2024-08-01', 0, 1),
('Camiseta FC Barcelona 2024/25 Segunda', 'Camiseta oficial segunda equipación FC Barcelona', 89.99, 28, 2, 1, 4, 2, 3, NULL, NULL, 0, 1, 0, 'Poliéster reciclado', 'FCB-2425-A-M', 175, '2024-08-01', 0, 1);

-- Selecciones nacionales
INSERT INTO productos (nombre_producto, descripcion, precio, stock, id_equipo, id_marca, id_temporada, id_tipo_camiseta, id_talla, jugador, numero_dorsal, version_jugador, manga_corta, incluye_parches, material, codigo_producto, peso, fecha_lanzamiento, destacado, activo) VALUES
('Camiseta España 2024/25 Titular', 'Camiseta oficial selección española', 84.99, 60, 13, 2, 4, 1, 3, NULL, NULL, 0, 1, 0, 'Poliéster', 'ESP-2425-H-M', 178, '2024-06-01', 1, 1),
('Camiseta Brasil 2024/25 Titular', 'Camiseta oficial selección brasileña', 84.99, 55, 14, 1, 4, 1, 3, NULL, NULL, 0, 1, 0, 'Poliéster', 'BRA-2425-H-M', 178, '2024-06-01', 1, 1),
('Camiseta Argentina 2024/25 Titular', 'Camiseta oficial selección argentina', 84.99, 65, 15, 2, 4, 1, 3, NULL, NULL, 0, 1, 0, 'Poliéster', 'ARG-2425-H-M', 178, '2024-06-01', 1, 1),
('Camiseta Argentina 2024/25 Messi #10', 'Camiseta oficial Argentina con nombre y número de Lionel Messi', 129.99, 40, 15, 2, 4, 1, 3, 'MESSI', 10, 1, 1, 1, 'Poliéster', 'ARG-2425-H-M-M10', 178, '2024-06-01', 1, 1);

-- Clientes de ejemplo
INSERT INTO clientes (nombre, apellidos, email, telefono, equipo_favorito, activo) VALUES
('Carlos', 'García Martínez', 'carlos.garcia@email.com', '+34 600 111 222', 1, 1),
('Laura', 'Fernández López', 'laura.fernandez@email.com', '+34 600 333 444', 2, 1),
('Miguel', 'Rodríguez Santos', 'miguel.rodriguez@email.com', '+34 600 555 666', 4, 1),
('Ana', 'Martín Pérez', 'ana.martin@email.com', '+34 600 777 888', 13, 1);

-- Direcciones de ejemplo
INSERT INTO direcciones (id_cliente, direccion_linea1, ciudad, codigo_postal, id_pais, es_principal) VALUES
(1, 'Calle Gran Vía 25, 3º A', 'Madrid', '28013', 1, 1),
(2, 'Avenida Diagonal 456', 'Barcelona', '08019', 1, 1),
(3, 'Calle Real 78, 2º B', 'Valencia', '46002', 1, 1),
(4, 'Plaza Mayor 12', 'Sevilla', '41001', 1, 1);

-- Métodos de envío
INSERT INTO metodos_envio (nombre_metodo, costo, dias_estimados, activo) VALUES
('Estándar', 4.99, 5, 1),
('Express 24-48h', 9.99, 2, 1),
('Recogida en tienda', 0.00, 0, 1),
('Internacional', 19.99, 10, 1);

-- Métodos de pago
INSERT INTO metodos_pago (nombre_metodo, activo) VALUES
('Tarjeta de crédito', 1),
('PayPal', 1),
('Transferencia bancaria', 1),
('Bizum', 1),
('Contrareembolso', 1);

-- Pedidos de ejemplo
INSERT INTO pedidos (id_cliente, id_direccion, id_metodo_envio, id_metodo_pago, id_estado, subtotal, costo_envio, total) VALUES
(1, 1, 2, 1, 3, 119.99, 9.99, 129.98),
(2, 2, 1, 2, 2, 209.98, 4.99, 214.97),
(3, 3, 1, 1, 4, 84.99, 4.99, 89.98);

-- Artículos de pedidos
INSERT INTO articulos_pedido (id_pedido, id_producto, cantidad, precio_unitario, subtotal) VALUES
(1, 2, 1, 119.99, 119.99),
(2, 3, 1, 89.99, 89.99),
(2, 4, 1, 119.99, 119.99),
(3, 5, 1, 84.99, 84.99);

-- Reseñas de ejemplo
INSERT INTO resenas_producto (id_producto, id_cliente, calificacion, titulo, comentario, verificado) VALUES
(1, 1, 5, '¡Brutal! Hala Madrid', 'La camiseta es de excelente calidad. Los colores son vibrantes y el ajuste perfecto. Muy contento con la compra.', 1),
(2, 1, 5, 'Bellingham es el mejor', 'Me encanta llevar la camiseta de mi jugador favorito. La calidad de impresión del nombre es perfecta.', 1),
(3, 2, 5, 'Visca el Barça', 'Como siempre, Nike hace un trabajo increíble. La camiseta es cómoda y el diseño es espectacular.', 1),
(5, 3, 4, 'Glory Glory Man United', 'Buena camiseta, aunque esperaba que fuera un poco más ligera. Aún así, muy contento.', 1),
(18, 4, 5, 'La albiceleste campeona', 'Camiseta oficial de la mejor selección del mundo. Calidad top y llegó muy rápido.', 1);

-- =============================================
-- VISTAS ÚTILES
-- =============================================

-- Vista de productos con información completa
CREATE VIEW vista_productos_completa AS
SELECT 
    p.id_producto,
    p.nombre_producto,
    p.descripcion,
    p.precio,
    p.stock,
    e.nombre_equipo,
    e.es_seleccion,
    l.nombre_liga,
    m.nombre_marca,
    temp.nombre_temporada,
    tc.nombre_tipo as tipo_camiseta,
    t.nombre_talla as talla,
    p.jugador,
    p.numero_dorsal,
    p.version_jugador,
    p.manga_corta,
    p.incluye_parches,
    p.material,
    p.codigo_producto,
    p.peso,
    p.fecha_lanzamiento,
    p.destacado,
    p.activo,
    (SELECT AVG(calificacion) FROM resenas_producto WHERE id_producto = p.id_producto) as calificacion_promedio,
    (SELECT COUNT(*) FROM resenas_producto WHERE id_producto = p.id_producto) as total_resenas
FROM productos p
LEFT JOIN equipos e ON p.id_equipo = e.id_equipo
LEFT JOIN ligas l ON e.id_liga = l.id_liga
LEFT JOIN marcas m ON p.id_marca = m.id_marca
LEFT JOIN temporadas temp ON p.id_temporada = temp.id_temporada
LEFT JOIN tipos_camiseta tc ON p.id_tipo_camiseta = tc.id_tipo_camiseta
LEFT JOIN tallas t ON p.id_talla = t.id_talla;

-- Vista de pedidos con detalles
CREATE VIEW vista_pedidos_detalle AS
SELECT 
    ped.id_pedido,
    ped.fecha_pedido,
    CONCAT(cli.nombre, ' ', cli.apellidos) as cliente,
    cli.email,
    CONCAT(dir.direccion_linea1, ', ', dir.ciudad, ', ', dir.codigo_postal) as direccion_envio,
    p.nombre_pais,
    me.nombre_metodo as metodo_envio,
    mp.nombre_metodo as metodo_pago,
    ep.nombre_estado as estado,
    ped.subtotal,
    ped.costo_envio,
    ped.total
FROM pedidos ped
JOIN clientes cli ON ped.id_cliente = cli.id_cliente
JOIN direcciones dir ON ped.id_direccion = dir.id_direccion
JOIN paises p ON dir.id_pais = p.id_pais
JOIN metodos_envio me ON ped.id_metodo_envio = me.id_metodo_envio
JOIN metodos_pago mp ON ped.id_metodo_pago = mp.id_metodo_pago
JOIN estados_pedido ep ON ped.id_estado = ep.id_estado;

-- Vista de equipos más vendidos
CREATE VIEW vista_equipos_mas_vendidos AS
SELECT 
    e.nombre_equipo,
    COUNT(ap.id_articulo_pedido) as total_ventas,
    SUM(ap.cantidad) as unidades_vendidas,
    SUM(ap.subtotal) as ingresos_totales
FROM equipos e
JOIN productos p ON e.id_equipo = p.id_equipo
JOIN articulos_pedido ap ON p.id_producto = ap.id_producto
GROUP BY e.id_equipo
ORDER BY total_ventas DESC;

```
**buscador.js**
```js
// =============================================
// TOTALKIT ERP - SISTEMA DE BÚSQUEDA PROFESIONAL
// JavaScript para búsqueda de productos con filtros
// =============================================

// Iconos SVG para uso en el buscador
const SVGIcons = {
    check: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
    x: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
    search: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.35-4.35"></path></svg>',
    box: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>',
    user: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
    chart: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>',
    dollar: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>',
    tag: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>',
    ruler: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>',
    calendar: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
    star: '<svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
    globe: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
    shield: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>'
};

class BuscadorProductos {
    constructor() {
        this.filtros = {
            q: '',
            equipo: '',
            liga: '',
            marca: '',
            temporada: '',
            tipo: '',
            talla: '',
            precio_min: '',
            precio_max: '',
            solo_stock: false,
            destacados: false,
            es_seleccion: ''
        };
        
        this.orden = 'p.fecha_creacion';
        this.dir = 'DESC';
        this.pagina = 1;
        this.por_pagina = 12;
        
        this.timeoutBusqueda = null;
        this.vistaActual = 'grid'; // grid o lista
        
        this.init();
    }
    
    /**
     * Inicializar el buscador
     */
    init() {
        this.cargarOpcionesFiltros();
        this.configurarEventos();
        this.realizarBusqueda();
    }
    
    /**
     * Cargar opciones para los filtros (equipos, marcas, etc.)
     */
    async cargarOpcionesFiltros() {
        try {
            const response = await fetch('buscar_productos.php?accion=filtros');
            const data = await response.json();
            
            if (data.success) {
                this.llenarSelectFiltros(data.opciones);
            }
        } catch (error) {
            console.error('Error al cargar filtros:', error);
        }
    }
    
    /**
     * Llenar los selectores con opciones
     */
    llenarSelectFiltros(opciones) {
        // Equipos
        const selectEquipo = document.getElementById('filtro-equipo');
        if (selectEquipo && opciones.equipos) {
            selectEquipo.innerHTML = '<option value="">Todos los equipos</option>';
            opciones.equipos.forEach(equipo => {
                const prefix = equipo.es_seleccion == 1 ? '[Selección] ' : '';
                selectEquipo.innerHTML += `<option value="${equipo.id_equipo}">${prefix}${equipo.nombre_equipo}</option>`;
            });
        }
        
        // Ligas
        const selectLiga = document.getElementById('filtro-liga');
        if (selectLiga && opciones.ligas) {
            selectLiga.innerHTML = '<option value="">Todas las ligas</option>';
            opciones.ligas.forEach(liga => {
                selectLiga.innerHTML += `<option value="${liga.id_liga}">${liga.nombre_liga}</option>`;
            });
        }
        
        // Marcas
        const selectMarca = document.getElementById('filtro-marca');
        if (selectMarca && opciones.marcas) {
            selectMarca.innerHTML = '<option value="">Todas las marcas</option>';
            opciones.marcas.forEach(marca => {
                selectMarca.innerHTML += `<option value="${marca.id_marca}">${marca.nombre_marca}</option>`;
            });
        }
        
        // Temporadas
        const selectTemporada = document.getElementById('filtro-temporada');
        if (selectTemporada && opciones.temporadas) {
            selectTemporada.innerHTML = '<option value="">Todas las temporadas</option>';
            opciones.temporadas.forEach(temp => {
                selectTemporada.innerHTML += `<option value="${temp.id_temporada}">${temp.nombre_temporada}</option>`;
            });
        }
        
        // Tipos de camiseta
        const selectTipo = document.getElementById('filtro-tipo');
        if (selectTipo && opciones.tipos) {
            selectTipo.innerHTML = '<option value="">Todos los tipos</option>';
            opciones.tipos.forEach(tipo => {
                selectTipo.innerHTML += `<option value="${tipo.id_tipo_camiseta}">${tipo.nombre_tipo}</option>`;
            });
        }
        
        // Tallas
        const selectTalla = document.getElementById('filtro-talla');
        if (selectTalla && opciones.tallas) {
            selectTalla.innerHTML = '<option value="">Todas las tallas</option>';
            opciones.tallas.forEach(talla => {
                selectTalla.innerHTML += `<option value="${talla.id_talla}">${talla.nombre_talla}</option>`;
            });
        }
        
        // Rango de precios
        const inputPrecioMin = document.getElementById('filtro-precio-min');
        const inputPrecioMax = document.getElementById('filtro-precio-max');
        if (inputPrecioMin && opciones.precio_min !== undefined) {
            inputPrecioMin.placeholder = `Desde ${opciones.precio_min.toFixed(2)}€`;
        }
        if (inputPrecioMax && opciones.precio_max !== undefined) {
            inputPrecioMax.placeholder = `Hasta ${opciones.precio_max.toFixed(2)}€`;
        }
    }
    
    /**
     * Configurar eventos de los controles
     */
    configurarEventos() {
        // Búsqueda de texto
        const inputBusqueda = document.getElementById('busqueda-texto');
        if (inputBusqueda) {
            inputBusqueda.addEventListener('input', (e) => {
                this.filtros.q = e.target.value;
                this.busquedaConDelay();
            });
        }
        
        // Todos los filtros select
        const filtrosSelect = [
            'filtro-equipo', 'filtro-liga', 'filtro-marca',
            'filtro-temporada', 'filtro-tipo', 'filtro-talla'
        ];
        
        filtrosSelect.forEach(id => {
            const elemento = document.getElementById(id);
            if (elemento) {
                elemento.addEventListener('change', (e) => {
                    const campo = id.replace('filtro-', '');
                    this.filtros[campo] = e.target.value;
                    this.pagina = 1;
                    this.realizarBusqueda();
                });
            }
        });
        
        // Filtros de precio
        const inputPrecioMin = document.getElementById('filtro-precio-min');
        const inputPrecioMax = document.getElementById('filtro-precio-max');
        
        if (inputPrecioMin) {
            inputPrecioMin.addEventListener('change', (e) => {
                this.filtros.precio_min = e.target.value;
                this.pagina = 1;
                this.realizarBusqueda();
            });
        }
        
        if (inputPrecioMax) {
            inputPrecioMax.addEventListener('change', (e) => {
                this.filtros.precio_max = e.target.value;
                this.pagina = 1;
                this.realizarBusqueda();
            });
        }
        
        // Checkboxes
        const checkSoloStock = document.getElementById('filtro-solo-stock');
        const checkDestacados = document.getElementById('filtro-destacados');
        
        if (checkSoloStock) {
            checkSoloStock.addEventListener('change', (e) => {
                this.filtros.solo_stock = e.target.checked;
                this.pagina = 1;
                this.realizarBusqueda();
            });
        }
        
        if (checkDestacados) {
            checkDestacados.addEventListener('change', (e) => {
                this.filtros.destacados = e.target.checked;
                this.pagina = 1;
                this.realizarBusqueda();
            });
        }
        
        // Radio buttons para tipo de equipo
        const radiosSeleccion = document.getElementsByName('tipo-equipo');
        radiosSeleccion.forEach(radio => {
            radio.addEventListener('change', (e) => {
                this.filtros.es_seleccion = e.target.value;
                this.pagina = 1;
                this.realizarBusqueda();
            });
        });
        
        // Botón limpiar filtros
        const btnLimpiar = document.getElementById('btn-limpiar-filtros');
        if (btnLimpiar) {
            btnLimpiar.addEventListener('click', () => {
                this.limpiarFiltros();
            });
        }
        
        // Cambio de vista
        const btnVistaGrid = document.getElementById('btn-vista-grid');
        const btnVistaLista = document.getElementById('btn-vista-lista');
        
        if (btnVistaGrid) {
            btnVistaGrid.addEventListener('click', () => {
                this.cambiarVista('grid');
            });
        }
        
        if (btnVistaLista) {
            btnVistaLista.addEventListener('click', () => {
                this.cambiarVista('lista');
            });
        }
        
        // Ordenamiento
        const selectOrden = document.getElementById('select-orden');
        if (selectOrden) {
            selectOrden.addEventListener('change', (e) => {
                const valor = e.target.value.split('|');
                this.orden = valor[0];
                this.dir = valor[1] || 'DESC';
                this.realizarBusqueda();
            });
        }
    }
    
    /**
     * Búsqueda con delay (para texto)
     */
    busquedaConDelay() {
        if (this.timeoutBusqueda) {
            clearTimeout(this.timeoutBusqueda);
        }
        
        this.timeoutBusqueda = setTimeout(() => {
            this.pagina = 1;
            this.realizarBusqueda();
        }, 300);
    }
    
    /**
     * Realizar búsqueda principal
     */
    async realizarBusqueda() {
        const contenedorResultados = document.getElementById('resultados-busqueda');
        if (!contenedorResultados) return;
        
        // Mostrar indicador de carga
        contenedorResultados.innerHTML = `
            <div class="loading-search">
                <div class="spinner"></div>
                <p>Buscando productos...</p>
            </div>
        `;
        
        try {
            const params = new URLSearchParams({
                accion: 'buscar',
                ...this.filtros,
                orden: this.orden,
                dir: this.dir,
                pagina: this.pagina,
                por_pagina: this.por_pagina
            });
            
            // Eliminar parámetros vacíos
            for (let [key, value] of params.entries()) {
                if (value === '' || value === 'false') {
                    params.delete(key);
                }
            }
            
            const response = await fetch(`buscar_productos.php?${params.toString()}`);
            const data = await response.json();
            
            if (data.success) {
                this.mostrarResultados(data);
            } else {
                contenedorResultados.innerHTML = `
                    <div class="error-search">
                        <p>${SVGIcons.x} Error: ${data.error || 'Error desconocido'}</p>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error en la búsqueda:', error);
            contenedorResultados.innerHTML = `
                <div class="error-search">
                    <p>${SVGIcons.x} Error al realizar la búsqueda</p>
                </div>
            `;
        }
    }
    
    /**
     * Mostrar resultados de la búsqueda
     */
    mostrarResultados(data) {
        const contenedorResultados = document.getElementById('resultados-busqueda');
        const contenedorEstadisticas = document.getElementById('estadisticas-busqueda');
        
        // Actualizar estadísticas
        if (contenedorEstadisticas && data.estadisticas) {
            const stats = data.estadisticas;
            contenedorEstadisticas.innerHTML = `
                <div class="stat-item">
                    <span class="stat-icon">${SVGIcons.box}</span>
                    <span class="stat-label">Productos:</span>
                    <span class="stat-value">${stats.total}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-icon">${SVGIcons.dollar}</span>
                    <span class="stat-label">Precio promedio:</span>
                    <span class="stat-value">${stats.precio_promedio.toFixed(2)}€</span>
                </div>
                <div class="stat-item">
                    <span class="stat-icon">${SVGIcons.chart}</span>
                    <span class="stat-label">Stock total:</span>
                    <span class="stat-value">${stats.stock_total}</span>
                </div>
            `;
        }
        
        // Mostrar productos
        if (data.productos.length === 0) {
            contenedorResultados.innerHTML = `
                <div class="no-results">
                    <div class="no-results-icon">${SVGIcons.search}</div>
                    <h3>No se encontraron productos</h3>
                    <p>Intenta ajustar los filtros de búsqueda</p>
                </div>
            `;
            return;
        }
        
        const htmlProductos = data.productos.map(p => this.renderProducto(p)).join('');
        
        contenedorResultados.innerHTML = `
            <div class="productos-grid vista-${this.vistaActual}">
                ${htmlProductos}
            </div>
        `;
        
        // Mostrar paginación
        if (data.total_paginas > 1) {
            contenedorResultados.innerHTML += this.renderPaginacion(data);
        }
    }
    
    /**
     * Renderizar un producto
     */
    renderProducto(producto) {
        const stockClass = producto.stock > 10 ? 'stock-alto' : (producto.stock > 0 ? 'stock-medio' : 'stock-bajo');
        const stockTexto = producto.stock > 0 ? `${producto.stock} disponibles` : 'Sin stock';
        const destacado = producto.destacado == 1 ? `<span class="badge-destacado">${SVGIcons.star} Destacado</span>` : '';
        const tipoEquipo = producto.es_seleccion == 1 ? `${SVGIcons.globe} Selección` : `${SVGIcons.shield} Club`;
        const jugadorInfo = producto.jugador ? `<div class="producto-jugador">${SVGIcons.user} ${producto.jugador} ${producto.numero_dorsal ? '#' + producto.numero_dorsal : ''}</div>` : '';
        
        return `
            <div class="producto-card">
                <div class="producto-header">
                    ${destacado}
                    <span class="badge-tipo">${tipoEquipo}</span>
                </div>
                <div class="producto-body">
                    <h3 class="producto-nombre">${this.resaltarTexto(producto.nombre_producto)}</h3>
                    <div class="producto-equipo">${this.resaltarTexto(producto.nombre_equipo)}</div>
                    ${jugadorInfo}
                    <div class="producto-detalles">
                        <span class="detalle-item">${SVGIcons.tag} ${producto.tipo_camiseta}</span>
                        <span class="detalle-item">${SVGIcons.ruler} ${producto.nombre_talla}</span>
                        <span class="detalle-item">${SVGIcons.calendar} ${producto.nombre_temporada}</span>
                    </div>
                    <div class="producto-marca">Por ${producto.nombre_marca}</div>
                </div>
                <div class="producto-footer">
                    <div class="producto-precio">
                        <span class="precio-valor">${parseFloat(producto.precio).toFixed(2)}€</span>
                    </div>
                    <div class="producto-stock ${stockClass}">
                        ${stockTexto}
                    </div>
                </div>
                <div class="producto-acciones">
                    <button class="btn-ver-detalle" onclick="verDetalleProducto(${producto.id_producto})">
                        Ver detalle
                    </button>
                </div>
            </div>
        `;
    }
    
    /**
     * Resaltar texto de búsqueda en resultados
     */
    resaltarTexto(texto) {
        if (!this.filtros.q || this.filtros.q.length < 2) {
            return texto;
        }
        
        const regex = new RegExp(`(${this.filtros.q})`, 'gi');
        return texto.replace(regex, '<mark>$1</mark>');
    }
    
    /**
     * Renderizar paginación
     */
    renderPaginacion(data) {
        let html = '<div class="paginacion">';
        
        // Botón anterior
        if (this.pagina > 1) {
            html += `<button class="btn-paginacion" onclick="buscador.irAPagina(${this.pagina - 1})">« Anterior</button>`;
        }
        
        // Páginas
        const inicio = Math.max(1, this.pagina - 2);
        const fin = Math.min(data.total_paginas, this.pagina + 2);
        
        if (inicio > 1) {
            html += `<button class="btn-paginacion" onclick="buscador.irAPagina(1)">1</button>`;
            if (inicio > 2) {
                html += `<span class="paginacion-ellipsis">...</span>`;
            }
        }
        
        for (let i = inicio; i <= fin; i++) {
            const activeClass = i === this.pagina ? 'active' : '';
            html += `<button class="btn-paginacion ${activeClass}" onclick="buscador.irAPagina(${i})">${i}</button>`;
        }
        
        if (fin < data.total_paginas) {
            if (fin < data.total_paginas - 1) {
                html += `<span class="paginacion-ellipsis">...</span>`;
            }
            html += `<button class="btn-paginacion" onclick="buscador.irAPagina(${data.total_paginas})">${data.total_paginas}</button>`;
        }
        
        // Botón siguiente
        if (this.pagina < data.total_paginas) {
            html += `<button class="btn-paginacion" onclick="buscador.irAPagina(${this.pagina + 1})">Siguiente »</button>`;
        }
        
        html += '</div>';
        
        // Info de paginación
        const desde = (this.pagina - 1) * this.por_pagina + 1;
        const hasta = Math.min(this.pagina * this.por_pagina, data.total_resultados);
        
        html += `
            <div class="paginacion-info">
                Mostrando ${desde}-${hasta} de ${data.total_resultados} productos
            </div>
        `;
        
        return html;
    }
    
    /**
     * Ir a una página específica
     */
    irAPagina(pagina) {
        this.pagina = pagina;
        this.realizarBusqueda();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    /**
     * Cambiar vista (grid/lista)
     */
    cambiarVista(vista) {
        this.vistaActual = vista;
        
        const btnGrid = document.getElementById('btn-vista-grid');
        const btnLista = document.getElementById('btn-vista-lista');
        
        if (btnGrid && btnLista) {
            btnGrid.classList.toggle('active', vista === 'grid');
            btnLista.classList.toggle('active', vista === 'lista');
        }
        
        const contenedorGrid = document.querySelector('.productos-grid');
        if (contenedorGrid) {
            contenedorGrid.className = `productos-grid vista-${vista}`;
        }
    }
    
    /**
     * Limpiar todos los filtros
     */
    limpiarFiltros() {
        // Resetear objeto de filtros
        this.filtros = {
            q: '',
            equipo: '',
            liga: '',
            marca: '',
            temporada: '',
            tipo: '',
            talla: '',
            precio_min: '',
            precio_max: '',
            solo_stock: false,
            destacados: false,
            es_seleccion: ''
        };
        
        // Limpiar inputs de texto
        const inputBusqueda = document.getElementById('busqueda-texto');
        if (inputBusqueda) inputBusqueda.value = '';
        
        const inputPrecioMin = document.getElementById('filtro-precio-min');
        if (inputPrecioMin) inputPrecioMin.value = '';
        
        const inputPrecioMax = document.getElementById('filtro-precio-max');
        if (inputPrecioMax) inputPrecioMax.value = '';
        
        // Limpiar selects
        document.querySelectorAll('.filtros-container select').forEach(select => {
            select.selectedIndex = 0;
        });
        
        // Limpiar checkboxes
        const checkSoloStock = document.getElementById('filtro-solo-stock');
        const checkDestacados = document.getElementById('filtro-destacados');
        if (checkSoloStock) checkSoloStock.checked = false;
        if (checkDestacados) checkDestacados.checked = false;
        
        // Limpiar radios
        const radioTodos = document.getElementById('radio-todos-equipos');
        if (radioTodos) radioTodos.checked = true;
        
        this.pagina = 1;
        this.realizarBusqueda();
    }
}

// =============================================
// FUNCIONES AUXILIARES
// =============================================

/**
 * Ver detalle de producto (modal o página)
 */
function verDetalleProducto(idProducto) {
    alert(`Ver detalle del producto ${idProducto}\n\nAquí puedes implementar un modal con la información completa del producto.`);
}

/**
 * Inicializar buscador cuando se carga la página
 */
let buscador;

document.addEventListener('DOMContentLoaded', () => {
    // Solo inicializar si estamos en la página de búsqueda
    if (document.getElementById('busqueda-texto')) {
        buscador = new BuscadorProductos();
    }
});

```
**buscar_productos.php**
```php
<?php
session_start();

// Cargar configuración
require_once 'config.php';

// =============================================
// API DE BÚSQUEDA DE PRODUCTOS
// Sistema profesional de búsqueda con filtros avanzados
// =============================================

// Verificar sesión
if (!isset($_SESSION['usuario'])) {
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

// Conexión a la base de datos
$conexion = obtener_conexion();
if (!$conexion) {
    http_response_code(500);
    echo json_encode(['error' => 'Error de conexión a la base de datos']);
    exit;
}

// =============================================
// PARÁMETROS DE BÚSQUEDA
// =============================================

$accion = $_GET['accion'] ?? 'buscar';

// Parámetros de búsqueda
$texto = $_GET['q'] ?? '';
$id_equipo = $_GET['equipo'] ?? '';
$id_liga = $_GET['liga'] ?? '';
$id_marca = $_GET['marca'] ?? '';
$id_temporada = $_GET['temporada'] ?? '';
$id_tipo_camiseta = $_GET['tipo'] ?? '';
$id_talla = $_GET['talla'] ?? '';
$precio_min = $_GET['precio_min'] ?? '';
$precio_max = $_GET['precio_max'] ?? '';
$solo_stock = isset($_GET['solo_stock']) && $_GET['solo_stock'] === '1';
$destacados = isset($_GET['destacados']) && $_GET['destacados'] === '1';
$es_seleccion = $_GET['es_seleccion'] ?? '';

// Parámetros de paginación y ordenamiento
$pagina = max(1, intval($_GET['pagina'] ?? 1));
$por_pagina = min(50, max(5, intval($_GET['por_pagina'] ?? 12)));
$orden_campo = $_GET['orden'] ?? 'p.fecha_creacion';
$orden_dir = (($_GET['dir'] ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

$offset = ($pagina - 1) * $por_pagina;

// =============================================
// FUNCIONES AUXILIARES
// =============================================

/**
 * Construir consulta SQL con filtros dinámicos
 */
function construir_consulta_busqueda($conexion, $filtros) {
    $sql = "SELECT 
        p.id_producto,
        p.codigo_producto,
        p.nombre_producto,
        p.descripcion,
        p.precio,
        p.stock,
        p.jugador,
        p.numero_dorsal,
        p.version_jugador,
        p.destacado,
        p.activo,
        p.fecha_creacion,
        
        e.nombre_equipo,
        e.nombre_completo as equipo_completo,
        e.es_seleccion,
        
        m.nombre_marca,
        
        t.nombre_temporada,
        t.ano_inicio,
        t.ano_fin,
        
        tc.nombre_tipo as tipo_camiseta,
        
        ta.nombre_talla,
        
        l.nombre_liga,
        
        pa.nombre_pais
        
    FROM productos p
    INNER JOIN equipos e ON p.id_equipo = e.id_equipo
    INNER JOIN marcas m ON p.id_marca = m.id_marca
    INNER JOIN temporadas t ON p.id_temporada = t.id_temporada
    INNER JOIN tipos_camiseta tc ON p.id_tipo_camiseta = tc.id_tipo_camiseta
    INNER JOIN tallas ta ON p.id_talla = ta.id_talla
    LEFT JOIN ligas l ON e.id_liga = l.id_liga
    LEFT JOIN paises pa ON e.id_pais = pa.id_pais
    WHERE 1=1";
    
    $condiciones = [];
    
    // Búsqueda por texto
    if (!empty($filtros['texto'])) {
        $texto_escapado = mysqli_real_escape_string($conexion, $filtros['texto']);
        $condiciones[] = "(
            p.nombre_producto LIKE '%{$texto_escapado}%' OR
            p.descripcion LIKE '%{$texto_escapado}%' OR
            p.codigo_producto LIKE '%{$texto_escapado}%' OR
            e.nombre_equipo LIKE '%{$texto_escapado}%' OR
            e.nombre_completo LIKE '%{$texto_escapado}%' OR
            m.nombre_marca LIKE '%{$texto_escapado}%' OR
            p.jugador LIKE '%{$texto_escapado}%'
        )";
    }
    
    // Filtro por equipo
    if (!empty($filtros['id_equipo'])) {
        $id_equipo = intval($filtros['id_equipo']);
        $condiciones[] = "p.id_equipo = {$id_equipo}";
    }
    
    // Filtro por liga
    if (!empty($filtros['id_liga'])) {
        $id_liga = intval($filtros['id_liga']);
        $condiciones[] = "e.id_liga = {$id_liga}";
    }
    
    // Filtro por marca
    if (!empty($filtros['id_marca'])) {
        $id_marca = intval($filtros['id_marca']);
        $condiciones[] = "p.id_marca = {$id_marca}";
    }
    
    // Filtro por temporada
    if (!empty($filtros['id_temporada'])) {
        $id_temporada = intval($filtros['id_temporada']);
        $condiciones[] = "p.id_temporada = {$id_temporada}";
    }
    
    // Filtro por tipo de camiseta
    if (!empty($filtros['id_tipo_camiseta'])) {
        $id_tipo = intval($filtros['id_tipo_camiseta']);
        $condiciones[] = "p.id_tipo_camiseta = {$id_tipo}";
    }
    
    // Filtro por talla
    if (!empty($filtros['id_talla'])) {
        $id_talla = intval($filtros['id_talla']);
        $condiciones[] = "p.id_talla = {$id_talla}";
    }
    
    // Filtro por rango de precio
    if (!empty($filtros['precio_min'])) {
        $precio_min = floatval($filtros['precio_min']);
        $condiciones[] = "p.precio >= {$precio_min}";
    }
    
    if (!empty($filtros['precio_max'])) {
        $precio_max = floatval($filtros['precio_max']);
        $condiciones[] = "p.precio <= {$precio_max}";
    }
    
    // Solo productos con stock
    if ($filtros['solo_stock']) {
        $condiciones[] = "p.stock > 0";
    }
    
    // Solo productos destacados
    if ($filtros['destacados']) {
        $condiciones[] = "p.destacado = 1";
    }
    
    // Filtro por selección nacional o club
    if ($filtros['es_seleccion'] !== '') {
        $es_seleccion = intval($filtros['es_seleccion']);
        $condiciones[] = "e.es_seleccion = {$es_seleccion}";
    }
    
    // Solo productos activos
    $condiciones[] = "p.activo = 1";
    
    // Agregar condiciones a la consulta
    if (!empty($condiciones)) {
        $sql .= " AND " . implode(" AND ", $condiciones);
    }
    
    return $sql;
}

/**
 * Obtener opciones para filtros
 */
function obtener_opciones_filtros($conexion) {
    $opciones = [];
    
    // Equipos
    $sql_equipos = "SELECT id_equipo, nombre_equipo, es_seleccion FROM equipos WHERE activo = 1 ORDER BY nombre_equipo";
    $result = mysqli_query($conexion, $sql_equipos);
    $opciones['equipos'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $opciones['equipos'][] = $row;
    }
    
    // Ligas
    $sql_ligas = "SELECT id_liga, nombre_liga FROM ligas WHERE activo = 1 ORDER BY nombre_liga";
    $result = mysqli_query($conexion, $sql_ligas);
    $opciones['ligas'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $opciones['ligas'][] = $row;
    }
    
    // Marcas
    $sql_marcas = "SELECT id_marca, nombre_marca FROM marcas WHERE activo = 1 ORDER BY nombre_marca";
    $result = mysqli_query($conexion, $sql_marcas);
    $opciones['marcas'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $opciones['marcas'][] = $row;
    }
    
    // Temporadas
    $sql_temporadas = "SELECT id_temporada, nombre_temporada FROM temporadas ORDER BY ano_inicio DESC";
    $result = mysqli_query($conexion, $sql_temporadas);
    $opciones['temporadas'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $opciones['temporadas'][] = $row;
    }
    
    // Tipos de camiseta
    $sql_tipos = "SELECT id_tipo_camiseta, nombre_tipo FROM tipos_camiseta ORDER BY nombre_tipo";
    $result = mysqli_query($conexion, $sql_tipos);
    $opciones['tipos'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $opciones['tipos'][] = $row;
    }
    
    // Tallas
    $sql_tallas = "SELECT id_talla, nombre_talla FROM tallas ORDER BY orden";
    $result = mysqli_query($conexion, $sql_tallas);
    $opciones['tallas'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $opciones['tallas'][] = $row;
    }
    
    // Rango de precios
    $sql_precios = "SELECT MIN(precio) as min, MAX(precio) as max FROM productos WHERE activo = 1";
    $result = mysqli_query($conexion, $sql_precios);
    $row = mysqli_fetch_assoc($result);
    $opciones['precio_min'] = floatval($row['min'] ?? 0);
    $opciones['precio_max'] = floatval($row['max'] ?? 0);
    
    return $opciones;
}

/**
 * Obtener estadísticas de búsqueda
 */
function obtener_estadisticas($conexion, $filtros) {
    $sql_base = construir_consulta_busqueda($conexion, $filtros);
    
    $sql_stats = "SELECT 
        COUNT(*) as total,
        AVG(p.precio) as precio_promedio,
        MIN(p.precio) as precio_minimo,
        MAX(p.precio) as precio_maximo,
        SUM(p.stock) as stock_total
    FROM productos p
    INNER JOIN equipos e ON p.id_equipo = e.id_equipo
    INNER JOIN marcas m ON p.id_marca = m.id_marca
    INNER JOIN temporadas t ON p.id_temporada = t.id_temporada
    INNER JOIN tipos_camiseta tc ON p.id_tipo_camiseta = tc.id_tipo_camiseta
    INNER JOIN tallas ta ON p.id_talla = ta.id_talla
    LEFT JOIN ligas l ON e.id_liga = l.id_liga
    LEFT JOIN paises pa ON e.id_pais = pa.id_pais
    WHERE 1=1";
    
    // Copiar las mismas condiciones
    preg_match('/WHERE 1=1(.*)$/s', $sql_base, $matches);
    if (isset($matches[1])) {
        $sql_stats .= $matches[1];
    }
    
    $result = mysqli_query($conexion, $sql_stats);
    return mysqli_fetch_assoc($result);
}

// =============================================
// PROCESAMIENTO DE ACCIONES
// =============================================

header('Content-Type: application/json; charset=utf-8');

switch ($accion) {
    case 'buscar':
        // Construir filtros
        $filtros = [
            'texto' => $texto,
            'id_equipo' => $id_equipo,
            'id_liga' => $id_liga,
            'id_marca' => $id_marca,
            'id_temporada' => $id_temporada,
            'id_tipo_camiseta' => $id_tipo_camiseta,
            'id_talla' => $id_talla,
            'precio_min' => $precio_min,
            'precio_max' => $precio_max,
            'solo_stock' => $solo_stock,
            'destacados' => $destacados,
            'es_seleccion' => $es_seleccion
        ];
        
        // Construir consulta base
        $sql_base = construir_consulta_busqueda($conexion, $filtros);
        
        // Obtener estadísticas
        $stats = obtener_estadisticas($conexion, $filtros);
        
        // Agregar ordenamiento y límite
        $campos_orden_validos = [
            'p.nombre_producto',
            'p.precio',
            'p.stock',
            'p.fecha_creacion',
            'e.nombre_equipo',
            'm.nombre_marca',
            't.nombre_temporada'
        ];
        
        if (!in_array($orden_campo, $campos_orden_validos)) {
            $orden_campo = 'p.fecha_creacion';
        }
        
        $sql_completa = $sql_base . " ORDER BY {$orden_campo} {$orden_dir} LIMIT {$offset}, {$por_pagina}";
        
        // Ejecutar consulta
        $result = mysqli_query($conexion, $sql_completa);
        
        if (!$result) {
            echo json_encode([
                'error' => 'Error en la consulta: ' . mysqli_error($conexion)
            ]);
            break;
        }
        
        $productos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = $row;
        }
        
        $total_resultados = intval($stats['total']);
        $total_paginas = ceil($total_resultados / $por_pagina);
        
        echo json_encode([
            'success' => true,
            'productos' => $productos,
            'total_resultados' => $total_resultados,
            'total_paginas' => $total_paginas,
            'pagina_actual' => $pagina,
            'por_pagina' => $por_pagina,
            'estadisticas' => [
                'total' => intval($stats['total']),
                'precio_promedio' => floatval($stats['precio_promedio'] ?? 0),
                'precio_minimo' => floatval($stats['precio_minimo'] ?? 0),
                'precio_maximo' => floatval($stats['precio_maximo'] ?? 0),
                'stock_total' => intval($stats['stock_total'] ?? 0)
            ]
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        break;
    
    case 'filtros':
        // Devolver opciones para los filtros
        $opciones = obtener_opciones_filtros($conexion);
        echo json_encode([
            'success' => true,
            'opciones' => $opciones
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        break;
    
    case 'autocompletar':
        // Autocompletado rápido
        if (strlen($texto) < 2) {
            echo json_encode(['sugerencias' => []]);
            break;
        }
        
        $texto_escapado = mysqli_real_escape_string($conexion, $texto);
        
        $sql = "SELECT DISTINCT
            p.nombre_producto,
            e.nombre_equipo,
            m.nombre_marca
        FROM productos p
        INNER JOIN equipos e ON p.id_equipo = e.id_equipo
        INNER JOIN marcas m ON p.id_marca = m.id_marca
        WHERE p.activo = 1 AND (
            p.nombre_producto LIKE '%{$texto_escapado}%' OR
            e.nombre_equipo LIKE '%{$texto_escapado}%' OR
            m.nombre_marca LIKE '%{$texto_escapado}%'
        )
        LIMIT 10";
        
        $result = mysqli_query($conexion, $sql);
        $sugerencias = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $sugerencias[] = [
                'producto' => $row['nombre_producto'],
                'equipo' => $row['nombre_equipo'],
                'marca' => $row['nombre_marca']
            ];
        }
        
        echo json_encode([
            'success' => true,
            'sugerencias' => $sugerencias
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        break;
    
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Acción no válida']);
        break;
}

cerrar_conexion($conexion);

```
**config.php**
```php
<?php
// =============================================
// TOTALKIT ERP - ARCHIVO DE CONFIGURACIÓN (EJEMPLO)
// =============================================
// INSTRUCCIONES:
// 1. Copia este archivo y renómbralo a "config.php"
// 2. Completa los valores con tus credenciales reales
// 3. NUNCA subas el archivo "config.php" a GitHub
// =============================================

// =============================================
// CONFIGURACIÓN DE BASE DE DATOS
// =============================================
define('DB_HOST', 'localhost');              // Servidor de base de datos
define('DB_NAME', 'tienda_camisetas');       // Nombre de la base de datos
define('DB_USER', 'agus');             // Usuario de la base de datos
define('DB_PASS', 'agus');          // Contraseña de la base de datos

// =============================================
// CREDENCIALES DE LOGIN
// =============================================
define('LOGIN_USUARIO', 'admin');            // Usuario para acceder al ERP
define('LOGIN_PASSWORD', 'admin123');        // Contraseña para acceder al ERP

// =============================================
// CONFIGURACIÓN GENERAL
// =============================================
define('APP_NAME', 'TotalKit ERP');
define('APP_VERSION', '1.0.0');
define('TIMEZONE', 'Europe/Madrid');         // Zona horaria

// Establecer zona horaria
date_default_timezone_set(TIMEZONE);

// =============================================
// FUNCIÓN DE CONEXIÓN A BASE DE DATOS
// =============================================

/**
 * Crear conexión a la base de datos
 * @return mysqli|false Objeto de conexión o false en caso de error
 */
function obtener_conexion() {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (!$conexion) {
        error_log("Error de conexión a la base de datos: " . mysqli_connect_error());
        return false;
    }
    
    mysqli_set_charset($conexion, "utf8");
    
    return $conexion;
}

/**
 * Cerrar conexión a la base de datos de forma segura
 * @param mysqli $conexion Objeto de conexión
 */
function cerrar_conexion($conexion) {
    if ($conexion && $conexion instanceof mysqli) {
        mysqli_close($conexion);
    }
}

```
**estilos.css**
```css
/* =============================================
   TOTALKIT ERP - SISTEMA DE GESTIÓN
   Diseño minimalista y profesional
   ============================================= */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

/* =============================================
   VARIABLES CSS - PALETA PERSONALIZADA
   ============================================= */
:root {
    /* Paleta de colores personalizada */
    --color-primary: #6f8f72;
    --color-primary-hover: #99af9a;
    --color-primary-light: #c4cfc5;
    --color-accent: #f2a65a;
    --color-accent-light: #f6be8c;
    --color-accent-pale: #f6d7be;
    
    /* Colores de estado */
    --color-success: #6f8f72;
    --color-danger: #d87a68;
    --color-warning: #f2a65a;
    --color-info: #99af9a;
    
    /* Colores de fondo */
    --bg-main: #f1f1f1;
    --bg-secondary: #E8E2D8;
    --bg-card: #ffffff;
    --bg-sidebar: #6f8f72;
    
    /* Colores de texto */
    --text-primary: #2d3436;
    --text-secondary: #636e72;
    --text-light: #95a5a6;
    --text-white: #ffffff;
    
    /* Bordes */
    --border-color: #c4cfc5;
    --border-light: #E8E2D8;
    
    /* Sombras sutiles */
    --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.04);
    --shadow-md: 0 2px 8px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 4px 12px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 8px 24px rgba(0, 0, 0, 0.12);
    
    /* Bordes redondeados */
    --radius-sm: 4px;
    --radius-md: 6px;
    --radius-lg: 8px;
    --radius-xl: 12px;
    --radius-full: 9999px;
    
    /* Espaciado */
    --spacing-xs: 0.5rem;
    --spacing-sm: 0.75rem;
    --spacing-md: 1rem;
    --spacing-lg: 1.5rem;
    --spacing-xl: 2rem;
    --spacing-2xl: 3rem;
    
    /* Transiciones suaves */
    --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
    --transition-base: 200ms cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: 300ms cubic-bezier(0.4, 0, 0.2, 1);
}

/* =============================================
   RESET Y BASE
   ============================================= */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    width: 100%;
    height: 100%;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    font-size: 16px;
    line-height: 1.6;
    color: var(--text-primary);
    background-color: var(--bg-main);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* =============================================
   PANTALLA DE LOGIN
   ============================================= */
.login-container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: var(--bg-secondary);
    padding: var(--spacing-lg);
}

.login-box {
    background: var(--bg-card);
    padding: var(--spacing-2xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
    width: 100%;
    max-width: 420px;
    border: 1px solid var(--border-light);
}

.login-header {
    text-align: center;
    margin-bottom: var(--spacing-2xl);
}

.logo-circle {
    width: 72px;
    height: 72px;
    background-color: var(--color-primary);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.25rem;
    margin: 0 auto var(--spacing-lg);
    box-shadow: var(--shadow-sm);
}

.logo-circle svg {
    width: 100%;
    height: 100%;
}

.login-header h1 {
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--spacing-sm);
    letter-spacing: -0.02em;
}

.login-header p {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 400;
}

.error-message {
    background-color: #fef2f0;
    color: #c54a3a;
    padding: var(--spacing-md);
    border-radius: var(--radius-md);
    margin-bottom: var(--spacing-lg);
    font-size: 0.875rem;
    border: 1px solid #f5c6c0;
    font-weight: 500;
}

.form-group {
    margin-bottom: var(--spacing-lg);
}

.form-group label {
    display: block;
    font-weight: 500;
    color: var(--text-primary);
    margin-bottom: var(--spacing-sm);
    font-size: 0.9375rem;
}

.form-group input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.9375rem;
    transition: all var(--transition-base);
    font-family: inherit;
    background-color: var(--bg-card);
    color: var(--text-primary);
}

.form-group input:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(111, 143, 114, 0.1);
}

.btn-primary {
    width: 100%;
    padding: 0.875rem;
    background-color: var(--color-primary);
    color: var(--text-white);
    border: none;
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-base);
    letter-spacing: 0.01em;
    text-transform: uppercase;
    font-size: 0.875rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
}

.btn-primary svg {
    flex-shrink: 0;
}

.btn-primary:hover {
    background-color: var(--color-primary-hover);
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
}

.btn-primary:active {
    transform: translateY(0);
}

.login-hint {
    margin-top: var(--spacing-xl);
    padding: var(--spacing-md);
    background-color: var(--bg-secondary);
    border-radius: var(--radius-md);
    font-size: 0.8125rem;
    color: var(--text-secondary);
    text-align: center;
    border: 1px solid var(--border-light);
}

.login-hint strong {
    color: var(--color-primary);
    font-weight: 600;
}

/* =============================================
   LAYOUT PRINCIPAL ERP
   ============================================= */
.erp-container {
    display: flex;
    height: 100vh;
    overflow: hidden;
}

/* =============================================
   SIDEBAR
   ============================================= */
.sidebar {
    width: 280px;
    background-color: var(--bg-sidebar);
    color: var(--text-white);
    display: flex;
    flex-direction: column;
    box-shadow: var(--shadow-md);
    z-index: 100;
    overflow-y: auto;
}

.sidebar-header {
    padding: var(--spacing-xl);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
}

.sidebar-header .logo-circle {
    width: 56px;
    height: 56px;
    font-size: 1.75rem;
    margin: 0 auto var(--spacing-md);
    background-color: rgba(255, 255, 255, 0.15);
}

.sidebar-header .logo-circle svg {
    width: 100%;
    height: 100%;
}

.sidebar-header h2 {
    font-size: 1.375rem;
    font-weight: 600;
    margin-bottom: var(--spacing-xs);
    letter-spacing: 0.02em;
}

.user-info {
    font-size: 0.8125rem;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 400;
}

.sidebar-nav {
    flex: 1;
    padding: var(--spacing-lg);
    overflow-y: auto;
}

.sidebar-nav h3 {
    font-size: 0.6875rem;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin: var(--spacing-xl) 0 var(--spacing-md);
    padding-bottom: var(--spacing-xs);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-nav h3:first-child {
    margin-top: 0;
}

.nav-item {
    display: block;
    padding: 0.625rem 1rem;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    border-radius: var(--radius-md);
    margin-bottom: var(--spacing-xs);
    transition: all var(--transition-base);
    font-size: 0.875rem;
    font-weight: 400;
    border-left: 3px solid transparent;
}

.nav-item:hover {
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--text-white);
    border-left-color: var(--color-accent);
}

.nav-item.active {
    background-color: var(--color-accent);
    color: var(--text-white);
    font-weight: 500;
    border-left-color: var(--color-accent-light);
}

/* Wrapper para nav-item con botón de crear */
.nav-item-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.nav-item-wrapper .nav-item {
    flex: 1;
    margin-bottom: 0;
}

.btn-crear-sidebar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background-color: var(--color-accent);
    color: var(--text-white);
    border-radius: var(--radius-md);
    text-decoration: none;
    font-size: 1rem;
    transition: all var(--transition-base);
    flex-shrink: 0;
}

.btn-crear-sidebar svg {
    display: block;
}

.btn-crear-sidebar:hover {
    background-color: var(--color-accent-light);
    transform: scale(1.1);
}

.nav-item-wrapper {
    margin-bottom: var(--spacing-xs);
}

.sidebar-footer {
    padding: var(--spacing-lg);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-copyright {
    margin-top: var(--spacing-lg);
    text-align: center;
    font-size: 0.6875rem;
    color: rgba(255, 255, 255, 0.4);
    line-height: 1.6;
}

.sidebar-copyright p {
    margin: 0.25rem 0;
}

.btn-logout {
    display: block;
    width: 100%;
    padding: 0.75rem;
    background-color: rgba(216, 122, 104, 0.15);
    color: #f8b9ad;
    text-align: center;
    text-decoration: none;
    border-radius: var(--radius-md);
    font-weight: 600;
    transition: all var(--transition-base);
    border: 1px solid rgba(216, 122, 104, 0.2);
    font-size: 0.875rem;
    text-transform: uppercase;
}

.btn-logout:hover {
    background-color: #d87a68;
    color: var(--text-white);
    border-color: #d87a68;
}

/* =============================================
   CONTENIDO PRINCIPAL
   ============================================= */
.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.content-header {
    background-color: var(--bg-card);
    padding: var(--spacing-2xl) var(--spacing-xl);
    box-shadow: var(--shadow-sm);
    border-bottom: 1px solid var(--border-light);
}

.content-header h1 {
    font-size: 1.875rem;
    font-weight: 600;
    color: var(--text-primary);
    letter-spacing: -0.02em;
}

.content-body {
    flex: 1;
    overflow-y: auto;
    padding: var(--spacing-2xl);
    background-color: var(--bg-main);
}

/* =============================================
   DASHBOARD
   ============================================= */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-xl);
    margin-bottom: var(--spacing-2xl);
}

.stat-card {
    background-color: var(--bg-card);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
    transition: all var(--transition-base);
    border: 1px solid var(--border-light);
    border-top: 3px solid var(--color-primary);
    position: relative;
}

.stat-card:hover {
    box-shadow: var(--shadow-md);
    border-color: var(--border-color);
}

.stat-icon {
    width: 56px;
    height: 56px;
    background-color: var(--color-primary);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
    color: var(--text-white);
    font-weight: 600;
    letter-spacing: -0.02em;
}

.stat-card .stat-icon svg {
    width: 24px;
    height: 24px;
}

.stat-card:nth-child(2) {
    border-top-color: var(--color-accent);
}

.stat-card:nth-child(3) {
    border-top-color: var(--color-primary-hover);
}

.stat-card:nth-child(4) {
    border-top-color: var(--color-accent-light);
}

.stat-card:nth-child(2) .stat-icon {
    background-color: var(--color-accent);
    font-size: 1.125rem;
}

.stat-card:nth-child(3) .stat-icon {
    background-color: var(--color-primary-hover);
    font-size: 1.125rem;
}

.stat-card:nth-child(4) .stat-icon {
    background-color: var(--color-accent-light);
    font-size: 1.5rem;
}

.stat-info h3 {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--text-secondary);
    margin-bottom: var(--spacing-xs);
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.stat-number {
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--text-primary);
    letter-spacing: -0.02em;
}

/* =============================================
   GRÁFICOS
   ============================================= */
.charts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: var(--spacing-xl);
    margin-bottom: var(--spacing-2xl);
}

.chart-container {
    background-color: var(--bg-card);
    padding: var(--spacing-2xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-light);
    border-top: 3px solid var(--color-primary);
}

.chart-container h3 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--spacing-lg);
    letter-spacing: -0.01em;
    padding-bottom: var(--spacing-sm);
    border-bottom: 2px solid var(--border-light);
}

.chart-pie-wrapper {
    display: flex;
    gap: var(--spacing-xl);
    align-items: center;
    flex-wrap: wrap;
}

.chart-pie {
    position: relative;
    width: 200px;
    height: 200px;
}

.donut {
    width: 100%;
    height: 100%;
    transform: rotate(-90deg);
}

.donut-ring {
    fill: none;
    stroke: var(--border-light);
    stroke-width: 3;
}

.donut-segment {
    fill: none;
    stroke-width: 3;
    transition: stroke-width var(--transition-base);
}

.donut-segment.segment-0 { stroke: #6f8f72; }
.donut-segment.segment-1 { stroke: #f2a65a; }
.donut-segment.segment-2 { stroke: #99af9a; }
.donut-segment.segment-3 { stroke: #f6be8c; }
.donut-segment.segment-4 { stroke: #c4cfc5; }
.donut-segment.segment-5 { stroke: #f6d7be; }
.donut-segment.segment-6 { stroke: #BFC6C4; }
.donut-segment.segment-7 { stroke: #d87a68; }

.donut-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.donut-total {
    display: block;
    font-size: 2rem;
    font-weight: 600;
    color: var(--text-primary);
    letter-spacing: -0.02em;
}

.donut-label {
    display: block;
    font-size: 0.75rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.chart-legend {
    list-style: none;
    flex: 1;
    min-width: 200px;
}

.chart-legend li {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm);
    border-radius: var(--radius-sm);
    transition: background-color var(--transition-fast);
}

.chart-legend li:hover {
    background-color: var(--bg-secondary);
}

.legend-color {
    width: 16px;
    height: 16px;
    border-radius: var(--radius-sm);
    flex-shrink: 0;
}

.legend-label {
    flex: 1;
    font-size: 0.875rem;
    color: var(--text-primary);
}

.legend-value {
    font-weight: 600;
    color: var(--text-secondary);
    font-size: 0.875rem;
}

/* =============================================
   SECCIONES
   ============================================= */
.section {
    background-color: var(--bg-card);
    padding: var(--spacing-2xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    margin-bottom: var(--spacing-2xl);
    border: 1px solid var(--border-light);
    border-top: 3px solid var(--color-primary);
}

.section h2 {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--spacing-lg);
    letter-spacing: -0.01em;
    padding-bottom: var(--spacing-sm);
    border-bottom: 2px solid var(--border-light);
}

/* =============================================
   TABLAS
   ============================================= */
.table-wrapper {
    overflow-x: auto;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-light);
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.data-table thead {
    background-color: var(--color-primary);
    color: var(--text-white);
}

.data-table th {
    padding: 1rem 1rem;
    text-align: left;
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.data-table tbody tr {
    border-bottom: 1px solid var(--border-light);
    transition: background-color var(--transition-fast);
}

.data-table tbody tr:hover {
    background-color: var(--bg-secondary);
}

.data-table tbody tr:last-child {
    border-bottom: none;
}

.data-table td {
    padding: 0.875rem 1rem;
    color: var(--text-primary);
}

/* Columna de acciones en tablas */
.actions-column {
    text-align: center;
    white-space: nowrap;
    width: 120px;
}

.btn-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.375rem 0.625rem;
    margin: 0 0.25rem;
    font-size: 1.25rem;
    text-decoration: none;
    border-radius: var(--radius-sm);
    transition: all var(--transition-fast);
    cursor: pointer;
}

.btn-action svg {
    display: block;
}

.btn-action:hover {
    transform: scale(1.15);
}

.btn-edit {
    color: var(--color-primary);
}

.btn-edit:hover {
    background-color: rgba(111, 143, 114, 0.1);
}

.btn-delete {
    color: var(--color-danger);
}

.btn-delete:hover {
    background-color: rgba(216, 122, 104, 0.1);
}

.btn-report {
    color: #2563eb; /* Azul oscuro */
}

.btn-report:hover {
    background-color: rgba(37, 99, 235, 0.1);
}

.no-data {
    text-align: center;
    padding: var(--spacing-2xl) var(--spacing-xl);
    color: var(--text-secondary);
    font-size: 0.9375rem;
    background-color: var(--bg-secondary);
    border-radius: var(--radius-md);
    font-weight: 400;
}

/* =============================================
   VISTA DE TARJETAS
   ============================================= */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: var(--spacing-lg);
    margin-top: var(--spacing-lg);
}

.data-card {
    display: flex;
    flex-direction: column;
    background-color: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
    overflow: hidden;
}

.data-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.card-body {
    flex: 1;
    padding: var(--spacing-lg);
}

.card-field {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: var(--spacing-sm) 0;
    border-bottom: 1px solid var(--border-light);
    gap: var(--spacing-md);
}

.card-field:last-child {
    border-bottom: none;
}

.field-label {
    font-weight: 600;
    color: var(--text-secondary);
    font-size: 0.8125rem;
    text-transform: uppercase;
    letter-spacing: 0.025em;
    flex-shrink: 0;
    min-width: 100px;
}

.field-value {
    color: var(--text-primary);
    font-size: 0.9375rem;
    text-align: right;
    word-break: break-word;
}

.card-actions {
    display: flex;
    gap: 0.5rem;
    padding: var(--spacing-md) var(--spacing-lg);
    background-color: var(--bg-secondary);
    border-top: 1px solid var(--border-light);
}

.card-actions .btn-action {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.375rem;
    padding: 0.5rem;
    background-color: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-md);
    font-size: 0.8125rem;
    font-weight: 500;
    text-decoration: none;
    transition: all var(--transition-fast);
}

.card-actions .btn-action:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
}

.card-actions .btn-action svg {
    width: 16px;
    height: 16px;
}

/* =============================================
   FORMULARIOS
   ============================================= */
.table-section {
    display: grid;
    gap: var(--spacing-xl);
}

.insert-form,
.data-view,
.reporte-container {
    background-color: var(--bg-card);
    padding: var(--spacing-2xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-light);
    border-top: 3px solid var(--color-primary);
}
.insert-form {
    border-top: 3px solid var(--color-accent);
}
/* Estilos específicos del reporte */
.reporte-container {
    border-top-color: #2563eb; /* Azul oscuro */
}

.reporte-seccion {
    margin-bottom: var(--spacing-2xl);
    padding-bottom: var(--spacing-2xl);
    border-bottom: 1px solid var(--border-light);
}

.reporte-seccion:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.reporte-seccion h3 {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1.25rem;
    color: var(--text-primary);
    margin-bottom: var(--spacing-lg);
    font-weight: 600;
}

.reporte-item {
    margin-bottom: var(--spacing-xl);
    padding: var(--spacing-lg);
    background-color: var(--bg-secondary);
    border-radius: var(--radius-md);
    border-left: 3px solid #2563eb;
}

.reporte-item:last-child {
    margin-bottom: 0;
}

.reporte-item h4 {
    font-size: 1rem;
    color: var(--text-primary);
    margin-bottom: var(--spacing-md);
    font-weight: 600;
}

/* Header de formulario con botón cancelar */
.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-xl);
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.form-header h2 svg {
    flex-shrink: 0;
}

.btn-cancelar {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background-color: var(--bg-secondary);
    color: var(--text-primary);
    text-decoration: none;
    border-radius: var(--radius-md);
    font-weight: 500;
    font-size: 0.875rem;
    transition: all var(--transition-base);
}

.btn-cancelar svg {
    flex-shrink: 0;
    color: var(--text-primary);
    text-decoration: none;
    border-radius: var(--radius-md);
    font-weight: 500;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.data-header h2 svg {
    flex-shrink: 0;
    transition: all var(--transition-base);
}

.btn-cancelar:hover {
    background-color: var(--color-danger);
    color: var(--text-white);
}

/* Header de vista de datos */
.data-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-xl);
    padding-bottom: var(--spacing-md);
    border-bottom: 2px solid var(--border-light);
}

.data-header h2 {
    margin: 0;
}

/* Botones de alternancia de vista */
.vista-botones {
    display: flex;
    gap: 0.5rem;
}

.btn-vista {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background-color: var(--bg-secondary);
    color: var(--text-secondary);
    text-decoration: none;
    border-radius: var(--radius-md);
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s ease;
    border: 1px solid var(--border-light);
}

.btn-vista:hover {
    background-color: var(--bg-tertiary);
    color: var(--text-primary);
    border-color: var(--color-primary);
}

.btn-vista.active {
    background-color: var(--color-primary);
    color: var(--text-white);
    border-color: var(--color-primary);
}

.btn-vista svg {
    flex-shrink: 0;
}

/* Mensajes del sistema */
.mensaje-exito,
.mensaje-error {
    padding: 1rem 1.5rem;
    border-radius: var(--radius-md);
    margin-bottom: var(--spacing-xl);
    font-weight: 500;
    font-size: 0.9375rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    box-shadow: var(--shadow-sm);
}

.mensaje-exito svg,
.mensaje-error svg {
    flex-shrink: 0;
}

.mensaje-exito {
    background-color: rgba(111, 143, 114, 0.1);
    color: var(--color-success);
    border-left: 4px solid var(--color-success);
}

.mensaje-error {
    background-color: rgba(216, 122, 104, 0.1);
    color: var(--color-danger);
    border-left: 4px solid var(--color-danger);
}

.insert-form h2,
.data-view h2 {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--spacing-lg);
    letter-spacing: -0.01em;
    padding-bottom: var(--spacing-sm);
    border-bottom: 2px solid var(--border-light);
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-xl);
}

.form-field {
    display: flex;
    flex-direction: column;
}

.form-field label {
    font-weight: 500;
    color: var(--text-primary);
    margin-bottom: var(--spacing-sm);
    font-size: 0.875rem;
    letter-spacing: 0.01em;
}

.form-field input,
.form-field select,
.form-field textarea {
    width: 100%;
    padding: 0.625rem 0.875rem;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.875rem;
    font-family: inherit;
    transition: all var(--transition-base);
    background-color: var(--bg-card);
}

.form-field input:focus,
.form-field select:focus,
.form-field textarea:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(111, 143, 114, 0.1);
}

.form-field input[type="checkbox"] {
    width: auto;
    cursor: pointer;
}

.form-field textarea {
    resize: vertical;
    min-height: 80px;
}

/* =============================================
   RESPONSIVE
   ============================================= */
@media (max-width: 1024px) {
    .charts-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .erp-container {
        flex-direction: column;
    }
    
    .sidebar {
        width: 100%;
        max-height: 60vh;
    }
    
    .dashboard-grid {
        grid-template-columns: 1fr;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .chart-pie-wrapper {
        flex-direction: column;
    }
}

/* =============================================
   ANIMACIONES
   ============================================= */
@keyframes spin {
    to { transform: rotate(360deg); }
}

/* =============================================
   ICONOS SVG
   ============================================= */
svg {
    display: inline-block;
    vertical-align: middle;
}

.stat-icon svg,
.detalle-item svg,
.badge-destacado svg,
.badge-tipo svg,
.producto-jugador svg,
.no-results-icon svg {
    margin-right: 0.25rem;
}

.stat-icon {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.no-results-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: var(--spacing-lg);
    opacity: 0.3;
}

.no-results-icon svg {
    width: 48px;
    height: 48px;
}

/* =============================================
   SCROLLBAR PERSONALIZADO
   ============================================= */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: var(--bg-secondary);
}

::-webkit-scrollbar-thumb {
    background: var(--border-color);
    border-radius: var(--radius-full);
}

::-webkit-scrollbar-thumb:hover {
    background: var(--color-primary-hover);
}
/* =============================================
   SISTEMA DE BÚSQUEDA DE PRODUCTOS
   ============================================= */

/* Contenedor principal de búsqueda */
.search-container {
    background-color: var(--bg-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-light);
    border-top: 3px solid var(--color-primary);
    margin-bottom: var(--spacing-xl);
}

.search-header {
    padding: var(--spacing-xl);
    border-bottom: 1px solid var(--border-light);
}

.search-header h2 {
    font-size: 1.375rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--spacing-md);
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    letter-spacing: -0.01em;
    padding-bottom: var(--spacing-sm);
    border-bottom: 2px solid var(--border-light);
}

/* Barra de búsqueda principal */
.search-bar {
    display: flex;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-lg);
}

.search-input-wrapper {
    flex: 1;
    position: relative;
}

.search-input-wrapper input {
    width: 100%;
    padding: 0.875rem 1rem 0.875rem 2.75rem;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 1rem;
    transition: all var(--transition-base);
    background-color: var(--bg-card);
}

.search-input-wrapper input:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(111, 143, 114, 0.1);
    background-color: var(--bg-card);
}

.search-input-wrapper::before {
    content: '';
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="%236f8f72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>');
    background-size: contain;
    background-repeat: no-repeat;
    pointer-events: none;
}

.btn-limpiar {
    padding: 0.875rem 1.5rem;
    background-color: var(--bg-secondary);
    color: var(--text-secondary);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-base);
    font-size: 0.875rem;
    white-space: nowrap;
    text-transform: uppercase;
}

.btn-limpiar:hover {
    background-color: var(--border-color);
    color: var(--text-primary);
    border-color: var(--color-primary);
}

/* Filtros */
.filtros-container {
    padding: var(--spacing-xl);
    background-color: var(--bg-secondary);
    border-radius: var(--radius-md);
}

.filtros-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    padding: var(--spacing-md);
    background-color: var(--bg-card);
    border-radius: var(--radius-md);
    margin-bottom: var(--spacing-lg);
    transition: all var(--transition-base);
    border: 1px solid var(--border-light);
}

.filtros-toggle:hover {
    border-color: var(--border-color);
}

.filtros-toggle h3 {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
}

.filtros-content {
    transition: all var(--transition-base);
}

.filtros-content.hidden {
    display: none;
}

.filtros-toggle .toggle-icon {
    transition: transform var(--transition-base);
    display: inline-flex;
    align-items: center;
}

.filtros-toggle .toggle-icon.rotated {
    transform: rotate(180deg);
}

.filtros-toggle .toggle-icon svg {
    color: var(--text-secondary);
    width: 16px;
    height: 16px;
}

.filtros-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-lg);
}

.filtro-grupo {
    display: flex;
    flex-direction: column;
}

.filtro-grupo label {
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--text-secondary);
    margin-bottom: var(--spacing-xs);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.filtro-grupo select,
.filtro-grupo input[type="number"] {
    padding: 0.625rem 0.875rem;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.875rem;
    background-color: var(--bg-card);
    transition: all var(--transition-base);
    font-family: inherit;
}

.filtro-grupo select:focus,
.filtro-grupo input[type="number"]:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(111, 143, 114, 0.1);
}

/* Filtros de precio */
.precio-range {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-sm);
}

/* Checkboxes */
.filtros-checks {
    display: flex;
    gap: var(--spacing-xl);
    margin-top: var(--spacing-md);
    flex-wrap: wrap;
}

.check-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    cursor: pointer;
}

.check-item input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: var(--color-primary);
}

.check-item label {
    font-size: 0.875rem;
    color: var(--text-primary);
    cursor: pointer;
    user-select: none;
}

/* Radio buttons para tipo de equipo */
.radio-group {
    display: flex;
    gap: var(--spacing-md);
    margin-top: var(--spacing-sm);
}

.radio-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
}

.radio-item input[type="radio"] {
    width: 16px;
    height: 16px;
    cursor: pointer;
    accent-color: var(--color-primary);
}

.radio-item label {
    font-size: 0.875rem;
    color: var(--text-primary);
    cursor: pointer;
}

/* Controles de vista y ordenamiento */
.search-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--spacing-lg) var(--spacing-xl);
    background-color: var(--bg-card);
    border-bottom: 1px solid var(--border-light);
    flex-wrap: wrap;
    gap: var(--spacing-md);
}

.view-controls {
    display: flex;
    gap: var(--spacing-sm);
}

.btn-view {
    padding: 0.625rem 1rem;
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all var(--transition-base);
    font-size: 1.125rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-view svg {
    width: 16px;
    height: 16px;
}

.btn-view:hover {
    border-color: var(--border-color);
}

.btn-view.active {
    background-color: var(--color-primary);
    color: var(--text-white);
    border-color: var(--color-primary);
}

.sort-controls {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.sort-controls label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-secondary);
}

.sort-controls select {
    padding: 0.625rem 0.875rem;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.875rem;
    background-color: var(--bg-card);
    cursor: pointer;
}

/* Estadísticas de búsqueda */
.estadisticas-busqueda {
    display: flex;
    gap: var(--spacing-xl);
    padding: var(--spacing-lg) var(--spacing-xl);
    background-color: var(--bg-secondary);
    border-bottom: 1px solid var(--border-light);
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.stat-item .stat-icon {
    font-size: 1.25rem;
    display: inline-flex;
    align-items: center;
    color: var(--bg-main);
}

.stat-item .stat-icon svg {
    width: 20px;
    height: 20px;
}

.stat-item .stat-label {
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.stat-item .stat-value {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--color-primary);
}

/* Resultados */
.resultados-container {
    padding: var(--spacing-xl);
}

/* Grid de productos */
.productos-grid {
    display: grid;
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-xl);
}

.productos-grid.vista-grid {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
}

.productos-grid.vista-lista {
    grid-template-columns: 1fr;
}

/* Card de producto */
.producto-card {
    background-color: var(--bg-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-light);
    overflow: hidden;
    transition: all var(--transition-base);
    display: flex;
    flex-direction: column;
}

.producto-card:hover {
    box-shadow: var(--shadow-md);
    border-color: var(--color-primary);
}

.vista-lista .producto-card {
    flex-direction: row;
}

.producto-header {
    padding: var(--spacing-md);
    background-color: var(--bg-secondary);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--spacing-sm);
}

.vista-lista .producto-header {
    flex-direction: column;
    align-items: flex-start;
    min-width: 120px;
}

.badge-destacado {
    background-color: var(--color-accent);
    color: var(--text-white);
    padding: 0.25rem 0.625rem;
    border-radius: var(--radius-full);
    font-size: 0.6875rem;
    font-weight: 600;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.badge-destacado svg {
    width: 12px;
    height: 12px;
}

.badge-tipo {
    background-color: var(--color-primary);
    color: var(--text-white);
    padding: 0.25rem 0.625rem;
    border-radius: var(--radius-full);
    font-size: 0.6875rem;
    font-weight: 600;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.badge-tipo svg {
    width: 12px;
    height: 12px;
}

.producto-body {
    padding: var(--spacing-lg);
    flex: 1;
}

.vista-lista .producto-body {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.producto-nombre {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--spacing-xs);
    line-height: 1.5;
}

.producto-equipo {
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin-bottom: var(--spacing-sm);
    font-weight: 500;
}

.producto-jugador {
    font-size: 0.8125rem;
    color: var(--color-primary);
    margin-bottom: var(--spacing-sm);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.producto-jugador svg {
    width: 14px;
    height: 14px;
}

.producto-detalles {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-sm);
}

.detalle-item {
    font-size: 0.75rem;
    color: var(--text-secondary);
    background-color: var(--bg-secondary);
    padding: 0.25rem 0.5rem;
    border-radius: var(--radius-sm);
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.detalle-item svg {
    width: 12px;
    height: 12px;
    opacity: 0.7;
}

.producto-marca {
    font-size: 0.8125rem;
    color: var(--text-light);
    font-style: italic;
}

.producto-footer {
    padding: var(--spacing-lg);
    border-top: 1px solid var(--border-light);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.vista-lista .producto-footer {
    flex-direction: column;
    align-items: flex-end;
    padding: var(--spacing-md);
    min-width: 150px;
}

.producto-precio {
    display: flex;
    align-items: baseline;
    gap: var(--spacing-xs);
}

.precio-valor {
    font-size: 1.375rem;
    font-weight: 600;
    color: var(--color-primary);
    letter-spacing: -0.01em;
}

.producto-stock {
    font-size: 0.8125rem;
    font-weight: 600;
    padding: 0.375rem 0.75rem;
    border-radius: var(--radius-full);
}

.producto-stock.stock-alto {
    background-color: #e8f5e9;
    color: #2e7d32;
}

.producto-stock.stock-medio {
    background-color: #fff3e0;
    color: #e65100;
}

.producto-stock.stock-bajo {
    background-color: #fef2f0;
    color: #c54a3a;
}

.producto-acciones {
    padding: 0 var(--spacing-lg) var(--spacing-lg);
}

.vista-lista .producto-acciones {
    padding: var(--spacing-md);
    min-width: 150px;
}

.btn-ver-detalle {
    width: 100%;
    padding: 0.75rem;
    background-color: var(--color-primary);
    color: var(--text-white);
    border: none;
    border-radius: var(--radius-md);
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-base);
    font-size: 0.8125rem;
    text-transform: uppercase;
}

.btn-ver-detalle:hover {
    background-color: var(--color-primary-hover);
}

/* Resaltado de texto en búsqueda */
mark {
    background-color: #fff3e0;
    color: #e65100;
    padding: 0.125rem 0.25rem;
    border-radius: 0.125rem;
    font-weight: 600;
}

/* Estados de carga y error */
.loading-search,
.error-search,
.no-results {
    text-align: center;
    padding: var(--spacing-xl) * 2;
}

.spinner {
    width: 50px;
    height: 50px;
    border: 4px solid var(--border-light);
    border-top-color: var(--color-primary);
    border-radius: var(--radius-full);
    animation: spin 1s linear infinite;
    margin: 0 auto var(--spacing-md);
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.loading-search p,
.error-search p {
    font-size: 1rem;
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.error-search p svg {
    color: var(--color-danger);
    width: 16px;
    height: 16px;
}

.no-results h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--spacing-sm);
}

.no-results p {
    font-size: 1rem;
    color: var(--text-secondary);
}

/* Paginación */
.paginacion {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: var(--spacing-sm);
    margin-top: var(--spacing-xl);
    flex-wrap: wrap;
}

.btn-paginacion {
    padding: 0.625rem 1rem;
    background-color: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all var(--transition-base);
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--text-primary);
}

.btn-paginacion:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
}

.btn-paginacion.active {
    background-color: var(--color-primary);
    color: var(--text-white);
    border-color: var(--color-primary);
    font-weight: 600;
}

.paginacion-ellipsis {
    color: var(--text-secondary);
    padding: 0 var(--spacing-xs);
}

.paginacion-info {
    text-align: center;
    margin-top: var(--spacing-md);
    font-size: 0.875rem;
    color: var(--text-secondary);
}

/* Responsive para búsqueda */
@media (max-width: 768px) {
    .search-bar {
        flex-direction: column;
    }
    
    .filtros-grid {
        grid-template-columns: 1fr;
    }
    
    .search-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .view-controls,
    .sort-controls {
        justify-content: center;
    }
    
    .estadisticas-busqueda {
        flex-direction: column;
    }
    
    .productos-grid.vista-grid {
        grid-template-columns: 1fr;
    }
    
    .vista-lista .producto-card {
        flex-direction: column;
    }
    
    .vista-lista .producto-header,
    .vista-lista .producto-footer,
    .vista-lista .producto-acciones {
        min-width: auto;
        width: 100%;
    }
    
    .paginacion {
        gap: 0.25rem;
    }
    
    .btn-paginacion {
        padding: 0.5rem 0.75rem;
        font-size: 0.8125rem;
    }
}
```
**index.php**
```php
<?php
session_start();

// Cargar configuración
require_once 'config.php';

$login_error = "";

// =============================================
// GESTIÓN DE SESIÓN
// =============================================

// Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ?");
    exit;
}

// Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'login') {
    $user = $_POST['usuario'] ?? '';
    $pass = $_POST['contrasena'] ?? '';

    if ($user === LOGIN_USUARIO && $pass === LOGIN_PASSWORD) {
        $_SESSION['usuario'] = $user;
        header("Location: ?");
        exit;
    } else {
        $login_error = "Usuario o contraseña incorrectos";
    }
}

$logged_in = isset($_SESSION['usuario']);

// Conexión a la base de datos solo si hay sesión iniciada
if ($logged_in) {
    $conexion = obtener_conexion();
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
}

// =============================================
// FUNCIONES DE ICONOS SVG
// =============================================

/**
 * Generar icono SVG simple
 */
function svg_icon($type, $size = 20, $color = 'currentColor') {
    $icons = [
        'check' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'x' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
        'search' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.35-4.35"></path></svg>',
        'box' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>',
        'user' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
        'chart' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>',
        'dollar' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>',
        'tag' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>',
        'star' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="' . $color . '" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
        'globe' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
        'shield' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
        'chevron-down' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>',
        'edit' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>',
        'trash' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>',
        'plus' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>',
        'save' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>',
        'file-text' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
        'info' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>',
        'list' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>',
        'grid' => '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>',
    ];
    return $icons[$type] ?? '';
}

// =============================================
// FUNCIONES AUXILIARES
// =============================================

/**
 * Obtener claves foráneas de una tabla
 */
function obtener_claves_foraneas($conexion, $tabla, $bd = DB_NAME) {
    $fk = [];
    $sql = "
        SELECT COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE TABLE_SCHEMA = '" . mysqli_real_escape_string($conexion, $bd) . "'
          AND TABLE_NAME = '" . mysqli_real_escape_string($conexion, $tabla) . "'
          AND REFERENCED_TABLE_NAME IS NOT NULL
    ";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $fk[$fila['COLUMN_NAME']] = [
                'tabla' => $fila['REFERENCED_TABLE_NAME'],
                'columna' => $fila['REFERENCED_COLUMN_NAME']
            ];
        }
    }
    return $fk;
}

/**
 * Obtener claves foráneas entrantes (tablas que apuntan a esta tabla)
 */
function obtener_claves_foraneas_entrantes($conexion, $tabla, $bd = DB_NAME) {
    $fk_entrantes = [];
    $sql = "
        SELECT TABLE_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE TABLE_SCHEMA = '" . mysqli_real_escape_string($conexion, $bd) . "'
          AND REFERENCED_TABLE_NAME = '" . mysqli_real_escape_string($conexion, $tabla) . "'
    ";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $fk_entrantes[] = [
                'tabla' => $fila['TABLE_NAME'],
                'columna' => $fila['COLUMN_NAME'],
                'columna_referenciada' => $fila['REFERENCED_COLUMN_NAME']
            ];
        }
    }
    return $fk_entrantes;
}

/**
 * Obtener metadatos de columnas de una tabla
 */
function obtener_meta_columnas($conexion, $tabla, $bd = DB_NAME) {
    $meta = [];
    $sql = "
        SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT,
               COLUMN_KEY, EXTRA, CHARACTER_MAXIMUM_LENGTH, COLUMN_TYPE
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA = '" . mysqli_real_escape_string($conexion, $bd) . "'
          AND TABLE_NAME = '" . mysqli_real_escape_string($conexion, $tabla) . "'
    ";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $meta[$fila['COLUMN_NAME']] = $fila;
        }
    }
    return $meta;
}

/**
 * Obtener nombre de la columna clave primaria
 */
function obtener_pk_columna($conexion, $tabla, $bd = DB_NAME) {
    $sql = "
        SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA = '" . mysqli_real_escape_string($conexion, $bd) . "'
          AND TABLE_NAME = '" . mysqli_real_escape_string($conexion, $tabla) . "'
          AND COLUMN_KEY = 'PRI'
        ORDER BY ORDINAL_POSITION
        LIMIT 1
    ";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado && $fila = mysqli_fetch_assoc($resultado)) {
        return $fila['COLUMN_NAME'];
    }
    return null;
}

/**
 * Renderizar input apropiado según tipo de dato
 */
function render_input_para_columna($nombre_columna, $meta_columna, $valor_actual = "") {
    $data_type = strtolower($meta_columna['DATA_TYPE']);
    $column_type = strtolower($meta_columna['COLUMN_TYPE']);
    $html = "";

    $html .= "<label>" . htmlspecialchars($nombre_columna) . "</label>";

    // tinyint(1) -> checkbox
    if ($data_type === 'tinyint' && strpos($column_type, '(1)') !== false) {
        $checked = ($valor_actual == 1 || $valor_actual === "1") ? "checked" : "";
        $html .= "<input type='checkbox' name='" . $nombre_columna . "' value='1' " . $checked . ">";
        return $html;
    }

    switch ($data_type) {
        case 'varchar':
        case 'char':
        case 'tinytext':
            $html .= "<input type='text' name='" . $nombre_columna . "' placeholder='" . $nombre_columna . "' value='" . htmlspecialchars($valor_actual, ENT_QUOTES) . "'>";
            break;

        case 'text':
        case 'mediumtext':
        case 'longtext':
            $html .= "<textarea name='" . $nombre_columna . "' placeholder='" . $nombre_columna . "' rows='4'>" . htmlspecialchars($valor_actual, ENT_QUOTES) . "</textarea>";
            break;

        case 'int':
        case 'integer':
        case 'tinyint':
        case 'smallint':
        case 'mediumint':
        case 'bigint':
            $html .= "<input type='number' name='" . $nombre_columna . "' placeholder='" . $nombre_columna . "' value='" . htmlspecialchars($valor_actual, ENT_QUOTES) . "' step='1'>";
            break;

        case 'decimal':
        case 'numeric':
        case 'float':
        case 'double':
            $html .= "<input type='number' name='" . $nombre_columna . "' placeholder='" . $nombre_columna . "' value='" . htmlspecialchars($valor_actual, ENT_QUOTES) . "' step='0.01'>";
            break;

        case 'date':
            $html .= "<input type='date' name='" . $nombre_columna . "' value='" . htmlspecialchars($valor_actual, ENT_QUOTES) . "'>";
            break;

        case 'datetime':
        case 'timestamp':
            $valor = str_replace(" ", "T", $valor_actual);
            $html .= "<input type='datetime-local' name='" . $nombre_columna . "' value='" . htmlspecialchars($valor, ENT_QUOTES) . "'>";
            break;

        case 'time':
            $html .= "<input type='time' name='" . $nombre_columna . "' value='" . htmlspecialchars($valor_actual, ENT_QUOTES) . "'>";
            break;

        case 'enum':
        case 'set':
            $html .= "<select name='" . $nombre_columna . "'>";
            $html .= "<option value=''>-- seleccionar --</option>";
            if (preg_match_all("/'([^']*)'/", $meta_columna['COLUMN_TYPE'], $matches)) {
                foreach ($matches[1] as $opcion) {
                    $selected = ($valor_actual == $opcion) ? "selected" : "";
                    $html .= "<option value='" . htmlspecialchars($opcion, ENT_QUOTES) . "' " . $selected . ">" . $opcion . "</option>";
                }
            }
            $html .= "</select>";
            break;

        default:
            $html .= "<input type='text' name='" . $nombre_columna . "' placeholder='" . $nombre_columna . "' value='" . htmlspecialchars($valor_actual, ENT_QUOTES) . "'>";
            break;
    }

    return $html;
}

/**
 * Renderizar tabla HTML de resultados con botones de acción
 */
function render_tabla_html($rows, $tabla_nombre = '', $pk_columna = '', $conexion = null, $bd = DB_NAME) {
    if (!$rows || count($rows) === 0) {
        echo "<p class='no-data'>No hay datos disponibles</p>";
        return;
    }

    // Obtener claves foráneas si hay conexión y tabla
    $foreignKeys = [];
    if ($conexion && $tabla_nombre) {
        $foreignKeys = obtener_claves_foraneas($conexion, $tabla_nombre, $bd);
    }

    echo "<div class='table-wrapper'>";
    echo "<table class='data-table'>";
    $first = $rows[0];
    echo "<thead><tr>";
    foreach ($first as $k => $_) {
        echo "<th>" . htmlspecialchars($k) . "</th>";
    }
    if ($tabla_nombre && $pk_columna) {
        echo "<th class='actions-column'>Acciones</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";

    foreach ($rows as $fila) {
        echo "<tr>";
        foreach ($fila as $clave => $valor) {
            // Expandir claves foráneas si es FK y hay conexión
            if ($conexion && isset($foreignKeys[$clave]) && $valor !== null && $valor !== '') {
                $fk = $foreignKeys[$clave];
                $tabla_fk = $fk['tabla'];
                $columna_fk = $fk['columna'];

                $sql_fk = "SELECT * FROM " . $tabla_fk . " WHERE " . $columna_fk . " = '" . mysqli_real_escape_string($conexion, $valor) . "' LIMIT 1";
                $res_fk = mysqli_query($conexion, $sql_fk);
                
                if ($res_fk && $fila_fk = mysqli_fetch_assoc($res_fk)) {
                    $partes = [];
                    foreach ($fila_fk as $k2 => $v2) {
                        $partes[] = $v2;
                    }
                    $texto_celda = implode(" | ", $partes);
                    echo "<td>" . htmlspecialchars($texto_celda, ENT_QUOTES) . "</td>";
                } else {
                    echo "<td>" . htmlspecialchars($valor ?? '', ENT_QUOTES) . "</td>";
                }
            } else {
                echo "<td>" . htmlspecialchars($valor ?? '', ENT_QUOTES) . "</td>";
            }
        }
        // Agregar botones de acción
        if ($tabla_nombre && $pk_columna && isset($fila[$pk_columna])) {
            $id_valor = $fila[$pk_columna];
            echo "<td class='actions-column'>";
            echo "<a href='?tabla=" . urlencode($tabla_nombre) . "&accion=reporte&id=" . urlencode($id_valor) . "' class='btn-action btn-report' title='Reporte'>" . svg_icon('info', 18) . "</a>";
            echo "<a href='?tabla=" . urlencode($tabla_nombre) . "&accion=editar&id=" . urlencode($id_valor) . "' class='btn-action btn-edit' title='Editar'>" . svg_icon('edit', 18) . "</a>";
            echo "<a href='?tabla=" . urlencode($tabla_nombre) . "&accion=eliminar&id=" . urlencode($id_valor) . "' class='btn-action btn-delete' title='Eliminar' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");'>" . svg_icon('trash', 18) . "</a>";
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "</div>";
}

/**
 * Renderizar tarjetas HTML de resultados con botones de acción
 */
function render_tarjetas_html($rows, $tabla_nombre = '', $pk_columna = '', $conexion = null, $bd = DB_NAME) {
    if (!$rows || count($rows) === 0) {
        echo "<p class='no-data'>No hay datos disponibles</p>";
        return;
    }

    // Obtener claves foráneas si hay conexión y tabla
    $foreignKeys = [];
    if ($conexion && $tabla_nombre) {
        $foreignKeys = obtener_claves_foraneas($conexion, $tabla_nombre, $bd);
    }

    echo "<div class='cards-grid'>";

    foreach ($rows as $fila) {
        echo "<div class='data-card'>";
        echo "<div class='card-body'>";
        
        foreach ($fila as $clave => $valor) {
            echo "<div class='card-field'>";
            echo "<span class='field-label'>" . htmlspecialchars($clave) . ":</span>";
            echo "<span class='field-value'>";
            
            // Expandir claves foráneas si es FK y hay conexión
            if ($conexion && isset($foreignKeys[$clave]) && $valor !== null && $valor !== '') {
                $fk = $foreignKeys[$clave];
                $tabla_fk = $fk['tabla'];
                $columna_fk = $fk['columna'];

                $sql_fk = "SELECT * FROM " . $tabla_fk . " WHERE " . $columna_fk . " = '" . mysqli_real_escape_string($conexion, $valor) . "' LIMIT 1";
                $res_fk = mysqli_query($conexion, $sql_fk);
                
                if ($res_fk && $fila_fk = mysqli_fetch_assoc($res_fk)) {
                    $partes = [];
                    foreach ($fila_fk as $k2 => $v2) {
                        $partes[] = $v2;
                    }
                    $texto_celda = implode(" | ", $partes);
                    echo htmlspecialchars($texto_celda, ENT_QUOTES);
                } else {
                    echo htmlspecialchars($valor ?? '', ENT_QUOTES);
                }
            } else {
                echo htmlspecialchars($valor ?? '', ENT_QUOTES);
            }
            
            echo "</span>";
            echo "</div>";
        }
        
        echo "</div>";
        
        // Agregar botones de acción
        if ($tabla_nombre && $pk_columna && isset($fila[$pk_columna])) {
            $id_valor = $fila[$pk_columna];
            echo "<div class='card-actions'>";
            echo "<a href='?tabla=" . urlencode($tabla_nombre) . "&accion=reporte&id=" . urlencode($id_valor) . "' class='btn-action btn-report' title='Reporte'>" . svg_icon('info', 18) . " Reporte</a>";
            echo "<a href='?tabla=" . urlencode($tabla_nombre) . "&accion=editar&id=" . urlencode($id_valor) . "' class='btn-action btn-edit' title='Editar'>" . svg_icon('edit', 18) . " Editar</a>";
            echo "<a href='?tabla=" . urlencode($tabla_nombre) . "&accion=eliminar&id=" . urlencode($id_valor) . "' class='btn-action btn-delete' title='Eliminar' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");'>" . svg_icon('trash', 18) . " Eliminar</a>";
            echo "</div>";
        }
        
        echo "</div>";
    }

    echo "</div>";
}

/**
 * Renderizar gráfico de tipo donut
 */
function render_pie_chart($segmentos, $titulo = "Gráfico") {
    $total = 0;
    foreach ($segmentos as $s) {
        $total += $s['total'];
    }
    if ($total <= 0) {
        echo "<p class='no-data'>Sin datos para el gráfico</p>";
        return;
    }

    $acumulado = 0.0;

    echo "<div class='chart-container'>";
    echo "<h3>" . htmlspecialchars($titulo) . "</h3>";
    echo "<div class='chart-pie-wrapper'>";
    echo "<div class='chart-pie'>";
    echo "<svg viewBox='0 0 42 42' class='donut'>";
    echo "<circle class='donut-ring' cx='21' cy='21' r='15.915'></circle>";

    $index = 0;
    // Colores de la paleta personalizada que coinciden con el CSS
    $colores = ['#6f8f72', '#f2a65a', '#99af9a', '#f6be8c', '#c4cfc5', '#f6d7be', '#BFC6C4', '#d87a68'];
    
    foreach ($segmentos as $s) {
        $valor = $s['total'];
        $percent = ($valor / $total) * 100.0;
        $dasharray = $percent . " " . (100 - $percent);
        $dashoffset = 25 - $acumulado;
 
        echo "<circle class='donut-segment segment-" . $index . "' cx='21' cy='21' r='15.915' ";
        echo "stroke-dasharray='" . $dasharray . "' stroke-dashoffset='" . $dashoffset . "'></circle>";

        $acumulado += $percent;
        $index++;
    }

    echo "</svg>";
    echo "<div class='donut-center'>";
    echo "<span class='donut-total'>" . $total . "</span>";
    echo "<span class='donut-label'>Total</span>";
    echo "</div>";
    echo "</div>";

    echo "<ul class='chart-legend'>";
    $index = 0;
    foreach ($segmentos as $s) {
        $label = htmlspecialchars($s['label'], ENT_QUOTES);
        $valor = (int)$s['total'];
        $color = $colores[$index % count($colores)];
        echo "<li>";
        echo "<span class='legend-color' style='background-color: " . $color . "'></span>";
        echo "<span class='legend-label'>" . $label . "</span>";
        echo "<span class='legend-value'>" . $valor . "</span>";
        echo "</li>";
        $index++;
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
}

// =============================================
// PROCESAMIENTO DE ACCIONES
// =============================================

if ($logged_in) {
    $tabla_actual = $_GET['tabla'] ?? null;
    $vista_actual = $_GET['vista'] ?? ($tabla_actual ? 'tabla' : 'dashboard');
    $accion = $_GET['accion'] ?? '';
    $id_editar = $_GET['id'] ?? '';
    $mensaje_sistema = '';

    // =============================================
    // PROCESAMIENTO DE ACCIONES CRUD
    // =============================================

    // INSERTAR nuevo registro
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'insertar' && $tabla_actual) {
        $campos = [];
        $valores = [];
        
        $meta = obtener_meta_columnas($conexion, $tabla_actual, DB_NAME);
        $pk = obtener_pk_columna($conexion, $tabla_actual, DB_NAME);
        
        foreach ($_POST as $campo => $valor) {
            if ($campo !== 'accion' && $campo !== $pk && isset($meta[$campo])) {
                $campos[] = $campo;
                if ($valor === '') {
                    $valores[] = "NULL";
                } else {
                    $valores[] = "'" . mysqli_real_escape_string($conexion, $valor) . "'";
                }
            }
        }
        
        if (count($campos) > 0) {
            $sql_insert = "INSERT INTO " . $tabla_actual . " (" . implode(", ", $campos) . ") VALUES (" . implode(", ", $valores) . ")";
            
            // Ejecutar con manejo de errores
            $resultado = @mysqli_query($conexion, $sql_insert);
            
            if ($resultado) {
                $mensaje_sistema = "<div class='mensaje-exito'>" . svg_icon('check', 16) . " Registro insertado correctamente</div>";
                $accion = ''; // Limpiar acción
            } else {
                $error_num = mysqli_errno($conexion);
                $error_msg = mysqli_error($conexion);
                
                // Mensajes de error más amigables
                if ($error_num == 1062) { // Duplicate entry
                    // Extraer el nombre del campo del mensaje de error
                    if (preg_match("/for key '(.+?)'/", $error_msg, $matches)) {
                        $campo = $matches[1];
                        $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Ya existe un registro con ese valor en el campo '<strong>" . htmlspecialchars($campo) . "</strong>'. Por favor, usa un valor diferente.</div>";
                    } else {
                        $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Ya existe un registro con esos datos. Por favor, verifica los campos únicos.</div>";
                    }
                } elseif ($error_num == 1452) { // Foreign key constraint
                    $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " El valor seleccionado no existe en la tabla relacionada. Por favor, selecciona un valor válido.</div>";
                } elseif ($error_num == 1048) { // Column cannot be null
                    $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Falta completar un campo obligatorio. Por favor, revisa el formulario.</div>";
                } else {
                    $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Error al insertar: " . htmlspecialchars($error_msg) . "</div>";
                }
            }
        }
    }

    // ACTUALIZAR registro existente
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'actualizar' && $tabla_actual && isset($_POST['id'])) {
        $sets = [];
        
        $meta = obtener_meta_columnas($conexion, $tabla_actual, DB_NAME);
        $pk = obtener_pk_columna($conexion, $tabla_actual, DB_NAME);
        $id = mysqli_real_escape_string($conexion, $_POST['id']);
        
        foreach ($_POST as $campo => $valor) {
            if ($campo !== 'accion' && $campo !== 'id' && $campo !== $pk && isset($meta[$campo])) {
                if ($valor === '') {
                    $sets[] = $campo . " = NULL";
                } else {
                    $sets[] = $campo . " = '" . mysqli_real_escape_string($conexion, $valor) . "'";
                }
            }
        }
        
        if (count($sets) > 0) {
            $sql_update = "UPDATE " . $tabla_actual . " SET " . implode(", ", $sets) . " WHERE " . $pk . " = '" . $id . "'";
            
            // Ejecutar con manejo de errores
            $resultado = @mysqli_query($conexion, $sql_update);
            
            if ($resultado) {
                $mensaje_sistema = "<div class='mensaje-exito'>" . svg_icon('check', 16) . " Registro actualizado correctamente</div>";
                $accion = '';
                $id_editar = '';
            } else {
                $error_num = mysqli_errno($conexion);
                $error_msg = mysqli_error($conexion);
                
                // Mensajes de error más amigables
                if ($error_num == 1062) { // Duplicate entry
                    if (preg_match("/for key '(.+?)'/", $error_msg, $matches)) {
                        $campo = $matches[1];
                        $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Ya existe otro registro con ese valor en el campo '<strong>" . htmlspecialchars($campo) . "</strong>'. Por favor, usa un valor diferente.</div>";
                    } else {
                        $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Ya existe otro registro con esos datos. Por favor, verifica los campos únicos.</div>";
                    }
                } elseif ($error_num == 1452) { // Foreign key constraint
                    $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " El valor seleccionado no existe en la tabla relacionada. Por favor, selecciona un valor válido.</div>";
                } elseif ($error_num == 1048) { // Column cannot be null
                    $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Falta completar un campo obligatorio. Por favor, revisa el formulario.</div>";
                } else {
                    $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Error al actualizar: " . htmlspecialchars($error_msg) . "</div>";
                }
            }
        }
    }

    // ELIMINAR registro
    if ($accion === 'eliminar' && $tabla_actual && $id_editar) {
        $pk = obtener_pk_columna($conexion, $tabla_actual, DB_NAME);
        $id = mysqli_real_escape_string($conexion, $id_editar);
        
        $sql_delete = "DELETE FROM " . $tabla_actual . " WHERE " . $pk . " = '" . $id . "'";
        
        // Ejecutar con manejo de errores
        $resultado = @mysqli_query($conexion, $sql_delete);
        
        if ($resultado) {
            $mensaje_sistema = "<div class='mensaje-exito'>" . svg_icon('check', 16) . " Registro eliminado correctamente</div>";
            $accion = '';
            $id_editar = '';
        } else {
            $error_num = mysqli_errno($conexion);
            $error_msg = mysqli_error($conexion);
            
            // Mensajes de error más amigables
            if ($error_num == 1451) { // Foreign key constraint on delete
                $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " No se puede eliminar este registro porque está siendo usado en otras tablas. Primero elimina los registros relacionados.</div>";
            } else {
                $mensaje_sistema = "<div class='mensaje-error'>" . svg_icon('x', 16) . " Error al eliminar: " . htmlspecialchars($error_msg) . "</div>";
            }
        }
    }

    // Obtener todas las tablas
    $tablas = [];
    $sql_tablas = "SHOW TABLES FROM " . DB_NAME;
    $resultado_tablas = mysqli_query($conexion, $sql_tablas);
    if ($resultado_tablas) {
        while ($fila = mysqli_fetch_row($resultado_tablas)) {
            if (strpos($fila[0], 'vista_') !== 0) { // Excluir vistas
                $tablas[] = $fila[0];
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TotalKit ERP - Sistema de Gestión</title>
    <link rel="icon" type="image/png" href="https://static.agusmadev.es/logos/logo-blanco-verde-invertido.png" />
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php if (!$logged_in): ?>
    <!-- PANTALLA DE LOGIN -->
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <div class="logo-circle">
                    <svg viewBox="0 0 48 48" width="48" height="48">
                        <text x="50%" y="50%" font-size="20" font-weight="600" fill="white" text-anchor="middle" dominant-baseline="central">TK</text>
                    </svg>
                </div>
                <h1>TotalKit ERP</h1>
                <p>Sistema de Gestión Empresarial</p>
            </div>
            
            <?php if ($login_error): ?>
                <div class="error-message"><?= htmlspecialchars($login_error) ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <input type="hidden" name="accion" value="login">
                
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" placeholder="Ingresa tu usuario" required autofocus>
                </div>
                
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="contrasena" placeholder="Ingresa tu contraseña" required>
                </div>
                
                <button type="submit" class="btn-primary">Iniciar Sesión</button>
                
                <div class="login-hint">
                    Usuario: <strong>admin</strong> / Contraseña: <strong>admin123</strong>
                </div>
            </form>
        </div>
    </div>

<?php else: ?>
    <!-- SISTEMA ERP -->
    <div class="erp-container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo-circle">
                    <svg viewBox="0 0 48 48" width="48" height="48">
                        <text x="50%" y="50%" font-size="18" font-weight="600" fill="white" text-anchor="middle" dominant-baseline="central">TK</text>
                    </svg>
                </div>
                <h2>TotalKit</h2>
                <p class="user-info"><?= htmlspecialchars($_SESSION['usuario']) ?></p>
            </div>

            <nav class="sidebar-nav">
                <h3>Panel Principal</h3>
                <a href="?vista=dashboard" class="nav-item <?= $vista_actual === 'dashboard' ? 'active' : '' ?>">
                    Dashboard
                </a>
                <a href="?vista=buscar" class="nav-item <?= $vista_actual === 'buscar' ? 'active' : '' ?>">
                    Buscar Productos
                </a>

                <h3>Gestión de Datos</h3>
                <?php foreach ($tablas as $tabla): ?>
                    <div class="nav-item-wrapper">
                        <a href="?tabla=<?= $tabla ?>" class="nav-item <?= $tabla_actual === $tabla ? 'active' : '' ?>">
                            <?= ucfirst(str_replace('_', ' ', $tabla)) ?>
                        </a>
                        <?php if ($tabla_actual === $tabla): ?>
                            <a href="?tabla=<?= $tabla ?>&accion=crear" class="btn-crear-sidebar" title="Crear nuevo registro"><?= svg_icon('plus', 16) ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </nav>

            <div class="sidebar-footer">
                <a href="?logout" class="btn-logout">Cerrar Sesión</a>
                <div class="sidebar-copyright">
                    <p>TotalKit ERP v1.0</p>
                    <p>© 2026 TotalKit</p>
                </div>
            </div>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="main-content">
            <header class="content-header">
                <h1>
                    <?php if ($tabla_actual && $vista_actual !== 'dashboard' && $vista_actual !== 'buscar'): ?>
                        Gestión de <?= ucfirst(str_replace('_', ' ', $tabla_actual)) ?>
                    <?php elseif ($vista_actual === 'buscar'): ?>
                        Buscador de Productos
                    <?php else: ?>
                        Dashboard
                    <?php endif; ?>
                </h1>
            </header>

            <div class="content-body">
                <?php echo $mensaje_sistema; ?>
                
                <?php if ($tabla_actual && $vista_actual !== 'dashboard' && $vista_actual !== 'buscar'): ?>
                    <!-- VISTA DE TABLA -->
                    <div class="table-section">
                        
                        <?php if ($accion === 'crear'): ?>
                            <!-- Formulario de CREACIÓN -->
                            <div class="insert-form">
                                <div class="form-header">
                                    <h2><?= svg_icon('plus', 20) ?> Crear Nuevo Registro</h2>
                                    <a href="?tabla=<?= $tabla_actual ?>" class="btn-cancelar"><?= svg_icon('x', 16) ?> Cancelar</a>
                                </div>
                                <form method="POST" action="?tabla=<?= $tabla_actual ?>">
                                    <input type="hidden" name="accion" value="insertar">
                                
                                <div class="form-grid">
                                    <?php
                                    $meta = obtener_meta_columnas($conexion, $tabla_actual, DB_NAME);
                                    $pk = obtener_pk_columna($conexion, $tabla_actual, DB_NAME);
                                    $fks = obtener_claves_foraneas($conexion, $tabla_actual, DB_NAME);
                                    
                                    foreach ($meta as $nombre_col => $info_col) {
                                        // Saltar PK auto_increment y timestamps automáticos
                                        if ($nombre_col === $pk && strpos($info_col['EXTRA'], 'auto_increment') !== false) {
                                            continue;
                                        }
                                        if (in_array($nombre_col, ['fecha_creacion', 'fecha_registro', 'fecha_pedido', 'fecha_resena'])) {
                                            continue;
                                        }
                                        
                                        echo "<div class='form-field'>";
                                        
                                        // Si es FK, mostrar select
                                        if (isset($fks[$nombre_col])) {
                                            $tabla_ref = $fks[$nombre_col]['tabla'];
                                            $columna_ref = $fks[$nombre_col]['columna'];
                                            
                                            echo "<label>" . htmlspecialchars($nombre_col) . "</label>";
                                            echo "<select name='" . $nombre_col . "'>";
                                            echo "<option value=''>-- seleccionar --</option>";
                                            
                                            $sql_fk = "SELECT * FROM " . $tabla_ref;
                                            $result_fk = mysqli_query($conexion, $sql_fk);
                                            if ($result_fk) {
                                                while ($row_fk = mysqli_fetch_assoc($result_fk)) {
                                                    $texto = implode(" - ", array_slice($row_fk, 0, 3));
                                                    echo "<option value='" . $row_fk[$columna_ref] . "'>" . htmlspecialchars($texto) . "</option>";
                                                }
                                            }
                                            echo "</select>";
                                        } else {
                                            echo render_input_para_columna($nombre_col, $info_col);
                                        }
                                        
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                                
                                    <button type="submit" class="btn-primary"><?= svg_icon('save', 18) ?> Guardar Registro</button>
                                </form>
                            </div>
                        
                        <?php elseif ($accion === 'editar' && $id_editar): ?>
                            <!-- Formulario de EDICIÓN -->
                            <?php
                            $meta = obtener_meta_columnas($conexion, $tabla_actual, DB_NAME);
                            $pk = obtener_pk_columna($conexion, $tabla_actual, DB_NAME);
                            $fks = obtener_claves_foraneas($conexion, $tabla_actual, DB_NAME);
                            
                            // Obtener datos del registro
                            $sql_edit = "SELECT * FROM " . $tabla_actual . " WHERE " . $pk . " = '" . mysqli_real_escape_string($conexion, $id_editar) . "' LIMIT 1";
                            $result_edit = mysqli_query($conexion, $sql_edit);
                            $registro = mysqli_fetch_assoc($result_edit);
                            
                            if ($registro):
                            ?>
                            <div class="insert-form">
                                <div class="form-header">
                                    <h2><?= svg_icon('edit', 20) ?> Editar Registro</h2>
                                    <a href="?tabla=<?= $tabla_actual ?>" class="btn-cancelar"><?= svg_icon('x', 16) ?> Cancelar</a>
                                </div>
                                <form method="POST" action="?tabla=<?= $tabla_actual ?>">
                                    <input type="hidden" name="accion" value="actualizar">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($id_editar) ?>">
                                    
                                    <div class="form-grid">
                                        <?php
                                        foreach ($meta as $nombre_col => $info_col) {
                                            // Mostrar PK como solo lectura
                                            if ($nombre_col === $pk) {
                                                echo "<div class='form-field'>";
                                                echo "<label>" . htmlspecialchars($nombre_col) . " (ID)</label>";
                                                echo "<input type='text' value='" . htmlspecialchars($registro[$nombre_col]) . "' disabled style='background: #e8e2d8;'>";
                                                echo "</div>";
                                                continue;
                                            }
                                            
                                            // Saltar timestamps automáticos
                                            if (in_array($nombre_col, ['fecha_creacion', 'fecha_registro', 'fecha_pedido', 'fecha_resena'])) {
                                                continue;
                                            }
                                            
                                            echo "<div class='form-field'>";
                                            
                                            // Si es FK, mostrar select
                                            if (isset($fks[$nombre_col])) {
                                                $tabla_ref = $fks[$nombre_col]['tabla'];
                                                $columna_ref = $fks[$nombre_col]['columna'];
                                                $valor_actual = $registro[$nombre_col] ?? '';
                                                
                                                echo "<label>" . htmlspecialchars($nombre_col) . "</label>";
                                                echo "<select name='" . $nombre_col . "'>";
                                                echo "<option value=''>-- seleccionar --</option>";
                                                
                                                $sql_fk = "SELECT * FROM " . $tabla_ref;
                                                $result_fk = mysqli_query($conexion, $sql_fk);
                                                if ($result_fk) {
                                                    while ($row_fk = mysqli_fetch_assoc($result_fk)) {
                                                        $texto = implode(" - ", array_slice($row_fk, 0, 3));
                                                        $selected = ($row_fk[$columna_ref] == $valor_actual) ? 'selected' : '';
                                                        echo "<option value='" . htmlspecialchars($row_fk[$columna_ref]) . "' " . $selected . ">" . htmlspecialchars($texto) . "</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            } else {
                                                echo render_input_para_columna($nombre_col, $info_col, $registro[$nombre_col] ?? '');
                                            }
                                            
                                            echo "</div>";
                                        }
                                        ?>
                                    </div>
                                    
                                    <button type="submit" class="btn-primary"><?= svg_icon('save', 18) ?> Guardar Registro</button>
                                </form>
                            </div>
                            <?php else: ?>
                                <p class='no-data'><?= svg_icon('x', 16) ?> Registro no encontrado</p>
                            <?php endif; ?>
                        
                        <?php elseif ($accion === 'reporte' && $id_editar): ?>
                            <!-- REPORTE DE RELACIONES -->
                            <?php
                            $pk = obtener_pk_columna($conexion, $tabla_actual, DB_NAME);
                            
                            // Obtener datos del registro
                            $sql_registro = "SELECT * FROM " . $tabla_actual . " WHERE " . $pk . " = '" . mysqli_real_escape_string($conexion, $id_editar) . "' LIMIT 1";
                            $result_registro = mysqli_query($conexion, $sql_registro);
                            $registro = mysqli_fetch_assoc($result_registro);
                            
                            if ($registro):
                                $fks_salientes = obtener_claves_foraneas($conexion, $tabla_actual, DB_NAME);
                                $fks_entrantes = obtener_claves_foraneas_entrantes($conexion, $tabla_actual, DB_NAME);
                            ?>
                            <div class="reporte-container">
                                <div class="form-header">
                                    <h2><?= svg_icon('info', 20) ?> Reporte de Relaciones</h2>
                                    <a href="?tabla=<?= $tabla_actual ?>" class="btn-cancelar"><?= svg_icon('x', 16) ?> Volver</a>
                                </div>
                                
                                <!-- Sección 1: Registro Principal -->
                                <div class="reporte-seccion">
                                    <h3><?= svg_icon('file-text', 18) ?> Registro Principal</h3>
                                    <?php render_tabla_html([$registro], $tabla_actual, '', $conexion, DB_NAME); ?>
                                </div>
                                
                                <!-- Sección 2: FK Salientes (este registro apunta a...) -->
                                <?php if (count($fks_salientes) > 0): ?>
                                <div class="reporte-seccion">
                                    <h3><?= svg_icon('box', 18) ?> Datos Referenciados por este Registro (FK Salientes)</h3>
                                    <?php foreach ($fks_salientes as $columna_fk => $info_fk):
                                        $valor_fk = $registro[$columna_fk];
                                        if ($valor_fk !== null && $valor_fk !== ''):
                                            $tabla_ref = $info_fk['tabla'];
                                            $columna_ref = $info_fk['columna'];
                                            
                                            $sql_ref = "SELECT * FROM " . $tabla_ref . " WHERE " . $columna_ref . " = '" . mysqli_real_escape_string($conexion, $valor_fk) . "' LIMIT 1";
                                            $result_ref = mysqli_query($conexion, $sql_ref);
                                            
                                            if ($result_ref && $fila_ref = mysqli_fetch_assoc($result_ref)):
                                    ?>
                                        <div class="reporte-item">
                                            <h4><?= htmlspecialchars($columna_fk) ?> → <?= htmlspecialchars($tabla_ref) ?></h4>
                                            <?php render_tabla_html([$fila_ref], $tabla_ref, '', $conexion, DB_NAME); ?>
                                        </div>
                                    <?php 
                                            endif;
                                        endif;
                                    endforeach; ?>
                                </div>
                                <?php endif; ?>
                                
                                <!-- Sección 3: FK Entrantes (otros registros apuntan a este) -->
                                <?php if (count($fks_entrantes) > 0): ?>
                                <div class="reporte-seccion">
                                    <h3><?= svg_icon('user', 18) ?> Datos Relacionados que Apuntan a Este Registro (FK Entrantes)</h3>
                                    <?php foreach ($fks_entrantes as $info_entrante):
                                        $tabla_origen = $info_entrante['tabla'];
                                        $columna_origen = $info_entrante['columna'];
                                        $columna_ref = $info_entrante['columna_referenciada'];
                                        $valor_pk = $registro[$pk];
                                        
                                        $sql_entrantes = "SELECT * FROM " . $tabla_origen . " WHERE " . $columna_origen . " = '" . mysqli_real_escape_string($conexion, $valor_pk) . "'";
                                        $result_entrantes = mysqli_query($conexion, $sql_entrantes);
                                        
                                        if ($result_entrantes && mysqli_num_rows($result_entrantes) > 0):
                                            $datos_entrantes = [];
                                            $num_registros = mysqli_num_rows($result_entrantes);
                                            while ($row = mysqli_fetch_assoc($result_entrantes)) {
                                                $datos_entrantes[] = $row;
                                            }
                                    ?>
                                        <div class="reporte-item">
                                            <h4><?= htmlspecialchars($tabla_origen) ?> (<?= $num_registros ?> registros)</h4>
                                            <?php render_tabla_html($datos_entrantes, $tabla_origen, '', $conexion, DB_NAME); ?>
                                        </div>
                                    <?php 
                                        endif;
                                    endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php else: ?>
                                <p class='no-data'><?= svg_icon('x', 16) ?> Registro no encontrado</p>
                            <?php endif; ?>
                        
                        <?php else: ?>
                            <!-- Tabla de datos -->
                            <?php
                            $vista_datos = isset($_GET['vista']) ? $_GET['vista'] : 'tabla';
                            ?>
                            <div class="data-view">
                                <div class="data-header">
                                    <h2><?= svg_icon('file-text', 20) ?> Listado de Registros</h2>
                                    <div class="vista-botones">
                                        <a href="?tabla=<?= $tabla_actual ?>&vista=tabla" class="btn-vista <?= $vista_datos === 'tabla' ? 'active' : '' ?>" title="Vista de Tabla">
                                            <?= svg_icon('list', 18) ?> Tabla
                                        </a>
                                        <a href="?tabla=<?= $tabla_actual ?>&vista=tarjetas" class="btn-vista <?= $vista_datos === 'tarjetas' ? 'active' : '' ?>" title="Vista de Tarjetas">
                                            <?= svg_icon('grid', 18) ?> Tarjetas
                                        </a>
                                    </div>
                                </div>
                                <?php
                                $pk = obtener_pk_columna($conexion, $tabla_actual, DB_NAME);
                                $sql = "SELECT * FROM " . $tabla_actual . " LIMIT 100";
                                $result = mysqli_query($conexion, $sql);
                                if ($result) {
                                    $datos = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $datos[] = $row;
                                    }
                                    if ($vista_datos === 'tarjetas') {
                                        render_tarjetas_html($datos, $tabla_actual, $pk, $conexion, DB_NAME);
                                    } else {
                                        render_tabla_html($datos, $tabla_actual, $pk, $conexion, DB_NAME);
                                    }
                                } else {
                                    echo "<p class='no-data'>" . svg_icon('x', 16) . " Error al cargar datos: " . mysqli_error($conexion) . "</p>";
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php elseif ($vista_actual === 'buscar'): ?>
                    <!-- BUSCADOR DE PRODUCTOS -->
                    <div class="search-container">
                        <div class="search-header">
                            <h2>Búsqueda Avanzada de Productos</h2>
                            <div class="search-bar">
                                <div class="search-input-wrapper">
                                    <input type="text" id="busqueda-texto" placeholder="Buscar por nombre, equipo, marca, jugador...">
                                </div>
                                <button class="btn-limpiar" id="btn-limpiar-filtros">Limpiar Filtros</button>
                            </div>
                        </div>

                        <div class="filtros-container">
                            <div class="filtros-toggle" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.toggle-icon').classList.toggle('rotated')">
                                <h3>Filtros Avanzados</h3>
                                <span class="toggle-icon">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </span>
                            </div>
                            
                            <div class="filtros-content">
                                <div class="filtros-grid">
                                    <div class="filtro-grupo">
                                        <label>Equipo</label>
                                        <select id="filtro-equipo">
                                            <option value="">Todos los equipos</option>
                                        </select>
                                    </div>

                                    <div class="filtro-grupo">
                                        <label>Liga</label>
                                        <select id="filtro-liga">
                                            <option value="">Todas las ligas</option>
                                        </select>
                                    </div>

                                    <div class="filtro-grupo">
                                        <label>Marca</label>
                                        <select id="filtro-marca">
                                            <option value="">Todas las marcas</option>
                                        </select>
                                    </div>

                                    <div class="filtro-grupo">
                                        <label>Temporada</label>
                                        <select id="filtro-temporada">
                                            <option value="">Todas las temporadas</option>
                                        </select>
                                    </div>

                                    <div class="filtro-grupo">
                                        <label>Tipo de Camiseta</label>
                                        <select id="filtro-tipo">
                                            <option value="">Todos los tipos</option>
                                        </select>
                                    </div>

                                    <div class="filtro-grupo">
                                        <label>Talla</label>
                                        <select id="filtro-talla">
                                            <option value="">Todas las tallas</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="filtros-grid" style="margin-top: 1rem;">
                                    <div class="filtro-grupo">
                                        <label>Rango de Precio</label>
                                        <div class="precio-range">
                                            <input type="number" id="filtro-precio-min" placeholder="Mínimo" step="0.01" min="0">
                                            <input type="number" id="filtro-precio-max" placeholder="Máximo" step="0.01" min="0">
                                        </div>
                                    </div>

                                    <div class="filtro-grupo">
                                        <label>Tipo de Equipo</label>
                                        <div class="radio-group">
                                            <div class="radio-item">
                                                <input type="radio" id="radio-todos-equipos" name="tipo-equipo" value="" checked>
                                                <label for="radio-todos-equipos">Todos</label>
                                            </div>
                                            <div class="radio-item">
                                                <input type="radio" id="radio-clubes" name="tipo-equipo" value="0">
                                                <label for="radio-clubes">Clubes</label>
                                            </div>
                                            <div class="radio-item">
                                                <input type="radio" id="radio-selecciones" name="tipo-equipo" value="1">
                                                <label for="radio-selecciones">Selecciones</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="filtros-checks">
                                    <div class="check-item">
                                        <input type="checkbox" id="filtro-solo-stock">
                                        <label for="filtro-solo-stock">Solo con stock disponible</label>
                                    </div>
                                    <div class="check-item">
                                        <input type="checkbox" id="filtro-destacados">
                                        <label for="filtro-destacados">Solo productos destacados</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Controles de vista y ordenamiento -->
                    <div class="search-container">
                        <div class="search-controls">
                            <div class="view-controls">
                                <button class="btn-view active" id="btn-vista-grid" title="Vista en cuadrícula">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                </button>
                                <button class="btn-view" id="btn-vista-lista" title="Vista en lista">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                </button>
                            </div>

                            <div class="sort-controls">
                                <label>Ordenar por:</label>
                                <select id="select-orden">
                                    <option value="p.fecha_creacion|DESC">Más recientes</option>
                                    <option value="p.fecha_creacion|ASC">Más antiguos</option>
                                    <option value="p.nombre_producto|ASC">Nombre (A-Z)</option>
                                    <option value="p.nombre_producto|DESC">Nombre (Z-A)</option>
                                    <option value="e.nombre_equipo|ASC">Equipo (A-Z)</option>
                                    <option value="p.precio|ASC">Precio (menor a mayor)</option>
                                    <option value="p.precio|DESC">Precio (mayor a menor)</option>
                                    <option value="p.stock|DESC">Mayor stock</option>
                                </select>
                            </div>
                        </div>

                        <div class="estadisticas-busqueda" id="estadisticas-busqueda">
                            <!-- Las estadísticas se cargarán dinámicamente -->
                        </div>
                    </div>

                    <!-- Resultados de búsqueda -->
                    <div class="search-container">
                        <div class="resultados-container" id="resultados-busqueda">
                            <!-- Los resultados se cargarán dinámicamente -->
                        </div>
                    </div>

                    <!-- Script del buscador -->
                    <script src="buscador.js"></script>

                <?php else: ?>
                    <!-- DASHBOARD -->
                    <div class="dashboard-grid">
                        <!-- Estadísticas generales -->
                        <div class="stat-card">
                            <div class="stat-icon"><?= svg_icon('box') ?></div>
                            <div class="stat-info">
                                <h3>Total Productos</h3>
                                <?php
                                $result = mysqli_query($conexion, "SELECT COUNT(*) as total FROM productos");
                                $total = mysqli_fetch_assoc($result)['total'];
                                ?>
                                <p class="stat-number"><?= $total ?></p>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon"><?= svg_icon('user') ?></div>
                            <div class="stat-info">
                                <h3>Total Clientes</h3>
                                <?php
                                $result = mysqli_query($conexion, "SELECT COUNT(*) as total FROM clientes");
                                $total = mysqli_fetch_assoc($result)['total'];
                                ?>
                                <p class="stat-number"><?= $total ?></p>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon"><?= svg_icon('chart') ?></div>
                            <div class="stat-info">
                                <h3>Total Pedidos</h3>
                                <?php
                                $result = mysqli_query($conexion, "SELECT COUNT(*) as total FROM pedidos");
                                $total = mysqli_fetch_assoc($result)['total'];
                                ?>
                                <p class="stat-number"><?= $total ?></p>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon"><?= svg_icon('dollar') ?></div>
                            <div class="stat-info">
                                <h3>Ingresos Totales</h3>
                                <?php
                                $result = mysqli_query($conexion, "SELECT SUM(total) as total FROM pedidos");
                                $total = mysqli_fetch_assoc($result)['total'] ?? 0;
                                ?>
                                <p class="stat-number"><?= number_format($total, 2) ?>€</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gráficos -->
                    <div class="charts-grid">
                        <?php
                        // Camisetas por equipo
                        $sql = "SELECT e.nombre_equipo as label, COUNT(p.id_producto) as total 
                                FROM equipos e 
                                LEFT JOIN productos p ON e.id_equipo = p.id_equipo 
                                GROUP BY e.id_equipo
                                ORDER BY total DESC
                                LIMIT 8";
                        $result = mysqli_query($conexion, $sql);
                        $datos = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['total'] > 0) {
                                $datos[] = $row;
                            }
                        }
                        render_pie_chart($datos, "Productos por Equipo");
                        ?>

                        <?php
                        // Pedidos por estado
                        $sql = "SELECT e.nombre_estado as label, COUNT(p.id_pedido) as total 
                                FROM estados_pedido e 
                                LEFT JOIN pedidos p ON e.id_estado = p.id_estado 
                                GROUP BY e.id_estado";
                        $result = mysqli_query($conexion, $sql);
                        $datos = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['total'] > 0) {
                                $datos[] = $row;
                            }
                        }
                        render_pie_chart($datos, "Pedidos por Estado");
                        ?>
                    </div>

                    <!-- Productos destacados -->
                    <div class="section">
                        <h2>Productos Destacados</h2>
                        <?php
                        // Verificar si la vista existe
                        $check_vista = mysqli_query($conexion, "SHOW TABLES LIKE 'vista_productos_completa'");
                        if (mysqli_num_rows($check_vista) > 0) {
                            $sql = "SELECT * FROM vista_productos_completa WHERE destacado = 1 LIMIT 10";
                        } else {
                            // Fallback si la vista no existe
                            $sql = "SELECT p.*, e.nombre_equipo, m.nombre_marca 
                                    FROM productos p 
                                    INNER JOIN equipos e ON p.id_equipo = e.id_equipo 
                                    INNER JOIN marcas m ON p.id_marca = m.id_marca 
                                    WHERE p.destacado = 1 
                                    LIMIT 10";
                        }
                        $result = mysqli_query($conexion, $sql);
                        if ($result) {
                            $productos = [];
                            while ($row = mysqli_fetch_assoc($result)) {
                                $productos[] = $row;
                            }
                            render_tabla_html($productos);
                        } else {
                            echo "<p class='no-data'>No hay productos destacados</p>";
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
<?php endif; ?>

</body>
</html>

<?php
if ($logged_in && isset($conexion)) {
    cerrar_conexion($conexion);
}
?>

```