<template>
    <div>
  <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand to='/'>NavBar</b-navbar-brand>

   <b-navbar-nav class="ml-auto">
        
        
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
        
          <b-dropdown-item to="/login">Login</b-dropdown-item>
          <b-dropdown-item href="#" @click.prevent="logout()">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
</template>

<script>
export default {
    methods: {
        logout(){
        }
    },
    
}
</script>