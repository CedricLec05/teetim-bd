document.querySelectorAll("form.controle select").forEach(
  eltSelect => eltSelect.addEventListener("change",
    evt => evt.target.form.submit()
  )
);

document.querySelectorAll(".page-produits .produit img").forEach(){
  eltImg => eltImg.addEventListener('error',
    evt=>evt.target.src = 'image/produits/teeshirts/blanc.png'
  )
};