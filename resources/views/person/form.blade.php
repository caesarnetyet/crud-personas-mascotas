<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Crear Persona</title>
</head>

<body>
    

    <header class="p-3 grid grid-cols-3 text-center ">
        <a class="  bg-slate-600 justify-self-start p-2 rounded-sm text-white text-xl" href="/">
            Volver
        </a>
        <h1 class="mx-auto text-3xl underline">Crear Cliente</h1>

    </header>

    <form class="bg-slate-600 text-2xl rounded-sm text-white w-1/4 mx-auto p-3" method="post" action="#">
        @csrf
        <div class="flex flex-col border-b-2 border-slate-500">
            <label for="name">Nombre</label>
            <input class="text-black" type="text" name="name" placeholder="Inserte el nombre">
        </div>
        @error('name')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror

        <div class="flex flex-col border-b-2 border-slate-500">
            <label for="email">Correo Electronico</label>
            <input class="text-black" type="email" name="email" placeholder="Inserta su correo electronico">
        </div>
        @error('email')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
        <div class="flex flex-col border-b-2 border-slate-500">
            <label for="name">Telefono</label>
            <input class="text-black" type="text" name="phone" placeholder="Inserte su telefono">
        </div>
        @error('phone')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
        <button class="block bg-green-500 mt-4 mx-auto text-white rounded-sm border-1 border-white p-3" type="submit">Agregar Cliente</button>

    </form>

</body>

</html>