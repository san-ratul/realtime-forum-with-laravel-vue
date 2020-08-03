<template>
  <v-card class="mb-4">
    <v-card-title>{{ question.title }}</v-card-title>
    <v-card-subtitle class="pb-0">Asked by: {{ question.user }} - {{ question.created_at }}</v-card-subtitle>

    <v-card-text class="text--primary">{{question.body}}</v-card-text>

    <v-card-actions>
      <v-spacer></v-spacer>
      <router-link :to="question.path">
        <v-btn color="orange" text>Read More</v-btn>
      </router-link>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: ["question"],
};
</script>