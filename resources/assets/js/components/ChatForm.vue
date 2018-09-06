<template>
<div class="input-group">
    <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="" v-model="newMessage" @keyup.enter="sendMessage"/>
    <input v-on:change="sendPostFileTo" class="hidden" name="image" type="file" ref="inputPicture"/>
        <span class="input-group-addon" @click="()=>this.$refs.inputPicture.click()">
            <i class="fa fa-camera"></i>
        </span>
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Enviar
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: '',
                user: {},
                errorss: {},
                showMe: false,
                loaded: false,
                imagen: '',
            }
        },

        methods: {
            sendMessage() {
                //alert(this.avatar);
            this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage,
                });
                this.newMessage = ''
            },

            fetchMessages() {
                axios.get('/messages').then(response => {
                    this.messages = response.data;
                });
            },
            addMessage(message) {
                this.messages.push(message);
                axios.post('/messages', message).then(response => {});
            },
        sendPostFileTo(e){

        let imagen = e.target.files[0];
        console.log(imagen);
        var data = new  FormData();
            //this.avatar = image;
            //onsole.log(data);
            data.append('user', this.user);
            data.append('message', this.newMessage);
            data.append('file', imagen);

            console.log("------------------");
            //console.log(this.imagen);
            console.log("------------------");

            axios.post('messages',data)
                .then(response => {
                    //this.$emit('messagesent', {
                        //data,
                    //});
                })
                //Añadimos la imagen seleccionada

        //this.loaded = true;
    }, 
        }    
    }
</script>

