<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p v-if="message.path=='' || message.path==null">
                    {{ message.message }}
                    <br>
                    {{message.created_at}}
                </p>
                <p v-if="message.type!='' && message.type=='image'">
                    <img :src="message.path" width="20%" height="20%">
                    <br>
                    {{message.created_at}} 
                </p>
                <video width="450" height="480" controls :src="message.path" v-if="message.type!='' && message.type=='video'">
                </video>
                    <div v-if="message.type!='' && (message.type=='application' || message.type=='text')" class="attach">
                        <p>{{message.file}}</p>
                        <a :href="message.path" target="_blank" download><i class="fa fa-download" aria-hidden="true"></i> Descargar</a>
                    </div>
            </div>
        </li>
    </ul>
</template>
<style type="text/css">

</style>

<script>
export default {
  props: ['messages'],
      data() {
        return {
            loading: false,
        }
    },
};
</script>