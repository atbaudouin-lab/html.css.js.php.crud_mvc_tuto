let formToSubmit = null;
const modal = document.getElementById('deleteModal');

// Fonction appelée au clic sur le bouton "Supprimer" de la carte
function openDeleteModal(form) {
    formToSubmit = form;
    modal.style.display = 'flex'; // Affiche le modal
}

// Bouton Annuler
document.getElementById('cancelBtn').addEventListener('click', function () {
    modal.style.display = 'none'; // Cache le modal
    formToSubmit = null;
});

// Bouton Confirmer
document.getElementById('confirmBtn').addEventListener('click', function () {
    if (formToSubmit) {
        // Ajout d'un champ caché pour simuler le clic sur le bouton submit original 
        let hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'supprimer';
        hiddenInput.value = 'Supprimer';
        formToSubmit.appendChild(hiddenInput);

        formToSubmit.submit(); // Envoi final du formulaire
    }
});