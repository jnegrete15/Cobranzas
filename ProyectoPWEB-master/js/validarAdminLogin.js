function validar()
{
	var usuario,contrasena;
	usuario = document.getElementById('usuario').value;
	contrasena = document.getElementById('contraseña').value;

	if(usuario === "" || contrasena === "")
	{
		alert("Todos los campos deben completarse!!");
		return false;
	}
}
