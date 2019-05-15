Feature: Crear actividad
	Como usuario autentificado (WHO)
	Para poder convocar voluntarios (WHY)
	Puede crear actividades (WHAT)

	Scenario: un usuario puede crear una actividad
		Dado que es usuario autentificado
		Cuando crea una actividad
		Entonces debería crearse la actividad

	Scenario: un usuario no puede crear una actividad sin datos necesarios
		Dado que alguno de los datos básicos (nombre, descripcion, inicio, fin) no fue provisto
		Cuando crea una actividad
		Entonces no debería crearse la actividad Y debería aparecer un error de validación

	Scenario: un invitado no puede crear una actividad
		Dado que es usuario invitado
		Cuando crea una actividad
		Entonces no debería crearse la actividad Y debería aparecer un error de validación

Feature: Administrar actividad
	Como usuario autentificado (WHO)
	Para poder administrar actividades ya existentes (WHY)
	Puedo ver o editar cualquier actividad creada por mi o donde estoy invitado (WHAT)

	Scenario: el usuario puede ver actividad administrable
	Scenario: el usuario puede editar actividad administrable

Feature: Eliminar actividad
	Como usuario autentificado (WHO)
	Para poder eliminar actividades que ya no sirven (WHY)
	Puede eliminar actividades creadas por mi (WHAT)

	Scenario: el usuario puede eliminar actividad creada por el
		Dado que hay una actividad creada por el usuario
		Cuando elimina la actividad
		Entonces debería eliminarse la actividad

	Scenario: el usuario no puede eliminar actividad creada por otros
		Dado que hay actividades creadas por otro usuario
		Cuando elimina la actividad
		Entonces debería devolver un error 500