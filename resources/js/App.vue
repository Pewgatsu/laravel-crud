<template>
    <div class="container-fluid p-0">
      <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
          <div class="flex justify-between">
            <div class="flex space-x-7">
              <div class="hidden md:flex items-center space-x-1">
                <ul class="hidden md:flex items-center space-x-1">
                  <li class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500">
                    <router-link to="/">Home</router-link>
                  </li>
                  <li class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500"> 
                    <router-link to="/create">Create User</router-link>
                  </li>
                  <li class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500">
                    <router-link to="/users">Show Users</router-link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <br/>
      <transition name="fade">
        <router-view></router-view>
      </transition>
    </div>
  </template>
  



  <style>
      
  </style>
  
  <script>
  
      export default{
      }
  </script>