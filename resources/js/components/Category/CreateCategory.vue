<template>
    <v-container>
    <v-layout row wrap class="mt-3">
        <v-flex xs4>
            <v-card>
                <v-card-title class="m-3">
                    Create New Category
                </v-card-title>
                <form class="pa-10" @submit.prevent="submit">
                <v-text-field v-model="form.name" label="Title" required type="text"></v-text-field>
                <v-btn class="mr-4" color="green" type="submit" v-if="!editPath">Create</v-btn>
                <v-btn class="mr-4" color="orange" @click="update" v-else >Update</v-btn>
            </form>
            </v-card>
        </v-flex>
        <v-flex xs8>
            <v-card class="m-3">
                <v-card-title class="ml-3">
                    All Categories
                </v-card-title>
                <template v-for="(category,index) in categories">
                    <div :key="category.id">
                        <v-list-item>
                        <v-list-item-content >
                            <v-list-item-title>
                                {{ category.name }} - <router-link :to="`/category/${category.slug}`"> {{ category.noOfQuestion }} Questions </router-link>
                            </v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-action>
                            <v-btn icon small color="teal" @click="edit(index)">
                                <v-icon>edit</v-icon>
                            </v-btn>
                        </v-list-item-action>
                        <v-list-item-action>
                            <v-btn icon small color="red" @click="destroy(category.path,index)">
                                <v-icon>delete</v-icon>
                            </v-btn>
                        </v-list-item-action>
                        </v-list-item>
                        <v-divider v-if="index != categories.length - 1"></v-divider>
                    </div>
                </template>
            </v-card>
        </v-flex>
    </v-layout>
    </v-container>
</template>
<script>
export default {
    data(){
        return {
            form: {},
            categories: {},
            editPath: null,
            catIndex: null,
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data)
    },
    methods: {
        submit(){
            axios.post('/api/category', this.form)
            .then(res => {
                this.categories.push(res.data)
                this.form.name = null
            })
            .catch(error => console.log(error.data.error))
        },
        edit(index){
            this.form.name = this.categories[index].name
            this.editPath = this.categories[index].path
            this.catIndex = index
        },
        update(){
            axios.patch(`/api/${this.editPath}`,this.form)
            .then(res => {
                this.$set(this.categories, this.catIndex , res.data)
                this.editPath = null
                this.catIndex = null
                this.form.name = null
            })
        },
        destroy(path,index) {
            axios.delete(`/api/${path}`)
            .then(res => this.categories.splice(index,1))
        },
    }
}
</script>