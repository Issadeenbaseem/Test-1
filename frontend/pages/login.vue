<template>
<div class="container">
  <div class="row">
    <div class="col-6 mx-auto">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Private Dashbord</h5>
        <p class="card-text">Welcome to Priavte {{ $auth.user.name }}</p>
       <button class="btn btn-primary" type="button" @click="login()">Text</button>
      </div>
    </div>
      
    </div>
  </div>
</div>
 
  
</template>


<script>


export default {

    data(){
        return{
            form:{
                email:'baseem@gmail.com',
                password:'password'
            }

        }
    },
    
    methods: {
        login(){
          this.$auth.loginWith('laravelSanctum',{
                data:this.form
            })
            .then(response => console.log(response))
            .catch(err => console.log(err))
        }
    },
}
</script>
