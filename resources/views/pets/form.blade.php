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
        <h1 class="mx-auto text-3xl underline">Agregar mascota</h1>

    </header>

    <form class="bg-slate-600 text-2xl rounded-sm text-white w-1/4 mx-auto p-3" method="post">
        @csrf
        <div class="flex flex-col border-b-2 border-slate-500">
            <label for="name">Nombre</label>
            <input class="text-black" type="text" name="name" placeholder="Inserte el nombre de la mascota">
        </div>
        @error('name')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror

        <div class="flex flex-col border-b-2 border-slate-500">
            <label for="breed">Raza</label>
            <input class="text-black" type="text" name="breed" placeholder="Inserta la raza de la mascota">
        </div>
        @error('breed')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
        <div class="flex flex-col border-b-2 border-slate-500">
            <label for="color">Color</label>
            <input class="text-black" type="text" name="color" placeholder="Inserte el color de la mascota">
        </div>
        @error('color')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
        <div class="flex flex-col border-b-2 border-slate-500">
            <label for="sex">Sexo</label>
            <select class=" text-black" name="sex" >
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
        </div>
        @error('sex')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
        @if (isset($clientes))
        <div class="flex flex-col border-b-2 border-slate-500">
            <label for="cliente">Selecciona el dueño de la mascota</label>
            <select name="cliente" class="text-black">
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>
        @else
        <input type="hidden" name="cliente" value="{{ $cliente }}">
        @endif
        <button class="block bg-green-500 mt-4 mx-auto text-white rounded-sm border-1 border-white p-3" type="submit">Agregar Cliente</button>

    </form>

</body>

</html>