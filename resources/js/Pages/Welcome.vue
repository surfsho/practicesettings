<script setup>
import {reactive} from 'vue';
import { router } from '@inertiajs/vue3'
import colors from 'vuetify/lib/util/colors'
let props = defineProps({ times: Array })
const toggle = reactive([]);
const no = reactive([]);
for(let time in props.times) {
    no[time] = [];
    toggle[time] = {period:props.times[time].starttime,
    type:{reminders:false,messages:false,campaigns:false,greetings:false},
    mode:{sms:false,email:false,whatsapp:false}};
    
}
console.log(toggle);

function submit() {
    console.log(toggle);
    let selected = [];
    console.log(selected+"selected");
    for(let i in no) {
        for(let j in no[i]) {
            if(j == 0) {
                toggle[i].mode.sms = true;
            } else if(j == 1) {
                toggle[i].mode.email = true;
            } else if(j == 2) {
                toggle[i].mode.whatsapp = true;
            }
        }
    }

    console.log(selected);
    router.post('/', toggle);
}
console.log(colors);
let switchcolor="#1F30CC";
</script>
<style>
.title {
    font-size: 20px;
    font-weight:light-bold;
    padding: 10px;
}
.v-switch__thumb {
    background-color: white !important;
}


</style>

<template>
<h1>Practice Default Reminder Settings</h1>
<div v-for="(time,index) in times" style="height: 400px;display: flex;flex-direction: column;justify-content: space-around;">
<v-sheet :height="120" :width="600" :elevation="2">
<p class="title">Frequency</p>
<div style="display:inline-flex;justify-content:space-around;    width: 200px;padding:5px;">

<img style="width:50px;" v-if="time.starttime.toLowerCase().includes('days')" src="/calendar.jpeg">
<img  style="width:50px;" v-else src="/clock.png">
<p style="font-size:18px;">{{time.starttime}}</p>
</div>
</v-sheet>
<v-sheet :height="120" :width="600" :elevation="2" >
<p class="title">Message Type</p>

<div style="display:inline-flex;justify-content:space-between;width:600px;">
    <v-switch :color="switchcolor"  inset label="Reminders" v-model="toggle[index].type.reminders"></v-switch>
    <v-switch :color="switchcolor"   inset label="Messages" v-model="toggle[index].type.messages"></v-switch>
    <v-switch :color="switchcolor"  inset label="Campaigns" v-model="toggle[index].type.campaigns"></v-switch>
    <v-switch :color="switchcolor" inset label="Greetings" v-model="toggle[index].type.greetings"></v-switch>
</div>
</v-sheet>
<v-sheet :height="120" :width="600" :elevation="2">
<p class="title">Mode</p>

<v-btn-toggle multiple v-model="no[index]">
<v-btn><v-img width="50" height="50" src="/sms.jpeg"></v-img></v-btn>
<v-btn><v-img width="50" height="50" src="/email.jpeg"></v-img></v-btn>
<v-btn><v-img width="50" height="50" src="/whatsapp.png"></v-img></v-btn>
</v-btn-toggle>
</v-sheet>
</div>
<v-btn @click="submit">submit</v-btn>
</template>