<template>
    <div class="contaier">
    <form class="pa-10" @submit.prevent="submit">
      <v-text-field v-model="form.title" label="Title" required type="text"></v-text-field>
      <vue-simplemde v-model="form.body"/>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn icon color="teal" type="submit">
            <v-icon>save</v-icon>
        </v-btn>
        <v-btn icon color="red" @click="cancel">
            <v-icon>cancel</v-icon>
        </v-btn>
      </v-card-actions>
    </form>
  </div>
</template>

<script>
export default {
    props: [
        'question'
    ],
    data(){
        return{
            form: {
                title: null,
                body: null,
            },
            categories: {},
            errors: {},
        }
    },
    mounted(){
        this.form = this.question
    },
    methods: {
        submit() {
            axios.patch(`/api${this.question.path}`,this.form)
            .then(res => this.cancel())
            .catch(error => this.errors = error.response.data.errors)
        },
        cancel(){
            EventBus.$emit('cancelEditing')
        }
    }
}
</script>