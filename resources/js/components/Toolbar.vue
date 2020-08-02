<template>
  <div>
    <v-toolbar flat color="primary" dark>

      <v-toolbar-title>Forrum</v-toolbar-title>

      <v-spacer></v-spacer>
      <div>

        <router-link to="/forum">
          <v-btn text> Forum </v-btn>
        </router-link>

        <router-link to="">
          <v-btn text> Ask Question </v-btn>
        </router-link>
        
        <router-link to="">
          <v-btn text> Category </v-btn>
        </router-link>

        <router-link to="/login">
          <v-btn text> Login </v-btn>
        </router-link>
      </div>
    </v-toolbar>
  </div>
</template>