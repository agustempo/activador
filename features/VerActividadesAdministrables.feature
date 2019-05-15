Feature: Ver actividades administrables
	Para poder administrar actividades ya existentes (WHY)
	Los usuarios autentificados (WHO)
	Tienen que poder ver un listado de actividades del sistema que les resulte útil (WHAT)

	Scenario: usuario solo vé actividades creadas por el
		Dado que hay actividades creadas por otros y por el
		Cuándo voy al listado de actividades creadas
		Entonces debería ver solo las actividades creadas por el

	Scenario: usuario solo vé actividades donde está invitado
		Dado que hay actividades creadas por mi y otras donde estoy invitado
		Cuando voy al listado de actividades en las que estoy invitado
		Entonces debería ver solo las actividades a las que estoy invitado

	Scenario: usuario vé todas
		Dado que hay actividades creadas por mí y actividades en las que estoy invitado
		Cuando voy al listado de todas las actividades
		Entonces debería ver las actividades creadas por mi y a las que estoy invitado