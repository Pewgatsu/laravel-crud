<template>
    <div class="m-auto max-w-xl bg-white rounded shadow-md px-5 py-5">

        <form @submit.prevent="addPost">

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input v-model="post.title"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded text-sm block w-full p-2.5" placeholder="Your title" name="title" id="title">
            </div>

            <div class="mb-6">
                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900">Enter user id</label>
                <input v-model="post.user_id"  type="number" class="bg-gray-50 border border-gray-300 text-gray-900 rounded text-sm block w-full p-2.5" placeholder="User id" name="user_id" id="user_id">
            </div>

            
            
            <div class="mb-6">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
                <textarea v-model="post.content"  id="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
            </div>
            
            <div class="mx-auto">
                <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded border-blue-400">Add Post</button>
            </div>
            
        </form>
    </div>

  </template>
  
  <script>
import axios from 'axios';

      export default {
        name: 'AddPost',
        data () {
            return {
                post: {
                    title: '',
                    content: '',
                    user_id: ''
                }
            }
        },
        methods : {
            async addPost () {
                
                console.log(this.post);
                await axios.post('/post/add', this.post).then((res) => {
                    
                    if(res.status == 200){
                        alert(res.data.message);
                    }else{
                        alert(res.data.message);
                    }
                }) 

                this.post = {};
                
            },

            // async retrieveUser () {
                
            //     try{ 
            //         const res = await axios.get(`/user/retrieve/3`).then((res) => {                     
            //             this.post.user_id = res.data.id; 
            //             //console.log(this.post.user_id);
            //         });
            //     } catch (error) {
            //         console.log(error);
            //     }
            // },
        },
        mounted() {
            
            // console.log('Component mounted.')
        },
      }
  </script>