<script setup>

import {ref} from 'vue';
import axios from 'axios';

const url = ref('');
const longUrl = ref('');
const errors = ref([]);

const makeItLong = () => {
    errors.value = []
    axios.post('/api/decode', { url: url.value })
        .then(response => {
            longUrl.value = response.data.data.long_url;
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
                   placeholder="Paste your shorty URL here"
            />
            <button class="h-full ml-2 bg-blue-300 hover:bg-blue-500 w-40 px-3 rounded content-center"
                    @click="makeItLong"
            >
                <span>Get Long Url</span>
            </button>
        </div>
        <div v-if="errors.length" class="mt-2">
            <span class="text-red-400">{{errors[0].url[0]}}</span>
        </div>
        <div v-if="longUrl" class="mt-2 text-xl">
            Your original long URL is: <a :href="longUrl" class="" >{{ longUrl }}</a>
        </div>
    </div>
</template>
