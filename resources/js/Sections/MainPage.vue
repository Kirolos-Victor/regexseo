<template>
    <div class="my-container">
        <div class="row">
            <div class="col-2" v-for="image in images">
                <image-favorite :image="image"></image-favorite>
            </div>
        </div>
        <div class="d-flex justify-content-center" v-if="nextPage !=null">
            <button class="load-more-button" @click.prevent="getImages">LOAD MORE</button>
        </div>
    </div>

</template>

<script>
import ImageFavorite from "../components/ImageFavorite";

export default {
    name: "MainPage",
    components: {ImageFavorite},
    data() {
        return {
            images: [],
            nextPage: null,
        }
    },
    methods: {
        getImages() {
            let url;
            if (this.nextPage == null) {
                url = '/home';
            } else {
                url = '/home?page=' + this.nextPage;
            }
            axios.get(url).then((data) => {
                this.nextPage = data.data.next_page_url !== null ? data.data.next_page_url.substring(data.data.next_page_url.indexOf('=') + 1) : null;
                this.images = this.images.concat(data.data.data);
            })
        }
    },
    mounted() {
        this.getImages();
    }

}
</script>
