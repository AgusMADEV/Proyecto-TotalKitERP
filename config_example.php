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
define('DB_USER', 'tu_usuario');             // Usuario de la base de datos
define('DB_PASS', 'tu_contraseña');          // Contraseña de la base de datos

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
