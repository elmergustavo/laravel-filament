<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <h1 class="text-2xl font-bold mb-10 text-center mt-10">Mis notificaciones</h1>

                    @forelse ($notificaciones as $notificacion)
                    <div class="p-5 border mt-5 rounded-lg bg-slate-100  border-indigo-200 lg:flex lg:justify-between lg:items-center">
                        <div>
                            <p class=""> Tienes un una nueva notificacion en:
                                <span class="font-bold">{{ $notificacion->data['name'] }}</span>

                            </p>
                            <p>
                                <span class="font-bold text-sm">{{ $notificacion->created_at->diffForHumans() }}</span>
                            </p>
                        </div>

                        <div class="mt-5 lg:mt-0">
                            <a href="{{route('product.index', $notificacion->data['id'])}}" class="inline-flex items-center px-4 py-2 bg-indigo-800 border
                            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700
                            focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                            transition ease-in-out duration-150"> Ver
                                Producto</a>
                        </div>

                    </div>
                    @empty
                    <div class="flex justify-center text-center">

                        <a class="text-center text-gray-600">No hay notificaciones nuevas</a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>