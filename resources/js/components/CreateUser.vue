<template>
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create Component</div>
  
                <div class="card-body">
                    I'm the Create Component component.
                </div>
            </div>
        </div>
    </div> -->

    <div class="m-auto max-w-xl bg-white rounded shadow-md px-5 py-5">

        <form action="">

            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded text-sm block w-full p-2.5" placeholder="Sample Name" name="name" id="name">
            </div>
            
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded  text-sm block w-full p-2.5" placeholder="sampleemail@email.com" name="email">
            </div>
            
            <div class="mx-auto">
                <button class="bg-blue-400 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded border-blue-400">Add User</button>
            </div>
            
            

        </form>
    </div>

  </template>
  
  <script>
      export default {
          mounted() {
              console.log('Component mounted.')
          }
      }
  </script>