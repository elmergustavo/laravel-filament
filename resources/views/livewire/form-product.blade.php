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
                class="flex mt-4 justify-center w-full text-center  items-center px-4 py-2 bg-indigo-800 border
                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700
                focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                transition ease-in-out duration-150">
                Crear Producto
            </button>

        </div>




    </form>




</div>
