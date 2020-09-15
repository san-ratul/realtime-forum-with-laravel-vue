<template>
    <v-container max-width="1200" class="mx-auto mt-10 mb-16">
        <reply v-for="(reply, index) in content" :key="reply.id" :data="reply" :index="index"></reply>
    </v-container>
</template>

<script>
import Reply from './Reply'
export default {
    props: ['question'],
    data(){
        return {

        }
    },
    computed: {
        content(){
            return this.question.replies
        }
    },
    components:{Reply},
    created(){
        this.listen()
    },
    methods: {
        listen(){
            EventBus.$on('newReply',(reply)=>{
                this.content.unshift(reply)
            })
            
            EventBus.$on('deleteReply',(index) =>{
                axios.delete(`/api/${this.question.slug}/reply/${this.content[index].id}`)
                .then(res => {
                    this.content.splice(index, 1);
                })
               
            })
        }
    }
}
</script>