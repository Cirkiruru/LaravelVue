<script>
import axios from "axios";
export default {
    name: 'AddUser',
    data(){
        return{
        user: {},
        name: '',
        email: '',
        comments: '',
        errors: [],
        }
    },
    methods: {
      async  saveUsers() {
            this.errors = [];
            if(!this.user.name) {
                this.errors.push('Name is Needed')
            }
              if(!this.user.email) {
                this.errors.push('Email is Needed')
            }
              if(!this.user.comments) {
                this.errors.push('Message is Needed')
            }
               if(!this.user.length) {
                   let formData = new FormData();
                   formData.append('name',this.user.name);
                   formData.append('email',this.user.email);
                   formData.append('comments',this.user.comments);
                   let url = 'http://127.0.0.1:8000/api/store_user';
                    await axios.post(url, formData).then((response) => {
                        console.log(response)
                        if(response.status== 200) {
                            this.user.name = "",
                            this.user.email = "",
                            this.user.comments = "",
                            alert(response.data.message)
                        }else {
                            console.log('error')
                        }
                    }).catch(error => {
                        this.error.push(error.message)
                    });
       }
        }
    },
}

</script>
<template>

<div class="continer">
    <div class="error" v-if="errors.length">
        <ul>
            <li v-for="(error, index) in errors" :key="index">
                {{ error }}</li>
        </ul>
    </div>
    <br>
<form @submit.prevent="saveUsers" validate>
  Name:<br>
 <input type="text" name="name" v-model="user.name">
  <br><br> Email:<br>
 <input type="text" name="email" v-model="user.email">
  <br>
  <br>
<textarea name="" id="" cols="30" rows="10" v-model="user.comments"></textarea>
<br>
<br>

  <input type="submit">

</form>
</div>
</template>

<style>
.error{
    background: red !important;
}

</style>