<template>
    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                <input v-model="search" type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Search name" aria-label="Search" aria-describedby="button-addon2">
            </div>
        </div>
    </div>
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
                  <tr v-for="user in users.data" :key="user.id">
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
                      <router-link :to="{name: 'Edit', params: {id: user.id}}" class="mr-3"><button><svg class="w-6 h-6 hover:fill-green-500" fill="none"  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button></router-link>
                      <router-link :to="{name: 'UserPosts', params: {id: user.id}}" class="mr-3"><button><svg class="w-6 h-6 hover:fill-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path></svg></button></router-link>
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
              <div class="m-auto text-center" >
                  <Pagination :data="filterItems" @pagination-change-page="getUsers" />
              </div>
          </div>
        </div>
      </div>
    </main>
  </template>

<script>
    import axios from 'axios';
    import LaravelVuePagination from 'laravel-vue-pagination';



    export default {

    components: {
            'Pagination': LaravelVuePagination
    },
    data () {
        return {
          users: Array,
          search: '',
        }
    },
    computed : {
        filterItems () {

            return Object.values(this.users).filter( result => {
                return result
            })

            return this.users;

        }
    },
    methods: {

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

        async getUsers (page = 1) {
          try {
                const res = await axios.get(`/users?page=${page}`).then((
                res) => {
                  this.users = res.data;
                  // console.log(this.users);
                });
            }
            catch (error) {
            console.log(error);
            }
            console.log(this.users);
        }

          },
        async mounted () {
            this.getUsers();
        }
    }

</script>


