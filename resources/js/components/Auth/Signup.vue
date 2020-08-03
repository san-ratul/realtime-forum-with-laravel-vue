<template>
  <v-card max-width="800" class="mx-auto mt-10 mb-16">
    <v-card-title class="headline">Forrum Sign Up</v-card-title>

    <v-container>
      <form class="pa-10" @submit.prevent="submit">
        <v-text-field v-model="form.name" label="Name" type="text"></v-text-field>
        <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>
        <v-text-field v-model="form.email" label="E-mail" type="email"></v-text-field>
        <span class="red--text" v-if="errors.email">{{ errors.email[0] }}</span>

        <v-text-field v-model="form.password" label="Password" type="password"></v-text-field>
        <span class="red--text" v-if="errors.password">{{ errors.password[0] }}</span>

        <v-text-field v-model="form.password_confirmation" label="Confirm Password" type="password"></v-text-field>

        <v-btn class="mr-4" color="green" type="submit">Sign Up</v-btn>
        <v-btn @click="clear">Clear</v-btn>
        <router-link to="/login">
          <v-btn class="ml-4" color="blue"> Login </v-btn>
        </router-link>
      </form>
    </v-container>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null,
        name: null,
        password_confirmation: null,
      },
      errors: {
          
      },
    };
  },

  created(){
    if(User.loggedin()){
      this.$router.push({name: 'forum'})
    }
  },
  
  methods: {
    submit() {
      axios.post('api/auth/signup',this.form)
    .then(res => {
      User.responseAfterLogin(res),
      this.$router.push({name: 'forum'})
    })
    .catch(error => this.errors = error.response.data.errors)
    },
    clear() {
      this.$v.$reset();
      this.password = "";
      this.email = "";
    },
  },
};
</script>