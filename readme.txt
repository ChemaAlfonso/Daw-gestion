## Ejercicio de php DAW

-- 1. Instrucciones en "lectura/GestionProductosBD.txt"
-- 2. Instrucciones en "lectura/Gestión clientes BD.txt"
-- 3. Añadir casilla para recordar sesión anterior.
-- 4. Instrucciones en "lectura/GestionProveedores"

## Nuevos cambios

- Creado .htaccess para urls amigables. ( Ahora se debe modificar la ruta base en .htaccess ).
- Modificacion seHome().
- Creada página de error 404.




                    +++ 1 +++
                  

- Inicio del proyecto
- Administrador visual basico completo.
- Creada tabla de provincias en "db/db.sql".
- Añadidos datos de provincias.
- Creados accesos PDO a provincias.
- Visualiszacion de provincias mediante en añadir/modificar cliente.
- Implementada pagina de index con acceso al contenido.
- Implementada interfaz base responsive con bootstrap.
- Implementados iconos font-awesome.
 

                     +++ 2 +++


- fix en botones de cancelar al insertar nuevos registros.
- Añadida restriccion unique a usuarios email.
- Corregidas redirecciones al volver en modificacion de productos y clientes.
- Validaciones HTML5 en productos, clientes y usuarios.
- Modificacion de logout.
- Añadido boton de recordar usuario.
- Creada cookie para memorizar login.
- Modificacion de posicion del enlace de créditos al header.
- Añadido panel de bienvenida.
- Implementado SweetAlert
- Modificacion de estilos tarjeta de bienvenida
- Modificado path de estilos
- Añadidas sombras en algunos iconos
- Optimizaciones de acceso a los recursos
- Mejoras para lectura de codigo.

                    +++ 3 +++
                    
- Añadidas animaciones a thumbnails de inicio.
- Modificacion estructura de enlaces en thumbnails de inicio.
- Corrección de error de borrado continuo del ultimo registro.
- Añadida restriccion de borrado en cascada para proveedores.
- Aviso personalizado para borrado de proveedores.
- Creada nueva tabla proveedores en la BBDD.
- Corregido bug de borrado de proveedores con productos.
- Creada nueva carpeta de proveedores con archivos de proveedores.
- Modificada consulta de productos a consulta multitabla.
- Modificada vista de productos.
- Añadido selector desplegable para proveedores.
- Añadidos steps a precio y stock para admitir decimales
- Integrado sweet alert al borrar productos.
- Modificado telefono Type="tel" en clientes_v.
- Modificado telefono Type="tel" en proveedores_v.
- Validacion HTML5 de CP a 5 numero MAX en clientes_v.
- Validacion HTML5 de CP a 5 numero MAX en proveedores_v.
- Efecto de sombra al hacer hover al titulo.
- Optimización de estructura HTML.
- Mejoras menores en la BBDD.
- Mejoras de legibilidad del codigo.


                    +++ 4 +++


- Mejoras de legibilidad de código.
- Links de volver expandidos para mayor accesibilidad.
- Corrección redireccionamiento nuevas thumbs.



                    +++ 5 +++
                  
- Añadido autoloader.
- Creada clase Routes para manejo de rutas.
- Implementado sistema de rutas.
- Creada carpeta shared con modulos compartidos de la app.
- Validacion de navegadores ( chrome, firefox y edge ) en mainScripts.js.
- Expandidos botones atras de paginas de editar producto.
- Alineacion vertical añadida a tablas.
- Correcion posicionamiento iconos de modificado y borrar en multilinea.
- ( DEV ) Añadidos registros de prueba para todas las categorias ( Ahora solo hay que crear el usuario ).
- Unset de variables de sesion no finalizadas.
- Modificación código en productos ( antes cod_proveedor ahora cod_ producto ).
- Modificacion posicion nombre y proveedor en tabla productos.
- Añadida etiqueta de footer.