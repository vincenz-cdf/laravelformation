<template>
    <div>
        <button class="bg-green-500 px-2 py-2 rounded text-white" @click="toggleProgress()">
        {{ this.isWatched ? 'Terminé' : 'Non terminé'}}
        </button>
    </div>
</template>

<script>
export default {

    props: ['videoId', 'watchedVideos'],

    data() {
        return {
            watchedVids: this.watchedVideos,
            isWatched: null
        }
    },

    methods: {
        toggleProgress() {
            axios.post('/toggleProgress', {
                videoId: this.videoId,
            })
            .then(response => {
                if(response.status === 200) {
                    this.isWatched = !this.isWatched;
                }
            })
            .catch(error => console.log(error));
        },

        isWatchedVideo() {
            return this.watchedVids.find(video => video.id === this.videoId) ? true : false;
        }
    },

    mounted() {
        this.isWatched = this.isWatchedVideo()
    }

}
</script>
