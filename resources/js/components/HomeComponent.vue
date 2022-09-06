<template>
    
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
                posts: Object
            } 
          },

          methods : {
            
            async getPosts () {

                try {
                    const res = await axios.get('/user/posts').then((res) => {
                        this.posts = res.data.data;
                        console.log(res);
                    })

                } catch (error) {
                    console.log(error);
                }
            }

          },

          async mounted() {
              this.getPosts();
            //   console.log('Component mounted.')
          }
      }
  </script>