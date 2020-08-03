<template>
  <v-footer dark padless>
    <v-card class="flex" flat tile>
      <v-card-title class="teal">
        <strong class="subheading">Get connected with me on social networks!</strong>

        <v-spacer></v-spacer>

        <a v-for="icon in icons" :key="icon.icon" :href="icon.to">
          <v-btn class="mx-4" dark icon>
            <v-icon size="24px">{{ icon.icon }}</v-icon>
          </v-btn>
        </a>
      </v-card-title>

      <v-card-text class="py-2 white--text text-center">
        {{ new Date().getFullYear() }} —
        <strong>Forrum</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
export default {
  data: () => ({
    icons: [
      { to: "https://fb.com/san.ratul", icon: "mdi-facebook" },
      { to: "https://twitter.com/SalehRatul", icon: "mdi-twitter" },
      { to: "https://www.linkedin.com/in/san-ratul/", icon: "mdi-linkedin" },
      { to: "https://www.instagram.com/san_ratul/", icon: "mdi-instagram" },
    ],
  }),
};
</script>