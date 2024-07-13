document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM chargé... Ready!");

  let output = document.getElementById("output");

  // Boucle de 1 à 100
  let serie = "";
  for (let i = 1; i <= 30; i++) {
    serie += `${i} `;
  }
  output.innerHTML = serie;
  console.log(serie);

  // Voici un exemple de prompt écrit:
  // Observe le.petName input, et si ça finit par ok, donne lui la classe.good, sinon, la classe.bad
  // Et pour tester ce code: écrivez dans le input

  const petName = document.querySelector(".petName");

  petName.addEventListener("input", function () {
    if (this.value.endsWith("ok")) {
      this.classList.add("good");
      this.classList.remove("bad");
    } else {
      this.classList.add("bad");
      this.classList.remove("good");
    }
  });
});

