
  
    let formOuvert = false;

    function agrandirFormulaire() {
      const formulaire = document.querySelector('.formulaire');
      const bouton = document.querySelector('.buttonPlusInfo');

      formulaire.classList.toggle('ouvert');
      formOuvert = !formOuvert;

      bouton.innerText = formOuvert ? 'Moins d\'information' : 'Plus d\'information';
    }
  