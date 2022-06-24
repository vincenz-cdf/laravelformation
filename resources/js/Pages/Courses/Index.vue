<template>
    <app-layout>
        <template #header>
            Formations
        </template>
        <div class="py-3" v-for="course in this.courseList" v-bind:key="course.id">
            <div class="mx-8 bg-white shadow rounded p-6">
                <div class="text-sm text-gray-500">Mis en ligne par : {{course.user.name}}</div>
                <div class="flex justify-between items-center">
                    <div class="text-4xl"> {{course.title}} </div>
                    <div class="text-sm">{{ course.videos_count }} Vidéos</div>
                </div>
                <div class="text-sm text-gray-500"> {{course.description}} </div>
                <a :href="'/courses/' + course.id" class="rounded text-sm text-white bg-indigo-500 px-2 py-1 mt-3 inline-block hover:bg-indigo-700">Voir la formation</a>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default{
    components: {
        AppLayout
    },

    props: ['courses'],

    data() {
        return {
            courseList: this.courses
        }
    },
}
</script>



