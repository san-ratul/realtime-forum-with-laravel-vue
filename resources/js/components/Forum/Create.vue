<template>
  <div class="contaier">
    <form class="pa-10" @submit.prevent="submit">
      <v-text-field v-model="form.title" label="Title" required type="text"></v-text-field>
      <v-autocomplete
        v-model="form.category_id"
        :items="categories"
        item-text="name"
        item-value="id"
        label="Category"
        placeholder="Start typing to Search"
        prepend-icon="mdi-database-search"
      ></v-autocomplete>

      <vue-simplemde preview-class="markdown-body" v-model="form.body"/>

      <v-btn class="mr-4" color="green" type="submit">Create</v-btn>
    </form>
  </div>
</template>
<script>
export default {};
</script>

<script>
export default {
    data(){
        return{
            form: {
                title: null,
                category_id: null,
                body: null,
            },
            categories: [],
            errors: {},
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data)
    },
    methods: {
        submit() {
            axios.post('/api/question',this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>