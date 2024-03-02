## Puesta en marcha
- iniciar docker
```bash
docker-compose up
```
- Instala las dependencias 
```bash
composer install
```
- Correr comando para generar la base de datos y llenarla 
```bash
php artisan db:setup 
```
- Ejecutar el servidor local 

## FrontEnd Repository: https://github.com/lioclaudio/search-inside-a-book-front

## Think big:

Enfoque

El enfoque que tome considero que es bastante correcto, por ejemplo tener el front y el back por separado nos permite tener mayor escalabilidad, el front hoy se limita a cumplir lo mínimo requerido para la tarea asignada por cuestiones de tiempo, desde luego buscaría hacerlo  más vistoso y mobile first para que sea lo más compatible posible a las diversas pantallas que se encuentran hoy en dia.
A nivel de back estoy mucho mas conforme con el resultado, le agregaría un mayor control de errores por ejemplo  envío de mails ante fallas o también integrar una herramienta como sentry, también queda pendiente agregar mecanismos de seguridad como autenticación en el llamado de las apis y otros que menciono más adelante.

Aumentar la relevancia de los resultados

Haciendo sólo referencia al desarrollo requerido se podría evaluar los siguientes puntos:
Que la búsqueda sea dinámica mientras se escribe y vaya mostrando las páginas que contienen dicho texto
Que se marque subrayado como si fuera un marcador de color amarillo el texto coincidente en los parrafos mostrados y si es posible en la hoja del libro cuando se muestra (no se me ocurre como seria tecnicamente realizar esto ultimo).
 
La escalabilidad y rendimiento

Considero que para que el proyecto sea escalable se podría tener en cuenta la siguiente infraestructura:


Servidor de backend independiente:  
Tener un desarrollo back separado del front brinda varias ventajas entre ellas tener un mejor control de los recursos utilizados, poder tener varios Front por ejemplo web, app Android, app iOS, etc
Teniendo en cuenta que el back es laravel mejoraría el rendimiento utilizando Laravel Octane. Octane mejora el rendimiento de las aplicaciones Laravel mediante el uso de Swoole para ejecutar el servidor en modo asíncrono, lo que acelera el procesamiento de solicitudes. Además, ofrece pre-carga de aplicaciones y  procesamiento asíncrono.


Servidor de FrontEnd independiente:
Implementar un equilibrador de carga para distribuir el tráfico entre múltiples instancias del servidor, asegurando la estabilidad y el rendimiento.
Configurar apropiadamente la escalabilidad automática para aumentar o reducir dinámicamente la capacidad de los servidores según la demanda del tráfico.

Utilizar CDN’s
Para albergar todo el contenido estático y mejorar la velocidad de carga de los sitios

Servidor de Base de Datos independiente
Para poder tener un mejor control de los recursos consumidos de la base de datos.
Tener una configuración de una máquina pensado en la optimización del uso de una BD

Buena definición de modelo de datos en la BD: 
por ejemplo utilice la base de datos PostGreSQL y almacene el JSON de la info del libro, para el campo  “text_content” del JSON utilice el tipo de dato text, dicho tipo de dato no es indexable por lo cual cuando se haga una búsqueda siempre va a ser un table scan, lo cual se tendría que evaluar cual es la mejor forma de almacenar el texto de la hoja para que las búsquedas sean lo más rápidas posibles

Para todos los servidores independiente de la función del mismo:

Utilizar servicios de alojamiento en la nube como AWS, Google Cloud Platform entre otros para aprovechar la escalabilidad y la disponibilidad global.

Distribuir el tráfico entre múltiples instancias de cada servidor, habría que analizar en detalle en el caso de la base de datos para mantener la consistencia de la información transaccional cual seria el mejor camino para una posible redundancia de servidores.  


La seguridad del contenido

Firewalls en todos los servidores
Certificados SSL
Restricción de peticiones por IP o rango de los servidores del ecosistema. Así evitar llamadas a las apis desde IP que no sean parte de la infraestructura de la empresa.
Autentificación en cada servicio por ejemplo oauth2 para comunicarse el backend con los diferentes fronts
Ver la posibilidad de cifrar la información que viaja entre servidores


NOTA: Todo lo descrito anteriormente en "La escalabilidad y rendimiento" lo pensé en base no solo al desarrollo de la funcionalidad requerida en la prueba técnica que a mi entender se limita a una representación de una página de producto sino como un desarrollo de producto completo por lo cual tiene una mirada mas Global.

NOTA 2: No creo que alcancen 3 meses pero es todo lo que me parece necesario para tener un producto de calidad y que sea sostenible a futuro.
