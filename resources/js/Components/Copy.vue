<script setup>

import {ref} from "vue"

const toolTipText = ref('Copy')

const copy = (event) => {
    const textArea = document.createElement("textarea");
    textArea.value = document.getElementById('copy-text').innerText;
    textArea.style.position = "fixed";
    textArea.style.left = "-999999px";
    textArea.style.top = "-999999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    document.execCommand('copy');
    textArea.remove();

    setText('Copied')

    setTimeout(() => {
        setText('Copy');
    }, 1000);
}

const setText = (text) => {
    toolTipText.value = text
}

</script>

<template>
    <span
        class="tooltip cursor-pointer whitespace-nowrap"
        @click.prevent="copy"
    >
        <slot id="copy-text"/>
        <span class="tooltiptext">{{toolTipText}}</span>
    </span>
</template>

<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;

    /* Position the tooltip text - see examples below! */
    position: absolute;
    top: 35px;
    left: 10px;
    z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
