<template>
    <app-layout>
        <template #header>
            Lister
        </template>
        <div v-for="course in this.courseList" v-bind:key="course.id">
            <div>
                <div> {{course.title}} </div>
                <div> {{course.description}} </div>
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



