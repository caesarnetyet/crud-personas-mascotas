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
        <div class="mt-2 justify-around flex flex-wrap gap-3">
            <a class="p-3 bg-slate-500 rounded-sm text-white px-10 text-center" href="/cliente/agregar">Crear Persona</a>
            <a class="p-3 bg-slate-500 rounded-sm text-white px-10 text-center" href="/mascota/agregar">Crear Mascota</a>
        </div>
        <div class="mt-5 gap-3 flex flex-wrap justify-around">
            <table class="text-center">
                <thead >
                    <tr class="border-b-2 bg-slate-600 text-white">
                        <td>Nombre</td>
                        <td>Correo Electronico</td>
                        <td>Num. Mascotas</td>
                        <td colspan="3">Acciones</td>
                    </tr>
                    @foreach($clientes as $cliente)
                    <tr class="border-b-2 border-slate-600">
                        <td class="p-3">{{$cliente->name}}</td>
                        <td class="p-3">{{$cliente->email}}</td>
                        <td class="p-3">{{$cliente->mascotas_count}}</td>
                        @if($cliente->mascotas_count > 0)
                            <td class="p-3"><a class="bg-slate-500 text-white p-2 rounded-sm" href="/mascota/ver/{{$cliente->id}}">Ver Mascotas</a></td>

                        @endif
                        <td class="p-3"><a class="bg-slate-500 text-white p-2 rounded-sm" href="/cliente/modificar/{{$cliente->id}}">Editar</a></td>
                        <td class="p-3"><a class="bg-slate-500 text-white p-2 rounded-sm" href="/cliente/eliminar/{{$cliente->id}}">Eliminar</a></td>

                    @endforeach
                </thead>
                <tbody>


                </tbody>
            </table>
            <form class="px-20 py-5 bg-slate-700  text-white" method="get" action="/mascota/agregar">
                <div class="flex flex-col ">
                    <label class="border-b-2 text-2xl border-white mb-2" for="cliente">A??adir mascota a Cliente</label>
                    <select class="text-black" name="cliente">
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="block mx-auto mt-2 bg-slate-500 p-3 text-white rounded-sm " type="submit">A??adir mascota</button>
            </form>
        </div>
    </main>
</body>

</html>
