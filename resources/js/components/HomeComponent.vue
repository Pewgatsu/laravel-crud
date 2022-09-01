<template>
    <div class="m-auto block p-6 max-w-lg bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-blue-800 dark:border-blue-700 dark:hover:bg-blue-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Home Component</h5>
        <p class="font-normal text-blue-700 dark:text-white">I am the home component</p>
    </div>
  </template>
  
  <script>
      export default {
          mounted() {
              console.log('Component mounted.')
          }
      }
  </script>