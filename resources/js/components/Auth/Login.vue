<template>
  <v-card max-width="800" class="mx-auto mt-10 mb-16">
    <v-card-title class="headline">Forrum Login</v-card-title>

    <v-container>
      <form class="pa-10" @submit.prevent="submit">
        <v-text-field
          v-model="form.email"
          label="E-mail"
          required
          type="email"
        ></v-text-field>
        <v-text-field
          v-model="form.password"
          label="Password"
          required
          type="password"
        ></v-text-field>

        <router-link to="/signup">
          <v-btn class="mr-4" color="blue"> Sign Up </v-btn>
        </router-link>
        <v-btn class="mr-4" color="green" type="submit">Login</v-btn>
        <v-btn @click="clear">Clear</v-btn>
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
      User.login(this.form)
    },
    clear() {
      this.$v.$reset();
      this.password = "";
      this.email = "";
    },
  },
};
</script>