## Ejercicio de php DAW

-- 1. Instrucciones en "lectura/GestionProductosBD.txt"
-- 2. Instrucciones en "lectura/Gestión clientes BD.txt"
-- 3. Añadir casilla para recordar sesión anterior.
-- 4. Instrucciones en "lectura/GestionProveedores"

## Nuevos cambios

- Creada nueva tabla proveedores en la BBDD.
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



                    +++++
                    

- Inicio del proyecto
- Administrador visual basico completo.
- Creada tabla de provincias en "db/db.sql".
- Añadidos datos de provincias.
- Creados accesos PDO a provincias.
- Visualiszacion de provincias mediante en añadir/modificar cliente.
- Implementada pagina de index con acceso al contenido.
- Implementada interfaz base responsive con bootstrap.
- Implementados iconos font-awesome.
 

                     +++++


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


                     +++++


## Errores conocidos en solución

- Borrado con Sweet Alert siempre borra el ultimo registro.