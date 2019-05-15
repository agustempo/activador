Feature: Elegir idioma de la plataforma
	Para que distintos países puedan anotarse a actividades (WHY)
	Los usuarios deberían poder (WHO)
	Elegir el idioma de la plataforma (WHAT)

	Scenario: Elegir idioma de la plataforma
		Given que hay distintas opciones de idioma disponibles
		And una esta seleccionada por defecto
		When hago foco en el menu de idiomas
		And selecciono un idioma distinto al que esta
		Then la plataforma se deberia ver en el idioma que elegi

