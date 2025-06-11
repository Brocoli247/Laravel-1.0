<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Documentación de Endpoints</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #fff; }
        .container { max-width: 1100px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); padding: 32px 24px; }
        h2 { color: #d63384; }
        .alert-info { background: #f8f9fa; border: 1px solid #d63384; color: #c21868; }
        table { font-size: 0.98rem; }
        th, td { vertical-align: middle !important; }
    </style>
</head>
<body>
<div class="container my-5">
    <h2 class="mb-4 text-center" style="color:#d63384;">Documentación de Métodos y Endpoints del Sistema</h2>
    <div class="alert alert-info">Esta tabla documenta los métodos (GET, POST, PUT, DELETE) utilizados en todo el programa, su función y detalles relevantes. No son endpoints de API, sino rutas web del sistema.</div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">
            <thead class="table-light">
                <tr>
                    <th>Ruta</th>
                    <th>Método</th>
                    <th>Función</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <!-- CLIENTES CRUD -->
                <tr><td>/clientes</td><td>GET</td><td>Listar clientes</td><td>Devuelve todos los clientes (protegido).</td></tr>
                <tr><td>/clientes</td><td>POST</td><td>Crear cliente</td><td>Guarda un nuevo cliente (protegido).</td></tr>
                <tr><td>/clientes/{id}</td><td>GET</td><td>Ver cliente</td><td>Devuelve datos de un cliente por ID (protegido).</td></tr>
                <tr><td>/clientes/{id}</td><td>PUT</td><td>Actualizar cliente</td><td>Actualiza datos de un cliente existente (protegido).</td></tr>
                <tr><td>/clientes/{id}</td><td>DELETE</td><td>Eliminar cliente</td><td>Elimina un cliente por ID (protegido).</td></tr>
                <!-- AUTENTICACIÓN CLIENTE -->
                <tr><td>/login</td><td>GET</td><td>Vista Login Cliente</td><td>Muestra formulario de inicio de sesión.</td></tr>
                <tr><td>/login</td><td>POST</td><td>Procesar Login Cliente</td><td>Valida credenciales y crea sesión.</td></tr>
                <tr><td>/register</td><td>GET</td><td>Vista Registro Cliente</td><td>Muestra formulario de registro.</td></tr>
                <tr><td>/register</td><td>POST</td><td>Procesar Registro Cliente</td><td>Registra un nuevo cliente.</td></tr>
                <tr><td>/dashboard</td><td>GET</td><td>Dashboard Cliente</td><td>Vista principal de productos (protegido).</td></tr>
                <tr><td>/logout</td><td>POST</td><td>Cerrar sesión Cliente</td><td>Cierra la sesión del cliente.</td></tr>
                <!-- CRUD CARRITO -->
                <tr><td>/carrito</td><td>GET</td><td>Ver Carrito</td><td>Muestra productos en el carrito (protegido).</td></tr>
                <tr><td>/carrito</td><td>POST</td><td>Añadir al Carrito</td><td>Agrega un producto al carrito (protegido).</td></tr>
                <tr><td>/carrito/{id}</td><td>PUT</td><td>Actualizar Carrito</td><td>Modifica cantidad de producto (protegido).</td></tr>
                <tr><td>/carrito/{id}</td><td>DELETE</td><td>Eliminar del Carrito</td><td>Elimina producto del carrito (protegido).</td></tr>
                <!-- CHECKOUT/ORDENES -->
                <tr><td>/checkout</td><td>GET</td><td>Ver Checkout</td><td>Formulario de compra (protegido).</td></tr>
                <tr><td>/checkout</td><td>POST</td><td>Procesar Compra</td><td>Genera la orden de compra (protegido).</td></tr>
                <tr><td>/historial</td><td>GET</td><td>Historial de Pedidos</td><td>Muestra historial de compras (protegido).</td></tr>
                <!-- CRUD TARJETAS -->
                <tr><td>/tarjetas</td><td>GET</td><td>Ver Tarjetas</td><td>Muestra tarjetas registradas (protegido).</td></tr>
                <tr><td>/tarjetas</td><td>POST</td><td>Agregar Tarjeta</td><td>Registra nueva tarjeta (protegido).</td></tr>
                <tr><td>/tarjetas/{id}</td><td>DELETE</td><td>Eliminar Tarjeta</td><td>Elimina tarjeta por ID (protegido).</td></tr>
                <tr><td>/tarjetas/{id}/editar</td><td>GET</td><td>Editar Tarjeta</td><td>Formulario de edición (protegido).</td></tr>
                <tr><td>/tarjetas/{id}</td><td>PUT</td><td>Actualizar Tarjeta</td><td>Actualiza datos de tarjeta (protegido).</td></tr>
                <!-- CRUD DIRECCIONES -->
                <tr><td>/direcciones</td><td>GET</td><td>Ver Direcciones</td><td>Muestra direcciones registradas (protegido).</td></tr>
                <tr><td>/direcciones</td><td>POST</td><td>Agregar Dirección</td><td>Registra nueva dirección (protegido).</td></tr>
                <tr><td>/direcciones/{id}</td><td>DELETE</td><td>Eliminar Dirección</td><td>Elimina dirección por ID (protegido).</td></tr>
                <tr><td>/direcciones/{id}/editar</td><td>GET</td><td>Editar Dirección</td><td>Formulario de edición (protegido).</td></tr>
                <tr><td>/direcciones/{id}</td><td>PUT</td><td>Actualizar Dirección</td><td>Actualiza datos de dirección (protegido).</td></tr>
                <!-- DATOS PERSONALES -->
                <tr><td>/datos-personales</td><td>GET</td><td>Datos Personales</td><td>Formulario para editar datos personales.</td></tr>
                <tr><td>/datos-personales</td><td>POST</td><td>Actualizar Datos Personales</td><td>Guarda cambios del formulario de datos personales.</td></tr>
                <!-- RECUPERACIÓN CONTRASEÑA CLIENTE -->
                <tr><td>/recuperar/cliente/email</td><td>GET</td><td>Recuperar Contraseña Cliente</td><td>Formulario para solicitar recuperación.</td></tr>
                <tr><td>/recuperar/cliente/email</td><td>POST</td><td>Enviar Email Recuperación Cliente</td><td>Procesa solicitud y verifica correo.</td></tr>
                <tr><td>/recuperar/cliente/password/{email}</td><td>GET</td><td>Formulario Nueva Contraseña Cliente</td><td>Formulario para nueva contraseña tras verificación.</td></tr>
                <tr><td>/recuperar/cliente/password/{email}</td><td>POST</td><td>Actualizar Contraseña Cliente</td><td>Guarda nueva contraseña para el cliente.</td></tr>
                <!-- PROVEEDOR AUTENTICACIÓN -->
                <tr><td>/proveedor/login</td><td>GET</td><td>Vista Login Proveedor</td><td>Formulario de inicio de sesión de proveedor.</td></tr>
                <tr><td>/proveedor/login</td><td>POST</td><td>Procesar Login Proveedor</td><td>Valida credenciales y crea sesión de proveedor.</td></tr>
                <tr><td>/proveedor/register</td><td>GET</td><td>Vista Registro Proveedor</td><td>Formulario de registro de proveedor.</td></tr>
                <tr><td>/proveedor/register</td><td>POST</td><td>Procesar Registro Proveedor</td><td>Registra un nuevo proveedor.</td></tr>
                <tr><td>/proveedor/dashboard</td><td>GET</td><td>Dashboard Proveedor</td><td>Vista principal de gestión de productos (proveedor autenticado).</td></tr>
                <tr><td>/proveedor/logout</td><td>POST</td><td>Cerrar Sesión Proveedor</td><td>Cierra la sesión del proveedor.</td></tr>
                <!-- CRUD PRODUCTOS PROVEEDOR -->
                <tr><td>/proveedor/productos</td><td>GET</td><td>Ver Productos Proveedor</td><td>Muestra los productos del proveedor autenticado.</td></tr>
                <tr><td>/proveedor/productos</td><td>POST</td><td>Agregar Producto</td><td>Registra un nuevo producto para el proveedor.</td></tr>
                <tr><td>/proveedor/productos/{id}</td><td>GET</td><td>Ver Producto</td><td>Devuelve datos de un producto del proveedor.</td></tr>
                <tr><td>/proveedor/productos/{id}</td><td>PUT</td><td>Actualizar Producto</td><td>Guarda los cambios de un producto existente.</td></tr>
                <tr><td>/proveedor/productos/{id}</td><td>DELETE</td><td>Eliminar Producto</td><td>Elimina un producto del proveedor.</td></tr>
                <tr><td>/proveedor/productos/{id}/editar</td><td>GET</td><td>Editar Producto</td><td>Formulario para editar un producto existente.</td></tr>
                <!-- CATEGORÍAS PROVEEDOR -->
                <tr><td>/proveedor/categorias</td><td>POST</td><td>Agregar Categoría</td><td>Registra una nueva categoría de producto (proveedor autenticado).</td></tr>
                <!-- RECUPERACIÓN CONTRASEÑA PROVEEDOR -->
                <tr><td>/recuperar/proveedor/email</td><td>GET</td><td>Recuperar Contraseña Proveedor</td><td>Formulario para solicitar recuperación.</td></tr>
                <tr><td>/recuperar/proveedor/email</td><td>POST</td><td>Enviar Email Recuperación Proveedor</td><td>Procesa solicitud y verifica correo.</td></tr>
                <tr><td>/recuperar/proveedor/password/{email}</td><td>GET</td><td>Formulario Nueva Contraseña Proveedor</td><td>Formulario para nueva contraseña tras verificación.</td></tr>
                <tr><td>/recuperar/proveedor/password/{email}</td><td>POST</td><td>Actualizar Contraseña Proveedor</td><td>Guarda nueva contraseña para el proveedor.</td></tr>
                <!-- ENDPOINT DOC -->
                <tr><td>/end-point</td><td>GET</td><td>Documentación</td><td>Vista de documentación de endpoints (pública).</td></tr>
            </tbody>
                <tr><td>/</td><td>GET</td><td>Redirección</td><td>Redirige al login del cliente.</td></tr>
                <tr><td>/login</td><td>GET</td><td>Vista Login Cliente</td><td>Muestra el formulario de inicio de sesión para clientes.</td></tr>
                <tr><td>/login</td><td>POST</td><td>Procesar Login Cliente</td><td>Valida credenciales y crea sesión de cliente.</td></tr>
                <tr><td>/register</td><td>GET</td><td>Vista Registro Cliente</td><td>Muestra el formulario de registro para clientes.</td></tr>
                <tr><td>/register</td><td>POST</td><td>Procesar Registro Cliente</td><td>Registra un nuevo cliente y lo almacena en la base de datos.</td></tr>
                <tr><td>/dashboard</td><td>GET</td><td>Dashboard Cliente</td><td>Vista principal con productos para clientes autenticados.</td></tr>
                <tr><td>/carrito</td><td>GET</td><td>Ver Carrito</td><td>Muestra los productos en el carrito del cliente.</td></tr>
                <tr><td>/carrito</td><td>POST</td><td>Añadir al Carrito</td><td>Agrega un producto al carrito del cliente.</td></tr>
                <tr><td>/carrito/{id}</td><td>PUT</td><td>Actualizar Carrito</td><td>Modifica la cantidad de un producto en el carrito.</td></tr>
                <tr><td>/carrito/{id}</td><td>DELETE</td><td>Eliminar del Carrito</td><td>Elimina un producto del carrito.</td></tr>
                <tr><td>/direcciones</td><td>GET</td><td>Ver Direcciones</td><td>Muestra las direcciones registradas del cliente.</td></tr>
                <tr><td>/direcciones</td><td>POST</td><td>Agregar Dirección</td><td>Registra una nueva dirección para el cliente.</td></tr>
                <tr><td>/direcciones/{id}/editar</td><td>GET</td><td>Editar Dirección</td><td>Formulario para editar una dirección existente.</td></tr>
                <tr><td>/direcciones/{id}</td><td>PUT</td><td>Actualizar Dirección</td><td>Guarda los cambios de una dirección existente.</td></tr>
                <tr><td>/direcciones/{id}</td><td>DELETE</td><td>Eliminar Dirección</td><td>Elimina una dirección del cliente.</td></tr>
                <tr><td>/tarjetas</td><td>GET</td><td>Ver Tarjetas</td><td>Muestra las tarjetas de crédito registradas del cliente.</td></tr>
                <tr><td>/tarjetas</td><td>POST</td><td>Agregar Tarjeta</td><td>Registra una nueva tarjeta de crédito.</td></tr>
                <tr><td>/tarjetas/{id}/editar</td><td>GET</td><td>Editar Tarjeta</td><td>Formulario para editar una tarjeta.</td></tr>
                <tr><td>/tarjetas/{id}</td><td>PUT</td><td>Actualizar Tarjeta</td><td>Guarda los cambios de una tarjeta existente.</td></tr>
                <tr><td>/tarjetas/{id}</td><td>DELETE</td><td>Eliminar Tarjeta</td><td>Elimina una tarjeta de crédito.</td></tr>
                <tr><td>/historial</td><td>GET</td><td>Historial de Pedidos</td><td>Muestra el historial de compras del cliente.</td></tr>
                <tr><td>/checkout</td><td>GET</td><td>Ver Checkout</td><td>Muestra formulario de compra y selección de dirección/tarjeta.</td></tr>
                <tr><td>/checkout</td><td>POST</td><td>Procesar Compra</td><td>Realiza la compra y genera la orden.</td></tr>
                <tr><td>/datos-personales</td><td>GET</td><td>Datos Personales</td><td>Formulario para editar datos personales del cliente.</td></tr>
                <tr><td>/datos-personales</td><td>POST</td><td>Actualizar Datos Personales</td><td>Guarda los cambios del formulario de datos personales.</td></tr>
                <tr><td>/recuperar/cliente/email</td><td>GET</td><td>Recuperar Contraseña Cliente</td><td>Formulario para solicitar recuperación de contraseña (cliente).</td></tr>
                <tr><td>/recuperar/cliente/email</td><td>POST</td><td>Enviar Email Recuperación Cliente</td><td>Procesa la solicitud de recuperación y verifica el correo.</td></tr>
                <tr><td>/recuperar/cliente/password/{email}</td><td>GET</td><td>Formulario Nueva Contraseña Cliente</td><td>Formulario para ingresar nueva contraseña tras verificación de correo.</td></tr>
                <tr><td>/recuperar/cliente/password/{email}</td><td>POST</td><td>Actualizar Contraseña Cliente</td><td>Guarda la nueva contraseña para el cliente.</td></tr>
                <tr><td>/logout</td><td>POST</td><td>Cerrar Sesión Cliente</td><td>Cierra la sesión del cliente.</td></tr>
                <tr><td>/proveedor/login</td><td>GET</td><td>Vista Login Proveedor</td><td>Muestra el formulario de inicio de sesión para proveedores.</td></tr>
                <tr><td>/proveedor/login</td><td>POST</td><td>Procesar Login Proveedor</td><td>Valida credenciales y crea sesión de proveedor.</td></tr>
                <tr><td>/proveedor/register</td><td>GET</td><td>Vista Registro Proveedor</td><td>Muestra el formulario de registro para proveedores.</td></tr>
                <tr><td>/proveedor/register</td><td>POST</td><td>Procesar Registro Proveedor</td><td>Registra un nuevo proveedor y lo almacena en la base de datos.</td></tr>
                <tr><td>/proveedor/dashboard</td><td>GET</td><td>Dashboard Proveedor</td><td>Vista principal de gestión de productos para proveedores autenticados.</td></tr>
                <tr><td>/proveedor/logout</td><td>POST</td><td>Cerrar Sesión Proveedor</td><td>Cierra la sesión del proveedor.</td></tr>
                <tr><td>/proveedor/productos</td><td>GET</td><td>Ver Productos Proveedor</td><td>Muestra los productos del proveedor autenticado.</td></tr>
                <tr><td>/proveedor/productos</td><td>POST</td><td>Agregar Producto</td><td>Registra un nuevo producto para el proveedor.</td></tr>
                <tr><td>/proveedor/productos/{id}</td><td>PUT</td><td>Actualizar Producto</td><td>Guarda los cambios de un producto existente.</td></tr>
                <tr><td>/proveedor/productos/{id}</td><td>DELETE</td><td>Eliminar Producto</td><td>Elimina un producto del proveedor.</td></tr>
                <tr><td>/proveedor/productos/{id}/editar</td><td>GET</td><td>Editar Producto</td><td>Formulario para editar un producto existente.</td></tr>
                <tr><td>/recuperar/proveedor/email</td><td>GET</td><td>Recuperar Contraseña Proveedor</td><td>Formulario para solicitar recuperación de contraseña (proveedor).</td></tr>
                <tr><td>/recuperar/proveedor/email</td><td>POST</td><td>Enviar Email Recuperación Proveedor</td><td>Procesa la solicitud de recuperación y verifica el correo.</td></tr>
                <tr><td>/recuperar/proveedor/password/{email}</td><td>GET</td><td>Formulario Nueva Contraseña Proveedor</td><td>Formulario para ingresar nueva contraseña tras verificación de correo.</td></tr>
                <tr><td>/recuperar/proveedor/password/{email}</td><td>POST</td><td>Actualizar Contraseña Proveedor</td><td>Guarda la nueva contraseña para el proveedor.</td></tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
