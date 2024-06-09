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

document.addEventListener('DOMContentLoaded', () => {
	// Functions to open and close a modal
	function openModal($el) {
	  $el.classList.add('is-active');
	}
  
	function closeModal($el) {
	  $el.classList.remove('is-active');
	}
  
	function closeAllModals() {
	  (document.querySelectorAll('.modal') || []).forEach(($modal) => {
		closeModal($modal);
	  });
	}
  
	// Add a click event on buttons to open a specific modal
	(document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
	  const modal = $trigger.dataset.target;
	  const $target = document.getElementById(modal);
  
	  $trigger.addEventListener('click', () => {
		openModal($target);
	  });
	});
  
	// Add a click event on various child elements to close the parent modal
	(document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
	  const $target = $close.closest('.modal');
  
	  $close.addEventListener('click', () => {
		closeModal($target);
	  });
	});
  
	// Add a keyboard event to close all modals
	document.addEventListener('keydown', (event) => {
	  if(event.key === "Escape") {
		closeAllModals();
	  }
	});
  });