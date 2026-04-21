Plataforma CV

CV es una plataforma diseñada para facilitar la creación de currículums profesionales de forma rápida, personalizada y accesible.

Usuarios (Clientes)

La plataforma permite que cualquier usuario cliente se registre y complete su información personal y profesional. A partir de estos datos, el usuario puede:

Seleccionar una plantilla de currículum entre diferentes opciones disponibles.
Elegir entre plantillas gratuitas y de pago, según sus necesidades.
Generar automáticamente su currículum con la información proporcionada.
Descargar su currículum en formato PDF, listo para ser utilizado.

El objetivo es simplificar el proceso de creación de CVs, eliminando la necesidad de diseñarlos desde cero y asegurando un resultado profesional.

Usuarios (Creadores)

La plataforma también permite el registro de usuarios creadores, quienes pueden:

Subir sus propias plantillas de currículum en formato de archivo comprimido.
Asignar un nombre, imagen y descripción a cada plantilla.
Definir si la plantilla será gratuita o de pago, estableciendo su propio precio.

Cuando una plantilla de pago es adquirida:

El 80% de los ingresos corresponde al creador.
El 20% restante corresponde a la plataforma CV.

Este modelo permite a los creadores monetizar su trabajo de forma sencilla, sin necesidad de gestionar infraestructura o sistemas de pago.

Tecnologías y Arquitectura

La plataforma será desarrollada utilizando:

PHP
HTML
CSS
JavaScript

Se implementará una arquitectura basada en el patrón MVC (Modelo - Vista - Controlador), complementada con una capa de servicios para organizar la lógica de negocio. La estructura principal del sistema incluirá:

Controladores: encargados de gestionar las solicitudes del usuario y coordinar la aplicación.
Modelos: responsables de la interacción con la base de datos.
Vistas: encargadas de la presentación de la información.
Servicios: encargados de encapsular la lógica de negocio y procesos reutilizables.
Convenciones de Código

Para mantener consistencia y claridad en el desarrollo, se define la siguiente convención:

Los nombres de variables deben tener un máximo de dos palabras.
Las palabras deben estar separadas por un guion bajo (_).

Ejemplos:

usuario_id
cv_nombre
plantilla_tipo