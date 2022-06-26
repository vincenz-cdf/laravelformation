<template>
    <div>
        <div class="bg-gray-200 w-full rounded">
            <div class="bg-green-500 rounded-l text-center text-white transition-width duration-500" :script="'width:' + percentage + '%'">
                {{percentage}}%
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['watchedVideos', 'videos'],

    computed: {
        percentage() {
            let filteredVids = this.videos.filter(courseVids => {
                return this.watchedVideos.find(watchedVids => {
                    return watchedVids.id === courseVids.id;
                });
            });

            return Math.ceil(filteredVids.length / this.videos.length * 100);
        }
    }
}
</script>
