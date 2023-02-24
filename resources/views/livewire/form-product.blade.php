<div class="p-4">

    <div class="flex justify-between">
        <h1 class="text-2xl font-bold mb-4">Create Product</h1>

        <button wire:click="$emit('closeModal', 'form-product')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
              

        </button>

       
    </div>

    <form wire:submit.prevent="create">
        <div class="  max-w-lg  bg-white">
            {{ $this->form }}
            <button type="submit"
                class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Crear Producto
            </button>

        </div>




    </form>




</div>
