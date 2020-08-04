<template>
  <div>
    <v-toolbar flat color="primary" dark>

      <v-toolbar-title>Forrum</v-toolbar-title>

      <v-spacer></v-spacer>
      <div>
        
        <router-link
        v-for="item in items"
        :key="item.title"
        :to="item.to"
        v-if="item.show"
        >
          <v-btn text> {{ item.title }} </v-btn>
        </router-link>
      </div>
    </v-toolbar>
  </div>
</template>

<script>
export default {
  data(){
    return {
      items:[
        {title: 'Forum', to: '/forum', show: true},
        {title: 'Login', to: '/login', show: !User.loggedin()},
        {title: 'Ask Question', to: '/ask', show: User.loggedin()},
        {title: 'Category', to: '/category', show: User.admin()},
        {title: 'Logout', to: '/logout', show: User.loggedin()},
      ]
    }
  },
  created(){
    EventBus.$on('logout', () => {
      User.logout();
    })
  }
}
</script>