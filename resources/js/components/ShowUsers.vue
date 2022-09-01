<template>
    <main class="container flex items-center justify-center  mx-auto">
      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="p-1.5 w-full inline-block align-middle">
            <div class="overflow-hidden border rounded-lg">
              <table  class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                    >
                      ID
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                    >
                      Name
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                    >
                      Email
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                    >
                      Created At
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                    >
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                  <tr v-for="user in users" :key="user.id">
                    <td
                      class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap"
                    >
                      {{ user.id }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                      {{ user.name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                      {{ user.email }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                      {{ user.created_at }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                      <button @click="edit" type="input" class="mr-3"> <svg class="w-6 h-6 hover:fill-green-500" fill="none"  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                      <button @click.prevent="remove(user.id)" type="input"> <svg class="w-6 h-6 hover:fill-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                      
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
  </template>

<script>
    import axios from 'axios';
import { nextTick } from 'vue';
    
    
  
    export default {

      data () {
        return {
          users: Array,
        
        }
        
      },
      methods: {
        edit () {
          console.log('clicked edit');
        },
        async remove (id) {
          try {
              await axios.delete(`/user/delete/${id}`).then((res) => {
              if (res.data.code == 200) {
                alert(res.data.message);    
                this.getUsers(); 
              }
            })
          } catch (error) {
            console.log(error);
          }
          
        
        },
        
        async getUsers () {
          try {
          const res = await axios.get('/users').then((
            res) => {
              this.users = res.data.data;
              console.log(res);
            });
          
        }
        catch (error) {
          console.log(error);
        }

        }

      },
      async mounted () {

        this.getUsers();
      }


    }

    /*
    Composition API (script setup)
    import axios from 'axios';
    import { onMounted, ref } from 'vue';
    //reactive state
    let users = ref([]);
    // mounted
    onMounted(async () => {
      // get api from laravel backend
      await axios
        .get('/users')
        .then((res) => {
          // assign state users with response data
          users.value = res.data.data;
        })
        .catch((error) => {
          console.log(error.res.data);
        });
    });
     */
    

    
</script>