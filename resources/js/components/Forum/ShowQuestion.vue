<template>
<div>
    <v-card max-width="1200" class="mx-auto mt-10 mb-16">
        <v-card-title>
            <div class="header">
                {{ question.title }}
            </div>
            
            <v-spacer></v-spacer>
            <v-btn class="white--text" color="teal"> {{ question.replies_count }} replies </v-btn>
        </v-card-title>
        <v-card-subtitle class="pb-0">Asked by: {{ question.user }} - {{ question.created_at }} Category: {{question.category}}</v-card-subtitle>
        <div class="mb-2"></div>
        <v-card-text v-html="body"></v-card-text>
        <v-card-actions
        v-if="own"
        >
            <v-spacer></v-spacer>
            <v-btn icon small color="teal" @click="edit">
                <v-icon>edit</v-icon>
            </v-btn>
            <v-btn icon small color="red" @click="destroy">
                <v-icon>delete</v-icon>
            </v-btn>
        </v-card-actions>
    </v-card>
</div>
</template>

<script>
export default {
    props:['question'],
    data(){
        return{
            own: User.own(this.question.owner_id)
        }
    },
    computed: {
        body(){
            return md.parse(this.question.body);
        }
    },
    methods: {
        destroy(){
            axios.delete(`/api${this.question.path}`)
            .then(res => this.$router.push({name: 'forum'}))
            .catch(error => console.log(error.response.data))
        },
        edit(){
            EventBus.$emit('startEditing')
        }
    }
}
</script>