<template>
    <div class="m-auto max-w-xl bg-white rounded shadow-md px-5 py-5">

        <form @submit.prevent="login">

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded text-sm block w-full p-2.5" placeholder="Your email" name="email" id="email">
            </div>
            
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded  text-sm block w-full p-2.5" placeholder="Your password" name="password">
            </div>
            
            <div class="mx-auto">
                <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded border-blue-400">Login</button>
            </div>
            
        </form>
    </div>

  </template>
  
  <script>
import axios from 'axios';

      export default {
        name: 'Login',

        data () {
            return {
                post: {
                    
                }
            }
        },
        methods : {
            async login () {
                
                // console.log(this.post);
                // await axios.post('/post/add', this.post).then((res) => {
                    
                //     if(res.status == 200){
                //         alert(res.data.message);
                //     }else{
                //         alert(res.data.message);
                //     }
                // }) 
            },

        },
        mounted() {
            
            // console.log('Component mounted.')
        },
      }
  </script>