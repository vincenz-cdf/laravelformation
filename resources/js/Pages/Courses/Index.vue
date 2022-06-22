<template>
    <app-layout>
        <template #header>
            Formations
        </template>
        <div class="py-6" v-for="course in this.courseList" v-bind:key="course.id">
            <div class="mx-8 bg-white shadow rounded p-6">
                <div class="flex justify-between items-center">
                    <div class="text-4xl"> {{course.title}} </div>
                    <div class="text-sm">0 Episodes</div>
                </div>
                <div class="text-sm text-gray-500"> {{course.description}} </div>
                <a href="#" class="rounded text-sm text-white bg-indigo-500 px-2 py-1 mt-3 inline-block hover:bg-indigo-700">Voir la formation</a>
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

    data() {
        return {
            courseList: this.courses
        }
    },

    props: ['courses'],

    mounted() {
        console.log(this.courseList);
    }
}
</script>



