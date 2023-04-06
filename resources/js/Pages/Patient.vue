<script setup>
import {reactive} from 'vue';
let props = defineProps({times:Array});
let items=[{title:'email'},{title:'whatsapp'},{title:'text'},{title:'default'},{title:'none'}]

const form = reactive({})

for(let i in props.times) {
    form[i] = "None";
}

function handleClick(title,label) {
    console.log(title);
    console.log(label);
    console.log(form);
    form[label] = title;
}
</script>
<template>
<div style="display:flex;flex-direction:column;justify-content: space-between;height: 500px;padding: 10px;"> 
 <v-card
            color="#FFF"
            :width="800"
          >
            <div class="d-flex flex-no-wrap justify-space-between">
                 <v-avatar
                class="ma-3"
                size="125"
                rounded="10"
              >
                <v-img src="https://cdn.vuetifyjs.com/images/cards/foster.jpg"></v-img>
              </v-avatar>
              <div>
                <v-card-title class="text-h5">
                  Supermodel
                </v-card-title>

                <v-card-subtitle>Foster the People</v-card-subtitle>

                <v-card-text>
                <div style="display:inline-flex;justify-content: space-around;width:600px;">
                <v-icon icon="mdi-email"></v-icon>
                <p>vadpa@gmail.com</p>
                <v-icon icon="mdi-phone"></v-icon>
                <p>(234) 678 -0867</p>
                <v-icon icon="mdi-calendar"></v-icon>
                <p>Last Week Mar 04 2021</p>
                <v-icon icon="mdi-calendar"></v-icon>
                <p>Next Appointment</p>
                </div>
                </v-card-text>
               
              </div>

             
            </div>
          </v-card>
    
          <v-card
            color="#FFF"
            :width="800"
          >
            <div>
             <v-card-title class="text-h5">
                  Notifications
            </v-card-title>
            <v-card-text>
            <div style="display:inline-flex;justify-content:space-between;width:500px;">
            <v-switch label="Reminders"></v-switch>
            <v-switch label="Messages"></v-switch>
            <v-switch label="Campaigns"></v-switch>
            <v-switch label="Greetings"></v-switch>
            </div>
            </v-card-text>
            </div>
        </v-card>

         <v-card
            color="#FFF"
            :width="800"
          >
            <div>
             <v-card-title class="text-h5">
                  Notification Preferences
            </v-card-title>
            <v-card-text>
            <v-row>
            <v-col cols="4" v-for="(time,indextwo) in times">
            <v-menu>
      <template v-slot:activator="{ props }">
        <v-btn
          color="primary"
          v-bind="props"
        >
         {{time.starttime}}: {{form[indextwo]}}
        </v-btn>
      </template>
      <v-list>
        <v-list-item
          v-for="(item, index) in items"
          :key="index"
          :value="index"
        >
          <v-list-item-title @click="handleClick(item.title,indextwo)">{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
    </v-col>
    </v-row>
   </v-card-text>
   </div>
   </v-card>
   
</div>
</template>