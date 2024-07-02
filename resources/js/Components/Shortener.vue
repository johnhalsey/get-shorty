<script setup>
import { ref } from 'vue';
import axios from 'axios';

const url = ref('');

const makeItShort = () => {
    axios.post('')
}

</script>

<template>
    <div class="w-full flex h-20">
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
</template>
