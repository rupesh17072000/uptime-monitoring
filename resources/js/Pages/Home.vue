<template>
    <div class="min-h-screen bg-gray-100 p-10">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
            <h1 class="text-3xl font-bold mb-6">
                Website Uptime Monitor
            </h1>
            <!-- SELECT -->
            <div class="mb-6">
                <label class="block mb-2 font-semibold">
                    Select Client
                </label>
                <select
                    v-model="selectedClientId"
                    class="w-full border rounded p-3">
                    <option value="">
                        Select Client
                    </option>
                    <option
                        v-for="client in clients"
                        :key="client.id"
                        :value="client.id">
                        {{ client.email }}
                    </option>
                </select>
            </div>
            <!-- WEBSITE LIST -->
            <div v-if="selectedClientWebsites.length">
                <h2 class="text-xl font-semibold mb-4">
                    Websites
                </h2>
                <ul class="list-disc ml-5 space-y-3">
                    <li
                        v-for="website in selectedClientWebsites"
                        :key="website.id">
                        <a href="#"
                            class="text-blue-600 underline"
                            @click.prevent="visitWebsite(website.url)">
                            {{ website.url }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref,computed} from 'vue'

const props=defineProps({
    clients:Array
})

const selectedClientId=ref('');

const selectedClientWebsites=computed(()=>{
    const client=props.clients.find(
        client => client.id==selectedClientId.value )
    return client ? client.websites:[]
})

const visitWebsite=(url)=>{
    const confirmed=confirm(
        `You are about to visit ${url}. Do you want to continue?`)
    if(confirmed){
        window.open(url,'_blank')
    }
}

</script>