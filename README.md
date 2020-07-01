# INSTALACION 
Version. 1
// Puede fallar


	-- Clonar proyecto
   	git clone git@github.com:agustempo/activador.git alumni
   	cd alumni
    cp .env.example .env
   	--editar settings
   	nano .env
   	php artisan migrate
   	-- puede que aca tengas que instalar el composer
   	composer update
   	php artisan key:generate
  
  	php artisan serve
  	y al localhost:8000 

  	SUERTE