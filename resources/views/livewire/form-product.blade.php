{{-- <div class="p-8 max-w-md">
   {{$this->form}}
</div> --}}



<div class="p-24 bg-gray-100">

   <h4>Bienvenido . {{ auth()->user()->id }} </h4>
   <h4>Name . {{ auth()->user()->name }} </h4>
   <form wire:submit.prevent="create" >
      <div class="  max-w-lg  bg-white p-6 rounded-lg shadow-xl">
         {{ $this->form }}
         <button type="submit"
            class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </div>


   </form>

</div>