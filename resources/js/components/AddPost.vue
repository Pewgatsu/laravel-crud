<template>
    <div class="m-auto max-w-xl bg-white rounded shadow-md px-5 py-5">

        <form @submit.prevent="addPost">

         

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input v-model="post.title"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded text-sm block w-full p-2.5" placeholder="Your title" name="title" id="title">
            </div>

            <div class="mb-6">
                <label for="users" class="block mb-2 text-sm font-medium text-gray-900">Users</label>
                <select v-model="post.user_id" name="users" class="bg-gray-50 border border-gray-300 text-gray-900 rounded text-sm w-full p-2.5" >
                    <option v-for="name in names" :value="name.id">
                        {{ name.name }}
                    </option>
                </select>
                
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
                    user_id: 1,
                },
                names: Array,   
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


            async getPosts () {
                try {
                    const res = await axios.get('/user/posts').then((res) => {
                        this.posts = res.data.data;
                        console.log(res);
                    })

                } catch (error) {
                    console.log(error);
                }
            },

            async getNames () {

                try {
                    const res = await axios.get('/users/names').then((
                        res) => {
                        this.names = res.data;
                        // console.log(this.names);
                        });

                } catch (error) {
                    console.log(error);
                }

            },

        },
        mounted() {
            this.getNames();
            console.log('Component mounted.')

        },
      }
  </script>


