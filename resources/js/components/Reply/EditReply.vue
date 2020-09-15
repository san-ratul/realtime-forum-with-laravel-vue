<template>
    <div>
        <vue-simplemde v-model="reply.body"></vue-simplemde>
        <div>
            <v-divider></v-divider>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn icon small color="green" @click="update">
                    <v-icon>save</v-icon>
                </v-btn>
                <v-btn icon small color="red" @click="cancel">
                    <v-icon>cancel</v-icon>
                </v-btn>
            </v-card-actions>
        </div>
    </div>
</template>

<script>
export default {
    props: ['reply'],
    methods: {
        update(){
            axios.patch(`/api/${this.reply.question_slug}/reply/${this.reply.id}`,{body: this.reply.body})
            .then(res => this.cancel())  
        },
        cancel(){
            EventBus.$emit('cancelEditing');
        }
    }
}
</script>