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
