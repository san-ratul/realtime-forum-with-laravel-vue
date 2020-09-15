<template>
    <v-container>
        <vue-simplemde preview-class="markdown-body" v-model="form.body"/>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="teal" class="white--text" @click="newReply">
                Reply
            </v-btn>
        </v-card-actions>
    </v-container>
</template>

<script>
export default {
    props: ['questionSlug'],
    data(){
        return {
            form: {
                body: null
            }
        }
    },
    methods: {
        newReply(){
            axios.post(`/api/${this.questionSlug}/reply`,{'body': this.form.body})
            .then(res => {
                this.form.body = ""
                EventBus.$emit('newReply',res.data.reply)
                window.scrollTo(0,0);
            })
        }
    }
}
</script>