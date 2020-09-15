<template>
    <div>
        <v-card class="mb-4">
            <v-card-title>
                <div class="headline" v-if="own">You</div>
                <div class="headline" v-else>{{data.user}}</div>
                <v-card-subtitle><div>- said {{data.created_at}}</div></v-card-subtitle>
            </v-card-title>
            <v-divider></v-divider>

            <edit-reply v-if="editing" :reply="data"></edit-reply>
            <v-card-text v-else v-html="reply"></v-card-text>
            <div v-if="!editing">
                <div v-if="own">
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn icon small color="teal" @click="edit">
                            <v-icon>edit</v-icon>
                        </v-btn>
                        <v-btn icon small color="red" @click="destroy">
                            <v-icon>delete</v-icon>
                        </v-btn>
                    </v-card-actions>
                </div>
            </div>
        </v-card>
    </div>
</template>

<script>
import EditReply from "./EditReply"
export default {
    components: {EditReply},
    props:['data','index'],
    data (){
        return{
            editing: false,
        }
    },
    computed: {
        own() {
            return User.own(this.data.user_id)
        },
        reply(){
            return md.parse(this.data.body)
        }
    },
    created (){
        this.listen()
    } ,
    methods: {
        destroy(){
            EventBus.$emit('deleteReply',this.index)
        },
        edit(){
            this.editing = true;
        },
        listen(){
            EventBus.$on('cancelEditing', () => {
                this.editing = false
            })
        }
    }
    
}
</script>