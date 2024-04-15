<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de Personas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">



                <div class="mb-7">
                    <a href="{{ route('students.create')}}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 px-4 py-2 dark:text-white">Registrar Nuevo</a>
                </div>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">NOMBRE</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">EDAD</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">CARRERA</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">GENERO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->id }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->nombre }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->edad }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->carrera }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->genero }}</td>

                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center gap-5">
                                    <a href="{{ route('students.edit', $student->id) }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                    <button type="button" onclick="ConfirmDelete('{{ $student->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>


<script>

    function ConfirmDelete(id){
        alertify.confirm("¿Estas seguro de eliminar este Registro?", function(e){
            if(e){
                let form = document.createElement('form')
                form.method = 'POST'
                form.action = `/students/${id}`
                form.innerHTML = '@csrf @method("DELETE")'
                document.body.appendChild(form)
                form.submit()
            }else{
                return false
            }

        })
    }

</script>