<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak]{
            display:none;
        }
    </style>
</head>
<body class="flex flex-col my-6 items-center justify-center">
    voir le site de merakiui pour le design, la partie css:https://merakiui.com/ 
    <hr>
    <div x-data="{count:0}" --x-init="alert('Hello')"--!>
        <div x-text="count"></div>
        <button class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 mt-8" @click="count++">Incrementer</button>
        <button class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 mt-8" @click="count--">Decrementer</button>
    </div>
    <hr>
    <div x-data={open:false}>
        <div x-show="open" x-transition class="text-2xl" x-cloak>Afficher moi</div>
        <button class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 mt-8" 
        @click="open = !open"
        :class="open ? 'bg-green-400': '' "
        >Affichage</button>
    </div>
</body>
</html>