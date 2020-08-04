<template>
  <v-card>
    <v-toolbar color="cyan" dark dense>
      <v-toolbar-title>Categories</v-toolbar-title>
    </v-toolbar>
    <v-list flat>
      <template v-for="(category,index) in categories">
        <div :key="category.id">
            <v-list-item>
            <v-list-item-content >
                <v-list-item-title>
                    {{ category.name }} - <span class="grey--text"> No of Questions </span>
                    <router-link :to="`/category/${category.slug}`">
                      <v-btn icon color="teal" >
                          {{ category.noOfQuestion }}
                      </v-btn>
                    </router-link>
                </v-list-item-title>
            </v-list-item-content>
            </v-list-item>
            <v-divider v-if="index != categories.length - 1"></v-divider>
        </div>
      </template>
    </v-list>
  </v-card>
</template>

<script>
export default {
    data(){
        return {
            categories: {}
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data)
    }
}
</script>