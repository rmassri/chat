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
                </p>
                <p v-if="message.path!=''">
                    <img :src="message.path" width="20%" height="20%">
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
  props: ['messages']
};
</script>