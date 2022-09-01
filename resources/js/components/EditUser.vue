<template>
    <div class="m-auto max-w-xl bg-white rounded shadow-md px-5 py-5">

        <form @submit.prevent="editUser">

            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input  v-model="user.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded text-sm block w-full p-2.5" placeholder="Sample Name" name="name" id="name">
            </div>
            
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input v-model="user.email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded  text-sm block w-full p-2.5" placeholder="sampleemail@email.com" name="email">
            </div>
            
            <div class="mx-auto">
                <button @click.prevent="update(user.id)" type="submit" class="bg-blue-400 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded border-blue-400">Update</button>
            </div>
            
        </form>
    </div>

  </template>
  
  <script>
import axios from 'axios';

      export default {
        name: 'EditUser',
        data () {
            return {
                user: Object
            }
        },
        methods : {
        
        async retrieveUser () {

            try{ 
                const res = await axios.get(`/user/retrieve/${this.$route.params.id}`).then((res) => {                     
                    this.user = res.data;
                });
            } catch (error) {
                console.log(error);
            }
        },

        async update(id) {

            await axios.post(`/user/update/${id}`,this.user).then((res) => {
                    console.log(res);
                    if(res.status == 200){
                        alert(res.data.message);
                        this.$router.push({name:'Users'});
                    }else{
                        alert(resr.data.message);
                    }
                }) 
        }
            
        },
        mounted() {
            this.retrieveUser();
            console.log('Component mounted.')
        },

        
      }
  </script>