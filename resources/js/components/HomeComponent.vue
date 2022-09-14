<template>
    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                <input v-model="search" type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Search title " aria-label="Search" aria-describedby="button-addon2">
            </div>
        </div>
    </div>

    <div v-for="post in posts" :key="post.id" class="m-auto mb-5 mt-5 block p-6 max-w-lg bg-white rounded-lg border border-gray-200 shadow-md
    hover:bg-gray-100 dark:bg-blue-800 dark:border-blue-700 dark:hover:bg-blue-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ post.title}}</h5>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">User id: {{ post.user_id}}</h5>
        <p class="font-normal text-blue-700 dark:text-white">{{ post.content }}</p>
    </div>
  </template>

  <script>
import axios from 'axios';

      export default {

          data () {
            return {
                posts: Object,
                search: ""
            }
          },

          watch : {
              search(after, before) {
                  this.getPosts();
              }
          },

          methods : {

            async getPosts () {
                try {
                    const res = await axios.get(`/user/posts?search=${this.search}`).then((res) => {
                        this.posts = res.data;
                        console.log(res);
                    })

                } catch (error) {
                    console.log(error);
                }
            }

          },

           mounted() {
              this.getPosts();

          }
      }
  </script>
