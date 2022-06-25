<template>
    <app-layout>
        <template #header>
            {{course.title}}
        </template>
        <div class="py-4 mx-8">
            <div class="text-2xl"> {{this.courseShow.videos[this.currentKey].title}} </div>
            <iframe class="w-full h-screen" :src="this.courseShow.videos[this.currentKey].video_url" frameborder="0" allow="accelerometer; 
            autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            <div class="text-sm text-gray-500"> {{this.courseShow.videos[this.currentKey].description}} </div>

            <div class="mt-6">
                <ul v-for="(video, index) in this.courseShow.videos" v-bind:key="video.id">
                    <li class="mt-3 flex justify-between items-center">
                        <div>
                            Video n°{{ index + 1 }} - {{ video.title }}
                            <button class="text-gray-500 hover:text-indigo-500 focus:outline-none" @click="switchVideo(index)">
                            Voir l'épisode</button>
                        </div>
                        <progress-button :video-id = 'video.id' :watched-videos="watched" />
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import ProgressButton from './ProgressButton.vue';

export default{
    components: {
        AppLayout,
        ProgressButton
    },

    props: ['course', 'watched'],

    data() {
        return {
            courseShow: this.course,
            currentKey: 0
        }
    },

    methods: {
        switchVideo(index) {
            this.currentKey = index;

            window.scrollTo({
                top: 0,
                left: 0,
                behavior: "smooth"
            });
        }
    }
}
</script>



