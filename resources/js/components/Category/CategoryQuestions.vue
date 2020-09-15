<template>

<v-container fluid grid-list-md>
    <v-layout row wrap>
        <v-flex s8 class="m-auto">
            <v-toolbar color="cyan" class="mb-3" dark dense>
                <v-toolbar-title>
                    <v-app-bar-nav-icon>
                        <router-link to="/forum">
                            <v-btn icon>
                                <v-icon>arrow_back</v-icon>
                            </v-btn>
                        </router-link>
                    </v-app-bar-nav-icon>
                    Question(s) Under <b>{{ this.category.name }}</b> Category
                </v-toolbar-title>
            </v-toolbar>
            <question
            v-for="question in questions"
            :key="question.path"
            :question=question
            ></question>
        </v-flex>
    </v-layout>
</v-container>

</template>

<script>
import question from '../Forum/Question'
export default {
    data(){
        return {
            questions: {},
            category: {}
        }
    },
    components: {question},
    created(){
        axios.get(`/api/category/${this.$route.params.slug}`)
        .then(res => {
            this.questions = res.data.data
            this.category = res.data.category
        })
        .catch(error => console.log(error.response.data))
    }
}
</script>