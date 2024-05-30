/* Mostrar o ocultar el login */
function show_popup_login(){
	let popup = document.querySelector(".popup-login");
	if(popup.classList.contains('active')){
		popup.classList.remove('active');
	}else{
		popup.classList.add('active');
	}
}

/* mostrar o ocultar el formulario de contacto */
document.getElementById('mostrarFormulario').addEventListener('click', function() {
	var formularioContainer = document.getElementById('formularioContainer');
	var mostrarFormularioButton = document.getElementById('mostrarFormulario');

	formularioContainer.classList.remove('hidden');
	mostrarFormularioButton.style.display = 'none';
});


document.getElementById("formulario").addEventListener("submit", function (event) {
	// Prevenir que el formulario se envíe normalmente
	event.preventDefault();

	document.getElementById("formularioContainer").style.display = "none";
});
