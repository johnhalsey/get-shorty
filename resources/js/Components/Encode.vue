<script setup>

import {ref} from 'vue';
import axios from 'axios';

const url = ref('');
const shortUrl = ref('');
const errors = ref([]);

const makeItShort = () => {
    errors.value = []
    axios.post('/api/encode', { url: url.value })
        .then(response => {
            shortUrl.value = response.data.data.short_url;
        })
        .catch(error => {
            errors.value.push(error.response.data.errors);
        });
}

</script>

<template>
    <div class="w-full">
        <div class="flex h-20">
            <input type="text"
                   class="p-5 w-full border"
                   v-model="url"
                   placeholder="Paste your long URL here"
            />
            <button class="h-full ml-2 bg-blue-300 hover:bg-blue-500 w-40 px-3 rounded content-center"
                    @click="makeItShort"
            >
                <span>Get Shorty</span>
            </button>
        </div>
        <div v-if="errors.length" class="mt-2">
            <span class="text-red-400">{{errors[0].url[0]}}</span>
        </div>
        <div v-if="shortUrl" class="mt-2 text-xl">
            Your new shorty URL is: <a :href="shortUrl" class="text-blue-400 hover:text-blue-600 cursor-pointer" target="_blank">{{ shortUrl }}</a>
        </div>
    </div>
</template>
