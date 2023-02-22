{{-- <div class="p-8 max-w-md">
   {{$this->form}}
</div> --}}



<div class="">
    <h1 class="text-4xl font-bold p-3">Product / create</h1>
    <div class="flex space-x-4 mb-4">
        <h4 class="bg-white p-6 rounded-lg shadow-xl">Correo: {{ auth()->user()->email }} </h4>
        <h4 class="bg-white p-6 rounded-lg shadow-xl">Name: {{ auth()->user()->name }} </h4>
    </div>
   
   
   
    
    <form wire:submit.prevent="create">
        <div class="  max-w-lg  bg-white p-6 rounded-lg shadow-xl">
            {{ $this->form }}
            <button type="submit"
                class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Producto</button>
        </div>
        


    </form>
    

</div>
