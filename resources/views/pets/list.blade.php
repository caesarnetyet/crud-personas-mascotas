<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Hello!</title>
</head>

<body>
@error('notFound')
<div class="text-center text-white bg-orange-500 p-3 text-2xl">
    {{ $message }}
</div>
@enderror

<header class="bg-slate-800 p-3 text-center text-white">
    <h1 class="text-3xl font-bold underline">Hello!</h1>
</header>
<main>

    <div class="mt-5 gap-3 flex flex-wrap justify-around">
        <table class="text-center">
            <thead >
            <tr class="border-b-2 bg-slate-600 text-white">
                <td>Nombre</td>
                <td>Raza</td>
                <td>Color</td>
                <td colspan=2">Acciones</td>
            </tr>

            </thead>
            <tbody>
            @foreach($mascotas as $mascota)
                <tr class="border-b-2 border-slate-600">
                    <td class="p-3">{{$mascota->name}}</td>
                    <td class="p-3">{{$mascota->breed}}</td>
                    <td class="p-3">{{$mascota->color}}</td>

                    <td class="p-3"><a class="bg-slate-500 text-white p-2 rounded-sm" href="#">Editar</a></td>
                    <td class="p-3"><a class="bg-slate-500 text-white p-2 rounded-sm" href="/mascota/eliminar/{{$mascota->id}}">Eliminar</a></td>

            @endforeach

            </tbody>
        </table>

    </div>
</main>
</body>

</html>
