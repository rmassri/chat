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

        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                newMessage: '',
                errorss: {},
                showMe: false,
                loaded: false,
                imagen: '',
                avatar: ''
            }
        },
        methods: {
            sendMessage() {
                $(".panel-body").animate({ scrollTop: 20000000 }, "slow");
                this.$emit('messagesent', {
                        user: this.user,
                        message: this.newMessage,
                        loading:true
                    });
                    this.newMessage = ''
                },

            sendPostFileTo(e){
                $(".panel-body").animate({ scrollTop: 20000000 }, "slow");
                var image = e.target.files[0];
                var reader = new FileReader();
                var file_por_barra='';
                var file_por_punto='';
                reader.readAsDataURL(image);
                reader.onload = e => {
                    this.imagen = e.target.result;
                    file_por_barra=this.imagen.split('/');
                    file_por_punto=file_por_barra[0].split(':');
                        this.$emit("messagesent",{
                        path:this.imagen,
                        type:file_por_punto[1],
                        user: this.user,
                        message: this.newMessage,
                        name:image.name,
                        loading:true,
                    });
                }
                this.newMessage = ''
            }, 
        },    
        mounted(){
            $(".panel-body").animate({ scrollTop: 20000000 }, "slow");
        }
    }
</script>

