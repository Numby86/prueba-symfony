# Instrucciones para trabajar con el proyecto de Symfony

## En el caso de tener symfony instalado en local

1. Clonar el proyecto de Symfony en algún directorio local (si no lo tenemos aún)
2. Abrir un terminal y situarnos en el directorio donde tenemos el código de Symfony
4. Instalar las dependencias nuevas (si las hay):
    composer update
3. Levantar el servidor web ejecutando: 
    symfony server:start -d
4. Normalmente se levantará un servidor web en el puerto 8000: http://localhost:8000

## En el caso de trabajar con docker

1. Clonar el proyecto de Symfony en algún directorio local (si no lo tenemos aún)
2. Copiar del proyecto https://gitlab.com/upgrade-hub/live-fsd-pt-sep-2021/php/symfony6-skeleton los ficheros/directorios:
    - docker-compose.yml
    - phpdocker
3. Modificar el fichero docker-compose.yml, añadiendo en las líneas 28 y 29 nuestro username y nuestro uid
    Para averiguarlo abrimos un terminal, y ejecutamos el comando **id**, y debería aparecer algo como lo siguiente:

    uid=4158(moises.carretero) gid=4000(edi) grupos=4000(edi),27(sudo),999(docker)

    En donde lo que está entre paréntesis del campo **uid** será nuestro *user*; y el número que aparece en el campo **gid** será lo que hay que poner como *uid* en el fichero docker-compose.yml
4. Abrir un terminal y situarnos en el directorio donde tenemos el código de Symfony
5. Levantar los contenedores de docker
    docker-compose up -d
6. Instalar las dependencias nuevas (si las hay):
    docker-compose exec -u {tu-usuario} php composer update

    En mi caso es: docker-compose exec -u moises.carretero php composer update
7. Si todo ha ido bien, se habrá levantado un servidor web en el puerto 8000: http://localhost:8000
