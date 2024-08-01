<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        html,
body {
  margin: 0;
  padding: 0;
  background-color: #cbdad6;
}

body {
  line-height: 1.6;
  color: #333;
  padding: 30px 0 10px 0;
  font-family: sans-serif;
}

.all-pets {
  max-width: 700px;
  margin: 0 auto;
}

.pet-card {
  display: grid;
  grid-template-columns: 1fr 1.33fr;
  background-color: #fff;
  margin: 0 0 20px 0;
  border-radius: 10px;
  overflow: hidden;
  border: 3px solid #b4cdc6;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.09);
}

.pet-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.pet-text {
  padding: 20px;
}

.pet-text {
  font-size: 0.9rem;
}

.pet-text h2 {
  font-size: 1.3rem;
  /* font-weight: normal; */
  margin: 0;
}

.pet-text p {
  margin: 0;
}

.cool-button {
  margin-top: 5px;
  margin-right: 5px;
  background-color: rgba(83, 39, 244, 0.87);
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 7px;
}

.delete-pet {
  margin-top: 8px;
  background-color: rgba(223, 3, 3, 0.87);
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 7px;
}

    </style>

    <title>Pets</title>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body>
    <!-- use this URL to fetch JSON from
https://learnwebcode.github.io/json-example/pets-data.json
-->
    <div class="all-pets" x-data="{pets: [], loadedYet: false}" x-init="{pets} = await (await fetch('https://learnwebcode.github.io/json-example/pets-data.json')).json(); loadedYet = true">
        <template x-if="!pets.length && loadedYet">
            <p>Whoops, you have no pets.</p>
        </template>

        <template x-for="(pet, index) in pets">
            <div class="pet-card" x-data="{showAge: false}">
                <div class="pet-image">
                  <img x-bind:src="pet.photo" />
                </div>
                <div class="pet-text">
                  <h2 x-text="pet.name"></h2>
                  <p>Species: <span x-text="pet.species"></span></p>
                    <template x-if="pet.favFoods">
                        <p>Favorite foods: <span x-html="pet.favFoods"></span></p>
                    </template>
                  <button class="cool-button" x-on:click="showAge = ! showAge">Toggle Age</button>
                    <span x-show="showAge" x-transition x-text="pet.birthYear"></span>
                  <p>
                    <button class="delete-pet"x-on:click="pets = pets.filter((pet, loopedIndex) => {
                        return index != loopedIndex
                        })">Delete Pet</button>
                  </p>
                </div>
            </div>
        </template>
        
    </div>
</body>
</html>