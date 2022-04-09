<script >
import axios from 'axios'

export default {
    name: 'Message',
    data(){
        return{
        messages: Array,
        }
    },
    created() {
        this.getMessages();

    },
    methods: {
        async getMessages() {
            let url = 'http://127.0.0.1:8000/api/siteUsers';
            await axios.get(url).then(response =>{
                this.messages = response.data.siteUsers;
                console.log(this.messages)
            }).catch(error=>{
                console.log(error);
            });
        },
      async deleteMessage(id) {
          let url = `http://127.0.0.1:8000/api/delete_user/${id}`
          await axios.delete(url).then(response => {
            if(response.data.code == 200)
            alert(response.data.message)
            this.getMessages();
          }).catch(error=>{
                console.log(error);
            });
        }

    },
    mounted() {
        console.log('Contact List Mounted')
    },
}


</script>

<template>
  <div class="container1">
        <div v-for="message in messages" :key="message.id" class="container darker">
        <a href=""><img src="" alt="Avatar" class="right" style="width:100%;">{{message.name}}</a>
        <p>{{message.comments}}</p>
        <span class="time-left">{{message.created_at}}</span><span class="time-right"><button @click.prevent="deleteMessage(message.id)">Delete</button></span>
        </div>

</div>

</template>


<style>
.container1{
  margin: auto;
  width: 40%;
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  padding: 10px;

}
.container {

  border-radius: 5px;
  margin: 10px 0;
  padding: 10px;

}

.darker {
  border-color: #ccc;
  background-color: #ddd;
  width: 96%;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 70px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

</style>
